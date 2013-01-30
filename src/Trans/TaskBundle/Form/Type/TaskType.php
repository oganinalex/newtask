<?php
// src/Trans/TaskBundle/Form/Type/TaskType.php
namespace Trans\TaskBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder ->add('car_name', 'text', array('label' => 'Название авто:'));
       $builder ->add('car_number', 'text', array('label' => 'Номер авто:'));
       $builder ->add('car_vincode', 'text', array('label' => 'VIN код:'));
       $builder ->add('driver_first_name', 'text', array('required' => false, 'label' => 'Имя водителя:'));
       $builder ->add('driver_last_name', 'text', array('required' => false, 'label' => 'Фамилие водителя:'));
    }

    public function getName()
    {
        return 'task';
    }
    
}
?>
