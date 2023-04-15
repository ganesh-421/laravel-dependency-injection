<?php

namespace App\Http\Controllers;

use App\Services\TestService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    // dependency injection
    private $injectedService;
    public function __construct(TestService $serv)
    {
        $this->injectedService = $serv;        
    }
    public function index(Request $req) //request is injected
    {
        //$injectedService =  app()->make(TestService::class); this is another method to inject the service
        $this->injectedService->log('from index');
        /**
         * now, if we have to call methods like test1 or test2 from here,
         * and also if they require the same service, we can just inject
         * the service in the constructor, and use it in the methods.
         * instead of passing the service as a parameter to the methods.
         */
        $this->test1();
        $this->test2();
        return [1, 2, 3, $req->input('name')];
    }
    private function test1() //no parameters required
    {
        $this->injectedService->log('test1');
    }
    private function test2() //no parameters required
    {
        $this->injectedService->log('test2');
    }
}