<?php
namespace Home\Model;
use Think\Model;

class UserInfoModel extends Model{
  protected	$_validata=array(
		array('username','require','用户名格式错误'),
		array('username','4,16','用户名长度要在4-16字符','length'),
		array('username','','该用户已存在',1,'unique',1),
		array('userpwd','require','请输入密码'),
		array('uesremali','email','Email格式不正确')
	);
}
?>