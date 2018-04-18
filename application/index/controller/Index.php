<?php
namespace app\index\controller;

class Index extends Base {
    public function initialize() {
        parent::initialize();
    }
    public function index() {
        return $this->fetch();
    }
    public function hehe() {
        $path = env('ROUTE_PATH');
        $swagger = \Swagger\scan($path);
        header('Content-Type: application/json');
        echo $swagger;
    }
}
