<?php if (!defined('THINK_PATH')) exit();?><html>
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
    <div class="header">
    <ul>
        <li><img id="avatar_small_head" src="__PUBLIC__/images/small.jpg"><span><?php echo (session('username')); ?></span></li>
        <li><span>会员等级：试用会员(剩余3天)</span></li>
        <li><span>账户积分：3892(冻结：0)</span></li>
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
            <!--修改头像-->
            <div class="container_form">
                <div class="container_form_title">
                    <span class="icon"><i class="icon-user"></i></span>
                    <h5>修改头像</h5>
                </div>
                <div class="container_form_content">
                    <div class="control-group clearFix">
                        <div class="upload_img">
                            <embed src="__PUBLIC__/images/avatar.swf" quality="high" id="avatar_flash" name="avatar_flash" align="middle" width="256" height="256" play="true" loop="false" menu="false" allowscriptaccess="sameDomain" swliveconnect="true" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">
                            
							<input type="hidden" id="upserver" name="upserver" value="http://www.shoujiliang.com/index.php?c=setting&amp;a=uploadAvatar">
							<input type="hidden" id="devkey" name="devkey" value="990f0ec74e9a4cb21269780b88bc184c">
                        </div>
                        <div class="img_view">
                            <p>你上传的头像会自动生成三种尺寸，请注意中小尺寸的头像是否清晰</p>
                            <div class="img_view_area">
                                <img class="img_big" id="avatar_big" src="__PUBLIC__/images/big.jpg">
                                <img class="img_normal" id="avatar_normal" src="__PUBLIC__/images/normal.jpg">
                                <img class="img_small" id="avatar_small" src="__PUBLIC__/images/small.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="control-group actions clearFix">
                        <a id="save_avatar_btn" href="javascript:void(0);" class="btn confirm">保存</a>
                    </div>
                </div>
            </div>
            
            <!--基本信息-->
            <div class="container_form">
                <div class="container_form_title">
                    <span class="icon"><i class="icon-question-sign"></i></span>
                    <h5>基本信息</h5>
                </div>
                <div class="container_form_content">
                    <div class="control-group settings_email clearFix">
                        <label class="control-label">邮箱</label>
                        <div class="controls">
                            <span><?php echo ($data["email"]); ?></span>
                        </div>
                    </div>
                    <div class="control-group settings_nickname clearFix">
                        <label class="control-label">昵称</label>
                        <form id="upnicknameform" action="<?php echo U('Index/upnickname');?>" method="post">
                            <div class="controls">
                                <input type="hidden" value="<?php echo ($data["accountid"]); ?>" name="userid"/>
                                <span id="nickname_text"><?php echo ($data["nickname"]); ?></span>
                                <input type="text" id="nickname" name="nickname" class="container_forms" value="<?php echo ($data["nickname"]); ?>" style="display:none;">
                                <a class="btn settings" id="mod_nickname" href="javascript:void(0);">修改</a>
                                <a class="btn confirm" id="save_nickname" style="display:none;">保存</a>
                            </div>
                        </form>
                        <script type="text/javascript">
                            $(function(){
                                $("#save_nickname").click(function(){
                                    $("#upnicknameform").submit();
                                });
                            });
                        </script>
                    </div>
                    <div class="control-group settings_realname clearFix" style="display:none;">
                        <label class="control-label">真实姓名</label>
                        <form >
                            <div class="controls">
                                <span>未设置</span>
                                <input type="text" name="required" class="container_forms" style="display:none;">
                                <a class="btn settings" href="javascript:void(0);">修改</a>
                                <a class="btn confirm" style="display:none;">保存</a>
                            </div>
                        </form>
                    </div>
                    <div class="control-group settings_sex clearFix" style="display:none;">
                        <label class="control-label">性别</label>
                        <div class="controls">
                        									<span>未设置</span>
														
                            <span style="display:none;">
                                <label class="sex_label">
                                            	<input class="choose_sex" type="radio" value="male" name="sex">
                                     
                                    <span>男</span>
                                </label>
                                <label class="sex_label">
                                                                	<input class="choose_sex" type="radio" value="female" name="sex">
                                                                    <span>女</span>
                                </label>
                            </span>
                            <a class="btn settings" href="javascript:void(0);">修改</a>
                            <a class="btn confirm" href="javascript:void(0);" style="display:none;">保存</a>
                        </div>
                    </div>
                </div>
            </div>

            <!--修改密码-->
            <form action="<?php echo U('Index/uppassword');?>" method="post" id="uppassword">
                <input name="userid" value="<?php echo ($data["accountid"]); ?>" type="hidden"/>
                <div class="container_form">
                    <div class="container_form_title">
                        <span class="icon"><i class="icon-question-sign"></i></span>
                        <h5>修改密码</h5>
                    </div>
                    <div class="container_form_content">
                        <div class="control-group settings_old clearFix">
                            <label class="control-label">旧密码</label>
                            <div class="controls">
                                <input type="password" name="old_password" id="old_password" class="container_forms">
                            </div>
                        </div>
                        <div class="control-group settings_new clearFix">
                            <label class="control-label">新密码</label>
                            <div class="controls">
                                <input type="password" name="new_password" id="new_password" class="container_forms">
                            </div>
                        </div>
                        <div class="control-group settings_code clearFix" style="display:none;">
                            <label class="control-label">验证码</label>
                            <div class="controls">
                                <input type="text" name="mod_password_vcode" id="mod_password_vcode" class="container_forms" maxlength="4">
                                <img id="mod_password_vcode_image" src="./houtai-1_files/index.php">
                                <a id="refresh_mod_password_vcode_image" class="refresh" href="javascript:void(0);">刷新</a>
                            </div>
                        </div>
                        <div class="actions clearFix">
                            <a id="mod_password_post_button" class="btn uppwd confirm">修改</a>
                        </div>
                        <script type="text/javascript">
                            $(function(){
                                $(".uppwd").click(function(){
                                    $("#uppassword").submit();
                                });
                            });
                        </script>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="dialog_root"></div>

</body></html>