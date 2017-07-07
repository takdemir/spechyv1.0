<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Products;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {
        $commonService=$this->get("app.services.commonservices");
        $productService=$this->get("app.services.productservices");
        $categories=$productService->getTreeForProducts();
        //$commonService->printR($categories);
        return $this->render("AppBundle::index.html.twig",["categories"=>$categories]);
    }


    public function getProductsAction($serviceId, Request $request){

        if(!preg_match('/^\d+$/',$serviceId)){ /* TODO: HATA SAYFASINA YÖNLENDİRECEĞİM*/ }
        $commonService=$this->get("app.services.commonservices");
        $productService=$this->get("app.services.productservices");
        $products=$productService->getProducts($serviceId);
        $categories=$productService->getTreeForProducts();
        //$commonService->printR($products);

        return $this->render("AppBundle::products.html.twig",["products"=>$products,"categories"=>$categories]);


    }

    public function getProductDetailAction($slug, Request $request){

        $commonService=$this->get("app.services.commonservices");
        $productService=$this->get("app.services.productservices");
        $productDetail=$productService->getProductBySlug($slug);
        $categories=$productService->getTreeForProducts();
        //$commonService->printR($productDetail);
        $message="";
        if(strlen(trim($request->query->get("addProductToCart")))>0 && $request->query->get("addProductToCart")==true){

            $midnight=date("Y-m-d 00:01:00");
            $now=date("Y-m-d H:i:s");
            $sevenAM=date("Y-m-d 07:00:00");
            $threePM=date("Y-m-d 15:00:00");

            $message="Ürününüz bugün çalışma saatleri içinde kargoya verilecektir/onaylanacaktır.";
            if($now>=$sevenAM && $now<$threePM){
                $message="Ürününüz bugün kargoya verilecektir/onaylanacaktır.";
            }elseif($now>=$threePM && $now<=$midnight) {
                $message = "Ürününüz yarın kargoya verilecektir/onaylanacaktır.";
            }

            //$commonService->setLog($customerId,$productId,$message); //Yapılan işlemlerin logunu tutuyorum
        }

        return $this->render("AppBundle::productdetail.html.twig",["productDetail"=>$productDetail,"categories"=>$categories,"message"=>$message]);


    }





    public function addNewProductAction(Request $request){
        $commonService=$this->get("app.services.commonservices");
        $productService=$this->get("app.services.productservices");
        $categories=$productService->getCategories();
        $em=$this->getDoctrine()->getEntityManager();
        $productEntity=new Products();
        $services=$productService->getServices(1);
        $serviceChoices=[];
        foreach ($services as $service){

            if(!array_key_exists($service['serviceName'],$serviceChoices)){
                $serviceChoices[$service['serviceName']]=$service['id'];
            }
        }

        $productForm=$this->createFormBuilder($productEntity)
                            ->add("productName",TextType::class,[])
                            ->add("services",EntityType::class, array('class'=>'AppBundle\Entity\Services','choice_label' => 'serviceName','query_builder' => function (EntityRepository $er) {
                                return $er->createQueryBuilder('p')->where("p.categoryId=1")
                                    ->orderBy('p.id', 'ASC');
                            }, 'multiple'=>true))
                            /*->add('services', 'entity', array(
                                'class' => 'AppBundle\Entity\Services',
                                'property'     => 'serviceName',
                                'multiple'     => true
                            ))*/
                            ->add("slug",TextType::class,[])
                            ->add("save",SubmitType::class,["label"=>"Kaydet"])
                            ->getForm();
        //$commonService->printR($request->request->get('form'));
        $productForm->handleRequest($request);
        if($productForm->isSubmitted() && $productForm->isValid()){
            //$commonService->printR($request->request->all());
            $form=$request->request->all();
            $category=$form['categories'];
            $serviceId=$form['form']['services'];
            $productName=$form['form']['productName'];
            $slug=$form['form']['slug'];

            $checkSlugAndProduct=$em->createQueryBuilder()
                                    ->select("p")
                                    ->from("AppBundle:Products","p")
                                    ->where("p.productName=:productName")
                                    ->orWhere("p.slug=:slug")
                                    ->setParameters(["productName"=>$productName,"slug"=>$slug])
                                    ->getQuery()
                                    ->getArrayResult();

            if(is_array($checkSlugAndProduct) && count($checkSlugAndProduct)>0) {

                $commonService->setMessage('error', 'Sistemde var olan ürün bilgileri ekleyemezsiniz!');

            }else{

                $postedServiceId = $this->getDoctrine()->getRepository("AppBundle:Services")->find($serviceId);

                $productsInstance = new Products();
                $productsInstance->setProductName($productName);
                $productsInstance->setSlug($slug);
                $productsInstance->setVisible(1);
                $em->persist($productsInstance);
                $em->flush();
                $lastInsertedId = $productsInstance->getid();
                if ($lastInsertedId > 0) {


                    $commonService->setMessage('success', 'Kayıt işlemi başarılı!');
                } else {
                    $commonService->setMessage('error', 'Kayıt işlemi başarısız oldu!');
                }

            }

        }
        return $this->render("AppBundle::newproduct.html.twig",["productForm"=>$productForm->createView(),"categories"=>$categories]);

    }




}
