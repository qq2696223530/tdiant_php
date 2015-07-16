<?php
/**
 * 消息系统
 */
class NotificationAction extends Action{
	public function index(){

		//输出通知信息
		$this->getnotification();

		//输出模版
		$this->display();
	}

	/**
	 * 取出通知信息
	 * @return [type] [description]
	 */
	public function getnotification(){
		$data=M("notification")->where(array("accountid"=>$_SESSION["userid"]))->select();

		$this->assign('data',$data);
	}
}
?>