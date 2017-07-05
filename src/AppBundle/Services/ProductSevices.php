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

        $this->cs->printR($categories);
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
            ->from("AppBundle:Services","p")
            ->leftJoin("p.categories","cat");
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
    public function getProducts($serviceId=null){

        $products=$this->em->createQueryBuilder()
            ->select("p")
            ->addSelect("service")
            ->from("AppBundle:Products","p")
            ->leftJoin("p.services","service");
        if(!is_null($serviceId)){
            $products->where("p.serviceId=:serviceId");
            $products->setParameter("serviceId",$serviceId);
        }
        $productResult=$products->getQuery()
            ->getArrayResult();
        //$this->cs->printR($productResult);
        return $productResult;

    }

}