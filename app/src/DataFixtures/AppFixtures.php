<?php

namespace App\DataFixtures;
use App\Entity\customers;
use App\Entity\Timetable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
class AppFixtures extends Fixture
{



    public function load(ObjectManager $manager)
    {
        // $manager->persist($product);
        $fake = Factory::create();


            for ($e = 0; $e < random_int(5, 15); $e++) {
                $custom = new customers();
                $custom->setEFFECTIF($fake->numerify('###'))
                    ->setRAISONSOCIALE($fake->text(30))
                    ->setNOMCONTACT($fake->text(20))
                    ->setPRENOMCONTACT($fake->text(20))
                    ->setCIVILITE($fake->text(20))
                    ->setFONCTION($fake->text(20))
                    ->setTELCONTACT($fake->numerify('###'))
                    ->setPORTABLECONTACT($fake->numerify('########'))
                    ->setEMAILCONTACT($fake->email)
                    ->setADRESSE1($fake->text(20))
                    ->setADRESSE2($fake->text(20))
                    ->setCODEPOSTALENTREPRISE($fake->numerify('####'))
                    ->setVILLEENTREPRISE($fake->text(20))
                    ->setTELEPHONEENTREPRISE($fake->numerify('########'))
                    ->setCreatedAt($fake->dateTime)
                    ->setUpdateAt($fake->dateTime);

                $manager->persist($custom);

            }


        $manager->flush();
    }
}
