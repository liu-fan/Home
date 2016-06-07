<?php
namespace Admin\Controller;

class AgeController extends CommonController 
{
    public function index()//显示信息
    {
    	$obj = M('Message');

        $count = $obj -> count();//查询总记录数
        $page = new \Think\Page($count,5);//实例化分页类
        $page -> lastSuffix = false;//修改分页类信息
        $page -> setConfig('prev','上一页');
        $page -> setConfig('next','下一页');
        $page -> setConfig('first','首页');
        $page -> setConfig('last','末页');
        $show = $page -> show();//输出分页的控制显示信息
        $obj ->create();
        if($_POST){
            $a = I('post.');
            $obj -> where("{$a['sort']} LIKE '%{$a['keywords']}%'");
        }
            $str = $obj -> order('isread asc') 
                        -> limit($page -> firstRow,$page -> listRows) 
                        -> select();
        
        $this -> assign('str',$str);
        $this -> assign('show',$show);
    	$this -> assign('count',$count);
    	$this -> display();
    }

    public function del()
    {   
        $ids = I('get.ids');
        $obj = M('Message');
        $a = $obj -> delete($ids); 
        if($a){
            $this -> success('删除成功',U('index'),2);
        }else{
            $this -> error('删除失败',U('index'),2);
        }
    }

    public function content()//弹窗显示内容
      {
        $id = I('get.id');
        $obj = M('Message');
        $data = $obj -> find($id);
        $content = $data['message'];//把文章内容存到变量里
        //将文章里的实体字符转化为真实的html标签
        echo htmlspecialchars_decode(html_entity_decode($content));
      }

    public function edit()//修改信息
    {               
        $get = I('get.');//获取id
        $obj = M('Message');
            if($get['isread'] == 1){
                $get['isread'] = 2;
                $a = $obj -> save($get);
            }elseif($get['isread'] == 2){
                $get['isread'] = 1;
                $a = $obj -> save($get);
            }
            
            if($a){
                $this -> success('修改成功',U('index'),2);
            }else{
                $this -> error('修改失败',U('index'),2);
            }
        
    }
}