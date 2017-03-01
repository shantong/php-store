<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/7
 * Time: 16:17
 */

namespace Admin\Model;
use Think\Model;

class GoodsModel extends Model
{
    protected $_validate = array(
        array('goods_desc', 'isEmpty', '商品描述不能为空！', 1, 'callback'),
    );

    protected function isEmpty($goodDesc)
    {
        if ($goodDesc == null || empty($goodDesc)) {
            return false;
        } else {
            return true;
        }
    }

    protected function _before_insert(&$data,$options) {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3 * 1024 * 1024;// 设置附件上传大小 3M
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './'; // 设置附件上传根目录
        $upload->savePath = 'goods/'; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->uploadOne($_FILES['goods_thumb']);
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
            return false;
        } else {// 上传成功
            $image = new \Think\Image();
            $image->open($info['savepath'] . $info['savename']);
            // 按照原图的比例生成一个最大为40, 120的缩略图并保存为thumb.jpg
            $original = $info['savepath'] . $info['savename'];
            $max_thumb = $image->thumb(362, 362)->save($info['savepath'] .'sm_'. $info['savename']);
            $mid_thumb = $image->thumb(240, 240)->save($info['savepath'] .'mid_'. $info['savename']);
            $sm_thumb = $image->thumb(120, 120)->save($info['savepath'] .'max_'. $info['savename']);
            $data['original'] = $original;
            $data['sm_thumb'] = $info['savepath'] .'sm_'. $info['savename'];
            $data['mid_thumb'] = $info['savepath'] .'mid_'. $info['savename'];
            $data['max_thumb'] = $info['savepath'] .'max_'. $info['savename'];
            $data['goods_sn'] = time() . rand(100000,999999);
            if($data['onsale'] == 'on'){
                $data['onsale'] = '是';
            }else{
                $data['onsale'] = '否';
            }
        }
        return true;
    }
}