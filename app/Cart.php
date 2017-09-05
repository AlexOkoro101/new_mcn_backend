<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart)
	{
		if ($oldCart) {
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id, $loadPhone)
	{
		$storedItem = ['qty' => 1, 'price' => $item->price, 'phone' => $loadPhone, 'network' => $item->network, 'quantity' => $item->quantity];
		/*if ($this->items){
			if (array_key_exists($id, $this->items)) {
				$storedItem = $this->items[$id];
			}
		}*/
		//$storedItem['qty']++;
		//$storedItem['price'] = $item->price * $storedItem['qty'];
		$this->items[] = $storedItem;
		$this->totalQty++;
		$this->totalPrice += $item->price;
	}
}
