<?php
/**
 * $Author: BEESCMS $
 * ============================================================================
 * 网站地址: http://www.beescms.com
 * 您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
*/

if(!file_exists("../data/install.lock")||!file_exists("../data/confing.php")){header("location:../install/index.php");exit();}
define('CMS',true);
require_once('../includes/init.php');
require_once('../includes/fun.php');
require_once('../includes/lib.php');
$id=intval($_GET['id']);
$pr_id=intval($_GET['pr_id']);
$cate_info=get_cate_info($id,$category);
if(empty($cate_info)||($cate_info['cate_channel']!=-9)){header('location:../index.php');}//非表单跳转首页
$lang=$cate_info['lang'];
if(file_exists(LANG_PATH.'lang_'.$lang.'.php')){include(LANG_PATH.'lang_'.$lang.'.php');}//语言包缓存,数组$language
if(file_exists(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php')){include(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php');}//当前语言下的栏目
$_confing=get_confing($lang);//配置信息
$cat_id=$cate_info['id'];
$parent_id=get_cate_last_parent($cat_id);//获取最终顶级栏目
//获得传递内容的栏目值
$cateid=$cat_id;
$tpl->template_dir=TP_PATH.$_confing['web_template'].'/';
$tpl->template_lang=$lang;
if($_confing['is_cache']){
	$tpl->template_is_cache=1;//缓存
	$tpl->template_time=$_confing['cache_time']?$_confing['cache_time']:30;//开启缓存但不存在缓存时间使用30秒
}else{
	$tpl->template_is_cache=0;
}
$tpl_rel=explode('.',$cate_info['cate_tpl_list']);
$tpl->display($tpl_rel[0]);//载入缓存文件
?>
