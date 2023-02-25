<?php

class CustomerRepository
{
    public function __construct (protected array $customers) {}

    public function all() {
        return $this->customers;
    }

    public function filter(SpecificationInterface $specification) {
        
        $match = [];
        foreach ($this->customers as $customer) {
            if ($specification->isSatisfiedBy($customer)) {
                $match[] = $customer;
            }
        }
        
        return $match;
    }

}