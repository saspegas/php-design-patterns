<?php

use PHPUnit\Framework\TestCase;

class CustomersRepositoryTest extends TestCase
{
    protected $customers;

    public function setUp(): void
    {
        $this->customers = new CustomerRepository([
            new Customer('aaa', 'gold'),
            new Customer('bbb', 'silver'),
            new Customer('ccc', 'silver'),
            new Customer('ddd', 'gold'),
        ]);
    }

    /** @test */
    function it_fetchs_all_customers_who_match_a_given_spesification ()
    {
        $this->assertCount(2, $this->customers->filter(new CustomerIsGold()));
    }

    /** @test */
    function it_fetch_all_customers()
    {
        $this->assertCount(4, $this->customers->all());
    }
}