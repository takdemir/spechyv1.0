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
        foreach ($categories as $key=>&$category){

            if(!is_array($category['services']) || count($category['services'])==0){continue;}
            foreach ($category['services'] as &$service){
                $products=$this->getProducts($service['id']);
                if(!is_array($products) || count($products)==0){$service['products']=[];continue;}
                $service['products']=$products;
            }

        }
        //$this->cs->printR($categories);
        return $categories;
    }




}