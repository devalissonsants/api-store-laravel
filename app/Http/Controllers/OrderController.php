<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderService;

class OrderController extends Controller
{
    private $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        return $this->orderService->getAllOrder($request->all());
    }

    public function show($id)
    {
        return $this->orderService->getOrder($id);
    }

    public function store(Request $request)
    {
        return $this->orderService->postOrder($request->all());
    }

    public function update(Request $request, $id)
    {
        return $this->orderService->putOrder($id, $request->all());
    }

    public function destroy($id)
    {
       $order = $this->orderService->deleteOrder($id);
       return response('');
    }
}
