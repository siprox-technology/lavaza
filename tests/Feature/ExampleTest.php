<?php

namespace Tests\Feature;
use Session; 
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\Request;
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
 
        $token = Session::token();
        $response = $this->post
        (route('register'), [
            'name' => 'سروش مدرسی',
            'email'=>'integralproject1988@gmail.com',
            'phone'=>'09371373929',
            'password'=>'1111',
            'password_confirmation'=>'1111',
            '_token' => csrf_token()
        ]);
        $response->assertStatus(200);
    }
}
