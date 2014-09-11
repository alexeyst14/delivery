<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10.09.14
 * Time: 14:41
 */

namespace Avkdev\DeliveryBundle;

use Avkdev\DeliveryBundle\Calculator\CalculatorStrategyInterface;
use Avkdev\DeliveryBundle\Entity\Company;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Calculator extends ContainerAware
{
    private $calculateStrategy;
    /**
     * @var Company
     */
    private $company;

    public function __construct(CalculatorStrategyInterface $strategy)
    {
        $this->calculateStrategy = $strategy;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);
        $this->calculateStrategy->setContainer($container);
    }

    public function calculate($data)
    {
        return $this->calculateStrategy->calculate($data);
    }

    public function setCompany(Company $company)
    {
        $this->company = $company;
    }

}
