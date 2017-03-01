<?php
namespace Admin\Controller;
use Think\Page;

class CateController extends CommonController {

        public function addAction(){
            $cate = D('Cate');
            if(IS_POST){
                if ($cate->addCate()) {
                    $this->success("添加商品成功！",U("lst"));
                } else {
                    $this->error("添加商品失败!");
                }
                return;
            }
            $this->assign('list',$cate->getCates());
            $this->display();
        }

        public function lstAction(){
            $cate = D('Cate');
            $this->assign('list',$cate->getCates(true));
            $this->display();
        }

        public function editAction(){
            $cate = D('Cate');
            if(IS_POST){
                $data['pid'] = I('pid');
                $res = $cate->where('id='.I('id'))->save($data);
                if($res){
                    $this->success("修改商品成功！",U("lst"));
                }else{
                    $this->error("修改商品失败！",U("lst"));
                }
                return;
            }
            $this->assign('list',$cate->getCates(false,$_GET['id']));
            $this->assign("id",$_GET['id']);
            $this->assign("catename",$_GET['catename']);
            $this->display();
        }

        public function delAction(){
            if(!$_GET["id"]){
                $this->error("该商品不存在!");
                return;
            }
            $Cate = D("Cate");
            $result = $Cate->where('id='.$_GET["id"])->delete();
            if(!$result){
                $this->error("删除商品失败，请检查商品是否存在！",__CONTROLLER__."/lst");
                return;
            }
            $this->success('删除商品成功！',__CONTROLLER__."/lst");
        }
}