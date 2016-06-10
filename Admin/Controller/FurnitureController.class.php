<?php
/**
 * Created by PhpStorm.
 * author: 刘帆
 * Date: 2016/6/3
 * Time: 19:46
 */

namespace Admin\Controller;


use Think\Controller;
use Think\Image;
use Think\Page;
use Think\Upload;

class FurnitureController extends Controller
{
    //家居详情页显示
    //查询页
    public function furniture()
    {
        $post = I('post.');
        $key = '';
        $a = '';
        if(IS_GET){
            $post['search-sort'] =I('get.search_sort');
            $post['keywords'] =I('get.keywords');
        }
        if ($post['keywords'] == '' && $post['search-sort'] == ''){
            $where = 't1.cate_id = t2.id';
            $url = '';
        }elseif($post['keywords'] != '' && $post['search-sort']!= ''){
            $a  = $post['search-sort'];
            $key = $post['keywords'];
            $where = "t1.cate_id = t2.id and t1.cate_id = {$a} and t1.name like '%{$key}%'";
            $url = array('keywords' => $key,'search_sort' => $a);
        } elseif ($post['search-sort'] == ''){
            $key = $post['keywords'];
            $where = "t1.cate_id = t2.id and t1.name like '%{$key}%'";
            $url = array('keywords' => $key);
        }elseif ($post['keywords'] == ''){
            $a = $post['search-sort'];
            $where = "t1.cate_id = t2.id and t1.cate_id = {$a}";
            $url = array('search_sort' => $a);
        }
        $model = M('Furniture');
        //分页
        $count = $model ->table('hf_furniture as t1,hf_category as t2')->where($where)->count();
        //分页类
        $page = new Page($count,2,$url);
        // select t1.*,t2.name as cate_name from furniture as t1 left join category as t2 on t1.cate_id = t2.id
        $ret = $model->field('t1.*,t2.name as cate_name')
            ->table('hf_furniture as t1,hf_category as t2')
            ->where($where)
            ->limit($page->firstRow,$page->listRows)
            ->select();
        //设置按钮显示数字
        $page -> lastSuffix = false;
        $page -> setConfig('prev','上一页');
        $page -> setConfig('next','下一页');
        $page -> setConfig('first','首页');
        $page -> setConfig('last','末页');
        //输出page
        $show = $page->show();
        //搜素栏的种类项
        $cate = M('Category');
        $arr = $cate->select();
        load('@/tree');
        $cte = getTree($arr);
        //dump($key);die;
        $this->assign('a',$a);
        $this->assign('keywords',$key);
        $this->assign('post',$post);
        $this->assign('cate',$cte);
        $this->assign('page',$show);
        $this->assign('data',$ret);
        $this->display();
    }

    //家居添加页
    public function add()
    {
        $model = M('category');
        $arr = $model ->select();
        $this->assign('data',$arr);
        $this->display();
    }

    //添加储存处理
    public function addOk()
    {
        //dump($_FILES);
        //dump($_POST);die;
        if(IS_POST){
            //接收post信息
            $post = I('post.');
            //文件上传
            if($_FILES['file']['size'] > 0){
                $cfg = array(
                    'rootPath' => WORKING_PATH.UPLOAD_ROOT_PATH,
                );
                $upload = new Upload($cfg);
                $info = $upload->uploadOne($_FILES['file']);
                //上传成功，制作缩略图
                //dump($info);
                if($info){
                    $post['picture'] = UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];
                    //缩略图
                    $im = new Image();
                    $im ->open(WORKING_PATH.$post['picture']);
                    $im ->thumb(100,100);
                    $im ->save(WORKING_PATH.UPLOAD_ROOT_PATH.$info['savepath'].'thumb_'.$info['savename']);
                    //记录缩略图地址
                    $post['thumb'] = UPLOAD_ROOT_PATH.$info['savepath'].'thumb_'.$info['savename'];
                }
                $post['addtime'] = time();
                $model = M('Furniture');
                $ret = $model -> add($post);
                if ($ret){
                    $this->success('添加成功',U('furniture'),2);
                }else{
                    $this->error('删除失败',U('furniture'),2);
                }
            }
        }
    }
    //删除项
    public function del()
    {
        $id = I('get.id');
        $model = M('Furniture');
        $ret = $model->delete($id);
       if ($ret){
           $this->success('删除成功',U('furniture'),2);
       }else{
           $this->error('删除失败',U('furniture'),2);
       }
    }
    //编辑项
    public function edit()
    {
        $id = I('get.id');
        $model = M('Furniture');
        $ret = $model->find($id);
        $model1 = M('category');
        $arr = $model1 ->select();
        $this->assign('data',$ret);
        $this->assign('arr',$arr);
        $this->display();
    }
    //保存编辑过后文件
    public function editOk()
    {
        if (IS_POST){
            //接收post信息
            $post = I('post.');
            //文件上传
            if($_FILES['file']['size'] > 0){
                $cfg = array(
                    'rootPath' => WORKING_PATH.UPLOAD_ROOT_PATH,
                );
                $upload = new Upload($cfg);
                $info = $upload->uploadOne($_FILES['file']);
                //上传成功，制作缩略图
                //dump($info);
                if($info){
                    $post['picture'] = UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];
                    //缩略图
                    $im = new Image();
                    $im ->open(WORKING_PATH.$post['picture']);
                    $im ->thumb(100,100);
                    $im ->save(WORKING_PATH.UPLOAD_ROOT_PATH.$info['savepath'].'thumb_'.$info['savename']);
                    //记录缩略图地址
                    $post['thumb'] = UPLOAD_ROOT_PATH.$info['savepath'].'thumb_'.$info['savename'];
                }
                $post['addtime'] = time();
                $model = M('Furniture');
                $ret = $model -> save($post);
                if ($ret){
                    $this->success('修改成功',U('furniture'),2);
                }else{
                    $this->error('修改失败',U('furniture'),2);
                }
            }
        }
    }

   
    //搜索的无刷新分页
    public function text($page=1,$pagesize=20)
    {
        $db=M("Furniture");
        $recordnum = $db->count();
        //计算分页
        $pagenum = $recordnum / $pagesize;
        //如果不能整除，则自动加1页
        if($pagenum % 1 !== $pagenum){
            $pagenum = (int) $pagenum+1;
        }

        //利用page函数。来进行自动的分页
        $data = $db->page($page,$pagesize)->select();
        $this->data = $data;
        $this->pagenum = $pagenum;
        $this->page = $page;
        $this->pagesize = $pagesize;
        $this->display();


    }

}