<?php
/**
 * Created by PhpStorm.
 * User: taner
 * Date: 15.04.2017
 * Time: 22:36
 */

namespace AppBundle\Twig;


class TwigFunctions extends \Twig_Extension
{


    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('is_array', [$this, 'is_array']),
        ];
    }


    public function is_array($variable)
    {
        if(is_array($variable)){
            return true;
        }else{
            return false;
        }

    }

    public function getName()
    {
        return 'twig_functions';
    }

}