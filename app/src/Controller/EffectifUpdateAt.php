<?php


namespace App\Controller;


use App\Entity\Customers;

class EffectifUpdateAt
{
    public function __invoke(Customers $data): Customers
    {
        $data->getUpdateAt(new \DateTimeImmutable("tomorrow"));
        return $data;
    }

}