<?php
/**
 * 用户后台登录注册等操作
 */
class UserAction extends Action{
	public function index(){
		$_SESSION["userid"]=null;
		$_SESSION["username"]=null;
		
		$this->display("User/index");
	}

	/**
	 * 登录验证会员信息
	 * @return [type] [description]
	 */
	public function login(){

		$email=$_REQUEST["login_email"];
		$password=md5($_REQUEST["login_password"]);

		//得出邮件和密码进行验证
		$db=M("account");
		$where=array("email"=>$email);
		$data=$db->where($where)->find();
		if (!empty($data)){
			if ($data["password"]==$password) {
				// $this->success('登录成功');
				//生成session
				$_SESSION["userid"]=$data["accountid"];
				$_SESSION["username"]=$data["email"];

				//直接调入首页控制器
				$this->display("Index/index");
				return;
			}
			else{
				$this->error('登录失败');
			}
		}
		else{
			$this->error('登录失败');
		}
	}

	/**
	 * 用户退出
	 */
	public function toexit(){
		
		$this->display("User/index");
	}
}
?>