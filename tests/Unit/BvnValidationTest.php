<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use app\Http\Controllers\BvnController;


class BvnValidationTest extends TestCase
{

    private $bvn;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function makeRequest()
    {
        $data = [
            'bvn_number' => 2222463038
        ];

        $data = new Request($data);

        $bvn = new  BvnController();

        $response = $bvn->check($data)->getContent();

        $response->assertStatus(200);
    }
}