<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {

        //显示设计师页的内容
        $desmodel = M('Designer');
        $designer = $desmodel->select();
        $this->assign('designer', $designer);
        //显示附加产品(家具)的内容
        $furmodel = M('furniture');
        $furniture = $furmodel->select();
        $count = $furmodel->count('id');
        $this->assign('count',$count);
        $this->assign('furniture', $furniture);
        $this->display();
    }




}