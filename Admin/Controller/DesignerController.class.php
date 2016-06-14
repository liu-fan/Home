<?php
/**
 * Created by PhpStorm.
 * author: 刘帆
 * Date: 2016/6/14
 * Time: 8:23
 */

namespace Admin\Controller;


use Think\Controller;

class DesignerController extends Controller
{
    public function index()
    {
        $model = M('Designer');
        $re = $model->select();
        if ($re){
            $this->assign('data',$re);
            $this->display();
        }else{
            $this->error('查询失败,请联系管理员',U('Index/index'),2);
        }
        
    }
}