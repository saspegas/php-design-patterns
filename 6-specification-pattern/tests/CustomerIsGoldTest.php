<?php

use PHPUnit\Framework\TestCase;

class CustomerIsGoldTest extends TestCase
{
    /** @test */
    function a_customer_is_gold_if_they_have_a_respective_type ()
    {
        $specification = new CustomerIsGold();
        $goldCustomer = new Customer('kadir', 'gold');
        $silverCustomer = new Customer('kadir', 'silver');

        $this->assertTrue($specification->isSatisfiedBy($goldCustomer));
        $this->assertFalse($specification->isSatisfiedBy($silverCustomer));
    }
}