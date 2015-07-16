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
            <!--我的任务-->
            <div class="container_form">
                <div class="container_form_title">
                    <span class="icon"><i class="icon-th"></i></span>
                    <h5>我的任务</h5>
                </div>
                <div class="table_control clearFix">
                    <a href="<?php echo U('Sendtask/index');?>" class="btn settings">新建任务</a>
                    
                    
                    <!-- 
                    <a href="javascript:void(0);" class="btn confirm">全部暂停</a>
                    <div class="table_control_options">
                        <input class="choose_status" type="radio" value="all" checked="checked" name="status"/>
                        <label class="sex_label"/>全部</label>
                        <input class="choose_status" type="radio" value="stop" name="status"/>
                        <label class="sex_label"/>未启动</label>
                        <input class="choose_status" type="radio" value="doing" name="status"/>
                        <label class="sex_label"/>运行中</label>
                        <input class="choose_status" type="radio" value="pause" name="status"/>
                        <label class="sex_label"/>已暂停</label>
                        <input class="choose_status" type="radio" value="done" name="status"/>
                        <label class="sex_label"/>已完成</label>
                    </div>
                     -->
                     
                </div>
                <div class="container_form_content">
                	<table>
    <thead>
        <tr>
            <th>任务ID</th>
            <th>任务名称</th>
            <th>有效时间</th>
            <th>预设IP/日</th>
            
            <th>今日成功</th>
            <th>今日失败</th>
            <th>昨日成功</th>
            <th>昨日失败</th>
            
            <th>总成功</th>
            <th>总失败</th>
            <th>消耗积分</th>
            
            <th>状态</th>
            <th>任务控制</th>
        </tr>
    </thead>
    <tbody>
        <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr> 
                <td><?php echo ($v["taskid"]); ?></td>
                <td><?php echo ($v["taskname"]); ?></td>
                <td><?php echo ($v["starttime"]); ?> 到 <?php echo ($v["stoptime"]); ?></td>
                <td>50</td>
                
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                
                <td>0</td>
                <td>0</td>
                <td>0</td>
                
                <td id="task_status_25416">
                            	已就绪
                    
                            	<br><label style="color:#f00;">(未通过客户端测试)</label>
                	<input type="hidden" class="task_not_passed_test" id="task_not_passed_test_25416" name="task_not_passed_test_25416" value="1">
                            
                            
    			</td>
                <td>
                		<a href="javascript:void(0);" class="start_task" id="start_task_25416">启动</a>
                		<a href="./houtai-4-2.htm">修改</a>
                        <a href="javascript:void(0);" class="delete_task" id="delete_task_25416">删除</a>
                </td>
            </tr><?php endforeach; endif; ?>
         
            </tbody>
</table>
<div class="table_footer">
				</div>				</div>
            </div>
        </div>
    </div>
</div>
<div id="dialog_root"></div>

</body></html>