<?php
namespace app\index\controller;
/**
 * redis
 */
class Ceshi extends Base {

    function __construct() {
        parent::__construct();
    }
    public function index() {
        halt($this->request);
        halt($this->request->param());
    }
}