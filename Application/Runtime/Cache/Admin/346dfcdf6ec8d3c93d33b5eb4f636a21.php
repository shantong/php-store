<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> author:单桐qq:278176188</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="http://127.0.0.1/shop/Application/Admin/Public/style/bootstrap.css" rel="stylesheet">
    <link href="http://127.0.0.1/shop/Application/Admin/Public/style/font-awesome.css" rel="stylesheet">
    <link href="http://127.0.0.1/shop/Application/Admin/Public/style/weather-icons.css" rel="stylesheet">

    <!--Beyond styles-->
    <link id="beyond-link" href="http://127.0.0.1/shop/Application/Admin/Public/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="http://127.0.0.1/shop/Application/Admin/Public/style/demo.css" rel="stylesheet">
    <link href="http://127.0.0.1/shop/Application/Admin/Public/style/typicons.css" rel="stylesheet">
    <link href="http://127.0.0.1/shop/Application/Admin/Public/style/animate.css" rel="stylesheet">
    <script type="text/javascript" charset="utf-8" src="http://127.0.0.1/shop/Application/Admin/Public/Ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="http://127.0.0.1/shop/Application/Admin/Public/Ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="http://127.0.0.1/shop/Application/Admin/Public/Ueditor/lang/zh-cn/zh-cn.js"></script>

</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<!-- 头部 -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                        <img src="http://127.0.0.1/shop/Application/Admin/Public/images/logo.png" alt="">
                    </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="http://127.0.0.1/shop/Application/Admin/Public/images/adam-jansen.jpg">
                                </div>
                                <section>
                                    <h2><span class="profile"><span>admin</span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                                <li class="dropdown-footer">
                                    <a href="/shop/index.php/Admin/Admin/logout">
                                        退出登录
                                    </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="/shop/index.php/Admin/Admin/edit/username/<?php echo (session('username')); ?>">
                                        修改密码
                                    </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>

<!-- /头部 -->
</body>
</html>

<div class="main-container container-fluid">
    <div class="page-container">
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<!-- Page Sidebar -->
<div class="page-sidebar" id="sidebar">
    <!-- Page Sidebar Header-->
    <div class="sidebar-header-wrapper">
        <input class="searchinput" type="text">
        <i class="searchicon fa fa-search"></i>
        <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
    </div>
    <!-- /Page Sidebar Header -->
    <!-- Sidebar Menu -->
    <ul class="nav sidebar-menu">
        <!--Dashboard-->
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-gear"></i>
                <span class="menu-text">用户管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="/shop/index.php/Admin/Admin/lst">
                        <span class="menu-text">用户列表</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
            <ul class="submenu">
                <li>
                    <a href="/shop/index.php/Admin/Admin/add">
                        <span class="menu-text">添加用户</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-gear"></i>
                <span class="menu-text">商品模块</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="/shop/index.php/Admin/Cate/lst">
                        <span class="menu-text">种类管理</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="/shop/index.php/Admin/brand/lst">
                        <span class="menu-text">品牌管理</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="/shop/index.php/Admin/goods/lst">
                        <span class="menu-text">商品管理</span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /Sidebar Menu -->
