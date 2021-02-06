<?php

namespace App\Controller;

use App\Entity\Customers;
use App\Repository\EffectifRepository;
use Doctrine\ORM\EntityManagerInterface;
use Lcobucci\JWT\Validator;
use phpDocumentor\Reflection\DocBlock\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApiEffectifController extends AbstractController
{


    public function __invoke(EffectifRepository $data ): Response
    {
        return $this->json($data->findAll(), 200, [], ['Groups({"readE","Effectif_details_read"})']);

    }


    public function post(Request $data, SerializerInterface $serializer, EntityManagerInterface $em, ValidatorInterface $validator )
    {
        $jsonRecu = $data->getContent();
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
