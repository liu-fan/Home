<?php
namespace Admin\Controller;

class CategoryController extends CommonController 
{
    public function index()//显示信息
    {
    	$obj = M('Category');
        $count = $obj -> count();
    	$str = $obj->select();
        load('@/tree');
        $str = getTree($str);//无限极分类
        $this -> assign('str',$str);
    	$this -> assign('count',$count);
    	$this -> display();
    }

    public function add()//添加信息
    {	
        $obj = M('Category');
    	if($_POST){
    		$a = $obj -> add(I('post.'));
    		if($a){
    			$this -> success('添加成功',U('index'),2);
    		}else{
				$this -> error('添加失败',U('add'),2);
    		}
    	}else{
            $dat = $obj -> select();
            load('@/tree');
            $data = getTree($dat);//无限极分类
            $this -> assign('data',$data);
    		$this -> display();
    	}       
    }

    public function edit()//修改信息
    {	            
        $id = I('get.id');//获取id
        $obj = M('Category');
    	if($_POST){
            $post = I('post.');
            foreach ($post as $key => $value) {
                if(!$value){
                    unset($post[$key]);
                }
            }
    		$a = $obj -> save($post);
    		if($a){
    			$this -> success('修改成功',U('deptList'),2);
    		}else{
				$this -> error('修改失败',U('edit'),2);
    		}
    	}else{
            $data1 = $obj -> find($id);
            $this -> assign('data1',$data1);
            $dat = $obj -> select();
            load('@/tree');
            $data = getTree($dat);//无限极分类
            $this -> assign('data',$data);
    		$this -> display();
    	}       
    }

    public function del()
    {   
        $ids = I('get.ids');
        $obj = M('Category');
        $a = $obj -> delete($ids); 
        if($a){
            $this -> success('删除成功',U('index'),2);
        }else{
            $this -> error('删除失败',U('index'),2);
        }
    }
}