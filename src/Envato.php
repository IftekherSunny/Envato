<?php

namespace Sun;

use GuzzleHttp\Client;

class Envato
{
      /**
       * Envato personal token.
       *
       * @var string
       */
      protected $personalToken;

     /**
      * Guzzle http client.
      *
      * @var \GuzzleHttp\Client
      */
      protected $client;

      /**
       * Create a new envato instance.
       *
       * @param string $personalToken envato personal token
       */
      public function __construct($personalToken)
      {
          $this->personalToken = $personalToken;

          $this->client = new Client(['verify' => false]);
      }


    /**
     * Verify purchase product by purchase code.
     *
     * @param  string $purchaseCode purchase code
     *
     * @return bool
     */
      public function verifyPurchaseCode($purchaseCode)
      {
        $response = $this->get("https://api.envato.com/v3/market/buyer/purchase?code={$purchaseCode}");

          $purchaseDetails = json_decode($response->getBody());

          return ($purchaseDetails->error === 404)
                  ? false
                  : true;
      }


    /**
     * Http get method.
     *
     * @param  string $url Requested url
     * @return \GuzzleHttp\Client
     */
      protected function get($url)
      {
        $response = $this->client->request("GET",
                              $url,
                              ["headers" => [
                                    "Authorization" => "Bearer {$this->personalToken}"
                                  ]
                              ]);

        return $response;
      }
}
