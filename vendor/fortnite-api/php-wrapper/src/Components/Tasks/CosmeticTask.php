<?php

namespace FortniteApi\Components\Tasks;

use Exception;
use FortniteApi\Components\HttpClient;
use FortniteApi\Components\Objects\Cosmetic;
use FortniteApi\FortniteApiError;
use Psr\Http\Message\ResponseInterface as Response;

class CosmeticTask extends Awaitable
{
    /**
     * Awaits the response and returns the parsed body.
     *
     * @return null|Cosmetic
     */
    public function await()
    {
        FortniteApiError::clearLastError();

        try {
            /** @var Response $response */
            $response = parent::await();

            if (empty($response)) {
                return null;
            }

            $statusCode = $response->getStatusCode();

            if (!HttpClient::isSuccess($statusCode)) {
                FortniteApiError::setLastError("Request failed.", $response);

                return null;
            }
            
            $body = $response->getBody();

            if (empty($body)) {
                return Cosmetic::createObject(null);
            }
            
            $text = (string)$body;

            return Cosmetic::createObject($text);
        } catch (Exception $ex) {
            FortniteApiError::setLastError($ex->getMessage());

            return null;
        }
    }
}
