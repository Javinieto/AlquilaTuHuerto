<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Huerto;

class HuertoController extends AbstractController
{
    /**
     * @Route("/huertos", name="huertos")
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
     * @Route("/huerto/{id}", name="getById")
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
     * @Route("/huertos", name="new", methods="new")
     */

    public function newHuerto(Request $request)
    {
        $data = $request->getContent();
        $huerto_stClass = json_decode($data);

        $huerto = new Huerto();
        $huerto->setName($huerto_stClass->name);
        $huerto->setImage($huerto_stClass->image);
        $huerto->setSize($huerto_stClass->size);
        $huerto->setDisponibilidad($huerto_stClass->disponibilidad);
        $huerto->setIdUsuario($huerto_stClass->idUsuario);

        return $this->json([
            'messsage' => "Huerto añadido correctamente"
        ]);
    }

    /**
     * @Route("/huerto/{id}", name="huerto-delete", methods="delete")
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
     * @Route("/huerto/{id}", name="huerto-update", methods="update")
     */
    public function updateHuerto2($id, Request $request ){

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

