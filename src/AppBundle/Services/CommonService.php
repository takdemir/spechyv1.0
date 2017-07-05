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


    /**
     * @param string $languageAbbreviation
     * @return array
     */
    public function getLanguageDetails($languageAbbreviation='tr'){

        $language=[];
        return $language;

    }

    /**
     * @param $arr
     * @param string $type
     */
    public function printR($arr,$type='p'){
        echo '<pre>';
        if($type=='u'){
            var_dump($arr);
        }else {
            print_r($arr);
        }
        exit;
    }


    /**
     * @param $data
     * @return mixed
     */
    public function secureSqlinjection($data){

        $pattern=["select","update","delete","insert","from"];
        $replace=["","","","",""];

        return str_replace($pattern,$replace,$data);

    }

    /**
     * @return Session
     */
    public function getSessionInstance(){
        return $this->session;
    }


    /**
     * @param string $messageType
     * @param string $message
     * @return bool
     */
    public function setMessage($messageType='error',$message=""){

        $this->session->getFlashBag()->set($messageType,$message);
        //$this->printR($this->session->getFlashBag()->get('error'));
        return true;

    }


    /**
     * @return bool
     */
    public function checkUserAuthorisation(){

        $isGranted=$this->authorizationChecker->isGranted("ROLE_USER");
        if(!$isGranted){
            throw new AccessDeniedHttpException();
        }

        return true;

    }



}