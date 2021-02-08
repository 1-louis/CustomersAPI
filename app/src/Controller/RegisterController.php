<?php

namespace App\Controller;

use App\Entity\customers;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RegisterController
{

 /*
  * @Route(name="api_posts_collection_post", methods={"POST"})
  */
    public function post(Request $request, SerializerInterface $serializer, EntityManagerInterface $em, ValidatorInterface $validator )
    {
        $jsonRecu = $request->getContent();
        try {
            $post= $serializer->deserialize($jsonRecu, Post::class, 'json');
            $Erros = $validator->validate($post);
            if(count($Erros)>0){
                return $this->json($Erros, 400);
            }
            $em->persist($post);
            $em->flush();
            return $this->json($post, 201, [], ['Groups({"readE","Effectif_details_read"})']);
        }catch (NotEncodableValueException $e){
            return $this->json(
                [ 'status: '=>400,
                    'message'=> $e->getMessage()],400
            );
        }

    }

}
