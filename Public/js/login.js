$(document).ready(function () {
    var LoginPage = $(".login_area");
    var RegisterPage = $(".register_area");
    var ForgetPage = $(".forget_password_area");

    //注册页面切换
    $(".go_register").click(function () {
        $(".login_area").hide();
        $(".register_area").fadeIn(0, function () {
            LoginPage.hide();
            ForgetPage.hide();
        });
        refreshVcode("register", $("#register_vcode_image"));
    });

    //登陆页面切换
    $(".go_login").click(function () {
        $(".register_area").hide();
        $(".login_area").fadeIn(0, function () {
            ForgetPage.hide();
            RegisterPage.hide();
        });
        refreshVcode("login", $("#login_vcode_image"));
    });

    //登陆－忘记密码
    $(".login_area .forget_password").click(function () {
        $(".forget_password_area .go_back").attr("id","");
        $(".forget_password_area .go_back").attr("id","backToLogin");
        $(".login_area").hide();
        $(".forget_password_area").fadeIn(0, function () {
            returnToLogin();
        });
        refreshVcode("get_password", $("#get_password_vcode_image"));
    });

    //返回登陆
    function returnToLogin() {
        $("#backToLogin").unbind("click");
        $("#backToLogin").click(function () {
            $(".forget_password_area .go_back").attr("id","");
            $(".forget_password_area").hide();
            $(".login_area").fadeIn(0, function () {
                RegisterPage.hide();
                ForgetPage.hide();
            });
            refreshVcode("login", $("#login_vcode_image"));
        });
    };
    
    // 刷新验证码
    function refreshVcode($id, $image)
    {
    	$date = new Date().getTime();
			$src="index.php?c=vcode&id=" + $id + "&t=" + $date;
			$image.attr("src", $src);
    }
    
    $("#refresh_register_vcode_image").click(function () {
    	refreshVcode("register", $("#register_vcode_image"));
    });
    
    $("#refresh_login_vcode_image").click(function () {
    	refreshVcode("login", $("#login_vcode_image"));
    });
    
    $("#refresh_get_password_vcode_image").click(function () {
    	refreshVcode("get_password", $("#get_password_vcode_image"));
    });
    
    
    ///////////////////////////////////////////////////////////////////////////////
    // 用户注册
    $("#register_post_button").click(function () {
		$email  = $("#register_email").val();
		$pass1 = $("#register_password1").val();
		$pass2 = $("#register_password2").val();
		$vcode = $("#register_vcode").val();
		
		hideRegisterError();
		
		if($email=="") {
			showRegisterError("邮箱不能为空");
			return;
		}
		
		if( ! isEmail($email)) {
			showRegisterError("邮箱格式不正确");
			return;
		}
		
		if($pass1=="" || $pass2=="") {
			showRegisterError("密码不能为空");
			return;
		}
		
		if($pass1 != $pass2) {
			showRegisterError("两次输入的密码不一致");
			return;
		}
		
		// if($vcode=="") {
		// 	showRegisterError("验证码不能为空");
		// 	return;
		// }
		$("#register_form").submit();

		// $.post("http://www.tdiant.com/index.php?m=User&a=register", { email:$email, pass1:$pass1, pass2:$pass2,
		// 	ajax:"true"}, onRegister );
    });
    
    
	function onRegister( $result ) 
	{
		alert($result);
		var json;
		eval("json="+$result+";");
		
		if( json.result ) {
			var $toast = new Toast();
			$toast.show($("#dialog_root"), "注册成功", 1500, gotoConsole);
		}
		else {
			showRegisterError( json.errmsg);
            refreshVcode("register", $("#register_vcode_image"));
		}
	};
	
	function gotoConsole() 
	{
		location.href ="http://www..com/js/index.php?c=task&a=showTaskCreate";
    }
    
    function hideRegisterError() 
    {
    	$("#register_error").html("");
    	$(".register_area .erro_area").hide();
    }
    
    function showRegisterError($errorMsg) 
    {
    	$("#register_error").html($errorMsg);
    	$(".register_area .erro_area").show();
    }
    
    function isEmail($email) 
    {
    	re=/^([a-zA-Z0-9]+[_|-|.]?)*[a-zA-Z0-9]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
		if (re.test( $email ) ) {
			return true;
		} 
		else {
			return false;
		}
    }
    
    ///////////////////////////////////////////////////////////////////////////////
    // 用户登录
    $("#login_post_button").click(function () {
		$email  = $("#login_email").val();
		$pwd = $("#login_password").val();
		// $vcode = $("#login_vcode").val();
		
		hideLoginError();
		
		if($email=="") {
			showLoginError("邮箱不能为空");
			return;
		}
		
		if( ! isEmail($email)) {
			showLoginError("邮箱格式不正确");
			return;
		}
		
		if($pwd=="") {
			showLoginError("密码不能为空");
			return;
		}
		
		/*
		if($vcode=="") {
			showLoginError("验证码不能为空");
			return;
		}
		*/
		
		$.post("http://www.tdiant.com/js/index.php?c=home&a=login", { email:$email, pwd:$pwd, /*vcode:$vcode, */ajax:"true"}, onLogin );
    });
    
	function onLogin( $result ) {
		var json;
		eval("json="+$result+";");
		
		if( json.result ) {
			var $toast = new Toast();
			$toast.show($("#dialog_root"), "登录成功", 1500, gotoConsole);
		}
		else {
			showLoginError( json.errmsg);
		}
	};
	
    function hideLoginError() {
    	$("#login_error").html("");
    	$(".login_area .erro_area").hide();
    }
    
    function showLoginError($errorMsg) {
    	$("#login_error").html($errorMsg);
    	$(".login_area .erro_area").show();
    }
    
    
    ///////////////////////////////////////////////////////////////////////////////
    // 找回密码
    $("#get_password_post_button").click(function () {
		$email  = $("#get_password_email").val();
		$vcode = $("#get_password_vcode").val();
		
		hideGetPwdError();
		
		if($email=="") {
			showGetPwdError("邮箱不能为空");
			return;
		}
		
		if( ! isEmail($email)) {
			showGetPwdError("邮箱格式不正确");
			return;
		}
		
		if($vcode=="") {
			showGetPwdError("验证码不能为空");
			return;
		}
		
		$.post("http://www.tdiant.com/js/index.php?c=home&a=resetPwd", { email:$email, vcode:$vcode, ajax:"true"}, onGetPwd );
    });
    
	function onGetPwd( $result ) 
	{
		var json;
		eval("json="+$result+";");
		
		if( json.result ) {
			var $toast = new Toast();
			$toast.show($("#dialog_root"), "系统随机生成的密码已经发送到你的邮箱", 1500, null);
            refreshVcode("get_password", $("#get_password_vcode_image"));
		}
		else {
			showGetPwdError( json.errmsg);
            refreshVcode("get_password", $("#get_password_vcode_image"));
		}
	};
	
    function hideGetPwdError() {
    	$("#get_password_error").html("");
    	$(".forget_password_area .erro_area").hide();
    }
    
    function showGetPwdError($errorMsg) {
    	$("#get_password_error").html($errorMsg);
    	$(".forget_password_area .erro_area").show();
    }
});