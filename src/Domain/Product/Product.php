<?php

namespace TechChallengeFIAP\Domain\Product;

use DateTime;

class Product
{
    private ProductId $productId;

    private string $name;

    private DateTime $createdAt;

    private string $description;

    private string $images;

    private string $category;

    private float $price;

    public function __construct(ProductId $productId, string $name, string $description, string $category, string $images, float $price, DateTime $createdAt = null)
    {
        $this->productId = $productId;
        $this->name = $name;
        $this->description = $description;
        $this->category = $category;
        $this->images = $images;
        $this->price = $price;
        $this->createdAt = $createdAt ?? new DateTime();
    }

    public function id(): ProductId
    {
        return $this->productId;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function editProduct(string $name, string $description, string $category, string $images, float $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->category = $category;
        $this->images = $images;
        $this->price = $price;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function category(): string
    {
        return $this->category;
    }

    public function images(): string
    {
        return $this->images;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function createdAt(): DateTime
    {
        return $this->createdAt;
    }
}
