<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\News;
use App\Categories;

class ModelTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test()
    {
        $this->assertIsObject( new News());

        $this->assertIsObject( new Categories());
    }
}
