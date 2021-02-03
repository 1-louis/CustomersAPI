<?php
 declare(strict_types=1);

 namespace App\Entity;

 use DateTimeInterface;
 use Symfony\Component\Validator\Constraints\Date;
/*
*@var \DateTimeInterface
*/
 trait Timetable{
     /**
      * @var DateTimeInterface
      * @ORM\Column(type="datetime",  options={"default": "CURRENT_TIMESTAMP"},nullable=true)
      */
     private DateTimeInterface $createdAt;
     /**
      * @var DateTimeInterface
      * @ORM\Column(type="datetime", nullable=true)
      */
     private  ?DateTimeInterface $updateAt;



     public function getCreatedAt(): DateTimeInterface
     {
         return $this->createdAt;
     }


  /*   public function setCreatedAt(\DateTimeInterface $createdAt): Timestapable
     {
         $this->createdAt = $createdAt;
         return $this;
     }*/


     public function getUpdateAt(): ?DateTimeInterface
     {
         return $this->updateAt;
     }

     public function setUpdateAt(?DateTimeInterface $updateAt): Timetable
     {
         $this->updateAt = $updateAt;
         return $this;
     }


 }