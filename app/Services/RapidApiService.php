<?php

namespace App\Services;


use GuzzleHttp\Client;
use Illuminate\Http\JsonResponse;

/**
 * https://rapidapi.com/skyscanner/api/skyscanner-flight-search?endpoint=5aa1eab3e4b00687d3574279
 */
class RapidApiService
{
    /**
     * @var Client $client
     */
    private Client $client;


    /**
     * RapidApiService constructor.
     *
     * @param  Client  $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getQuote2()
    {
        //Request URL: https://skyscanner-skyscanner-flight-search-v1.p.rapidapi.com/apiservices/browsequotes/v1.0/{country}/{currency}/{locale}/{originplace}/{destinationplace}/{outboundpartialdate}
        $url
            = 'https://skyscanner-skyscanner-flight-search-v1.p.rapidapi.com/apiservices/browsequotes/v1.0/RO/EUR/en-US/BCN-sky/OTP-sky/2019-12-25?inboundpartialdate=2020-01-08';

        $options = [
            'headers' => [
                'x-rapidapi-host' => '',
                'x-rapidapi-key'  => ''
            ]

        ];
        try {
            $result = $this->client->request('GET', $url, $options);
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }


        var_dump(json_decode($result->getBody()->getContents(), true));
    }

    public function getQuote()
    {
        return [];
        $url = 'https://be.wizzair.com/9.21.0/Api/search/search/';

        $options = [
            'body'    => '{
                          "isFlightChange": false,
                          "isSeniorOrStudent": false,
                          "flightList": [
                            {
                              "departureStation": "BCN",
                              "arrivalStation": "OTP",
                              "departureDate": "2019-12-25"
                            }
                          ],
                          "adultCount": 1,
                          "childCount": 0,
                          "infantCount": 0,
                          "wdc": true
                        }',
            'headers' => [
                'cache-control'   => 'no-cache',
                'Connection'      => 'keep-alive',
                'content-length'  => '201',
                'accept-encoding' => 'gzip, deflate',
                'cookie'          => 'bm_sz=1D42E4C335AA099EC457A104593C932E~YAAQNQgQAvsGiT1uAQAA23S4RwWNC6c8uaZLibtVOOUzJewuAWu2chEu+4TQ8OxvaYPT02nVTgsVKZ+dkHlX9ZGFoeMpZV+0HSDmTBLYpEio6cnCzjiMdZowbRwBeWZIIgsB+Dw4oSswKWNFsr1LwHI+Srjviwo8B3nb4OmPTizhVXwmjNfwSGfovK5MxIIP4A==; _abck=129E32096C2879DE918D3F121480A43D~-1~YAAQNQgQAvwGiT1uAQAA23S4RwJgBZsiHJuF2rpL6giwmvrdj+DVNyvTtQLPoc5O3ca6SpoUsOFY4SUu38ZA87VeDdbsv1S78kpphggsizg5Sr4G2dbRtlzHHTdWPR7VzWbC2wSd2a7RXMFUlx5L/Unsd8UzD72yq/3xUvTnB+ksIOpWkRX8AAMtmtOtvNL8En1nMEylqo7gl2gs0nV+59mlKr0Zn3iOtEssu+wg8c47RLUjWlLIkRPcWBvuYLrzpzBhVn+th1BMJv9IF5Shj1UwBiyQ8GkpZF8UFo4h/PpIt7J8pfIb8EPqVw==~-1~-1~-1; ak_bmsc=9A7B00EE7F5FB655B6FA1514B0A70ED8021008351B1B00004B8AC45DBA531701~pl4EzTxLGNbMRc5QVk9L+OEA+sXJRDdbRneCr8cFIayzExXsnPcJwY5IlSemXDPsEGCdhC9t2zpCXierrjTYlwDjr9wg3XOU1kWAGYgfvpD4tTVRgmwqh32pJQPAyNU78R+1SanPRdmN9r3CiL5wHrxVwk53pZxlIJU/mYBOQYxNWehdQiVo7d4ghD62b+OqsdsGXcsJHxBWu8BUYPxlSXAlf3Rz01IKEdvFKd7Gnel0k5hsJE/rgOla1bzm9fYziWHQpbVTTlQxXhUtZVH+6gCSEa+SM7OiLmlPF3sv4MQSpj7jSXv9dySCieqjbYeppHGdC+B+ucvaiOOZ8A2Q/sgvRiin9wL4YcgLMS4anQ7LU=; bm_sv=DA7E134F831C1C44A313C1E196334ED0~MPEw1G1AYTzT+xzW9BsNUGE1eY6Jx3fFaZ5Hd9itDsHEERLIlw5ndLMo3rno5NKm0WmCV5I6els+wqCp1jGM/UyH8N+5Br7yneCsDboQ51zTkriE88Fyv1lLVFoetbBdHEaOnsFvNl+o5Xa0KH2oNTHBZFwqjllsMxhalBjI+MQ=; RequestVerificationToken=cb685958de7f42c884134d7766dedcb2; ASP.NET_SessionId=tfadyvpjqinr2xfmidcpu2zl',
                'Host'            => 'be.wizzair.com',
                'Postman-Token'   => 'd93a3a48-e9d4-4f3e-91b8-d7b625601f7e,e9a2755c-c013-47b8-beef-2ca81183e188',
                'Cache-Control'   => 'no-cache',
                'Accept'          => '*/*',
                'User-Agent'      => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:70.0) Gecko/20100101 Firefox/70.0',
                'Content-Type'    => 'application/json'
            ]
        ];

        $result = [];

        try {
            $apiResult = $this->client->request('POST', $url, $options);
            $result = $apiResult->getBody()->getContents();
        } catch (\Exception $exception) {
            $result = $exception;
        }

        return new JsonResponse($result);
    }


}
