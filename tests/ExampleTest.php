<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('WILLIAM MADISON RANDALL LIBRARY');
    }
}
