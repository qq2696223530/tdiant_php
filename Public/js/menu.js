$(document).ready(function () {
    $(".submenu").click(function () {
        $(".submenu").each(function () {
            if( $(this).find(".submenu_list_area").css("display")=="block" ){
                $(this).find(".submenu_list_area").stop().slideUp(300);
            }
        });
        if( $(this).find(".submenu_list_area").css("display")=="block" ){
            $(this).find(".submenu_list_area").stop().slideUp(300);
        }else{
            $(this).find(".submenu_list_area").stop().slideDown(300);
        }
    });
    
    /////////////////////////////////////////////////////////////////////////
    // 退出
    $("#menu_logout").click(function () {
		$.post("index.php?c=home&a=logout", {ajax:"true"}, onLogout);
    });
    
	function onLogout( $result ) {
		location.href ="index.php";
	};
});