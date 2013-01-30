<?php

namespace Trans\BaseBundle\Controller;

use Trans\TaskBundle\Entity\CarTypeTask;
use Trans\TaskBundle\Form\Type\TaskType;
use Trans\StoreBundle\Entity\CarType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CarController extends Controller
{
    public function add_carAction() // вывод формы добавления автомобиля
    {
        // выводим форму добавления автомобиля
        
        $CarTypeTask = new CarTypeTask();
        $form = $this->createForm(new TaskType(), $CarTypeTask);       
        return $this->render('TransBaseBundle:Trans:form_add_car.html.twig', array('form' => $form->createView()));
        
    }
    public function add_car_baseAction(Request $request) // доюавление автомобиля в базу
    {
        // получаем форму и заполняем базу автомобиля
        $CarType = new CarType();
        $CarTypeTask = new CarTypeTask();
        $form = $this->createForm(new TaskType(), $CarType);
        
        $content = "Не валидны данные";
        if($request->getMethod() == "POST")
        {
            $form->bindRequest($request);
            if($form->isValid())
            {
                $cartype= $form->getData(); // получили все данные формы
                $em = $this->getDoctrine()->getEntityManager();
                $em ->persist($cartype);
                $em ->flush();
                $content = 'Авто добавлено id: ';
                return $this->render('TransBaseBundle:Trans:index.html.twig', array('content' =>  $content));
                
            }
        }
         return $this->render('TransBaseBundle:Trans:index.html.twig', array('content' =>  $content));
        
    }
    
    public function edit_carAction($car_id)
    {
        // загружаем форму с возможностью изменения 
        
        $car = $this->getDoctrine()
                    ->getRepository('TransStoreBundle:CarType')
                    ->find($car_id);
        if (!$car) {
            throw $this->createNotFoundException('Авто под таким id не найдено '.$car_id);
        }
        $CarTypeTask = new CarTypeTask();
        $CarTypeTask ->setCarName($car->getCarName());
        $CarTypeTask ->setCarNumber($car->getCarNumber());
        $CarTypeTask ->setCarVincode($car->getCarVincode());
        $CarTypeTask ->setDriverFirstName($car->getDriverFirstName());
        $CarTypeTask ->setDriverLastName($car->getDriverLastName());
        $form = $this->createForm(new TaskType(), $CarTypeTask);
       
        
        return $this->render('TransBaseBundle:Trans:form_edit_car.html.twig', array('form' => $form->createView(), 'paths' => "trans_edit_car_base", 'car_id' => $car_id ));

    }
    public function edit_car_baseAction(Request $request, $car_id)
    {
        
        $CarTypeTask = new CarTypeTask();
        $form = $this->createForm(new TaskType(), $CarTypeTask); 
        $content = "Не валидны данные";
        if($request->getMethod() == "POST")
        {
            $form->bindRequest($request);
            if($form->isValid())
            {
                // добавляем в базу
                $cartype= $form->getData(); // получили все данные формы
                $em = $this->getDoctrine()->getEntityManager();
                $CarType = $em->getRepository('TransStoreBundle:CarType')->find($car_id);
                if (!$CarType) {
                    throw $this->createNotFoundException('Ненайден автомобиль под id '.$car_id);
                }
                $CarType->setCarName($cartype->getCarName());
                $CarType->setCarNumber($cartype->getCarNumber());
                $CarType->setCarVincode($cartype->getCarVincode());
                $CarType->setDriverFirstName($cartype->getDriverFirstName());
                $CarType->setDriverLastName($cartype->getDriverLastName());
                $em ->flush();
                $content = 'Авто обновлено id: ';//.$CarType->getId();
                return $this->redirect($this->generateUrl('trans_car_journal'));
                
            }else
            {
                $content = "Не прошел валидацию";
                return $this->render('TransBaseBundle:Trans:index.html.twig', array('content' =>  $content));
            }
        }
         return $this->render('TransBaseBundle:Trans:index.html.twig', array('content' =>  $content));
    }
    
    public function journalAction()
    {
        // получаем все записи
        $repository = $this->getDoctrine()
                      ->getRepository('TransStoreBundle:CarType');
        $cars = $repository->findAll();
        if(!$cars)
        {
           $content = 'Сначала добавьте автомобиль';
           return $this->render('TransBaseBundle:Trans:index.html.twig', array('content' =>  $content)); 
        }
        // передаем в темплейт и выводим в таблице
        return $this->render('TransBaseBundle:Trans:car_journal.html.twig', array('cars' =>  $cars));
    }
    public function delete_carAction($car_id)
    {
        $em = $this->getDoctrine()->getEntityManager();
       
        $car = $em->getRepository('TransStoreBundle:CarType')->find($car_id);
        if(!$car)
        {
            throw $this->createNotFoundException('Ненайден автомобиль под id '.$car_id);
        }
        $em->remove($car);
        $em->flush();
        return $this->redirect($this->generateUrl('trans_car_journal'));
        
    }
    
}
?>