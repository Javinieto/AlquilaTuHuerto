<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="create_user")
     */
    
     public function createUser(Request $request): Response{
        
        $em = $this->getDoctrine()->getManager();

        $user = new User();
     }
}

