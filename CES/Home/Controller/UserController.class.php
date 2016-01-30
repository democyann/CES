<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller{
	public function _initialize(){
		//if(!IS_POST && !IS_AJAX){
		//	$this->error('要做个好孩子喵~');
		//}
	}
	public function login($username,$password)
	{
			$user=M('userinfo');
			$password=md5($password+$username);
			$data = $user->where("UserName='%s' AND UserPwd='%s'",$username,md5($password.$username))->find();
			dump($data);
			if($data && $data!=NULL){
				//$this->success('登录成功');
				session('user',$data);
				$this->assign('user',session('user'));
				$this->display();
			}
			else
			{
				$this->error('登录失败');
			}	
	}
	
	public function reg()
	{
		$user=D('UserInfo');
		$data['username']=I('post.username/s',NULL,'string');
		$data['userpwd']=md5(I('post.userpwd','',false).$data['username']);
		$data['useremail']=I('post.useremali','','email');
		if(I('post.userpwd','',false)==I('post.userpwd2','',false)){
			if($user->center())
			{
				
			}
		}
		else
		{
			$this -> error('两次密码不一致');
		}
		
	}
}
?>