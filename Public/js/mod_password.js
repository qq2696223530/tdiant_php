$(document).ready(function () {
    // 刷新验证码
    function refreshVcode($id, $image)
    {
    	$date = new Date().getTime();
			$src="index.php?c=vcode&id=" + $id + "&t=" + $date;
			$image.attr("src", $src);
    }
    
    /*
    $("#refresh_mod_password_vcode_image").click(function () {
    	refreshVcode("mod_password", $("#mod_password_vcode_image"));
    });
    */
    
    ///////////////////////////////////////////////////////////////////////////////
    // 修改密码
    $("#mod_password_post_button").click(function () {
			$oldpwd = $("#old_password").val();
			$newpwd = $("#new_password").val();
			//$vcode = $("#mod_password_vcode").val();
			
			var $toast = new Toast();
			
			if($oldpwd=="" || $newpwd=="") {
				$toast.show($("#dialog_root"), "密码不能为空", 1500, null);
				return;
			}
			
			if($oldpwd == $newpwd) {
				$toast.show($("#dialog_root"), "新旧密码不能一样", 1500, null);
				return;
			}
			
			/*
			if($vcode=="") {
				$toast.show($("#dialog_root"), "验证码不能为空", 1500, null);
				return;
			}
			*/
			
			$.post("index.php?c=setting&a=modPwd", { oldpwd:$oldpwd, newpwd:$newpwd, /*vcode:$vcode, */ajax:"true"}, onModPwd);
    });
    
	function onModPwd($result) 
	{
		var json;
		eval("json="+$result+";");
		var $toast = new Toast();
		
		if( json.result ) {
			$toast.show($("#dialog_root"), "修改成功", 1500, null);
			$("#old_password").val("");
			$("#new_password").val("");
			$("#mod_password_vcode").val("");
		}
		else {
			$toast.show($("#dialog_root"), json.errmsg, 1500, null);
		}
	};
});



