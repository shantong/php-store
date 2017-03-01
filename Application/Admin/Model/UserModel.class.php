<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/7
 * Time: 16:17
 */

namespace Admin\Model;

use Think\Model;

class UserModel extends Model{

    protected $_validate = array(
        array('username', 'require', '用户名不能为空！'),
        array('password', 'require', '密码不能为空！'),
        array('username', '', '用户名称已经存在！', 0, 'unique', 1), // 在新增的时候验证name字段是否唯一
    );
}