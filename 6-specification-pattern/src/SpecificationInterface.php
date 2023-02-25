<?php

interface SpecificationInterface
{
    public function isSatisfiedBy(Customer $customer): bool;
}