<?php

class Customer
{
    public function __construct(
        public string $name, 
        public string $type, 
    ) {}
}