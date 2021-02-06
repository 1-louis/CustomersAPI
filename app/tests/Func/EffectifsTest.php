<?php


namespace App\Tests\Func;


use Symfony\Component\BrowserKit\Request;
use Symfony\Flex\Response;

class EffectifsTest extends AbstractEndPoint
{
    public function testEffec():void
    {
        $response = $this->getResponseFronRequest(
            Request::METHOD_GET,
            '/api/effectif'

        );
        $responseContent = $response->getContent();
        $responseDeccoded =  json_decode($responseContent);

        self::assertEquals(Response::HTTP_OK, $response->getStatusCode());
        self::assertJson($responseContent);
        self::assertNotEmpty($responseDeccoded);

    }
}