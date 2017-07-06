<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Products;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AjaxController extends Controller
{

    public function getServicesAction(Request $request)
    {
        if($request->isXmlHttpRequest()) {
            $commonService = $this->get("app.services.commonservices");
            $productService = $this->get("app.services.productservices");
            $req = json_decode($request->getContent(), true);
            $services = $productService->getServices($req['categoryId']);

            //$commonService->printR($services);
            return new JsonResponse(['hasError' => false, 'response' => $services, 'msg' => 'İşlem Başarılı']);
        }else{
            return new JsonResponse(['hasError' => true, 'response' => [], 'msg' => 'Yetkisiz istek!']);
        }
    }


}
