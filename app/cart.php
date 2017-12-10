<?php

namespace App;

class cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldcart)
    {
        if($oldcart)
        {
            $this->items = $oldcart->items;
            $this->totalQty = $oldcart->totalQty;
            $this->totalPrice = $oldcart->totalPrice;
        }
    }

    public function add($item , $id)
    {
        $storedItem = ['qty'=> 0, 'price'=>$item->cat_price,'item'=>$item];
        if($this->items)
        {
            if(array_key_exists($id,$this->items))
            {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->cat_price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->cat_price;

    }

    public function reducedbyone($id){
        $deducted_price = ($this->items[$id]['price']/$this->items[$id]['qty']);
        $this->items[$id]['price'] -= $deducted_price;
        $this->items[$id]['qty']--;
        $this->totalPrice -= $deducted_price;
        $this->totalQty--;
        if($this->items[$id]['qty'] <= 0){
            unset($this->items[$id]);
        }
    }

    public function removeall($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }

}
