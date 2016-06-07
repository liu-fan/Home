<?php

//声明命名空间
namespace Admin\Model;
//引入父类的模型元素
use Think\Model;

//定义模型类并且继承父类模型
class DeptModel extends Model{

	//字段定义
	protected $fields = array('id','name','pid','sort','remark');


	//字段映射
	protected $_map = array(
			//key => value   key:表示模版中的name名   value：表示数据表中的真实字段
			'deptname'	=> 'name'	//将模版中的deptname与数据表中的name字段映射
		);
	
}