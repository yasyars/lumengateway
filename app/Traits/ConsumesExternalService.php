<?php

namespace App\Traits;
use GuzzleHttp\Client;

trait ConsumesExternalService
{
    public function performRequest($method, $requestUrl, $formParams=[], $headers =[])
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        $response = $client->request($method, $requestUrl, ['form_params' => $formParams, 'headers' => $headers]);

        // $formParams = response()->json($formParams);
        // return $response->getBody()->getContents();
        // return $formParams;
        return $response;
    } 
}