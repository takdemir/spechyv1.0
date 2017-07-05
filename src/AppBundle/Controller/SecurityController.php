<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Admin;
use AppBundle\Entity\City;
use AppBundle\Entity\District;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{

    public function loginAction(Request $request){

        $cs=$this->get("app.services.commonservices");
        
        // Şu andan itibaren userAuthanticationProvider.php de bulunan provider devreye girip UserInterface den kalıtım alan entity mizi serialize ediyor.
        $authenticationUtils = $this->get('security.authentication_utils');


        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        if($error){
            $cs->setMessage('error','Lütfen kullanıcıadı ve şifrenizi kontrol ediniz!');
        }

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'AppBundle::login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }



    public function logoutAction(){

        $this->get('security.token_storage')->setToken(null);
        $this->get("request_stack")->getCurrentRequest()->getSession()->invalidate();
        return $this->redirectToRoute("homepage");

    }


}