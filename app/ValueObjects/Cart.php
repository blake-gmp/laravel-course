<?php

namespace App\ValueObjects;

use App\Models\Product;
use Illuminate\Support\Collection;
use PhpParser\Node\Scalar\String_;

class Cart
{
    private Collection $items;

    public function __construct(Collection $items = null)
    {
        $this->items = $items ?? Collection::empty();
    }

    /**
     * @return array
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function hasItems(): bool
    {
        return $this->items->isNotEmpty();
    }

    public function getQuantity(): int
    {
        return $this->items->sum(function ($item) {
            return $item->getQuantity();
        });
    }

    public function getSum(): float
    {
        return $this->items->sum(function ($item) {
           return $item->getSum();
        });
    }

    public function addItem(Product $product): Cart
    {
        $items = $this->items;
        $item = $items->first(function ($item) use ($product) {
            return $product->id == $item->getProductId();
        });
        if (!is_null($item)) {
            $items = $items->reject(function ($item) use ($product) {
               return $product->id == $item->getProductId();
            });
            $newItem = $item->addQuantity($product);
        } else {
            $newItem = new CartItem($product);
        }
       $items->add($newItem);
        return new Cart($items);
    }

    public function removeItem(Product $product): Cart
    {
        $items = $this->items->reject(function ($item) use ($product) {
            return $product->id == $item->getProductId();
        });
        return new Cart($items);
    }
}
