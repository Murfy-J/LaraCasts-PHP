<?php

namespace Http\Forms;

trait  Traits
{
    private $tax = 10;

    public function getTax()
    {
        return $this->tax;
    }
}


class workingWithTraits
{
    use Traits;
}

$textTrait = new workingWithTraits();

print_r($textTrait->getTax());