<?php
/**
 * 
 * @authors	YANG DINGYUAN (yangdingyuan@itcast.cn)
 * @date    2016-05-25 00:30:10
 * @url 	http://dwz.cn/920815
 * @desc	请将此替换为文件描述...
 *
 */

//递归方法实现无限极分类
function getTree($list,$pid=0,$level=0) {
	static $tree = array();
	foreach($list as $row) {
		if($row['pid']==$pid) {
			$row['level'] = $level;
			$tree[] = $row;
			getTree($list, $row['id'], $level + 1);
		}
	}
	return $tree;
}