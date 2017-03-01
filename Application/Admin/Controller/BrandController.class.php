<?php
namespace Admin\Controller;

use Boris\DumpInspector;
use Think\Page;

class BrandController extends CommonController
{

    public function addAction()
    {
        $this->display();
    }

    public function uploadAction()
    {
        if (IS_POST) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3 * 1024 * 1024;// 设置附件上传大小 3M
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './'; // 设置附件上传根目录
            $upload->savePath = 'brand/'; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->uploadOne($_FILES['brand_logo']);
            if (!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            } else {// 上传成功
                $brand = D("Brand");
                $_POST['brand_logo'] = $info['savepath'] . $info['savename'];
                $image = new \Think\Image();
                $image->open($info['savepath'] . $info['savename']);
                // 按照原图的比例生成一个最大为40, 120的缩略图并保存为thumb.jpg
                $image->thumb(40, 120)->save($info['savepath'] . $info['savename']);
                if ($brand->create()) {
                    if ($brand->add()) {
                        $this->success("品牌添加成功！", U("lst"));
                    } else {
                        $this->error($brand->getError(), U("lst"));
                    }
                } else {
                    $this->error($brand->getError(), U("lst"));
                }
            }
        }
    }

    public function lstAction()
    {
        $brand = D("Brand");
        $result = $brand->order('id asc')->select();
        $this->assign("result", $result);
        $this->display();
    }

    public function editAction()
    {
        if (IS_POST) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3 * 1024 * 1024;// 设置附件上传大小 3M
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Uploads/'; // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            // 上传文件
            $info = $upload->upload();
            if (!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            } else {// 上传成功
                $brand = D("Brand");
                $_POST['brand_logo'] = $_SERVER['HTTP_ORIGIN'] . "/shop/Uploads/" . $info['brand_logo']['savepath'] . $info['brand_logo']['savename'];
                $brand = M("Brand");
                $data['brand_name'] = $_POST['brand_name'];
                $data['brand_logo'] = $_POST['brand_logo'];
                $data['brand_url'] = $_POST['brand_url'];
                $brand->where('id=' . $_POST['id'])->save($data);
                $this->success("品牌修改成功！", U("lst"));
            }
            return;
        }
        if ($_GET['id']) {
            $this->assign("id", $_GET['id']);
            $this->assign("brandname", $_GET['brandname']);
            $this->assign("brand_url", $_GET['brand_url']);
            $this->display();
            return;
        }
        $this->error("修改品牌信息失败！");
    }

    public function delAction()
    {
        if (!$_GET["id"]) {
            $this->error("该品牌不存在!");
            return;
        }
        $Cate = D("Brand");
        $brand_logo = $Cate->where('id=' . $_GET["id"])->getField('brand_logo');
        if ($brand_logo) {
            unlink($brand_logo);
            $result = $Cate->where('id=' . $_GET["id"])->delete();
            if (!$result) {
                $this->error("删除品牌失败，请检查商品是否存在！", __CONTROLLER__ . "/lst");
                return;
            }
            $this->success('删除品牌成功！', __CONTROLLER__ . "/lst");
        } else {
            $this->error("删除品牌失败，请检查商品是否存在！", __CONTROLLER__ . "/lst");
        }
    }
}