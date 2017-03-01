<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
//    function  __construct(){
//        parent::__construct();
//    }

    public function _initialize(){
        if(!session("uid") || !session("username")){
            $this->error("访问地址不存在！",U("Login/login"));
            return;
        }
    }
}
