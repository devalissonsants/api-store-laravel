<?php

namespace App\Services;
use App\Models\Client;

class ClientService
{
    private $client;

    public function __construct(Client $client){
        $this->client = $client;
    }

    public function getAllClient($requestInfo)
    {
        return $this->client->all();
    }

    public function getClient($id)
    {
      return $this->bank->findOrFail($id);
    }

    public function postClient($requestInfo)
    {
       $client = new Client;
       return $client->create($requestInfo);
    }

    public function putClient($id, $requestInfo)
    {
        $client = $this->client->findOrFail($id);
        $client->fill($requestInfo)->save();
        return $client;
    }

    public function deleteClient($id)
    {
      $this->bank->findOrFail($id)->delete();
      return true;
    }
}
