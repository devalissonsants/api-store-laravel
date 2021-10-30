<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClientService;

class ClientController extends Controller
{
    private $clientService;
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function index(Request $request)
    {
        return $this->clientService->getAllClient($request->all());
    }

    public function show($id)
    {
        return $this->clientService->getClient($id);
    }

    public function store(Request $request)
    {
        return $this->clientService->postClient($request->all());
    }

    public function update(Request $request, $id)
    {
        return $this->clientService->putClient($id, $request->all());
    }

    public function destroy($id)
    {
       $client = $this->clientService->deleteClient($id);
       return response('');
    }
}
