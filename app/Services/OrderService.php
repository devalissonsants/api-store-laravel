<?php

namespace App\Services;
use App\Models\Order;
use App\Models\OrderHasProduct;


class OrderService
{
    private $order;
    private $orderHasProduct;

    public function __construct(Order $order, OrderHasProduct $orderHasProduct){
        $this->order = $order;
        $this->orderHasProduct = $orderHasProduct;
    }

    public function getAllOrder($requestInfo)
    {
        return $this->order->with(['client', 'products'])->get();
    }

    public function getOrder($id)
    {
      return $this->order->with(['client', 'products'])->findOrFail($id);
    }

    public function postOrder($requestInfo)
    {
      $order = new Order;
      $order = $order->create($requestInfo);
      self::syncProducts($order, $requestInfo);
      return $this->order->with(['client', 'products'])->findOrFail($order->id);
    }

    public function putOrder($id, $requestInfo)
    {
        $order = $this->order->findOrFail($id);
        $order->fill($requestInfo)->save();
        self::syncProducts($order, $requestInfo);
        return $this->order->with(['client', 'products'])->findOrFail($order->id);
    }

    public function deleteOrder($id)
    {
      $this->order->findOrFail($id)->delete();
      return true;
    }

    public function syncProducts($order, $requestInfo)
    {
        if(array_key_exists('product_or_service', $requestInfo)){
        {
            $collection = $this->orderHasProduct->where('order_id', $order['id'])->get(['id']);
            $this->orderHasProduct->destroy($collection->toArray());

            foreach($requestInfo['product_or_service'] as $orders){
                $orderHasProduct = new OrderHasProduct;
                $orders['order_id'] = $order['id'];
                $orderCreate = $orderHasProduct->create($orders);
            }
        }
    }
}
}
