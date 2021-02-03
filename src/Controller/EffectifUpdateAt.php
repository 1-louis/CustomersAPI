<?php


namespace App\Controller;


use App\Entity\Effectif;

class EffectifUpdateAt
{
    public function __invoke(Effectif $data): Effectif
    {
        $data->getUpdateAt(new \DateTimeImmutable("tomorrow"));
        return $data;
    }

}