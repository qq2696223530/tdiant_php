<?php
/**
 * 我的任务
 */
class MytaskAction extends Action{
	public function index(){

		//获得我的个人任务
		$this->getmytask();


		$this->display();
	}

	/**
	 * 获取自己的任务数据
	 * @return [type] [description]
	 * 获取任务的时候 一定要理清顺序
	 */
	public function getmytask(){
		$where["accountid"]=$_SESSION["userid"];

		$data=M("task")->where($where)->select();

		$this->assign('data',$data);
	}
}
?>