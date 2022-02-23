<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Huerto;

class HuertoController extends AbstractController
{
    /**
     * @Route("/huertos", name="huertos", methods="get")
     */
    public function recogerHuertos(): Response
    {
        $huertos = $this->getDoctrine()->getRepository(Huerto::class)->findAll();
        $data = [];
        foreach ($huertos as $huerto){
            $emp = [ 
                'id'=> $huerto->getId(),
                'name'=> $huerto->getName(),
                'image'=> $huerto->getImage(),
                'size'=> $huerto->getSize(),
                'disponibilidad'=> $huerto->getDisponibilidad(),
                'idUsuario'=> $huerto->getIdUsuario()
            ];
            $data[] = $emp;        
    }
    return $this->json([
        $data
     ]);
 }
    
    /** 
     * @Route("/huertos/{id}", name="getById", methods="get")
     */
    public function getById($id)
    {
        $huerto = $this->getDoctrine()->getRepository(Huerto::class)->find($id);
        $emp =[ 'id'=> $huerto->getId(),
                'name'=> $huerto->getName(),
                'image'=> $huerto->getImage(),
                'size'=> $huerto->getSize(),
                'disponibilidad'=> $huerto->getDisponibilidad(),
                'idUsuario'=> $huerto->getIdUsuario(),
                'HuertoProducto'=>$huerto->getHuertoProducto()
            ];
        $data[] = $emp;       
        return $this->json([
            $data
        ]);
    }

    /**
     * @Route("/huertos/new", name="huerto-new", methods="post")
     */

    public function newHuerto(Request $request)
    {
        $er = $this->getDoctrine()->getManager();

        $data = $request->getContent();
        $huerto_stClass = json_decode($data);

        $huerto = new Huerto();
        $huerto->setName($huerto_stClass->name);
        $huerto->setImage($huerto_stClass->image);
        $huerto->setSize($huerto_stClass->size);
        $huerto->setDisponibilidad($huerto_stClass->disponibilidad);
        $huerto->setIdUsuario($huerto_stClass->idUsuario);

        $er->persist($huerto);
        $er->flush();

        return $this->json([
            'messsage' => "Huerto añadido correctamente",
            'huerto' => $huerto
        ]);
    }

    /**
     * @Route("/huertos/{id}", name="huerto-delete", methods="delete")
     */

    public function deleteHuerto($id){
        $er = $this->getDoctrine()->getManager();
        $huerto = $this->getDoctrine()->getRepository(Huerto::class)->find($id);

        $er->remove($huerto);
        $er->flush();

       return $this->json([
           "message"=>"Huerto eliminado"
       ]);
    }

    /**
     * @Route("/huertos/{id}", name="huerto-update", methods="put")
     */
    public function updateHuerto($id, Request $request ){

        $er = $this->getDoctrine()->getManager();
        
        $data = $request->getContent();
        $huerto_stClass = json_decode($data);

        $huerto = $this->getDoctrine()->getRepository(Huerto::class)->find($id);
        $huerto->setName($huerto_stClass->name);
        $huerto->setImage($huerto_stClass->image);
        $huerto->setSize($huerto_stClass->size);
        $huerto->setDisponibilidad($huerto_stClass->disponibilidad);
        $huerto->setIdUsuario($huerto_stClass->idUsuario);

        $er->flush();
        
        return $this->json([
            "message" => "Huerto actualizado"
        ]);
    }
}

