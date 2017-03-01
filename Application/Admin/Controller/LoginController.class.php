<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {

    public function loginAction(){
        if(IS_POST){
            if(!$this->check_verifyAction($_POST['verify'])){
                $this->error("验证码不正确!");
            }
            $user = D("User");
            $result = $user->where("password='%s' and username='%s'",array(md5($_POST['password']),$_POST['username']))->select();
            if($result){
                $info = $user->where("username='{$_POST['username']}'")->find();
                session("uid",$info["id"]);
                session("username",$info["username"]);
                $this->success("登录成功",U("admin/lst"));
            }else{
                $this->error("用户名或密码不正确!");
            }
            return;
        }
        $this->display();
    }

    function check_verifyAction($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

    public function verifyAction(){
        $Verify = new \Think\Verify();
        $Verify->length = 4;
        $Verify->entry();
    }
}