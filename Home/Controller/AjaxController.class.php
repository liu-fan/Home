<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/6
 * Time: 17:55
 */

namespace Home\Controller;


use Think\Controller;

class AjaxController extends Controller
{
    public function getAjax()
    {
        $post = $_POST;
        //$post = json_decode($post,true);
        $model = M('message');
        $data['name'] = $post['name'];
        $data['tel'] = $post['phone'];
        $data['email'] = $post['email'];
        $data['message'] = $post['message'];
        $data['addtime'] = time();
        //$this->ajaxReturn($data);die;
        $model->add($data);
    }
}