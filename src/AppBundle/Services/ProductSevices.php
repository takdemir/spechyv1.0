<?php
/**
 * Created by PhpStorm.
 * User: takdemir
 * Date: 05.07.2017
 * Time: 21:41
 */

namespace AppBundle\Services;


use Doctrine\ORM\EntityManager;

class ProductSevices
{

    private $em,$cs;

    function __construct(EntityManager $em, CommonService $cs)
    {
        $this->em=$em;
        $this->cs=$cs;
    }


    /**
     * @return array
     */
    public function getCategories(){

        $categories=$this->em->createQueryBuilder()
                            ->select("p")
                            ->addSelect("service")
                            ->from("AppBundle:Categories","p")
                            ->leftJoin("p.services","service")
                            ->getQuery()
                            ->getArrayResult();

        //$this->cs->printR($categories);
        return $categories;

    }


    /**
     * @param null $categoryId
     * @return array
     */
    public function getServices($categoryId=null){

        $services=$this->em->createQueryBuilder()
            ->select("p")
            ->addSelect("cat")
            ->addSelect("products")
            ->from("AppBundle:Services","p")
            ->leftJoin("p.categories","cat")
            ->leftJoin("p.products","products");
        if(!is_null($categoryId)){
            $services->where("p.categoryId=:categoryId");
            $services->setParameter("categoryId",$categoryId);
        }
            $serviceResult=$services->getQuery()
            ->getArrayResult();
        //$this->cs->printR($serviceResult);
        return $serviceResult;

    }


    /**
     * @param null $serviceId
     * @return array
     */
    public function getProducts($serviceId){

        $products=$this->em->createQueryBuilder()
            ->select("p")
            ->addSelect("service")
            ->from("AppBundle:Products","p")
            ->leftJoin("p.services","service")
            ->getQuery()
            ->getArrayResult();
        //$this->cs->printR($products);
        return $products;

    }


    /**
     * @param null $productId
     * @return mixed
     */
    public function getProductById($productId=null){

        $products=$this->em->createQueryBuilder()
            ->select("p")
            ->addSelect("service")
            ->from("AppBundle:Products","p")
            ->leftJoin("p.services","service");
        if(!is_null($productId)){
            $products->where("p.id=:id");
            $products->setParameter("id",$productId);
        }
        $productResult=$products->getQuery()
            ->getArrayResult();
        //$this->cs->printR($productResult);
        return $productResult[0];

    }


    /**
     * @param null $productId
     * @return mixed
     */
    public function getProductBySlug($slug){

        $productDetail=$this->em->createQueryBuilder()
            ->select("p")
            ->addSelect("service")
            ->from("AppBundle:Products","p")
            ->leftJoin("p.services","service")
            ->where("p.slug=:slug")
            ->setParameter("slug",$slug)
            ->getQuery()
            ->getArrayResult();
        //$this->cs->printR($productResult);
        return $productDetail[0];

    }


    /**
     * @return array
     */
    public function getTreeForProducts(){

        $categories=$this->getCategories();
        $services=$this->getServices(); //$this->cs->printR($services);
        $collectData=[];
        foreach ($services as $service){

            if(!array_key_exists($service['categories']['category'],$collectData)){
                $collectData[$service['categories']['category']]=[];
            }

            $collectData[$service['categories']['category']]['services'][]=['serviceId'=>$service['id'],'serviceName'=>$service['serviceName'],'products'=>$service['products']];
            if(is_array($service['products']) && count($service['products'])>0){
                /*foreach($service['products'] as $product){
                    $collectData[$service['categories']['category']]['services']['products'][]=['productId'=>$product['id'],'productName'=>$product['productName'],'slug'=>$product['slug']];
                }*/

            }
        }

        //$this->cs->printR($categories);
        return $collectData;
    }




}