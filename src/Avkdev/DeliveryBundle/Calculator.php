<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10.09.14
 * Time: 14:41
 */

namespace Avkdev\DeliveryBundle;

use Avkdev\DeliveryBundle\Calculator\CalculatorStrategyInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Delivery Calculator
 * @package Avkdev\DeliveryBundle
 */
class Calculator extends ContainerAware
{
    /**
     * @var Calculator\CalculatorStrategyInterface
     */
    private $calculateStrategy;

    /**
     * Constructor
     * @param CalculatorStrategyInterface $strategy
     */
    public function __construct(CalculatorStrategyInterface $strategy)
    {
        $this->calculateStrategy = $strategy;
    }

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);
        $this->calculateStrategy->setContainer($container);
    }

    /**
     * Calculates delivery cost and term
     * @param $data
     * @return mixed
     */
    public function calculate($data)
    {
        return $this->calculateStrategy->calculate($data);
    }
}
