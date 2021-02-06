<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */

        public function index(Request $request, SerializerInterface $serializer, EntityManagerInterface $em, ValidatorInterface $validator )
    {
        $jsonRecu = $request->getContent();
        try {
            $post= $serializer->deserialize($jsonRecu, Post::class, 'json');
            $Erros = $validator->validate($post);
            if(cont($Erros)>0){
                return $this->json($Erros, 400);
            }
            $em->persist($post);
            $em->flush();
            return $this->json($post, 201, [], ['groups'=>'post:read']);
        }catch (NotEncodableValueException $e){
            return $this->json(
                [ 'status: '=>400,
                    'message'=> $e->getMessage()],400
            );
        }

    }

}
