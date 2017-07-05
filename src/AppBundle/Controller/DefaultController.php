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
        $productService->getProducts();
        return $this->render("AppBundle::index.html.twig");
    }
}
