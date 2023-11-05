<?php

namespace TechChallengeFIAP\Application\Product\Edit;

class EditProductRequest
{
    private string $productId;

    private string $name;

    private string $description;

    private string $images;

    private float $price;

    private string $category;

    public function getProductId(): string
    {
        return $this->productId;
    }

    public function setProductId(string $productId): EditProductRequest
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return EditProductRequest
     */
    public function setName(string $name): EditProductRequest
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
     * @return EditProductRequest
     */
    public function setDescription(string $description): EditProductRequest
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
     * @return EditProductRequest
     */
    public function setPrice(float $price): EditProductRequest
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
     * @return EditProductRequest
     */
    public function setImages(string $images): EditProductRequest
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
     * @return EditProductRequest
     */
    public function setCategory(string $category): EditProductRequest
    {
        $this->category = $category;
        return $this;
    }
}
