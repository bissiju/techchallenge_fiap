<?php

namespace TechChallengeFIAP\Application\Order\View;

class ViewOrderRequest
{
    private \DateTime $createdDate;

    public function getCreatedDate(): \DateTime
    {
        return $this->createdDate;
    }

    public function setCreatedDate(\Datetime $date): ViewOrderRequest
    {
        $this->createdDate = $date;
        return $this;
    }
}
