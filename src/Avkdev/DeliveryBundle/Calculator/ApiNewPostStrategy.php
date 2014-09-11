<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 11.09.14
 * Time: 15:21
 */

namespace Avkdev\DeliveryBundle\Calculator;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ApiNewPostStrategy
 * Calculation Strategy for delivery company "Новая почта"
 * This is stub not real working API
 * @package Avkdev\DeliveryBundle\Calculator
 */
class ApiNewPostStrategy extends ContainerAware implements CalculatorStrategyInterface
{
    /**
     * {@inheritdoc}
     */
    public function calculate(array $data)
    {
        /** @var $request Request */
        $request = $this->container->get('request');

        sleep(mt_rand(1, 6));
        return array (
            'company_id' => '121',
            'company' => 'Новая Почта',
            'delivery_time' => '3',
            'cost' => 43.55 + mt_rand(1, 10),
        );
    }
}
