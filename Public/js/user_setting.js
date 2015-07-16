//通用的查找Flash的函数。IE下是object，而FF下是document
function getAvatarFlash(flashName) {
	var isIE = navigator.appName.indexOf("Microsoft") != -1;
	return (isIE) ? document.getElementById(flashName) : document[flashName];
};


// BEGIN 以下函数被flash调用，函数名必须和flash中保持一致
function alertAvatarErr($msg) {
	var $toast = new Toast();
	$toast.show($("#dialog_root"), $msg, 1500, null);
};


function saveAvatarResult( $result ) 
{
	var json;
	eval("json="+$result+";");
	
	// 更新头像相关的图片
	$avatarBig       = json.avatars.big;
	$avatarNormal = json.avatars.normal;
	$avatarSmall    = json.avatars.small;
	
	$("#avatar_big").attr("src", $avatarBig + "?" + Math.random() );
	$("#avatar_normal").attr("src", $avatarNormal + "?" + Math.random() );
	$("#avatar_small").attr("src", $avatarSmall + "?" + Math.random() );
	$("#avatar_small_head").attr("src", $avatarSmall + "?" + Math.random() );
	
	var $toast = new Toast();
	$toast.show($("#dialog_root"), "修改头像成功", 1500, null);
};


function ntfAvatarOpenCount( $count ) 
{
	
};
//END 函数被flash调用


$(document).ready(function () {
	// 修改头像
	$("#save_avatar_btn").click(function(){
		$server  = $("#upserver").attr("value");
		$devkey = $("#devkey").attr("value");
		
		getAvatarFlash('avatar_flash').setAvatarServer($server, $devkey);
		getAvatarFlash('avatar_flash').saveAvatar();
	});
	
	/////////////////////////////////////////////////////////////////////////////
	// 修改昵称
	$("#mod_nickname").click(function()
	{
		$("#nickname").show();
		$("#save_nickname").show();
		$("#nickname_text").hide();
		$(this).hide();
	});
	
	$("#save_nickname").click(function()
	{
		$nickname = $("#nickname").attr("value");
		if($nickname.length > 0) {
			$.post("index.php?c=setting&a=modNickname", { nickname:$nickname, ajax:"true"}, onModNickname );
		}
	});
	
	function onModNickname($result) 
	{
		var json;
		eval("json="+$result+";");
		
		if( json.result ) {
			$("#nickname_text").html(json.nickname);
			$("#nickname_text").show();
			
			$("#nickname").val(json.nickname);
			$("#nickname").hide();
			
			$("#mod_nickname").show();
			$("#save_nickname").hide();
			
			var $toast = new Toast();
			$toast.show($("#dialog_root"), "修改成功", 1500, null);
		}
		else {
			var $toast = new Toast();
			$toast.show($("#dialog_root"), json.errmsg, 1500, null);
		}
	}
});
