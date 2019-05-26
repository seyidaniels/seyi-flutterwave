<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AssetsTests extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        // If the logo can load, then every other file should be seen

        $path = "logo_test/FLW-logo.svg";

        $url = asset($path);

        $this->assertEquals(config('app.url') . "/" . $path, $url);
    }
}