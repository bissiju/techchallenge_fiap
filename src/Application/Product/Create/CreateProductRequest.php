<?php

namespace TechChallengeFIAP\Application\Product\Create;

class CreateProductRequest
{
    private string $name;

    private string $description;

    private string $images;

    private float $price;

    private string $category;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CreateProductRequest
     */
    public function setName(string $name): CreateProductRequest
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return CreateProductRequest
     */
    public function setDescription(string $description): CreateProductRequest
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param string $price
     * @return CreateProductRequest
     */
    public function setPrice(float $price): CreateProductRequest
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getImages(): string
    {
        return $this->images;
    }

    /**
     * @param string $images
     * @return CreateProductRequest
     */
    public function setImages(string $images): CreateProductRequest
    {
        $this->images = $images;
        return $this;
    }

    /**
     * @return category
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return CreateProductRequest
     */
    public function setCategory(string $category): CreateProductRequest
    {
        $this->category = $category;
        return $this;
    }


}
