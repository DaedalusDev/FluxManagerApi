<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as JMS;

class RootController extends Controller
{
    /**
     * @return array
     *
     * @JMS\View(serializerGroups={"getInfo"})
     */
    public function getAction() {
        return array();
    }
//
//
//    public function getBarAction(Bar $bar) {
//        return $bar;
//    }
}
