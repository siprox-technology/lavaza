<?php

namespace App\Models;

class Cart 
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
        if($oldCart)
        {
            $this->items= $oldCart->items;
            $this->totalQty= $oldCart->totalQty;
            $this->totalPrice= $oldCart->totalPrice;
        }
    }
    public function add($item, $id){
        $storedItems = ['quantity'=>0, 'price'=>$item->price, 'item'=>$item];
        if($this->items)
        {
            if(array_key_exists($id,$this->items))
            {
                $storedItems = $this->items[$id];
            }
        }
        $storedItems['quantity']++;
        $storedItems['price'] = $item->price * $storedItems['quantity'];
        $this->items[$id] = $storedItems;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }
    public function remove($item, $id)
    {
        unset($this->items[$id]);
        $this->totalQty--;
        $this->totalPrice -= $item['price'];
    }

}
