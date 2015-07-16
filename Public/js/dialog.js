//////////////////////////////////////////////////////////////////////////////////////////////
function Dialog( $rootPath ) {
	// 信息显示时长
	this.FAST = 500;
	this.NORMAL = 1000;
	this.SLOW = 2000;
	
	var $m_rootPath = "";
	
	
	if( $rootPath != null ) {
		$m_rootPath = $rootPath; 
	}

	
	// 提示信息
	this.alert = function( $holder, $msg, $onClose ) {
		$content = $("<p>"+ $msg + "</p>");
		$toast = new Toast( $m_rootPath );
		$toast.show($holder, $content, $toast.NORMAL, $onClose);
	};
	

	// 网络忙
	this.netBusy = function($holder, $timeLen, $onClose) {
		$toast = new Toast( $m_rootPath );
		$toast.show($holder, $("<p>网络繁忙,请稍候再试!</p>"), $timeLen, $onClose);
	};
	
	
	// 删除站内信
	this.smsDelete = function( $holder, $onOK, $onNO, $onClose ) {		
		$content = "<span>确定要删除吗？</span>";
		$cookieKey = "Dialog_smsDelete";
		
		$dialog = new chooseDialog( $m_rootPath );
		$dialog.show($holder, $content, $onOK, $onNO, $onClose, $cookieKey);
	};
};


// Toast 提示框
function Toast( $rootPath ) {
	var $m_holder = null;
	var $m_timeLen = null;
	var $m_onCloseCallBack = null;
	var $m_rootPath = "";
	
	this.FAST = 500;
	this.NORMAL = 1000;
	this.SLOW = 2000;
	
	
	if( $rootPath != null ) {
		$m_rootPath = $rootPath; 
	}
	
	
	this.show = function( $holder, $content, $timeLen, $onClose ) {
		$m_holder = $holder;
		$m_timeLen = $timeLen;
		$m_onCloseCallBack = $onClose;
		
		if( $m_holder==null ) {
			$m_holder = $("body");
		}
		
		// 如果未指定显示时长，默认为 NORMAL
		if( $m_timeLen==null ) {
			$m_timeLen = this.NORMAL;
		}
		
		// 构造toast内容
		var $html = "<div class=\'huiian_toast toast\'> "+
					"	<div class=\'huiian_toast_top\'></div> "+
					"	<div class=\'huiian_toast_middle clearFix\'>"+
					"		<div class=\'toast_content\'></div>"+
					"	</div>"+
					"	<div class=\'huiian_toast_bottom\'></div>"+
					"</div> ";
		var $toast = $( $html );
		$toast.find(".toast_content").append($content);
		
		// 显示toast
		if(	$m_holder ) {
			$m_holder.append( $toast );
			//设置toast位置
			var Swidth = $(window).width();
			var Sheight = $(window).height();
			var twidth = $(".huiian_toast").width();
			var theight = $(".huiian_toast").height();
			var iwidth = $(".toast_content").width();
			var mwidth = $(".huiian_toast_middle").width();
			$(".huiian_toast").css("left",(Swidth - twidth)/2 );
			$(".huiian_toast").css("top",(Sheight - theight)/2 );
			$(".toast_content").css("marginLeft",(mwidth - iwidth)/2 );
			setTimeout(disappear, $m_timeLen);
		}
		
		function disappear() {
			$toast.remove();
			if( $m_onCloseCallBack ) {
				$m_onCloseCallBack();
			}
			
			$m_holder = null;
			$m_timeLen = null;
			$m_onCloseCallBack = null;
		}
	};
};


// 滚轴式进度条 
function Spinner ( $rootPath ) {
	var $m_holder = null;
	var $m_onCloseCallBack = null;
	var $m_spinner = null;
	var $m_rootPath = "";
	
	
	if( $rootPath != null ) {
		$m_rootPath = $rootPath;
	}
	

	this.start = function( $holder, $onClose ) {
		$m_holder = $holder;
		$m_onCloseCallBack = $onClose;
		
		if( $m_holder==null ) {
			$m_holder = $("body");
		}
		
		var $html = 	
			"<div class=\'huiian_popmessage toast huiian_loading\'> "+
			"	<div class=\'huiian_pop pop_loading\'><img src=\'" + $m_rootPath + "images/dialog/pop-loading.gif\' /></div> "+
			"</div>";
		$m_spinner = $( $html );
		
		if( $m_holder ) {
			$m_holder.append( $m_spinner );
		}
	};

	
	this.stop = function() {
		if( $m_spinner ) {
			$m_spinner.remove();
		}
		
		if( $m_onCloseCallBack ) {
			$m_onCloseCallBack();
		}
		
		$m_holder = null;
		$m_spinner = null;
		$m_onCloseCallBack = null;
	};
};


