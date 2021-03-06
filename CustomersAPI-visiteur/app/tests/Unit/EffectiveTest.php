<?php


namespace App\Tests\Unit;


use App\Entity\Admin;
use App\Entity\customers;
use PHPUnit\Framework\TestCase;

class EffectiveTest extends testCase{

    /**
     * @var customers
     */
    private customers $Effectif;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->Effectif = new customers();
        
    }
    public function  testGetRS():void
    {
        $value = 'test RAISON_SOCIALE' ;
        $response = $this->Effectif->setRAISONSOCIALE($value);
        self::assertInstanceOf(customers::class, $response);
        self::assertEquals($value, $this->Effectif->getRAISONSOCIALE());

    }


    public function  testGetE():void
    {
        $value = 'test EffecId ' ;
        $response = $this->Effectif->setEffecId($value);
        self::assertInstanceOf(customers::class, $response);
        self::assertInstanceOf(Admin::class, $this->Effectif->getEffecId());

    }

    public function  testGetNC():void
    {
        $value = 'test NOM_CONTACT' ;
        $response = $this->Effectif->getNOMCONTACT($value);
        self::assertInstanceOf(customers::class, $response);
        self::assertEquals($value, $this->Effectif->getNOMCONTACT());

    }

}