<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 11.09.14
 * Time: 11:38
 */

namespace Avkdev\DeliveryBundle\Calculator;

/**
 * Interface CalculatorStrategyInterface
 * Strategy pattern
 * @package Avkdev\DeliveryBundle\Calculator
 */
interface CalculatorStrategyInterface
{
    /**
     * Calculate delivery for specified strategy
     * @param array $data
     * @return mixed
     */
    public function calculate(array $data);
}
