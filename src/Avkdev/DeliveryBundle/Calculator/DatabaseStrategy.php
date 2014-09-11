<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 11.09.14
 * Time: 11:39
 */

namespace Avkdev\DeliveryBundle\Calculator;

use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerAware;

class DatabaseStrategy extends ContainerAware implements CalculatorStrategyInterface
{
    public function calculate(array $data)
    {
        /** @var $em EntityManager */
        $em = $this->container->get('doctrine.orm.entity_manager');
        $cost = $em->getRepository('AvkdevDeliveryBundle:Pricelist')->getDataByCalcForm($data);

        $distance = $em->getRepository('AvkdevDeliveryBundle:CityDistance')
            ->getDistanceIndex($data['departure_city'], $data['arrival_city']);

        // add distance index and delvery time
        array_walk($cost, function (&$v) use ($distance) {
            $v['cost'] = round($v['cost'] * $distance['costIdx'], 2);
            $v['delivery_time'] = $distance['deliveryTime'];
        });

        // get company ids
        $ret = array();
        foreach ($cost as $row) {
            $ret[$row['company_id']] = $row;
        }
        $companies = $em->getRepository('AvkdevDeliveryBundle:Company')->findBy(array('id' => array_keys($ret)));
        foreach ($companies as $entity) {
            $ret[$entity->getId()]['company'] = $entity->getName();
        }
        return $ret;
    }
}
