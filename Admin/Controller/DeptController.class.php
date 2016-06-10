<?php

namespace Admin\Controller;


use Think\Controller;

class DeptController extends Controller
{
    public function dept()
    {
        $model = M('dept');
        $data = $model->alias('t1')->field('t1.*,t2.name as pname')->join('left join hf_dept as t2 on t1.pid=t2.id')->order('id')->select();
        $this->assign('data', $data);
        $this->display();
    }

    public function add()
    {
        $model=M('dept');
        $data = $model->select();
        load('@/tree');
        $data = getTree($data);
        $this->assign('data', $data);
        $this->display();
    }

    public function addOk()
    {
        $post = I('post.');
        $model = M('dept');
        if ($model->add($post)){
            $this->success('添加成功', U('dept'));
        }else{
            $this->error('添加失败', U('add'));
        }
    }

    public function del()
    {
        $id = I('get.id');
        $model = M('dept');
        if ($model->delete($id)){
            $this->success('删除成功', U('dept'));
        }else{
            $this->error('删除失败', U('dept'));
        }

    }

    public function edit()
    {
        $model = M('dept');
        $id = I('get.id');
        $data = $model->find($id);
        $dept = $model->select();
        load('@/tree');
        $dept = getTree($dept);
        $this->assign('dept', $dept);
        $this->assign('data', $data);
        $this->display();
    }

    public function editOk()
    {
        $model = M('dept');
        $post = I('post.');
        //dump($post);die;
        if ($model->save($post)){
            $this->success('修改成功', U('dept'));
        }else{
            $this->error('修改失败', U('dept'));
        }
    }
}