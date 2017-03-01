<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/7
 * Time: 16:17
 */

namespace Admin\Model;

use Think\Model;

class CateModel extends Model{

    protected $_validate = array(
        array('catename', 'require', '产品名不能为空！'),
    );

    public function addCate(){
        if ($this->create()) {
            $result = $this->add();
            if($result){
               return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function getCates($isNeedFlag = false,$id=-1){
        $items = $this->order('id asc')->where('id != '.$id)->select();
        return $this->getTree($items, 0, 0,$isNeedFlag);
    }

    public function getTree($arr,$pid,$step,$isNeedFlag = false){
        global $tree;
        foreach($arr as $key=>$val) {
            if($val['pid'] == $pid) {
                if($isNeedFlag)
                    $flg = str_repeat('└―',$step);
                else
                    $flg = str_repeat('└―',0);
                $val['catename'] = $flg.$val['catename'];
                $tree[] = $val;
                $this->getTree($arr , $val['id'] ,$step+1,$isNeedFlag);
            }
        }
        return $tree;
    }
}