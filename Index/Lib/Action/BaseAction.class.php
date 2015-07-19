<?php
/**
 * 基础控制器
 */
class BaseAction extends Action{
	public function verify(){
		import('ORG.Util.Image');
        Image::buildImageVerify();
	}
}
?>