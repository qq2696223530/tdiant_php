<?php
/**
 * 首页控制器
 */
class IndexAction extends Action {
    public function index(){
	/**
     * 类初始化之时查看是否登录
     */
    	$userid=$_SESSION["userid"];
    	$username=$_SESSION["username"];


    	if (empty($userid)||empty($username)) {
    		//如果没有登录即可跳转登录页面
    		R("User/index");
    		return;
    	}

        $data=M("account")->where(array("accountid"=>$userid))->find();

        $this->assign('data',$data);

        // p($data);

        // die();

    	//秀出模版
		$this->display();
    }


    /**
     * 修改昵称模块
     * @return [type] [description]
     */
    public function upnickname(){
        $userid=$_REQUEST["userid"];
        $data["nickname"]=$_REQUEST["nickname"];

        $re=M("account")->where(array("accountid"=>$userid))->save($data);
        if ($re) {
            $this->success('修改成功');
        }
        else{
            $this->error('修改失败');
        }
    }

    /**
     * 修改密码模块
     * @return [type] [description]
     */
    public function uppassword(){
        $userid=$_REQUEST["userid"];
        $data=M("account")->where(array("accountid"=>$userid))->find();
        $oldpwd=md5($_REQUEST["old_password"]);;
        if ($data["password"]==$oldpwd) {
            $mydata["password"]=md5($_REQUEST["new_password"]);
            $re=M("account")->where(array("accountid"=>$userid))->save($mydata);
            if ($re) {
                $this->success('密码修改成功');
            }
            else{
                $this->error('密码修改失败');
            }
        }
        else{
            $this->error('原密码不正确');
        }

        p($_REQUEST);
    }
}