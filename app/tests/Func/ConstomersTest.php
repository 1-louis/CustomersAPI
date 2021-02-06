<?php

namespace App\Tests\Func;

use PhpParser\Builder\Function_;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Request;
use Symfony\Flex\Response;
use Faker\Factory;
use App\Tests\Func\AbstractEnd_Test;

class ConstomersTest extends AbstractEndPoint {
    private string $CunstomersPayload = '{"EMAIL": "%S"}';

    public function testGetCustomer(): void
    {

        $response = $this->getResponseFronRequest(Request::METHOD_GET, '/api/customers');
        $responseContent = $response->getContent();
        $responseDeccoded = json_decode($responseContent);
        self::assertEquals(Response::HTTP_OK, $response->getStatusCode());
        self::assertJson($responseContent);
        self::assertNotEmpty($responseDeccoded);

       /* parent::expectDeprecation();
        $client = self::createClient();

        $client->request(Request:: METHOD_GET, '/api/customers.json');
        dd($client->getResponse());*/
    }

    public function testPostCustomer(): void
    {

        $response = $this->getResponseFronRequest(
            Request::METHOD_POST,
            '/api/customers',
            $this->getPayload()
        );
       // dd($responseDeccoded);
        $responseContent = $response->getContent();
        $responseDeccoded = json_decode($responseContent);
        self::assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
        self::assertJson($responseContent);
        self::assertNotEmpty($responseDeccoded);
    }
    Private function  getPayload():string
    {

        $faker = Factory::create();
        return sprintf($this->CunstomersPayload, $faker->email);
    }

}