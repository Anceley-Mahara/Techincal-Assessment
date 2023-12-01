<?php

class Category {
    public string $name;
    public array $products;

    public function __construct(string $name, array $products) {
        $this->name = $name;
        $this->products = $products;
    }
}