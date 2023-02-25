<?php

class CustomerIsGold implements SpecificationInterface
{
    public function isSatisfiedBy(Customer $customer): bool
    {
        return $customer->type === 'gold';
    }
}
