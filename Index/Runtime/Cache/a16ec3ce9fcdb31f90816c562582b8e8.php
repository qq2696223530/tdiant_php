<?php if (!defined('THINK_PATH')) exit();?>
<html>
<head lang="zh"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>淘点通系统</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/index.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/dialog.css">
    <script type="text/javascript" src="__PUBLIC__/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/dialog.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/menu.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/user_setting.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/mod_password.js"></script>
</head>
<body>

<!--侧边栏-->
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
            <a class="mueu_main_title" href="<?php echo U('Pay/index');?>">
                <i class="icon icon-charge"></i>
                <span style="color:#ff0000">积分充值</span>
                <span class="new_message">New</span>
            </a>
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
            <a class="mueu_main_title" href="<?php echo U('Daili/index');?>">
                <i class="icon icon-agent"></i>
                <span style="color: #ff0000;">代理</span>
                <span class="new_message">New</span>
            </a>
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
        <li><span>会员等级：VIP1</span></li>
        <li><span>账户积分：3892(冻结：0)</span></li>
        <li><span class="charge"><a style="color:#ff0000" href="./houtai-6.htm"><i class="icon-charge"></i>快速充值</a></span></li>
        <li><a style="color:#ff0000" href="http://www.shoujiliang.com/faq2.doc"><i class="icon_question"></i>常见问题</a></li>
        <li><a href="<?php echo U('User/index');?>" id="menu_logout"><i class="icon icon-logout"></i>退出</a></li>
    </ul>
    <p>官方群：<a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=e40674bc9d6805d14100d91ac1cb39cb558c683b6535467c07ed048e5b2ebe5b"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="淘点通官方群" title="淘点通官方群"></a>
</p>
</div>
    <div class="container">
        <div class="container-fluid">

            <div class="container_form">
				<div class="container_tab">
                    <ul class="clearFix">
                                                    <li class="tab tab1 tab_active"><a href="./houtai-7.htm">代理申请</a></li>
                        
                        
                        <li class="tab tab4"><a href="./houtwai-7-1.htm">代理说明</a></li>
                    </ul>
                </div>
                
            	                    
                                            <div class="tab_content tab_content1 container_form_content">
                            <div class="control-group mission_name clearFix">
                                <label class="control-label essential">* QQ</label>
                                <div class="controls">
                                    <input type="text" name="agent_qq" id="agent_qq" class="container_forms">
                                    <p class="exp">（请填写你的QQ联系方式，管理员审核之前会和你联系）</p>
                                </div>
                            </div>

                            <div class="control-group mission_name clearFix">
                                <label class="control-label essential">* 手机号码</label>
                                <div class="controls">
                                    <input type="text" name="agent_phone" id="agent_phone" class="container_forms">
                                    <p class="exp">（请填写你的手机号码，管理员审核之前会和你联系）</p>
                                </div>
                            </div>

                            <div class="control-group mission_name clearFix">
                                <label class="control-label essential">* 代理经验</label>
                                <div class="controls">
                                    <textarea name="agent_description" id="agent_description" class="container_forms" style="width:300px; height:100px;"></textarea>
                                    <p class="exp">（申请代理有一定的资历要求，请描述你曾经在其他平台的代理工作经验）</p>
                                </div>
                            </div>

                            <div class="actions clearFix">
                                <p style="margin-left:150px; margin-bottom:10px; font-size:14px;" id="trade_hint"></p>
                                <a href="javascript:void(0);" style="margin-left:150px; " class="btn confirm post_agent_apply_btn" id="post_agent_apply_btn">提交申请</a>
                                <span style="font-size:14px; color:#ff0000">（代理实行用户自主申请，管理员审核制度，请认真填写你的联系方式以及相关经验）</span>
                            </div>
                        </div>
                    				            
            </div>

            <div class="container_form">
                <div class="container_form_title">
                    <span class="icon"><i class="icon-th"></i></span>
                    <h5>我的申请记录</h5>
                </div>
                
                <div class="container_form_content">
                    <table>
					    <thead>
					        <tr>
					            <th>申请日期</th>
					            <th>QQ</th>
					            <th>电话号码</th>
					            <th>代理经验</th>
					            <th>审核进度</th>
					            <th>审核日期</th>
					            <th>是否通过</th>
					            <th>拒绝理由</th>
					        </tr>
					    </thead>
					    <tbody>
                        					    </tbody>
					</table>					
                </div>
            </div>
        </div>
    </div>
</div>
<div id="dialog_root"></div>

</body></html>