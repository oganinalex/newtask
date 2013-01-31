<?php

namespace Trans\BaseBundle\Controller;

use Trans\StoreBundle\Entity\TransportLog;
use Trans\StoreBundle\Form\Type\TransportLogTask;
//use Trans\TaskBundle\Entity\CarTypeTask;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TransController extends Controller
{
    public function journalAction()
    {
        // получаем данные из таблицы и выводим в контент
        $em = $this->getDoctrine()->getEntityManager();
        $acts = $em->getRepository('TransStoreBundle:TransportLog')->findAll();
        if(!$acts)
        {
           $content = 'На данный момент нет ни одного акта!';
           return $this->render('TransBaseBundle:Trans:index.html.twig', array('content' =>  $content));
        }
        return $this->render('TransBaseBundle:Trans:journal.html.twig', array('acts' =>  $acts));
        
    }
    public function getjournalAction()
    {
         $em = $this->getDoctrine()->getEntityManager();
        $product = $em->getRepository('TransStoreBundle:TypeShiping')->find(5);

        if (!$product) {
            throw $this->createNotFoundException('No product found for id 5');
        }

        $product->setTypeShiping('Ставка');
        $em->flush();
        $content = "Id измененного в таблице";
        return $this->render('TransBaseBundle:Trans:index.html.twig', array('content' => $content));
    }
    
    
    public function add_actAction(Request $request)
    {
        // проверяем добавитьв базу либо вывести форму
        $TransportLog = new TransportLog();
        $form = $this->createForm(new TransportLogTask(), $TransportLog);   
        
        if($request->getMethod() == "POST")
        {
            // добавляем в базу
            $form->bindRequest($request);
            if($form->isValid())
            {
                //вносим запись в базу
                $translog = $form->getData();
                
               /*$content = "Не валидны данные";
                return $this->render('TransBaseBundle:Trans:index.html.twig', array('content' =>  $content));*/
                $translog->setEditTime(time());
                $em = $this->getDoctrine()->getEntityManager();
                $em ->persist($translog);
                $em ->flush();
                return $this->redirect($this->generateUrl('trans_base_homepage'));
            }else
            {
                $content = "Не валидны данные";
                return $this->render('TransBaseBundle:Trans:index.html.twig', array('content' =>  $content));
            }
        }else
        {
            // выводим в форму
            return $this->render('TransBaseBundle:Trans:form_add_act.html.twig', array('form' => $form->createView()));
        }
        
    }
    public function edit_actAction(Request $request, $act_id)
    {
        //$TransportLog = new TransportLog();
        $em = $this->getDoctrine()->getEntityManager();
        $Trans = $em->getRepository('TransStoreBundle:TransportLog')->find($act_id);
        if(!$Trans)
        {
            throw $this->createNotFoundException('Ненайден акт под id '.$act_id);
        }
        $form = $this->createForm(new TransportLogTask(), $Trans); 
        
        if($request->getMethod() == "POST") // елси нажато Редактировать
        {
            // Изменение в базе            
            $form->bindRequest($request);
            if($form->isValid())
            {
                $em ->flush();
                return $this->redirect($this->generateUrl('trans_base_homepage'));
            }else
            {
                $content = "Не валидны данные";
                return $this->render('TransBaseBundle:Trans:index.html.twig', array('content' =>  $content));
            }
        }else // если просто загруженно
        {
            // выводим форму с заполнеными данными
            return $this->render('TransBaseBundle:Trans:form_edit_act.html.twig', array('form' => $form->createView(), 'act_id'=>$act_id));
        }
    }
    public function delete_actAction($act_id)
    {
        $em = $this->getDoctrine()->getEntityManager();
       
        $translog = $em->getRepository('TransStoreBundle:TransportLog')->find($act_id);
        if(!$translog)
        {
            throw $this->createNotFoundException('Ненайден акт  под id '.$act_id);
        }
        $em->remove($translog);
        $em->flush();
        return $this->redirect($this->generateUrl('trans_base_homepage'));
    }
}
