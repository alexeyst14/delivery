<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 11.09.14
 * Time: 11:38
 */

namespace Avkdev\DeliveryBundle\Calculator;


interface CalculatorStrategyInterface
{
    public function calculate(array $data);
}
