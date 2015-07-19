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

	/**
	 * 用户注册
	 * @return [type] [description]
	 */
	public function register(){
		$register_password1=$_REQUEST['register_password1'];
		$register_password2=$_REQUEST['register_password2'];
		$register_email=$_REQUEST['register_email'];

		if ($register_password1!=$register_password2) {
			$this->error('重复密码输入错误......');
		}


		$db=M("account");
		$data['email']=$register_email;
		$data['password']=md5($register_email);
		//先去找这个人有没有
		$tmp=$db->where(array("email"=>$register_email))->find();
		if (!empty($tmp)) {
			$this->error('此账号已被注册');
			return;
		}

		$re=$db->add($data);

		// p($re);
		// die();
		if ($re) {
			$this->success('注册成功');
		}
		else{
			$this->error("注册失败");
		}
		
		//注册功能完善
	}
}
?>