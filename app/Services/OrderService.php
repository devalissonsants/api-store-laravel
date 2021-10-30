<?php

namespace App\Services;
use App\Models\Order;

class OrderService
{
    private $order;

    public function __construct(Order $order){
        $this->order = $order;
    }

    public function getAllOrder($requestInfo)
    {
        return $this->order->with(['client'])->all();
    }

    public function getOrder($id)
    {
      return $this->order->with(['client'])->findOrFail($id);
    }

    public function postOrder($requestInfo)
    {
       $order = new Order;
       $order = $order->create($requestInfo);
       return $this->order->with(['client'])->findOrFail($order->id);
    }

    public function putOrder($id, $requestInfo)
    {
        $order = $this->order->findOrFail($id);
        $order->fill($requestInfo)->save();
        return $this->order->with(['client'])->findOrFail($order->id);
    }

    public function deleteOrder($id)
    {
      $this->order->findOrFail($id)->delete();
      return true;
    }
}
