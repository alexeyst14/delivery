<?php

namespace Avkdev\DeliveryBundle\Controller;

use Avkdev\DeliveryBundle\Calculator;
use Avkdev\DeliveryBundle\Form\CalculatorType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $form = $this->createForm(new CalculatorType());
        return $this->render('AvkdevDeliveryBundle:Default:index.html.twig', ['form' => $form->createView()]);
    }

    public function calculateAction(Request $request)
    {
        $form = $this->createForm(new CalculatorType());
        $form->submit($request);

        $calc = new Calculator(new Calculator\DatabaseStrategy());
        $calc->setContainer($this->container);
        $calc->calculate($form->getData());
        $ret = array('data' => array_values($calc->calculate($form->getData())));
        return new JsonResponse($ret);
    }
}
