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
        
            <!--账户详情-->
            <div class="container_form">
                <div class="container_form_title">
                    <span class="icon"><i class="icon-th"></i></span>
                    <h5>账户详情</h5>
                    <input type="hidden" id="charge_succeed" value="">
                </div>
                
                <div style="padding:10px; font-size: 13px;">你当前积分总额：<label style="font-size: 16px; color: #0066ff; font-weight: bold;">3892</label></div>
                
                <div class="container_form_content">
                    <table>
					    <thead>
					        <tr>
					            <th>积分总额</th>
					            <th>冻结金额</th>
					            <th>可用积分</th>
					            <th>累计消费积分</th>
					            <th>累计挂机赚分</th>
					        </tr>
					    </thead>
					    <tbody>
					        <tr> 
					            <td>3892(赠送余额：0)</td>
					            <td>0</td>
					            <td>3892</td>
					            <td>640</td>
					            <td>4432</td>
					        </tr>
					    </tbody>
					</table>
                </div>
                
                <div class="container_form_content">
	                <div class="table_description">说明：</div>
	                <div class="table_description">1、当前运行的任务，系统每天凌晨会根据设定的每日最大PV以及单价，自动冻结当日需要消耗的积分</div>
	                <div class="table_description">2、可用积分 = 积分总额 - 冻结金额 </div>
	                <div class="table_description">3、积分总额 = 充值积分 + 挂机赚分 + 赠送余额 </div>
	                <div class="table_description" style="margin-bottom:10px;">4、赠送余额可用来发布任务，但是不允许转让 </div>
                </div>
            </div>

            <!--优惠券换积分-->
            <div class="container_form">
                <div class="container_form_title">
                    <span class="icon"><i class="icon-question-sign"></i></span>
                    <h5>优惠券换积分</h5>
                </div>
                <div class="container_form_content" style="padding:10px;">
                    <div class="clearFix" style="padding:20px;">
                        <a href="./houtai-6-1.htm" class="btn confirm"> 优惠券换积分  &gt;&gt; </a>
                	</div>
                    
                </div>
            </div>            
            
            <!--积分充值-->
            <div class="container_form">
                <div class="container_form_title">
                    <span class="icon"><i class="icon-question-sign"></i></span>
                    <h5>买套餐充值</h5>
                </div>
                <div class="container_form_content" style="padding:10px;">
                	<div style="margin-left:20px; margin-top:4px; font-size: 14px; color: #41BEDD; ">请选择套餐，充的越多，赠送比例越高，越实惠！</div>
                	
                	                		                			<a href="javascript:void(0);"><div class="charge_button charge_button_normal" id="charge_button_1">20元套餐 (充积分:20,000 送积分:1,000)</div></a>
                		                                    		                			<a href="javascript:void(0);"><div class="charge_button charge_button_normal charge_button_selected" id="charge_button_2">100元套餐 (充积分:100,000 送积分:10,000)</div></a>
                		                                    		                			<a href="javascript:void(0);"><div class="charge_button charge_button_normal" id="charge_button_3">300元套餐 (充积分:300,000 送积分:45,000)</div></a>
                		                                    		                			<a href="javascript:void(0);"><div class="charge_button charge_button_normal" id="charge_button_4">1000元套餐 (充积分:1,000,000 送积分:350,000)</div></a>
                		                                    		                			<a href="javascript:void(0);"><div class="charge_button charge_button_normal" id="charge_button_5">2000元套餐 (充积分:2,000,000 送积分:900,000)</div></a>
                		                                    		                			<a href="javascript:void(0);"><div class="charge_button charge_button_normal" id="charge_button_6">5000元套餐 (充积分:5,000,000 送积分:3,500,000)</div></a>
                		                                    		                			<a href="javascript:void(0);"><div class="charge_button charge_button_normal" id="charge_button_7">10000元套餐 (充积分:10,000,000 送积分:10,000,000)</div></a>
                		                                        
                    <div class="actions clearFix">
                        <a id="charge_post_button" href="javascript:void(0);" class="btn confirm"> 去支付  &gt;&gt; </a>
                	</div>
                    
                </div>
            </div>
            
            
            <!-- 充值记录 -->
            <div class="container_form">
                <div class="container_form_title">
                    <span class="icon"><i class="icon-th"></i></span>
                    <h5>充值记录</h5>
                </div>
                
                <div class="container_form_content">
                    <table>
					    <thead>
					        <tr>
					            <th>订单号</th>
					            <th>套餐名称</th>
					            <th>套餐说明</th>
					            <th>提交日期</th>
					            <th>到账日期</th>
					            <th>充值金额</th>
					            <th>充值积分</th>
					            <th>赠送积分</th>
					            <th>状态</th>
					            <th>操作</th>
					        </tr>
					    </thead>
					    <tbody>
					    					        <tr> 
					            <td>CZ201505230001170</td>
					            <td>G套餐</td>
					            <td>10000元套餐 (充积分:10,000,000 送积分:10,000,000)</td>
					            <td>2015-05-23 18:58:10</td>
					            <td></td>
					            <td>10000.00</td>
					            <td>10000000</td>
					            <td>10000000</td>
					            
					        					            <td>未支付</td>
					            <td>
					            	<div style="margin-top:5px; margin-bottom:5px;">
                        				<a href="##########################" class="btn confirm"> 去支付  &gt;&gt; </a>
                					</div>
					            </td>
					        					        </tr>
					    					        <tr> 
					            <td>CZ201505230001171</td>
					            <td>B套餐</td>
					            <td>100元套餐 (充积分:100,000 送积分:10,000)</td>
					            <td>2015-05-23 18:58:18</td>
					            <td></td>
					            <td>100.00</td>
					            <td>100000</td>
					            <td>10000</td>
					            
					        					            <td>未支付</td>
					            <td>
					            	<div style="margin-top:5px; margin-bottom:5px;">
                        				<a href="##########################" class="btn confirm"> 去支付  &gt;&gt; </a>
                					</div>
					            </td>
					        					        </tr>
					    					        <tr> 
					            <td>CZ201505230001172</td>
					            <td>B套餐</td>
					            <td>100元套餐 (充积分:100,000 送积分:10,000)</td>
					            <td>2015-05-23 18:58:34</td>
					            <td></td>
					            <td>100.00</td>
					            <td>100000</td>
					            <td>10000</td>
					            
					        					            <td>未支付</td>
					            <td>
					            	<div style="margin-top:5px; margin-bottom:5px;">
                        				<a href="##########################" class="btn confirm"> 去支付  &gt;&gt; </a>
                					</div>
					            </td>
					        					        </tr>
					    					        <tr> 
					            <td>CZ201506100001741</td>
					            <td>G套餐</td>
					            <td>10000元套餐 (充积分:10,000,000 送积分:10,000,000)</td>
					            <td>2015-06-10 00:53:37</td>
					            <td></td>
					            <td>10000.00</td>
					            <td>10000000</td>
					            <td>10000000</td>
					            
					        					            <td>未支付</td>
					            <td>
					            	<div style="margin-top:5px; margin-bottom:5px;">
                        				<a href="##########################" class="btn confirm"> 去支付  &gt;&gt; </a>
                					</div>
					            </td>
					        					        </tr>
					    					        <tr> 
					            <td>CZ201506100001756</td>
					            <td>C套餐</td>
					            <td>300元套餐 (充积分:300,000 送积分:45,000)</td>
					            <td>2015-06-10 14:59:19</td>
					            <td></td>
					            <td>300.00</td>
					            <td>300000</td>
					            <td>45000</td>
					            
					        					            <td>未支付</td>
					            <td>
					            	<div style="margin-top:5px; margin-bottom:5px;">
                        				<a href="##########################" class="btn confirm"> 去支付  &gt;&gt; </a>
                					</div>
					            </td>
					        					        </tr>
					    					    </tbody>
					</table>
					
					<div class="table_footer">
																													</div>
					
                </div>
                
            </div>
        </div>
    </div>
</div>
<div id="dialog_root"></div>

</body></html>