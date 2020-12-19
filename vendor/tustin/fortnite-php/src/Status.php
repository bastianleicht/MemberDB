<?php

namespace Fortnite;

use Fortnite\FortniteClient;

use GuzzleHttp\Exception\GuzzleException;

class Status
{
    private $access_token;

    public function __construct($access_token)
    {
        $this->access_token = $access_token;
    }

    public function get()
    {
        try {
            $data = FortniteClient::sendFortniteGetRequest(
                FortniteClient::FORTNITE_STATUS_API . 'service/bulk/status?serviceId=Fortnite',
                $this->access_token
            );

            return $data[0]->status;
        } catch (GuzzleException $e) {
            if ($e->getCode() == 404) throw new \Exception('Unable to obtain Fortnite status.');
            throw $e;
        }
    }

    public function allowedToPlay()
    {
        try {
            $data = FortniteClient::sendFortniteGetRequest(
                FortniteClient::FORTNITE_STATUS_API . 'service/bulk/status?serviceId=Fortnite',
                $this->access_token
            );

            return !empty($data[0]->allowedActions) && in_array('PLAY', $data[0]->allowedActions);
        } catch (GuzzleException $e) {
            if ($e->getCode() == 404) throw new \Exception('Unable to obtain Fortnite status.');
            throw $e;
        }
    }
}
