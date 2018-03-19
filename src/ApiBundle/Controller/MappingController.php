<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\User;
use ApiBundle\Mixin\ConstraintViolationValidable;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\Controller\Annotations as JMS;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class MappingController extends Controller
{

    use ConstraintViolationValidable;

    public function getMappingAction()
    {
        return $this->getDoctrine()->getRepository('ApiBundle:MappingNode')->findAll();
    }

}
