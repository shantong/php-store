<?php
namespace Admin\Controller;

class GoodsController extends CommonController
{
    public function addAction()
    {
        if (IS_POST) {
            $Goods = D("Goods");
            if ($Goods->create()) {
                if($Goods->add()){
                    $this->success("添加商品成功！",U("lst"));
                }else{
                    $this->error($Goods->getError());
                }
            } else {
                $this->error($Goods->getError());
            }
            return;
        }
        $cate = D('Cate');
        $this->assign('list', $cate->getCates());
        $brand = D("Brand");
        $result = $brand->order('id asc')->select();
        $this->assign("result", $result);
        $this->display();
    }

    public function lstAction(){

        $this->display();
    }
}