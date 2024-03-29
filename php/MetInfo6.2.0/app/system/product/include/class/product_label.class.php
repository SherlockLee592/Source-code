<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::mod_class('news/news_label');

/**
 * product标签类
 */

class product_label extends news_label {

	public $lang;//语言

	/**
		* 初始化
		*/
	public function __construct() {
		global $_M;
		$this->construct('product', $_M['config']['met_product_list']);
	}

	/**
	 * 获取列表数据内容（产品，图片，下载，新闻模块使用）
	 * @param  string  $id      栏目id
	 * @param  string  $rows    取的条数
	 * @param  string  $type    调用内容com／news(已废掉)／all（默认）
	 * @return array        		news数组
	 */
	public function get_module_list($id, $rows, $type, $order, $para) {
		global $_M;
		$data = parent::get_module_list($id, $rows, $type, $order);
		if($para){
			foreach($data as $key=>$val){
				$data[$key]['para'] = load::mod_class('parameter/parameter_label', 'new')->get_parameter_contents($this->mod , $val['id'], $val['class1'], $val['class2'], $val['class3']);
			}
		}
		return $data;
	}

	/**
	 * 获取列表分页数据
	 * @param  string  $class1  一级栏目id
	 * @param  string  $class2  二级栏目id
	 * @param  string  $class3  三级栏目id
	 * @param  string  $page    当前分页
	 * @return array        		news数组
	 */
	public function get_list_page($id, $page) {
		$data = parent::get_list_page($id, $page);
		foreach($data as $key=>$val){
			$data[$key]['para'] = load::mod_class('parameter/parameter_label', 'new')->get_parameter_contents($this->mod , $val['id'], $val['class1'], $val['class2'], $val['class3']);
			$data[$key]['para_url'] = load::mod_class('parameter/parameter_label', 'new')->get_parameter_contents($this->mod , $val['id'], $val['class1'], $val['class2'], $val['class3'],10);
            foreach ($data[$key]['para'] as $key1 => $val2) {//兼容老模板问题
				$data[$key]['para'.$val2['id']] =  $val2['value'];
				$data[$key]['para'.$val2['id'].'name'] = $val2['name'];
			}
		}

		return $data;
	}




	/**
	 * 添加附加内容
	 * @param  array  $id      数据数组
	 * @return array        	 数据数组
	 */
	public function get_add_contents($one, $add) {
		$one['content']  .= $add;
		$one['content1'] .= $add;
		$one['content2'] .= $add;
		$one['content3'] .= $add;
		$one['content4'] .= $add;
		$one['content']  = load::sys_class('label', 'new')->get('seo')->anchor_replace($one['content']);
		$one['content1'] = load::sys_class('label', 'new')->get('seo')->anchor_replace($one['content1']);
		$one['content2'] = load::sys_class('label', 'new')->get('seo')->anchor_replace($one['content2']);
		$one['content3'] = load::sys_class('label', 'new')->get('seo')->anchor_replace($one['content3']);
		$one['content4'] = load::sys_class('label', 'new')->get('seo')->anchor_replace($one['content4']);
		foreach($one['contents'] as $key => $val){
			$one['contents'][$key]['content'] = load::sys_class('label', 'new')->get('seo')->anchor_replace($val['content'].$add);
		}

		return $one;
	}
}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>