// 模态对话框
function ModalDialog( $rootPath ) {
	var $m_holder = null;	
	var $m_onOK = null;
	var $m_onNO = null;
	var $m_onCloseCallBack = null;
	var $m_cookieKey = null;
	var $m_dialog = null;
	var $m_rootPath = "";
	
	
	if( $rootPath != null ) {
		$m_rootPath = $rootPath; 
	}
					
	this.show = function( $holder, $content, $onOK, $onNO, $onClose, $cookieKey ) {
		$m_holder = $holder;
		$m_onOK = $onOK;
		$m_onNO = $onNO;
		$m_onCloseCallBack = $onClose;
		$m_cookieKey = $cookieKey;
		
		if( $m_holder==null ) {
			$m_holder = $("body");
		}
		
		// 检查cookie设置，如果用户选择不再显示该对话框，则不显示对话框，直接默认用户选择“是”按钮
		if( $cookieKey != null ) {
			$show = $.cookie($m_cookieKey);
			
			if( $show=="no" ) {
				onClickYes();
				return;
			}
		}
		
		// 构造toast内容
		var $html = 
			"<div class=\'modal_dialog_mask\'></div> "+
			"<div class=\'huiian_pop\'> "+
			"	<div class=\'huiian_popbg_top\'><a href=\'javascript:void(0);\'></a></div> "+
			"	<div class=\'huiian_popbg_middle clearFix\'> "+
			"		<div class=\'pop_prompt_content  dialog_content\'></div> "+
			"		<div class=\'pop_prompt_btnarea clearFix\'> "+
			"			<div class=\'pop_prompt_yesbtn select_yes\'><a href=\'javascript:void(0);\'>是</a></div> "+
			"			<div class=\'pop_prompt_nobtn select_no\'><a href=\'javascript:void(0);\'>否</a></div> "+
			"		</div> "+
			"	</div> "+
			"	<div class=\'huiian_popbg_bottom\'></div> "+
			"</div> ";
		
		$m_dialog = $( $html );
		$m_dialog.find(".dialog_content").append($content);
		
		// 显示对话框
		if(	$m_holder ) {
			$m_holder.append( $m_dialog );
		}
		
		start();
	};
	
	
	function start() {
		//调整对话框位置
		var Swidth = $(window).width();
		var Sheight = $(window).height();
		var iwidth = $(".huiian_pop").width();
		var iheight = $(".huiian_pop").height();
		$(".huiian_pop").css("left",(Swidth - iwidth)/2 );
		$(".huiian_pop").css("top",(Sheight - iheight)/2 );
		
		
		// 点击“是”按钮
		$m_dialog.find(".select_yes").click( function(){
			onClickYes();
		});
				
		// 点击“否”按钮
		$m_dialog.find(".select_no, .huiian_popbg_top a").click( function(){
			onClickNo();
		});
		
	};
	
	function onClickYes() {
		if( $m_onOK ) {
			$m_onOK();
		}
		
		close();
	};
	
	
	function onClickNo() {
		if( $m_onNO ) {
			$m_onNO();
		}
		
		close();
	};

	
	function close() {
		if( $m_dialog ) {
			$m_dialog.remove();
		}
			
		if( $m_onCloseCallBack ) {
			$m_onCloseCallBack();
		}
		
		$m_holder = null;	
		$m_onOK = null;
		$m_onNO = null;
		$m_onCloseCallBack = null;
		$m_cookieKey = null;
		$m_dialog = null;
	};
};


