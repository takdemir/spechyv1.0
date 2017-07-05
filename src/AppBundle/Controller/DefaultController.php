<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

    public function getProductByIdAction($productId, Request $request){

        if(!preg_match('/^\d+$/',$productId)){ /* TODO: HATA SAYFASINA YÖNLENDİRECEĞİM*/ }
        $commonService=$this->get("app.services.commonservices");
        $productService=$this->get("app.services.productservices");
        $productDetail=$productService->getProductById($productId);
        $categories=$productService->getTreeForProducts();
        //$commonService->printR($productDetail);
        $message="";
        if(strlen(trim($request->query->get("addProductToCart")))>0 && $request->query->get("addProductToCart")==true){

            $midnight=date("Y-m-d 00:01:00");
            $now=date("Y-m-d H:i:s");
            $sevenAM=date("Y-m-d 07:00:00");
            $threePM=date("Y-m-d 15:00:00");

            $message="Ürününüz bugün çalışma saatleri içinde kargoya verilecektir.";
            if($now>=$sevenAM && $now<$threePM){
                $message="Ürününüz bugün kargoya verilecektir.";
            }elseif($now>=$threePM && $now<=$midnight) {
                $message = "Ürününüz yarın kargoya verilecektir.";
            }
        }

        return $this->render("AppBundle::productdetail.html.twig",["productDetail"=>$productDetail,"categories"=>$categories,"message"=>$message]);


    }
}
