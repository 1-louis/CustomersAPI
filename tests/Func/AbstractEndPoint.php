<?php


namespace App\Tests\Func;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Request;

abstract class AbstractEndPoint extends WebTestCase
{
    private array $serverInformations = ['ACCEPT'=>'application/json', 'CONTENT_TYPE'=>'application/json'];

    public function getResponseFronRequest(string $method, string $uri, string $payload = ''): Response
    {
        $client = self::createClient();

        $client->request(Request:: METHOD_GET,
            $method,
              $uri .'.json',
            [],
           [],
            $this->serverInformations,
            $payload
    );
        return $client->getResponse();
    }
}