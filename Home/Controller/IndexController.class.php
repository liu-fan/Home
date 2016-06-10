<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {

        //显示设计师页的内容
        $desmodel = M('Designer');
//        $descount = $desmodel->count();
//        $despage = new Page($descount,2);
//        $despage->rollPage = 2;
//        $despage->lastSuffix = false;
//        $despage->setConfig('prev', 上一页);
//        $despage->setConfig('next', 下一页);
//        $despage->setConfig('first', 首页);
//        $despage->setConfig('last', 末页);
//        $desshow = $despage->show();
//        //dump($descount);
//        //dump($desshow);die;
//        $this->assign('desshow', $desshow);
        $designer = $desmodel->select();
        //dump($designer);die;->limit($despage->firstRow,$despage->listRows)->order('id')
        $this->assign('designer', $designer);


        

        //显示附加产品(家具)的内容
        $furmodel = M('furniture');
        $furniture = $furmodel->select();
        $this->assign('furniture', $furniture);


        $this->display();
    }




}