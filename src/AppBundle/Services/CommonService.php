<?php
/**
 * Created by PhpStorm.
 * User: taner
 * Date: 26.11.2016
 * Time: 20:48
 */

namespace AppBundle\Services;


use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

class CommonService
{
    private $em,$session,$authorizationChecker;

    function __construct(EntityManager $em, Session $session, AuthorizationChecker $authorizationChecker)
    {
        $this->em=$em;
        $this->session=$session;
        $this->authorizationChecker=$authorizationChecker;
    }


    public function getLanguageDetails($languageAbbreviation='tr'){

        $language=[];
        return $language;

    }

    public function printR($arr,$type='p'){
        echo '<pre>';
        if($type=='u'){
            var_dump($arr);
        }else {
            print_r($arr);
        }
        exit;
    }


    public function secureSqlinjection($data){

        $pattern=["select","update","delete","insert","from"];
        $replace=["","","","",""];

        return str_replace($pattern,$replace,$data);

    }

    public function getSessionInstance(){
        return $this->session;
    }

    public function setMessage($messageType='error',$message=""){

        $this->session->getFlashBag()->set($messageType,$message);
        //$this->printR($this->session->getFlashBag()->get('error'));
        return true;

    }


    public function checkUserAuthorisation(){

        $isGranted=$this->authorizationChecker->isGranted("ROLE_USER");
        if(!$isGranted){
            throw new AccessDeniedHttpException();
        }

        return true;

    }


}