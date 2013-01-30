<?php
// src/Trans/StoreBundle/Form/Type/TransportLogTask.php
namespace Trans\StoreBundle\Form\Type;


use Trans\TaskBundle\Form\Type\TaskType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TransportLogTask extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder ->add('act_number', 'text', array('label' => '№ Акта:'));
       $builder ->add('car_type', 'entity', array('class' => 'TransStoreBundle:CarType', 'property' => 'CarName', 'label' => 'Авто:'));
       $builder ->add('date', 'date', array('label' => 'Дата от:'));
       $builder ->add('cargo_weight', 'text', array( 'label' => 'Вес груза (кг):'));
       $builder ->add('cargo_type', 'text', array( 'label' => 'Тип груза:'));
       $builder ->add('type_shiping', 'entity', array('class' =>'TransStoreBundle:TypeShiping', 'property' => 'TypeShiping', 'label' => 'Тип Перевозки:'));
       $builder ->add('price_by_km', 'text', array( 'label' => 'Цена за километр:'));
       $builder ->add('dist', 'text', array( 'label' => 'Растояние:'));
       $builder ->add('place_loading', 'text', array( 'label' => 'Место загрузки:'));
       $builder ->add('place_discharg', 'text', array( 'label' => 'Место выгрузки:'));
       
    }

    public function getName()
    {
        return 'task';
    }
    
}
?>

