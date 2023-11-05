<?php

namespace TechChallengeFIAP\Application\Product\View;

class ViewProductRequest
{
    private string $category;

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): ViewProductRequest
    {
        $this->category = $category;
        return $this;
    }
}
