<?php
/**
 * Created by PhpStorm.
 * User: binho
 * Date: 07/01/2016
 * Time: 20:56
 */

namespace App\Control;

use Symfony\Component\HttpFoundation\Request;

class Controller
{
    protected $request;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
    }
    protected function render($path, array $a = []){

        $layout = $this->request->server->get('template');
        return $layout->render($path,$a);
    }
}