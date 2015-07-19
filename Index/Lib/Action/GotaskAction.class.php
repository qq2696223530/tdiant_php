<?php
/**
 * 执行做任务
 */
Class GotaskAction extends Action{
	public function index(){
		$this->mytaskok();

		$this->display();
	}

	/**
	 * 我完成的任务
	 * @return [type] [description]
	 */
	public function mytaskok(){
		$db=M("taskgo");
		// $where=array("accountid"=>$_SESSION['userid']);
		$where=array("accountid"=>"2");
		$data=$db->where($where)->select();
		$this->assign('data',$data);
	}
}
?>