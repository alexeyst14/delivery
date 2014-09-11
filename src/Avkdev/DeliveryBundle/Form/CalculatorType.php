<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10.09.14
 * Time: 15:16
 */

namespace Avkdev\DeliveryBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class CalculatorType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('company_id', 'hidden', array('data' => '0'))
            ->add('size', 'number')
            ->add('weight', 'number')
            ->add('parcel_cost', 'number')
            ->add('departure_city', 'entity', array('class' => 'AvkdevDeliveryBundle:City'))
            ->add('arrival_city', 'entity', array('class' => 'AvkdevDeliveryBundle:City'))
            ->add('submit', 'button', array('label' => 'Рассчитать'));
    }


    /**
     * Returns the name of this type.
     * @return string The name of this type
     */
    public function getName()
    {
        return 'calc_form';
    }
}
