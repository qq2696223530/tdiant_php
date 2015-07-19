<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head lang="zh"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>淘点通系统 - tdiant.com </title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/index.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/dialog.css">
    <script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/dialog.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/menu.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/user_setting.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/mod_password.js"></script>
    <link rel="shortcut icon" href="http://www.tdiant.com/ico.ico">
</head>
<body>

<!--侧边栏-->
<div class="menu">
    <h1 class="title">淘点通后台系统</h1>
    <ul class="menu_main_list_area">
    	
        <li 
        <?php
 if ($Think.MODULE_NAME=='Index') { echo 'class="mueu_main_list active"'; } else{ echo 'class="mueu_main_list"'; } ?>
        >
            <a class="mueu_main_title" href="<?php echo U('Index/index');?>">
                <i class="icon icon_user"></i>
                <span>个人信息</span>
            </a>
        </li>
        
        <li 
            <?php
 if ($Think.MODULE_NAME=='Notification') { echo 'class="mueu_main_list active"'; } else{ echo 'class="mueu_main_list"'; } ?>
        >
            <a class="mueu_main_title" href="<?php echo U('Notification/index');?>">
                <i class="icon icon_email"></i>
                <span>消息通知</span>
                            </a>
        </li>

        <li 
        <?php
 if ($Think.MODULE_NAME=='Sendtask') { echo 'class="mueu_main_list active"'; } else{ echo 'class="mueu_main_list"'; } ?>
        >
            <a class="mueu_main_title" href="<?php echo U('Sendtask/index');?>">
                <i class="icon icon_task"></i>
                <span>发布任务</span>
            </a>
        </li>

        <li 
         <?php
 if ($Think.MODULE_NAME=='Mytask') { echo 'class="mueu_main_list active"'; } else{ echo 'class="mueu_main_list"'; } ?>
        >
            <a class="mueu_main_title" href="<?php echo U('Mytask/index');?>">
                <i class="icon icon-signal"></i>
                <span>我的任务</span>
            </a>
        </li>
        
        <li 
    <?php
 if ($Think.MODULE_NAME=='Gotask') { echo 'class="mueu_main_list active"'; } else{ echo 'class="mueu_main_list"'; } ?>
        >
            <a class="mueu_main_title" href="<?php echo U('Gotask/Index');?>">
                <i class="icon icon-prifit"></i>
                <span>挂机赚分</span>
            </a>
        </li>
        
        <li
    <?php
 if ($Think.MODULE_NAME=='Pay') { echo 'class="mueu_main_list active"'; } else{ echo 'class="mueu_main_list"'; } ?>
        >
            <!-- <a class="mueu_main_title" href="<?php echo U('Pay/index');?>">
                <i class="icon icon-charge"></i>
                <span style="color:#ff0000">积分充值</span>
                <span class="new_message">New</span>
            </a> -->
        </li>
        <!--
        <li class="mueu_main_list">
            <a class="mueu_main_title" href="./houtai-1.htm">
                <i class="icon icon-trade"></i>
                <span>积分转让</span>
            </a>
        </li>
        -->
        <li 
    <?php
 if ($Think.MODULE_NAME=='Daili') { echo 'class="mueu_main_list active"'; } else{ echo 'class="mueu_main_list"'; } ?>
        >
            <!-- <a class="mueu_main_title" href="<?php echo U('Daili/index');?>">
                <i class="icon icon-agent"></i>
                <span style="color: #ff0000;">代理</span>
                <span class="new_message">New</span>
            </a> -->
        </li>
        
                
    </ul>
</div>
<!--右侧整体内容-->
<div class="content">
    <!--用户信息栏-->
    <!--用户信息栏-->
    <div class="header">
    <ul>
        <li><img id="avatar_small_head" src="__PUBLIC__/images/small.jpg"><span><?php echo (session('username')); ?></span></li>
        <li><span>会员等级：试用会员(剩余3天)</span></li>
        <li><span>账户积分：0(冻结：0)</span></li>
        <li><span class="charge"><a style="color:#ff0000" href="<?php echo U('Pay/index');?>"><i class="icon-charge"></i>快速充值</a></span></li>
        <li><a style="color:#ff0000" href="http://www.tdiant.com/index/wenti.htm" target="_blank"><i class="icon_question"></i>常见问题</a></li>
        <li><a href="http://www.tdiant.com/index.htm" target="_blank"><i class="icon icon-logout"></i>首页</a></li>
        <li><a href="<?php echo U('User/index');?>" id="menu_logout"><i class="icon icon-logout"></i>退出</a></li>
    </ul>
    <p>官方群：<a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=e40674bc9d6805d14100d91ac1cb39cb558c683b6535467c07ed048e5b2ebe5b"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="淘点通官方群" title="淘点通官方群"></a></p>
    <p>咨询：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1127732832&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1127732832:51" alt="点击咨询" title="点击咨询"/></a></p>
</div>
    <div class="container">
        <div class="container-fluid">
            <!--系统消息-->
            <div class="container_form">
                <div class="container_form_title">
                    <span class="icon"><i class="icon-email"></i></span>
                    <h5>系统通知</h5>
                </div>
                <div class="container_form_content">
                    <ul>
                        <?php if(is_array($data)): foreach($data as $key=>$v): ?><li class="clearFix setNoticeRead" id="setNoticeRead_5">
                                                            <div class="system_icon"><img src="__PUBLIC__/images/message_normal.png"></div>
                                <div class="system_message">
                                    <p class="name"><?php echo ($v["starttime"]); ?> 系统通知：</p>
                                    <p class="message_content"><?php echo ($v["notificationname"]); ?></p>
                                </div>
                            </li>
                            <br/><?php endforeach; endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="table_footer">
        </div>
        
    </div>
</div>

</body></html>