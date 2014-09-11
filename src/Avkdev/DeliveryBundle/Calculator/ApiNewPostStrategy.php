<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 11.09.14
 * Time: 15:21
 */

namespace Avkdev\DeliveryBundle\Calculator;


use Symfony\Component\DependencyInjection\ContainerAware;

class ApiNewPostStrategy extends ContainerAware implements CalculatorStrategyInterface
{
    public function calculate(array $data)
    {
        sleep(10);
        return array (
            array(
                'company' => 'Новая Почта',
                'delivery_time' => '3',
                'cost' => '44.55',
            )
        );
    }
}