//模态对话框
function ConfirmDialog( $rootPath ) {
	var $m_holder = null;	
	var $m_onOK = null;
	var $m_onNO = null;
	var $m_onCloseCallBack = null;
	var $m_dialog = null;	
	var $m_rootPath = "";
	
	
	if( $rootPath != null ) {
		$m_rootPath = $rootPath; 
	}

					
	this.show = function( $holder, $content, $onOK, $onNO, $onClose ) {
		$m_holder = $holder;
		$m_onOK = $onOK;
		$m_onNO = $onNO;
		$m_onCloseCallBack = $onClose;
		
		if( $m_holder==null ) {
			$m_holder = $("body");
		}
		
		// 构造对话框内容
		var $html = 
			"<div class=\'modal_dialog_mask\'></div> "+
			"<div class=\'huiian_pop\'> "+
			"	<div class=\'huiian_popbg_top\'><a href=\'javascript:void(0);\'></a></div> "+
			"	<div class=\'huiian_popbg_middle clearFix\'> "+
			"		<div class=\'pop_prompt_content  dialog_content\'></div> "+
			"		<div class=\'pop_prompt_btnarea clearFix\'> "+
			"			<div class=\'pop_prompt_yesbtn select_yes\'><a href=\'javascript:void(0);\'>是</a></div> "+
			"			<div class=\'pop_prompt_nobtn select_no\'><a href=\'javascript:void(0);\'>否</a></div> "+
			"		</div> "+
			"	</div> "+
			"	<div class=\'huiian_popbg_bottom\'></div> "+
			"</div> ";
		
		$m_dialog = $( $html );
		$m_dialog.find(".dialog_content").append($content);
		
		// 显示对话框
		if(	$m_holder ) {
			$m_holder.append( $m_dialog );
		}
		
		start();
	};
	
	
	this.showCharge = function( $holder, $desc, $onOK, $onClose ) {
		$m_holder = $holder;
		$m_onOK = $onOK;
		$m_onCloseCallBack = $onClose;
		
		if( $m_holder==null ) {
			$m_holder = $("body");
		}
		
		// 构造对话框内容
		var $html = 
			"<div class=\'modal_dialog_mask\'></div> "+
			"<div class=\'huiian_pop\' style=\'width:800px; border: 3px solid #41BEDD; background-color: white; \'> "+
			"	<div class=\'clearFix\'> "+
			"       <div style=\'margin-top:30px; margin-bottom:10px; margin-left:10px; font-size: 18px; font-weight: bold; color: #FF0000; \'>支付的时候，请选择【即时到账交易】，如下图所示：</div> " +
			"		<div class=\'pop_prompt_content  dialog_content\' style=\'margin-left:10px; \'><img src=\'images/quick_pay.png\'></div> "+
			"       <div class=\'actions clearFix\' style=\'margin-top:130px; margin-bottom:10px; \' > " +
			"       <div style=\'margin-bottom:10px; font-size: 14px; color: #0066ff; \'>" + $desc +"</div> " +
			"          <a id=\'go_alipay_post_button\' href=\'javascript:void(0);\' class=\'btn confirm select_yes\'> 马上去支付宝结算 >> </a> " +
            "       </div>" + 
			"       <div style=\'margin-bottom:15px; margin-left:18px; font-size: 18px; font-weight: bold; color: #FF0000; \'>支付的时候，请选择【即时到账交易】，选择其他则无效！！</div> " +
			"	</div> "+
			"</div> ";
		
		$m_dialog = $( $html );
		
		// 显示对话框
		if(	$m_holder ) {
			$m_holder.append( $m_dialog );
		}
		
		start();
	};
	
	
	function start() {
		//调整对话框位置
		var Swidth = $(window).width();
		var Sheight = $(window).height();
		var iwidth = $(".huiian_pop").width();
		var iheight = $(".huiian_pop").height();
		$(".huiian_pop").css("left",(Swidth - iwidth)/2 );
		$(".huiian_pop").css("top",(Sheight - iheight)/2 );
		
		// 点击“是”按钮
		$m_dialog.find(".select_yes").click( function(){
			onClickYes();
		});
				
		// 点击“否”按钮
		$m_dialog.find(".select_no, .huiian_popbg_top a").click( function(){
			onClickNo();
		});
	};

	
	function close() {
		if( $m_dialog ) {
			$m_dialog.remove();
		}
			
		if( $m_onCloseCallBack ) {
			$m_onCloseCallBack();
		}
		
		$m_holder = null;	
		$m_onOK = null;
		$m_onNO = null;
		$m_onCloseCallBack = null;
		$m_dialog = null;
	};
	
	
	function onClickYes() {
		if( $m_onOK ) {
			$m_onOK();
		}
		
		close();
	};
	
	
	function onClickNo() {
		if( $m_onNO ) {
			$m_onNO();
		}
		
		close();
	};
	
};


