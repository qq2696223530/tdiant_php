<?php
/**
 * 专门用来测试的控制器
 */
class TestActio nextends Action{
	public function index(){
		echo "测试控制器";
	}

	public function getMyDb(){
		echo "直接抽出我要的数据db";
	}
}
?>