<?php

namespace Tests\Unit;

/* use PHPUnit\Framework\TestCase; */
use Tests\TestCase;
use App\Http\Controllers\RegisterController;
use App\Models\User;
use Illuminate\Http\Request;
class RegisterControllerTest extends TestCase
{
    private $registedController;
/*     private $request; */

    public static function setUpBeforeClass():void{
        $registedController = new RegisterController();
    }
    public function setUp():void{
/*         $this->request = new Request(); */
    }
    public function testIndex()
    {
        
    }
    public function tearDown():void{

    }
    public static function tearDownAfterClass():void{

    }
}
