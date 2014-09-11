<?php

namespace Avkdev\DeliveryBundle\Controller;

use Avkdev\DeliveryBundle\Calculator;
use Avkdev\DeliveryBundle\Entity\Company;
use Avkdev\DeliveryBundle\Form\CalculatorType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Avkdev\DeliveryBundle\Entity\CompanyRepository;


class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $form = $this->createForm(new CalculatorType());

        /** @var $repo \Avkdev\DeliveryBundle\Entity\CompanyRepository */
        $repo = $this->getDoctrine()->getRepository('AvkdevDeliveryBundle:Company');

        return $this->render('AvkdevDeliveryBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
            'apiCompanies' => json_encode($repo->getApiCompaniesList()),
        ));
    }

    public function calculateAction(Request $request)
    {
        $form = $this->createForm(new CalculatorType())->submit($request);

        $ret = array('data' => array(), 'status' => 'ok');
        if ($form->isValid()) {
            // delivery calculator
            $calc = new Calculator(new Calculator\DatabaseStrategy());
            $calc->setContainer($this->container);
            $calc->calculate($form->getData());
            $ret['data'] = array_values($calc->calculate($form->getData()));
        } else {
            $ret['status'] ='Invalid data';
        }

        return new JsonResponse($ret);
    }

    public function calculateApiAction(Request $request)
    {
        $form = $this->createForm(new CalculatorType())->submit($request);
        /** @var $company Company */
        $company = $this->getDoctrine()
            ->getRepository('AvkdevDeliveryBundle:Company')
            ->find($form->get('company_id')->getData());
        $strategy = '\\Avkdev\\DeliveryBundle\\Calculator\\' . $company->getApiClass();

        $calc = new Calculator(new $strategy);
        $calc->setContainer($this->container);
        $res = $calc->calculate($form->getData());

        return new JsonResponse(
            array(
                'company_id' => $company->getId(),
                'company' => $company->getName(),
                'delivery_time' => $res['delivery_time'],
                'cost' => $res['cost'],
            )
        );
    }

}