</div>
<!-- /Page Sidebar -->
</body>
</html>
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <a href="/shop/index.php/Admin/Admin/lst">系统</a>
                    </li>
                    <li>
                        <a href="/shop/index.php/Admin/goods/lst">商品管理</a>
                    </li>
                    <li class="active">添加商品</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-header bordered-bottom bordered-blue">
                                <span class="widget-caption">新增商品</span>
                            </div>
                            <div class="widget-body">
                                <div id="horizontal-form">
                                    <form class="form-horizontal" role="form" action="" enctype="multipart/form-data" method="post">
                                        <div class="tabbable">
                                            <ul class="nav nav-tabs nav-justified" id="myTab10">
                                                <li class="tab-red active">
                                                    <a data-toggle="tab" href="#home10">
                                                        基本信息
                                                    </a>
                                                </li>
                                                <li class="tab-red">
                                                    <a data-toggle="tab" href="#profile10">
                                                        商品描述
                                                    </a>
                                                </li>
                                                <li class="tab-red">
                                                    <a data-toggle="tab" href="#profile11">
                                                        会员价格
                                                    </a>
                                                </li>
                                                <li class="tab-red">
                                                    <a data-toggle="tab" href="#profile12">
                                                        商品属性
                                                    </a>
                                                </li>
                                                <li class="tab-red">
                                                    <a data-toggle="tab" href="#profile13">
                                                        商品图片
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="tab-content">
                                                <div id="home10" class="tab-pane active">
                                                    <div class="form-group">
                                                        <label for="goods_name"
                                                               class="col-sm-2 control-label no-padding-right">商品名称</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" id="goods_name" placeholder="" name="goods_name"
                                                                   required="" type="text">
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="goods_thumb"
                                                               class="col-sm-2 control-label no-padding-right">商品缩略图</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" id="goods_thumb" placeholder="" name="goods_thumb"
                                                                   type="file">
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cate_id"
                                                               class="col-sm-2 control-label no-padding-right">所属分类</label>
                                                        <div class="col-sm-6">
                                                           <select id="cate_id" name="cate_id" style="width: 15%;">
                                                               <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["catename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                                           </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="brand_id"
                                                               class="col-sm-2 control-label no-padding-right">所属品牌</label>
                                                        <div class="col-sm-6">
                                                            <select id="brand_id" name="brand_id" style="width: 15%;">
                                                                <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brand): $mod = ($i % 2 );++$i;?><option value="<?php echo ($brand["id"]); ?>"><?php echo ($brand["brand_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="market_price"
                                                               class="col-sm-2 control-label no-padding-right">市场价格</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" id="market_price" placeholder="" name="market_price"
                                                                   required="" type="text" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')">
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="shop_price"
                                                               class="col-sm-2 control-label no-padding-right">本店价格</label>
                                                        <div class="col-sm-6">
                                                            <input class="form-control" id="shop_price" placeholder="" name="shop_price"
                                                                   required="" type="text" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')">
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="goods_weight"
                                                               class="col-sm-2 control-label no-padding-right">商品重量</label>
                                                        <div class="col-sm-6" style="float: left;">
                                                            <input class="form-control" id="goods_weight" placeholder="" name="goods_weight"
                                                                   required="" type="text" style="float: left;width: 90%" onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')">
                                                            <select id="weight_unit" name="weight_unit" style="width: 10%;float: right;">
                                                                <option value="g">克</option>
                                                                <option value="kg">千克</option>
                                                            </select>
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="goods_weight"
                                                               class="col-sm-2 control-label no-padding-right">是否上架</label>
                                                        <div class="col-lg-4 col-sm-4 col-xs-4">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="colored-blue" checked="checked" name="onsale">
                                                                    <span class="text"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="profile10" class="tab-pane">
                                                    <script id="editor" type="text/plain" style="height:100%;width:100%" name="goods_desc"></script>
                                                </div>
                                                <div id="profile11" class="tab-pane">
                                                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
                                                </div>
                                                <div id="profile12" class="tab-pane">
                                                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
                                                </div>
                                                <div id="profile13" class="tab-pane">
                                                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-blue" style="width:150px;margin-top: 20px;">添加商品</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Page Body -->
        </div>
        <!-- /Page Content -->
    </div>
</div>

<!--Basic Scripts-->
<script src="http://127.0.0.1/shop/Application/Admin/Public/style/jquery_002.js"></script>
<script src="http://127.0.0.1/shop/Application/Admin/Public/style/bootstrap.js"></script>
<script src="http://127.0.0.1/shop/Application/Admin/Public/style/jquery.js"></script>
<!--Beyond Scripts-->
<script src="http://127.0.0.1/shop/Application/Admin/Public/style/beyond.js"></script>
<script type="text/javascript">
    var ue = UE.getEditor('editor');
</script>
</body>
</html>