<?php
namespace Admin\Controller;
use Think\Page;

class AdminController extends CommonController {

    public function lstAction(){
        $User = M('User'); // 实例化User对象
        $count      = $User->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('result',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    public function addAction(){
        if(IS_POST){
            $User = D("User");
            $_POST['password'] = md5($_POST['password']);
            if($User->create()){
                $result = $User->add();
                if($result){
                    $this->success('添加用户成功！',"lst");
                }else{
                    $this->error($User->getError());
                }
            }else{
                $this->error($User->getError());
            }
            return;
        }
        $this->display();
    }

    public function editAction(){
        if(!$_GET['username']){
            $this->error("用户名不能为空!",U("lst"));
            return;
        }
        if(IS_POST){
            $user = D("User");
            $info = $user->where("id={$_GET['id']}")->find();
            if($info['password'] == md5($_POST['password'])){
                $this->error("修改密码不能与原密码一样!");
            }else{
                $_POST['password'] = md5($_POST['password']);
                $user->save();
                $this->success("用户密码修改成功!",U("lst"));
            }
            return;
        }
        $this->assign("username",$_GET['username']);
        $this->display();
    }

    public function delAction(){
        if(!$_GET["id"]){
            $this->error("该用户不存在!");
            return;
        }
        $User = D("User");
        $result = $User->where('id='.$_GET["id"])->delete();
        if(!$result){
            $this->error("删除用户失败，请检查用户是否存在！",__CONTROLLER__."/lst");
            return;
        }
        $this->success('删除用户成功！',__CONTROLLER__."/lst");
    }

    public function logoutAction(){
        session(null);
        $this->success('正在退出系统！',U("Login/login"));
    }

}