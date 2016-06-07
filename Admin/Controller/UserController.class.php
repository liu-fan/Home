<?php
//命名空间声明
namespace Admin\Controller;
//引入父类控制器的类元素
use Think\Controller;

//定义控制器并继承父类
class UserController extends Controller{

        //用户列表方法
        public function showList()
        {
           // if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            //实例化模型
            $model = D('User');
            //查询总的记录数
            $count = $model -> count();
            //实例化分页类，并且告知分页类总记录和每页显示的记录数
            $page = new \Think\Page($count,5);
            //设置分页控制显示的按钮提示文字
            $page -> lastSuffix = false;
            $page -> setConfig('prev','上一页');
            $page -> setConfig('next','下一页');
            $page -> setConfig('first','首页');
            $page -> setConfig('last','末页');
            //输出分页的控制显示信息
            $show = $page -> show();
            //改写原有的查询语句，添加limit查询
            //$data = $model -> select();
            $data = $model -> limit($page -> firstRow,$page -> listRows) -> select();
            //遍历已有的职员信息，将其中的部门id转换真实的部门名
            $dept = D('Dept');
            foreach($data as $key => $val){
                //根据当前职员所属的部门id去查询该部门的信息
                $info = $dept -> find($val['dept_id']);
                //取出部门信息中的部门名称，将其放在当前记录中的dept_name中
                $data[$key]['dept_name'] = $info['name'];
            }
            //传递分页控制信息
            $this -> assign('show',$show);
            //传递数据给模板
            $this -> assign('data',$data);
            $this -> assign('count',$count);
            //渲染模版
            $this -> display();
           // }else{
           //     $this -> error('您还没有登录或登录超时，正在火速为您跳转至登录界面......',U('Index/login'),3);
           // }
        }

        //添加用户
        public function add()
        {
            //if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            //两个业务逻辑，获取部门的数据，展示模版
            $model = D('Dept');	//实例化模型
            $data = $model -> select();	//查询全部的部门信息
            //加载无限级分类文件
            load('@/tree');
            $data = getTree($data);	//进行无限级分类
            $this -> assign('data',$data);	//变量传递给模版展示
            $this -> display();//渲染模版
           // }else{
            //    $this -> error('您还没有登录或登录超时，正在火速为您跳转至登录界面......',U('Index/login'),3);
           // }
        }

        //接收添加用户数据
        public function addOk(){
            $post = I('post.');//接收post数据
            //实例化模型
            $model = D('User');
            //添加当前事件
            $post['addtime'] = time();
            $rst = $model -> add($post);	//执行添加操作
            if($rst){
                //添加成功
                $this -> success('添加成功',U('showList'),3);
            }else{
                //添加失败
                $this -> error('添加失败',U('add'),3);
            }
        }

        //展示原有职员信息
        public function edit()
        {
            if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                //接收传递过来的id
                $id = I('get.id');
                if($id !== undefined){
                    //实例化model模型
                    $model = D('User');
                    $dept = D('Dept');
                    //根据id查询原有的职员信息
                    $data = $model -> find($id);
                    //查询出全部部门信息
                    $deptData = $dept -> select();
                    //载入无限级分类文件
                    load('@/tree');
                    $deptData = getTree($deptData);
                    //将数据传递给模板
                    $this -> assign('data',$data);
                    $this -> assign('deptData',$deptData);
                    //渲染模板
                    $this -> display();
                }else{
                    $this -> error('未找到用户ID，请重新输入',U('showList'),3);
                }
            }else{
                $this -> error('您还没有登录或登录超时，正在火速为您跳转至登录界面......',U('Index/login'),3);
            }
        }

        public function editOk()
        {
            //实例化模型
            $post = I('post.');
            $model = D('User');
            //针对密码的判断，如果新密码存在，则使用新密码覆盖原有密码，如果不存在，用旧密码覆盖表中的密码
            if ($post['password'] == '') {
                $post['password'] == $post['oldpassword'];
            }
            //删除数组中旧密码
            unset($post['oldpassword']);
            //执行删除操作
            $rst = $model -> save($post);
            //判断修改操作结果
            if($rst !== false){
                //成功
                $this -> success('修改成功',U('showList'),3);
            }else{
                //失败
                $this -> error('修改失败',U('edit',array('id' => $post['id'])),3);
            }

        }

        //职员删除功能
        public function delUser(){
            if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            $id = I('get.id');
            if($id){
                $model = D('User');
                $rst = $model -> delete($id);
                if ($rst) {
                    $this -> success('删除成功',U('showList'),3);
                } else {
                    $this -> error('删除失败',U('showList'),3);
                }
            }else{
                $this -> error('未找到用户ID，请重新输入',U('showList'),3);
            }
            }else{
                $this -> error('您还没有登录或登录超时，正在火速为您跳转至登录界面......',U('Index/login'),3);
            }
        }

        //highcharts展示各个部门有多少员工
        public function chart()
        {
            //if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            $model = D('Dept');
            $rst = $model -> field('t2.name as dept_name,count(*) as count')
                ->table('hf_user as t1,hf_dept as t2')
                ->where('t1.dept_id = t2.id')
                ->group('dept_name')
                ->select();
            $str = '[';
            foreach ($rst as $key => $value) {
                $str = $str . "['" . $value['dept_name'] . "'," . $value['count'] . "],";
            }
            $str = rtrim($str,',');
            $str .= ']';
            $this -> assign('data',$str);
            $this -> display('chart');
            //}else{
               // $this -> error('您还没有登录或登录超时，正在火速为您跳转至登录界面......',U('Index/login'),3);
           // }
        }

    }