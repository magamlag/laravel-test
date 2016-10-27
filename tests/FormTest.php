<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormTest extends TestCase
{
    protected $item =  [
        'product-name' => 'Product 1',
        'quantity' => 2,
        'Price per item' => 14.99
    ];

    /**
     * A basic test save data though AJAX request.
     */
    public function testSaveForm()
    {
        $this->visit('/')->post('/save', $this->item)->seeJson($this->item);
    }
}
