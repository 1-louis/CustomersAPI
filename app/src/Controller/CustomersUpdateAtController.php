<?php


namespace App\Controller;


use App\Entity\customers;
class CustomersUpdateAtController
{
    public function __invoke( $data)
    {
        $data->getUpdateAt(new \DateTimeImmutable("tomorrow"));
        return $data;
    }

}