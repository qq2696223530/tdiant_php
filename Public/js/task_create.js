$(document).ready(function () {
	var $isCalculated = false;
	var $setPvHour = false;
	var $spinner = new Spinner();
	
    $(".tab").click(function () {
        //切换tab样式
        $(".tab").removeClass("tab_active");
        $(this).addClass("tab_active");

        //切换内容
        var myClass = $(this).attr("class").split(' ');
        var nub = myClass[1].substr(myClass[1].length-1,myClass[1].length-1);
        $(".tab_content").hide();
        $(".tab_content"+nub).show();
    });

    // 日期选择
    $('.starttimeDiv').datepicker({
        format: 'yyyy-mm-dd',
        weekStart: 1,
        autoclose: true,
        todayBtn: 'linked',
        language: 'zh-CN'
    })

    $('.endtimeDiv').datepicker({
        format: 'yyyy-mm-dd',
        weekStart: 1,
        autoclose: true,
        todayBtn: 'linked',
        language: 'zh-CN'
    })
    
    function showToast($msg)
    {
    	var $toast = new Toast();
    	$toast.show($("#dialog_root"), $msg, 1500, null);
    }

    // 刷新验证码
    function refreshVcode($id, $image)
    {
    	$date = new Date().getTime();
			$src="index.php?c=vcode&id=" + $id + "&t=" + $date;
			$image.attr("src", $src);
    }
    
    $("#refresh_task1_vcode_image").click(function () {
    	refreshVcode("task1", $("#task1_vcode_image"));
    });
    
    // 刷新优先级
    $("#Slider4").slider({ from: 1, to: 3, scale: [1, '|', 2, '|', '3'], round: 1, limits: false, step: 0.2, dimension: '', skin: "round_plastic", callback: function( value ){
    	$("#task1_priority").val($("#Slider4").val());
    	needReCalculatePrice();
    }});
    
    
    // 修改每日最大PV时，将计算每个小时的平均PV
    $("#task1_max_pv_day").keyup(function(){
    	$setPvHour = false;
    	$("#max_pv_hour_hint").hide();
        $maxPV = $(this).val();
        $intMaxPV = parseInt($maxPV);
        
        needReCalculatePrice();
        
    	if($maxPV != ""+$intMaxPV
    			|| $intMaxPV < 0)
    	{
    		$intMaxPV = 0;
    		$(this).val("");
    		
    		for(var $i=0; $i<24; $i++)
        	{
        		$("#maxPvHour"+$i).val("");
        	}
    		
    		return;
    	}
        
        $average = $intMaxPV / 24;
        if($average <= 1.0)
        {
        	var $i = 0;
        	for(; $i<$intMaxPV; $i++)
        	{
        		$("#maxPvHour"+$i).val(1);
        	}
        	
        	for(; $i<24; $i++)
        	{
        		$("#maxPvHour"+$i).val(0);
        	}
        }
        else
        {
        	$maxPvHour23 = $intMaxPV;
        	$hourPv = parseInt($average);
        	
        	$over = ($average-$hourPv)*24;
        	$over = parseInt($over);
        	
        	$count1 = 24-$over;
        	$count2 = 24-$count1-1;
        	if($over < 1)
        	{
        		$count1 = 23;
        		$count2 = 0;
        	}
        	
        	var $i=0;
        	for(; $i<$count1; $i++)
        	{
        		$("#maxPvHour"+$i).val($hourPv);
        		$maxPvHour23 = $maxPvHour23 - $hourPv;
        	}
        	
        	var $j=0;
        	for(; $count2 > 0 && $j<$count2; $i++, $j++)
        	{
        		$("#maxPvHour"+$i).val($hourPv+1);
        		$maxPvHour23 = $maxPvHour23 - $hourPv - 1;
        	}
        	
        	$("#maxPvHour23").val($maxPvHour23);
        }
    });
    
    $(".maxPvHour").keyup(function(){
    	$setPvHour = true;
    	$("#max_pv_hour_hint").show();
        $maxPvHour = $(this).val();
        $intMaxPvHour = parseInt($maxPvHour);
        
        needReCalculatePrice();
        
    	if($maxPvHour != ""+$intMaxPvHour
    			|| $intMaxPvHour < 0)
    	{
    		$intMaxPvHour = 0;
    		$(this).val("");
    	}
    	else
    	{
    		$(this).val($intMaxPvHour);
    	}
    	
    	$total = 0;
    	for($i=0; $i<24; $i++)
    	{
    		$pv = $("#maxPvHour"+$i).val();
    		$intPv = parseInt($pv);
    		if($pv != ""+$intPv
        			|| $intPv < 0)
        	{
    			$intPv = 0;
    			$("#maxPvHour"+$i).val("");
        	}
    		
    		$total = $total + $intPv;
    	}
    	
    	$("#task1_max_pv_day").val($total);
    });
    
    // 输入框改变时，需要重新计算积分
    $("#task1_from_page").change(function(){
    	needReCalculatePrice();
    });
    
    $("#task1_to_page").change(function(){
    	needReCalculatePrice();
    });
    
    $(":radio").click(function(){
    	needReCalculatePrice();
	});
    
    $("#task1_gohome").change(function(){
    	needReCalculatePrice();
    });
    
    function needReCalculatePrice()
    {
    	$("#task1_price").hide();
    	$("#task1_post_btn").hide();
    	$("#task1_error_msg").hide();
    	
    	if($isCalculated)
    	{
    		$("#task1_calculate_price").html("选项发生修改，请重新计算积分");
    	}
    	else
    	{
    		$("#task1_calculate_price").html("计算积分");
    	}
    	$("#task1_calculate_price").show();
    }
    
    // 查询任务积分价格
    $("#task1_calculate_price").click(function () {
    	$priority = $("#task1_priority").val();

    	$frompage = $("#task1_from_page").val();
    	if($frompage=="") {
    		showToast("起始页码不能为空");
    		$("#task1_from_page").focus();
    		return;
    	}
    	
    	$intFromPage = parseInt($frompage);
    	if($frompage != ""+$intFromPage
    			|| $intFromPage <= 0)
    	{
    		showToast("页码只能为数字，且必须大于0");
    		$("#task1_from_page").focus();
    		return;
    	}
    	    	
    	$topage = $("#task1_to_page").val();
    	if($topage=="") {
    		showToast("结束页码不能为空");
    		$("#task1_to_page").focus();
    		return;
    	}
    	
    	$intToPage = parseInt($topage);
    	if($topage != ""+$intToPage
    			|| $intToPage < $intFromPage) 
    	{
    		showToast("页码只能为数字，且不能小于起始页");
    		$("#task1_to_page").focus();
    		return;
    	}
    	
    	$fromprice = $("#task1_from_price").val();
    	$toprice = $("#task1_to_price").val();
    	    	
    	$maxPVDay = $("#task1_max_pv_day").val();
    	if($maxPVDay=="") {
    		showToast("每日IP量不能为空");
    		$("#task1_max_pv_day").focus();
    		return;
    	}
    	
    	$intMaxPVDay = parseInt($maxPVDay);
    	if($maxPVDay != ""+$intMaxPVDay
    			|| $intMaxPVDay <=0 ) 
    	{
    		showToast("每日IP量只能为数字，且不能小于0");
    		$("#task1_max_pv_day").focus();
    		return;
    	}
    	    	
    	$pvdelay = $("input[name='task1_pvdelay']:checked").val();

    	$gohome = $("#task1_gohome").attr("checked");
		if($gohome=="checked")
		{
			$gohome = true;
		}
		else
		{
			$gohome = false;
		}
    	
		$spinner.start($("#dialog_root"), null);
    	$.post("index.php?c=task&a=calculatePrice", {priority:$priority, fromPage:$intFromPage, toPage:$intToPage, 
    		fromprice:$fromprice, toprice:$toprice, setPvHour:$setPvHour, 
    		maxPvDay:$intMaxPVDay, pvdelay:$pvdelay, goHome:$gohome, ajax:"true"}, onCalculatePrice);
    });


	function onCalculatePrice($result) 
	{	
		$isCalculated = true;
		
		var json;
		eval("json="+$result+";");
		var $toast = new Toast();
		
		$spinner.stop();
	
		if( json.result ) 
		{
			$("#task1_price").show();
			$("#task1_price").html(json.priceDesc);
	    	$("#task1_post_btn").show();
	    	$("#task1_error_msg").hide();
	    	$("#task1_calculate_price").hide();
		}
		else 
		{
			$toast.show($("#dialog_root"), json.errmsg, 1500, null);
			
			$("#task1_price").hide();
	    	$("#task1_post_btn").hide();
	    	$("#task1_error_msg").html(json.errmsg);
	    	$("#task1_error_msg").show();
	    	$("#task1_calculate_price").show();
		}
	};
    
    
    // 提交任务
    $("#task1_post_btn").click(function () {
        $page = $("#task1_page").val();

    	$id = $("#task1_id").val();
    	$intID = parseInt($id);
    	
    	$name = $("#task1_name").val();
    	if($id=="" && $name=="") {
    		showToast("任务名称不能为空");
    		$("#task1_name").focus();
    		return;
    	}
    	
		$priority = $("#task1_priority").val();
    	
    	$keyword = $("#task1_keyword").val();
    	if($keyword=="") {
    		showToast("搜索关键词不能为空");
    		$("#task1_keyword").focus();
    		return;
    	}
    	
    	$goodtitle = $("#task1_good_title").val();
    	$goodUrl = $("#task1_good_url").val();
    	if($goodtitle=="" && $goodUrl=="") {
    		showToast("商品URL或商品标题至少要填写一项");
    		$("#task1_good_url").focus();
    		return;
    	}
    	
    	$frompage = $("#task1_from_page").val();
    	if($frompage=="") {
    		showToast("起始页码不能为空");
    		$("#task1_from_page").focus();
    		return;
    	}
    	
    	$intFromPage = parseInt($frompage);
    	if($frompage != ""+$intFromPage
    			|| $intFromPage <= 0)
    	{
    		showToast("页码只能为数字，且必须大于0");
    		$("#task1_from_page").focus();
    		return;
    	}
    	
    	$topage = $("#task1_to_page").val();
    	if($topage=="") {
    		showToast("结束页码不能为空");
    		$("#task1_to_page").focus();
    		return;
    	}
    	
    	$intToPage = parseInt($topage);
    	if($topage != ""+$intToPage
    			|| $intToPage < $intFromPage) 
    	{
    		showToast("页码只能为数字，且不能小于起始页");
    		$("#task1_to_page").focus();
    		return;
    	}
    	
		$fromprice = $("#task1_from_price").val();
//    	if($fromprice=="") {
//    		showToast("价格范围不能为空");
//    		$("#task1_from_price").focus();
//    		return;
//    	}
    	
    	$floatFromPrice = parseFloat($fromprice);
//    	if($fromprice != ""+$floatFromPrice
//    			|| $floatFromPrice < 0.0)
//    	{
//    		showToast("价格只能为数字，且必须大于0");
//    		$("#task1_from_price").focus();
//    		return;
//    	}
    	
    	$toprice = $("#task1_to_price").val();
//    	if($toprice=="") {
//    		showToast("价格范围不能为空");
//    		$("#task1_to_price").focus();
//    		return;
//    	}
    	
    	$floatToPrice = parseFloat($toprice);
//    	if($toprice != ""+$floatToPrice
//    			|| $floatToPrice < $floatFromPrice) 
//    	{
//    		showToast("价格只能为数字，且必须大于0，且不能小于最低价格");
//    		$("#task1_to_price").focus();
//    		return;
//    	}
    	
    	$fromDate = $("#task1_from_date").val();
    	if($fromDate=="") {
    		showToast("起始日期不能为空");
    		$("#task1_from_date").focus();
    		return;
    	}
    	
    	if( ! isDate($fromDate)) {
    		showToast("日期格式不正确");
    		$("#task1_from_date").focus();
    		return;
    	}
    	
    	$toDate = $("#task1_to_date").val();
    	if($toDate=="") {
    		showToast("结束日期不能为空");
    		$("#task1_to_date").focus();
    		return;
    	}
    	
    	if( ! isDate($toDate)) {
    		showToast("日期格式不正确");
    		$("#task1_to_date").focus();
    		return;
    	}
    	
    	$maxPVDay = $("#task1_max_pv_day").val();
    	if($maxPVDay=="") {
    		showToast("每日IP量不能为空");
    		$("#task1_max_pv_day").focus();
    		return;
    	}
    	
    	$intMaxPVDay = parseInt($maxPVDay);
    	if($maxPVDay != ""+$intMaxPVDay
    			|| $intMaxPVDay <=0 ) 
    	{
    		showToast("每日IP量只能为数字，且不能小于0");
    		$("#task1_max_pv_day").focus();
    		return;
    	}
    	
    	$maxPvHour0  = $("#maxPvHour0").val();
    	$maxPvHour1  = $("#maxPvHour1").val();
    	$maxPvHour2  = $("#maxPvHour2").val();
    	$maxPvHour3  = $("#maxPvHour3").val();
    	$maxPvHour4  = $("#maxPvHour4").val();
    	$maxPvHour5  = $("#maxPvHour5").val();
    	$maxPvHour6  = $("#maxPvHour6").val();
    	$maxPvHour7  = $("#maxPvHour7").val();
    	$maxPvHour8  = $("#maxPvHour8").val();
    	$maxPvHour9  = $("#maxPvHour9").val();
    	$maxPvHour10 = $("#maxPvHour10").val();
    	$maxPvHour11 = $("#maxPvHour11").val();
    	$maxPvHour12 = $("#maxPvHour12").val();
    	$maxPvHour13 = $("#maxPvHour13").val();
    	$maxPvHour14 = $("#maxPvHour14").val();
    	$maxPvHour15 = $("#maxPvHour15").val();
    	$maxPvHour16 = $("#maxPvHour16").val();
    	$maxPvHour17 = $("#maxPvHour17").val();
    	$maxPvHour18 = $("#maxPvHour18").val();
    	$maxPvHour19 = $("#maxPvHour19").val();
    	$maxPvHour20 = $("#maxPvHour20").val();
    	$maxPvHour21 = $("#maxPvHour21").val();
    	$maxPvHour22 = $("#maxPvHour22").val();
    	$maxPvHour23 = $("#maxPvHour23").val();
    	
    	$pvdelay = $("input[name='task1_pvdelay']:checked").val();
    	
    	/*
    	$vcode = $("#task1_vcode").val();
    	if($vcode=="") {
    		showToast("验证码不能为空");
    		$("#task1_vcode").focus();
    		return;
    	}
    	*/
    	
    	$gohome = $("#task1_gohome").attr("checked");
		
		if($gohome=="checked")
		{
			$gohome = true;
		}
		else
		{
			$gohome = false;
		}
    	
    	if($intID>0)
    	{
    		$.post("index.php?c=task&a=modTask", { page:$page,
                id:$intID,
    			priority:$priority,
    			keyword:$keyword,
    			goodtitle:$goodtitle, goodUrl:$goodUrl, 
    			frompage:$frompage, topage:$topage, 
    			fromprice:$fromprice, toprice:$toprice,
        		fromDate:$fromDate, toDate:$toDate, 
        		maxPVDay:$maxPVDay, 
        		setPvHour:$setPvHour,
        		maxPvHour0:$maxPvHour0,
        		maxPvHour1:$maxPvHour1,
        		maxPvHour2:$maxPvHour2,
        		maxPvHour3:$maxPvHour3,
        		maxPvHour4:$maxPvHour4,
        		maxPvHour5:$maxPvHour5,
        		maxPvHour6:$maxPvHour6,
        		maxPvHour7:$maxPvHour7,
        		maxPvHour8:$maxPvHour8,
        		maxPvHour9:$maxPvHour9,
        		maxPvHour10:$maxPvHour10,
        		maxPvHour11:$maxPvHour11,
        		maxPvHour12:$maxPvHour12,
        		maxPvHour13:$maxPvHour13,
        		maxPvHour14:$maxPvHour14,
        		maxPvHour15:$maxPvHour15,
        		maxPvHour16:$maxPvHour16,
        		maxPvHour17:$maxPvHour17,
        		maxPvHour18:$maxPvHour18,
        		maxPvHour19:$maxPvHour19,
        		maxPvHour20:$maxPvHour20,
        		maxPvHour21:$maxPvHour21,
        		maxPvHour22:$maxPvHour22,
        		maxPvHour23:$maxPvHour23,
        		pvdelay:$pvdelay, 
        		gohome:$gohome,
        		//vcode:$vcode, 
        		ajax:"true"}, onPostTask);
    	}
    	else
    	{
    		$.post("index.php?c=task&a=postTask", { name:$name, 
    			priority:$priority,
    			keyword:$keyword, 
    			goodtitle:$goodtitle, goodUrl:$goodUrl,
    			frompage:$frompage, topage:$topage, 
    			fromprice:$fromprice, toprice:$toprice,
        		fromDate:$fromDate, toDate:$toDate, 
        		maxPVDay:$maxPVDay, 
        		setPvHour:$setPvHour,
        		maxPvHour0:$maxPvHour0,
        		maxPvHour1:$maxPvHour1,
        		maxPvHour2:$maxPvHour2,
        		maxPvHour3:$maxPvHour3,
        		maxPvHour4:$maxPvHour4,
        		maxPvHour5:$maxPvHour5,
        		maxPvHour6:$maxPvHour6,
        		maxPvHour7:$maxPvHour7,
        		maxPvHour8:$maxPvHour8,
        		maxPvHour9:$maxPvHour9,
        		maxPvHour10:$maxPvHour10,
        		maxPvHour11:$maxPvHour11,
        		maxPvHour12:$maxPvHour12,
        		maxPvHour13:$maxPvHour13,
        		maxPvHour14:$maxPvHour14,
        		maxPvHour15:$maxPvHour15,
        		maxPvHour16:$maxPvHour16,
        		maxPvHour17:$maxPvHour17,
        		maxPvHour18:$maxPvHour18,
        		maxPvHour19:$maxPvHour19,
        		maxPvHour20:$maxPvHour20,
        		maxPvHour21:$maxPvHour21,
        		maxPvHour22:$maxPvHour22,
        		maxPvHour23:$maxPvHour23,
        		pvdelay:$pvdelay, 
        		gohome:$gohome,
        		//vcode:$vcode, 
        		ajax:"true"}, onPostTask);
    	}
    });
    
    
	function onPostTask($result) 
	{
		var json;
		eval("json="+$result+";");
		var $toast = new Toast();
		
		if( json.result ) {
			$toast.show($("#dialog_root"), "提交成功，请启动该任务，启动之前建议在客户端进行任务测试，可以大大提高任务完成率", 2500, showTaskList(json.page));
		}
		else {
			$toast.show($("#dialog_root"), json.errmsg, 1500, null);
		}
	};
	
	
	function showTaskList($page)
	{
		location.href ="index.php?c=task&a=showTaskList&page=" + $page;
	}
    
    
    function isDate(str) {
    	//判断整体格式
    	var result = str.match(/(\d{1,4})-(\d{1,2})-(\d{1,2})/);
    	if (result == null) {
    		return false;
    	}
    	return true;
    }
    
});
