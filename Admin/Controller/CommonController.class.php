<?php
namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller 
{
	public function _initialize(){
  //       if(!session('uid')){
  //           $this -> error('请登录...',U('public/login'),2);exit;
  //       }
  //       //获取当前的控制器名和方法名
		// $controller = CONTROLLER_NAME;
		// $action = ACTION_NAME;

		// //根据当前用户的用户组id取出它有的权限
		// $auth = C('RBAC_AUTH');	//读取配置项
		// //接收属于当前用户组的权限
		// $currentRoleAuth = $auth['AUTH' . session('role_id')];
		// dump($currentRoleAuth);
		// echo"<he/>";
		// dump($controller . '/' .$action);
		// //开始判断当前的控制器名和方法名是否在其中
		// if(session('role_id') != 1){
		// 	//不是高层领导才会去进行验证
		// //dump(!in_array($controller . '/*',$currentRoleAuth));die;
		// 	if(!in_array($controller . '/*',$currentRoleAuth) && !in_array($controller . '/' .$action, $currentRoleAuth)){
		// 		//没有权限的处理
		// 		$this -> error('抱歉，没有权限',U('Index/home'),3);
		// 	}
		// }
    }

    public function _empty()
    {
        $this -> display('Empty/error');
    }
}