<?php
/**
 * $Author: BEESCMS $
 * ============================================================================
 * 网站地址: http://www.beescms.com
 * 您只能在不用于商业目的的前提下对程序代码进行修改和使用；
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
*/

//初始化一些调用内容，避免多次调用
$cateinfo_rel=array();

include('out_lib.php');

//常用函数
function pagelist($id,$page,$size){
	if(empty($id)){return;}
	$num=$page*$size;
	$rel='';
	$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."maintb where category=".intval($id)." limit ".$num.",".intval($size));
	return $rel;
}
function pages($row,$id){
	global $row;
	if(empty($id)){return;}
	$row=empty($row)?5:$row;
	$rel_num=$GLOBALS['mysql']->fetch_rows('select*from '.DB_PRE.'maintb where category='.intval($id));
	$pages=intval($rel_num/$row);
	$pages=empty($pages)?1:$pages;
	return $pages;
}



/**
 * 获得列表页内容列表【只能在列表页使用】
 *
 * @access  public
 * @param   无
 * @return  array
 */
function list_article(){
	global $page,$cat_id,$list_cate,$r_count,$page_size,$child,$lang,$cate_info,$channel_info,$category;
	$_confing=get_confing($lang);
	if(empty($cat_id) || empty($list_cate))
	{
		return;
	}
	//获取频道表，只能获取父级栏目频道表
	$table = $channel_info['channel_table'];
	//表不存在，退出函数
	if(empty($table))
	{
		return;
	}
	$rel = array();
	$row = empty($page_size) ? 20 : $page_size;
	$page = empty($page) ? 1 : $page;
	$offset = ($page-1) * $row;
	$rel = $GLOBALS['mysql'] -> fetch_asc("select m.*,f.* from ".DB_PRE."maintb as m left join ".DB_PRE.$table." as f on m.id=f.id where m.lang='".$lang."' and m.id=f.id and category in (".$list_cate.") order by m.c_order desc,m.id desc limit ".$offset.",".$page_size);
	$path = CMS_SELF;
	if(!empty($rel))
	{
		$i = 1;
		$num = count($rel);
		$list_php = empty($channel_info['list_php'])?'show_list.php':$channel_info['list_php'];
		$content_php = empty($channel_info['content_php'])?'show_content.php':$channel_info['content_php'];
		foreach($rel as $k=>$v){
			//标题样式
			if($rel[$k]['title_color']||$rel[$k]['title_style']||$rel[$k]['is_open']){
				$font_style='';
				$font_style.=empty($rel[$k]['title_color'])?'':'color:'.$rel[$k]['title_color'].';';
				if($rel[$k]['title_style']==1){
					$font_style.='font-weight:bold;';
				}elseif($rel[$k]['title_style']==2){
					$font_style.='font-style:italic;';
				}elseif($rel[$k]['title_style']==3){
					$font_style.='text-decoration:underline;';
				}
				$rel[$k]['style'] = $font_style;
				$rel[$k]['style_title']=$rel[$k]['title'];//样式标题
			}else{
				$rel[$k]['style_title']=$rel[$k]['title'];
			}
			$rel[$k]['target']=$v['is_open']?'target="_blank"':'';//新窗口	
			$rel[$k]['url']=(!$v['is_html']&&!($_confing['web_html'][0])||$v['purview'])?$path.$content_php.'?id='.$v['id']:$path.$v['url'];
			$rel[$k]['url']=($v['is_url'])?$v['url_add']:$rel[$k]['url'];
			$v['tbpic']=empty($v['tbpic'])?'no_pc.gif':$v['tbpic'];//缩略图
			$rel[$k]['thumb_pic']=CMS_SELF.'upload/'.$v['tbpic'];
			$cate_info=get_cate_info($v['category'],$category);//获取各内容的栏目信息
			$cate_url=(!$v['is_html']&&!($GLOBALS['_confing']['web_html'][0]))?$path.$list_php.'?id='.$cate_info['id']:$path.'htm/'.$cate_info['cate_fold_name'];
			$rel[$k]['cate_url'] = $cate_url;//栏目url
			$rel[$k]['cate_name'] = $cate_info['cate_name'];//栏目名称
			$rel[$k]['autoindex']=$i;//内容序号
			$rel[$k]['first']=($i==1)?1:0;
			$rel[$k]['last']=($num==$i)?1:0;
			$i=$i+1;
		}
	}
	return $rel;
}


/**
 * 获得内容页内容【只能在内容页使用】
 *
 * @access  public
 * @param   $cate_id:访问内容的内容ID;  $table:模型表; $cat_id:栏目ID;
 * @return  array 主表和附加模型的内容数组
 */
function get_content($cate_id,$table,$cat_id){
	global $language,$lang,$channel_info;//获取程序页值
	if(empty($cate_id)||empty($table)||empty($cat_id)){return;}
	$list_php=empty($channel_info['list_php'])?'show_list.php':$channel_info['list_php'];
	$content_php=empty($channel_info['content_php'])?'show_content.php':$channel_info['content_php'];
	if(file_exists(DATA_PATH.$lang.'_info.php')){include(DATA_PATH.$lang.'_info.php');}//网站配置信息
if(!empty($_confing)){
 foreach($_confing as $k=>$v){
 	$_confing[$k]=stripslashes($v);
 }
}
	$sql="select m.*,c.* from ".DB_PRE."maintb as m left join ".DB_PRE.$table." as c on m.id=c.id where m.id=".$cate_id;
	$path=CMS_SELF;
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	//处理标题
	if($rel[0]['title_color']||$rel[0]['title_style']||$rel[0]['is_open']){
			$font_style='';
			$font_style.=empty($rel[0]['title_color'])?'':'color:'.$rel[0]['title_color'].';';
			if($rel[0]['title_style']==1){
			$font_style.='font-weight:bold;';
			}elseif($rel[0]['title_style']==2){
				$font_style.='font-style:italic;';
			}elseif($rel[0]['title_style']==3){
				$font_style.='text-decoration:underline;';
			}
			$rel[0]['style'] = $font_style;//样式
			$rel[0]['style_title']=$rel[0]['title'];//样式标题
			}else{
			$rel[0]['style_title']=$rel[0]['title'];
	}
	$rel[0]['tbpic']=empty($rel[0]['tbpic'])?'no_pc.gif':$rel[0]['tbpic'];//缩略图
	$rel[0]['thumb_pic']=CMS_SELF.'upload/'.$rel[0]['tbpic'];
	$rel[0]['updatetime']=$rel[0]['updatetime'];//更新时间
	$prev_id=$cate_id-1;
	$sql="select id,c_order from ".DB_PRE."maintb where category={$cat_id} and id>{$cate_id} order by c_order asc,id asc limit 0,1";
	$rel[0]['prev']='';
	if($GLOBALS['mysql']->fetch_rows($sql)){
		$prev_rel=$GLOBALS['mysql']->fetch_asc("select id,title,title_color,title_style,url,is_html,is_url,url_add,c_order from ".DB_PRE."maintb where category={$cat_id} and id>{$cate_id} order by c_order asc,id asc limit 0,1");
		//处理标题
		$font_style='';
		if($prev_rel[0]['title_color']||$prev_rel[0]['title_style']){
			$font_style.=empty($prev_rel[0]['title_color'])?'':'color:'.$prev_rel[0]['title_color'].';';
			if($prev_rel[0]['title_style']==1){
			$font_style.='font-weight:bold;';
			}elseif($prev_rel[0]['title_style']==2){
				$font_style.='font-style:italic;';
			}elseif($prev_rel[0]['title_style']==3){
				$font_style.='text-decoration:underline;';
			}
			$prev_rel[0]['style'] = $font_style;
			$prev_rel[0]['style_title']=$prev_rel[0]['title'];//样式标题
			}else{
			$prev_rel[0]['style_title']=$prev_rel[0]['title'];
			}
		$url=(!empty($next_rel[0]['is_html'])||!($_confing['web_html'][0]))?$path.$content_php.'?id='.$prev_rel[0]['id']:$path.$prev_rel[0]['url'];
		$next_is=isset($next_rel[0]['is_url'])?$next_rel[0]['is_url']:'';
		$url=($next_is)?$next_rel[0]['url_add']:$url;
		$font_style=empty($font_style)?'':'style="'.$font_style.'"';
		$rel[0]['prev']="{$language['previous']}:<a href=\"{$url}\" {$font_style} title=\"{$prev_rel[0]['title']}\">{$prev_rel[0]['title']}</a>";
		unset($prev_rel);
	}else{
		$rel[0]['prev']="{$language['previous']}:{$language['nonestr']}";
	}
	$next_id=$cate_id+1;
	$sql="select id,c_order from ".DB_PRE."maintb where category={$cat_id} and id<{$cate_id} order by c_order desc,id desc limit 0,1";
	$rel[0]['next']='';
	if($GLOBALS['mysql']->fetch_rows($sql)){
		$next_rel=$GLOBALS['mysql']->fetch_asc("select id,title,title_color,title_style,url,is_html,is_url,url_add,c_order from ".DB_PRE."maintb where category={$cat_id} and id<{$cate_id} order by c_order desc,id desc limit 0,1");
		//处理标题
		$font_style='';
		if($next_rel[0]['title_color']||$next_rel[0]['title_style']){
		
			$font_style.=empty($next_rel[0]['title_color'])?'':'color:'.$next_rel[0]['title_color'].';';
			if($next_rel[0]['title_style']==1){
			$font_style.='font-weight:bold;';
			}elseif($next_rel[0]['title_style']==2){
				$font_style.='font-style:italic;';
			}elseif($next_rel[0]['title_style']==3){
				$font_style.='text-decoration:underline;';
			}
			$next_rel[0]['style_title']=$next_rel[0]['title'];//样式标题
			}else{
			$next_rel[0]['style_title']=$next_rel[0]['title'];
			}
		$url=(!empty($next_rel[0]['is_html'])||!($_confing['web_html'][0]))?$path.$content_php.'?id='.$next_rel[0]['id']:$path.$next_rel[0]['url'];
		$next_is=isset($next_rel[0]['is_url'])?$next_rel[0]['is_url']:'';
		$url=($next_is)?$next_rel[0]['url_add']:$url;
		$font_style=empty($font_style)?'':'style="'.$font_style.'"';
		$rel[0]['next']="{$language['next']}:<a href=\"{$url}\" {$font_style} title=\"{$next_rel[0]['title']}\">{$next_rel[0]['title']}</a>";
		unset($next_rel);
	}else{
		$rel[0]['next']="{$language['next']}:{$language['nonestr']}";
	}
	return $rel;
	
}

/**
 * 获得列表页内容分页【使用编辑器中的分页功能】
 *
 * @access  public
 * @param   无
 * @return  string [html分页]
 */
function body_pages(){
	global $id,$content_arr_num,$content_focus,$arc_id,$lang;//程序页show_content.php的值
	$_confing=get_confing($lang);
	if(empty($id)){return;}
	$str='';
	if($_confing['web_html'][0])
	{
		$id=isset($arc_id)?$arc_id:$id;
		$rel = $GLOBALS['mysql'] -> fetch_asc("select url from ".DB_PRE."maintb where id=".intval($id));
		$url = 'index';//单页
		if(!empty($rel[0]['url']))
		{
			$url = substr($rel[0]['url'] , strrpos($rel[0]['url'] , '/')+1);
			$url = str_replace('.html' , '' , $url);//获取静态页面名称
		}
		if(!empty($content_arr_num))
		{//静态html分页
			for($i=0 ; $i<$content_arr_num ; $i++)
			{
				$class = ($content_focus==$i) ? "class=\"focus\"" : "";
				$p = $i + 1;
				if($content_focus == $i)
				{
					$c_page = $i;
					if($i==1)
					{
						$str_pre="<a href=\"{$url}.html\">".$GLOBALS['language']['pagapre']."</a>";
					}
					else
					{
						$str_pre=($c_page<=0)?'<span class="off">'.$GLOBALS['language']['pagapre'].'</span>':'<a href="'.$url.'_'.$c_page.'.html">'.$GLOBALS['language']['pagapre'].'</a>';	
					}
					$c_page=$p+1;
					$str_next=($p>=$content_arr_num)?'<span class="off">'.$GLOBALS['language']['pagenext'].'</span>':'<a href="'.$url.'_'.$c_page.'.html">'.$GLOBALS['language']['pagenext'].'</a>';
				}
				$str.=($i==0)?"<a {$class} href=\"{$url}.html\">{$p}</a>":"<a {$class} href=\"{$url}_{$p}.html\">{$p}</a>";
			
			}
			$str=$str_pre.$str.$str_next;
		}
		
	}
	else
	{
	
		if(!empty($content_arr_num)){//动态分页
			$c_page=$GLOBALS['page']-1;
			$str.=($content_focus<=0)?'<span class="off">'.$GLOBALS['language']['pagapre'].'</span>':'<a href="?id='.$id.'&page='.$c_page.'">'.$GLOBALS['language']['pagapre'].'</a>';
			for($i=0;$i<$content_arr_num;$i++){
				$class=($content_focus==$i)?"class=\"focus\"":"";
				$p=$i+1;
				$str.=($i==0)?"<a {$class} href=\"?id={$id}\">{$p}</a>":"<a {$class} href=\"?id={$id}&page={$p}\">{$p}</a>";
			}
			$c_page=$GLOBALS['page']+1;
			$str.=($content_focus>=($content_arr_num-1))?'<span class="off">'.$GLOBALS['language']['pagenext'].'</span>':'<a href="?id='.$id.'&page='.$c_page.'">'.$GLOBALS['language']['pagenext'].'</a>';
		}
	}
	return $str;	
}


/**
 * 获得文件路径【图片、程序文件、目录等的路径获取】
 *
 * @access  public
 * @param   $paht (index:获得首页路径;search:获得搜索页路径;cms:获得程序安装路径);
 * @return  array
 */
function cmspath($path=''){
	global $lang;
	$_confing=get_confing($GLOBALS['lang']);
	if(get_index_url($lang)){
		$index_url='';
	}else{
		$index_url=$_confing['web_html'][0]?'index_'.$lang.'.html':'index.php?lang='.$lang;
	}
	$path=($path=='template')?'template/'.$_confing['web_template']:$path;
	$path=($path=='index')?$index_url:$path;
	$path=($path=='search')?'search/search.php?lang='.$lang:$path;
	$path=($path=='cms')?'':$path;
	echo CMS_SELF.$path;
}


//动态页路径【内部使用】
function get_dy_position($url){
	$_confing=get_confing($GLOBALS['lang']);
	if(get_index_url($GLOBALS['lang'])){
		$index_url='';
	}else{
		$index_url=$_confing['web_html'][0]?'index_'.$GLOBALS['lang'].'.html':'index.php?lang='.$GLOBALS['lang'];
	}
	$url_str='<a href="'.$index_url.'">'.$GLOBALS['language']['index'].'</a>>'.$url;
	return $url_str;
}



/**
 * 获得网站配置信息,用于优化
 *
 * @access  public
 * @param   网站配置中的基本信息
 * @return  array
 */
function webinfo($param){
	$_confing=get_confing($GLOBALS['lang']);
	return empty($param)?'':stripslashes($_confing[$param]);
}


/**
 * 获得网站栏目配置信息,用于列表页或单页优化
 *
 * @access  public
 * @param   $param
 * @return  array
 */
function cateinfo($param){
	return empty($param)?'':$GLOBALS['cate_info'][$param];
}


/**
 * 获得当前位置
 *
 * @access  public
 * @param   无
 * @return  string 
 */
function position(){
	//global $ct,$lang,$cateid,$language;
	global $channel_info,$cate_list,$cate_info;
	$_confing=get_confing($GLOBALS['lang']);
	if($cate_info['cate_channel']=='-9'){
		$list_php = "order/order.php";
	}else{
		$list_php=empty($channel_info['list_php'])?'show_list.php':$channel_info['list_php'];
		$content_php=empty($channel_info['content_php'])?'show_content.php':$channel_info['content_php'];
	}	
	$cat_id=intval($GLOBALS['cat_id']);
	if(get_index_url($GLOBALS['lang'])){
		$index_str=CMS_SELF;
	}else{
		$index_str=$_confing['web_html'][0]?CMS_SELF.'index_'.$GLOBALS['lang'].'.html':CMS_SELF.'index.php?lang='.$GLOBALS['lang'];
	}
	if(!empty($cat_id)){
		$path=CMS_SELF;
		if(file_exists(DATA_PATH.'cache_cate/cate_list_'.$GLOBALS['lang'].'.php')){
			include(DATA_PATH.'cache_cate/cate_list_'.$GLOBALS['lang'].'.php');
		}
		//取得父栏目
		if(!empty($cate_list)){
			foreach($cate_list as $k=>$v){
				if($v['id']==$cat_id){
					$parent=$v['cate_parent'];
					$is_dy=($v['cate_channel']==1)?'htm/'.$v['cate_fold_name'].'/':'htm/'.$v['cate_fold_name'];//单页重新设置
					$url=($v['cate_html']&&$_confing['web_html'][0])?CMS_SELF.$is_dy:CMS_SELF.$list_php."?id={$v['id']}";
					$ps="<a href=\"{$url}\">{$v['cate_name']}</a>";
					break;
				}
			}
			
			echo "<a href=\"".$index_str."\">".$GLOBALS['language']['index']."</a> > ";
			if($cate_info['cate_channel']>'1'){
				get_position($parent,$cate_list,$path,$list_php);
			}	
			echo $ps;
		}
	}else{
		echo "<a href=\"".$index_str."\">".$GLOBALS['language']['index']."</a> > ";
	}
}


/**
 * 获得表单信息【后台输出配置设置】
 *
 * @access  public
 * @param   $tpl_id: 模板标签中设置的tpl_id的值
 * @return  array
 */
function form($tpl_id=''){
	global $lang;
	$_confing=get_confing($GLOBALS['lang']);
	//配置信息不为空则输出配置内容
	if(empty($tpl_id)){return;}
	//获取后台配置信息
	$sql="select id from ".DB_PRE."tpl where lang='".$lang."' and tpl_id='".$tpl_id."'";
	$t_id=$GLOBALS['mysql']->fetch_asc($sql);
	$tpl_arr=get_tpl_tag_value($t_id[0]['id']);
	if(empty($tpl_arr[0])){return;}
	return form_fields($tpl_arr[0],CMS_SELF);
}



/**
 * 获得多图字段添加的图片【只能用在内容页】
 *
 * @access  public
 * @param   $name:创建的多图字段名
 * @return  array
 */
function album($name=''){
	global $id,$channel_table;
	$arr=array();
	if(empty($name)||empty($id)){return;}
	$sql="select {$name} from ".DB_PRE.$channel_table." where id={$id}";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$rel=explode(',',$rel[0][$name]);
	if(!empty($rel)){
	$num=count($rel);
	$i=1;
	 foreach($rel as $k=>$v){
	 	if(empty($v)){continue;}
	 	$sql="select id,pic_name,pic_ext,pic_alt,pic_path,pic_thumb from ".DB_PRE."uppics where id=".$v." limit 0,1";
		$pic_rel=$GLOBALS['mysql']->fetch_asc($sql);
		if(!empty($pic_rel)){
			foreach($pic_rel as $row){
				$arr[$v]['pic'] = CMS_SELF.$row['pic_path'].$row['pic_name'].'.'.$row['pic_ext'];//上传图片，大图
				$arr[$v]['alt'] = $row['pic_alt'];//图片alt
				$arr[$v]['thumb'] = empty($row['pic_thumb'])?CMS_SELF.'upload/no_pc.gif':CMS_SELF.'upload/'.$row['pic_thumb'];//缩略图,小图
			}
		}
		$arr[$v]['first']=($i==1)?1:0;
		$i=$i+1;
	 }	
	}
	return $arr;
}


/**
 * 获得客服信息
 *
 * @access  public
 * @param   无
 * @return  array
 */
function get_market(){
	if(empty($GLOBALS['lang'])){return;}
	$sql="select*from ".DB_PRE."market where lang='".$GLOBALS['lang']."' order by market_order asc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$rel_arr=array();
	if(!empty($rel)){
		foreach($rel as $k=>$row){
			if(!$row['market_is']){continue;}
			$rel_arr[$k]['market_name']=$row['market_name'];
			$rel_arr[$k]['market_num']=$row['market_num'];
			$rel_arr[$k]['market_type']=$row['market_type'];
		}
	}
	return $rel_arr;
}


/**
 * 获得语言包内容【根据需要使用】
 *
 * @access  public
 * @param   语言包中参数值
 * @return  array
 */
function weblangs($param){
	if(file_exists(LANG_PATH.'lang_'.$GLOBALS['lang'].'.php')){include(LANG_PATH.'lang_'.$GLOBALS['lang'].'.php');}
	return $language[$param];
}

/**
 * 获得后台主广告flash内容和配置
 *
 * @access  public
 * @param   无
 * @return  string
 */
function flash_ad($tpl_id=''){
global $lang;
if(empty($lang)){return;}
if(!empty($tpl_id))
{
	$cate_id_rel = $GLOBALS['mysql']->fetch_asc("select id from ".DB_PRE."flash_ad_cate where cate_tpl_id=".$tpl_id);
	$cate_id = $cate_id_rel[0]['id'];
}
else
{
	$cate_id = 1;//使用默认
}	
$rel_info=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."flash_info where lang='{$lang}' and cate_id = ".$cate_id);
$rel=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."flash_ad where lang='".$lang."' and cate_id=".$cate_id." order by pic_order asc");
$style=isset($rel_info[0]['flash_style'])?$rel_info[0]['flash_style']:1;
include(CMS_PATH.'data/flash_ad/ad_'.$style.'/flash_ad.php');
}


/**
 * 指定输出栏目链接【常用于更多或是链接地址】
 *
 * @access  public
 * @param   $cate:指定的栏目ID值
 * @return  array
 */
function get_lan_link($cate=''){
	global $channel_info,$cate_list;
	$list_php=empty($channel_info['list_php'])?'show_list.php':$channel_info['list_php'];
	$content_php=empty($channel_info['content_php'])?'show_content.php':$channel_info['content_php'];
	$arr=array('');
	$path=CMS_SELF;
	if(!empty($cate_list)){
			foreach($cate_list as $k=>$v){
				if($cate==$v['id']){
					$arr[0]['cate_name'] = $v['cate_name'];
					$arr[0]['url']       = (($v['cate_html'])&&($GLOBALS['_confing']['web_html'][0]))?$path.'htm/'.$v['cate_fold_name']:$path.$list_php.'?id='.$v['id'];
					if($v['cate_tpl']==3){
						$arr[0]['url']   = ($v['cate_html']&&$GLOBALS['_confing']['web_html'][0])?$path.'htm/'.$v['cate_fold_name'].'/':$path.$list_php.'?id='.$v['id'];
					}
				}
			}
	}	
	return $arr;	
}




/**
 * 获得列表页子栏目【可通过后台配置，没有后台配置自动获取当前栏目下子栏目】
 *
 * @access  public
 * @param   $tpl_id:模板中tpl_id的值
 * @return  array
 */
function get_list_nav($tpl_id){
	global $channel_info,$cate_info,$category,$lang;
	//获取后台配置信息
	$tpl_arr=array();
	if(!empty($tpl_id)){
		$sql="select id from ".DB_PRE."tpl where lang='".$GLOBALS['lang']."' and tpl_id='".$tpl_id."'";
		$t_id=$GLOBALS['mysql']->fetch_asc($sql);
		$tpl_arr=get_tpl_tag_value($t_id[0]['id']);
	}
	$cate=empty($tpl_arr[0])?$GLOBALS['cat_id']:$tpl_arr[0];
	//$cate=empty($cate)?0:$cate;//存在父栏目输出下级，不存在输出父栏目
	//如果当前栏目没有下级，存在上级则返回上级
	if(!empty($cate)){
		$cate_info=get_cate_info($cate,$category);
		$child_num=$GLOBALS['mysql']->fetch_asc("select COUNT(id) as haschild from ".DB_PRE."category where cate_parent=".$cate);
		$cate=($child_num[0]['haschild'])?$cate:$cate_info['cate_parent'];
	}
	
	$list_php=empty($channel_info['list_php'])?'show_list.php':$channel_info['list_php'];
	$content_php=empty($channel_info['content_php'])?'show_content.php':$channel_info['content_php'];	
	if(file_exists(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php')){include(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php');}//当前语言下的栏目
	if(!$cate){return;}
	$nav_arr=array();
	if(!empty($cate_list)){
			foreach($cate_list as $k=>$v){
				if($v['cate_parent']==$cate&&!$v['cate_hide']){
				$path=CMS_SELF;
				$nav_arr[$k]['target']=intval($v['cate_is_open'])?'target="_blank"':'';//新窗口
				if($v['cate_tpl']==2){
					$nav_arr[$k]['url']=$v['cate_url'];
				}else{
					$nav_arr[$k]['url']=(($v['cate_html'])&&($GLOBALS['_confing']['web_html'][0]))?$path.'htm/'.$v['cate_fold_name']:$path.$list_php.'?id='.$v['id'];
				if($v['cate_tpl']==3){
						$nav_arr[$k]['url']=($v['cate_html']&&$GLOBALS['_confing']['web_html'][0])?$path.'htm/'.$v['cate_fold_name'].'/':$path.$list_php.'?id='.$v['id'];
					}
				}	
				
				//表单
				if($v['cate_channel']=='-9'){
					$nav_arr[$k]['url']=(($v['cate_html'])&&($GLOBALS['_confing']['web_html'][0]))?$path.'htm/'.$v['cate_fold_name']:$path.'order/order.php?id='.$v['id'];
				}
				if($v['id']==$GLOBALS['cat_id']){
					$nav_arr[$k]['class']="focus";
				}
				
				$cate_child_info=get_cate_info($v['id'],$category);
				$nav_arr[$k]['cate_pic1']=CMS_SELF.'upload/'.$cate_child_info['cate_pic1'];
				$nav_arr[$k]['cate_pic2']=CMS_SELF.'upload/'.$cate_child_info['cate_pic2'];
				$nav_arr[$k]['cate_pic3']=CMS_SELF.'upload/'.$cate_child_info['cate_pic3'];
				$nav_arr[$k]['cate_content']=$cate_child_info['cate_content'];
				$nav_arr[$k]['cate_name']=$v['cate_name'];
				$nav_arr[$k]['id']=$v['id'];
				$nav_arr[$k]['cate_tpl']=$v['cate_tpl'];
				$nav_arr[$k]['child']=get_child_cate($v['id'],$GLOBALS['lang'],$GLOBALS['cat_id']);
				}
			}
		}
		if(!empty($nav_arr)){
		$i=1;
		$num=count($nav_arr);
		foreach($nav_arr as $k=>$v){
			$nav_arr[$k]['autoindex']=$i;
			$nav_arr[$k]['first']=($i==1)?1:0;
			$nav_arr[$k]['last']=($num==$i)?1:0;
			$i=$i+1;
		}
		}
		return $nav_arr;
}

/**
 * 获得友情链接
 *
 * @access  public
 * @param   $type 0-文字，1-图片
 * @return  array
 */
function get_link($type=0){
	global $lang;
	if(empty($lang)){return;}
	$type=empty($type)?0:$type;
	$sql="select link_name,link_url,link_logo from ".DB_PRE."link where lang='{$lang}' and link_type={$type} order by link_order desc";
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	$rel_arr=array();
	if(!empty($rel)){
		foreach($rel as $k=>$v){
			$rel_arr[$k]['link_name']=$v['link_name'];
			$rel_arr[$k]['link_url'] =$v['link_url'];
			$rel_arr[$k]['link_logo'] = ($type)?CMS_SELF.'upload/'.$v['link_logo']:'';
		}
	}
	return $rel_arr;
}


/**
 * 获得列表页分页【只能使用在列表页】
 *
 * @access  public
 * @param   无
 * @return  string
 */
function list_page(){
	global $list_php,$page,$cat_id,$r_count,$page_size,$page_count,$ishtml;
	return page('',intval($page),'&id='.$cat_id,$r_count,$page_count,$cat_id,$ishtml);
}

//输出内容列表，可通过后台配置使用
function get_article($tpl_id=''){
	global $lang,$category,$channel;
	$_confing=get_confing($GLOBALS['lang']);
	//配置信息不为空则输出配置内容
	if(empty($tpl_id)){return;}
	//获取后台配置信息
	$sql="select id from ".DB_PRE."tpl where lang='".$GLOBALS['lang']."' and tpl_id='".$tpl_id."'";
	$t_id=$GLOBALS['mysql']->fetch_asc($sql);
	$tpl_arr=get_tpl_tag_value($t_id[0]['id']);
	$a_category=isset($tpl_arr[0])?$tpl_arr[0]:0;
	if(empty($a_category)){return;}
	//获取频道表，只能获取父级栏目频道表
	$cate_info=get_cate_info($a_category,$category);
	$channel_info=get_cate_info($cate_info['cate_channel'],$channel);
	$table=$channel_info['channel_table'];
	//取得子栏目
	$child=get_child_id($a_category);
	$a_category=empty($child)?$a_category:$a_category.$child;

	$sql="select m.*,f.* from ".DB_PRE."maintb as m left join ".DB_PRE.$table." as f on m.id=f.id where m.id=f.id and m.verify=0 and ";
	$sql_all=empty($a_channel)?"m.category in (".$a_category.")":"m.channel=".$a_channel;
	$sql_all.=" and m.lang='{$lang}' ";
	//图片
	$sql_all.=$tpl_arr[1]?"and tbpic<>'' ":"";
	//标志
	switch($tpl_arr[2]){
		case 'a':
		$sql_all.="and m.filter like '%{$tpl_arr[2]}%' ";
		break;
		case 'b':
		$sql_all.="and m.filter like '%{$tpl_arr[2]}%' ";
		break;
		case 'c':
		$sql_all.="and m.filter like '%{$tpl_arr[2]}%' ";
		break;
		default:
		$sql_all.='';
		break;
	}
	//排序
	switch($tpl_arr[3]){
		case '4':
		$sql_all.='order by m.c_order desc,m.top desc, m.hits';
		break;
		case '2':
		$sql_all.='order by m.c_order desc,m.top desc, m.id';
		break;
		case '1':
		$sql_all.='order by m.c_order desc,m.top desc, m.addtime';
		break;
		case '3':
		$sql_all.='order by m.c_order desc,m.top desc, m.updatetime';
		default:
		$sql_all.='';
		break;
	}
	//升降
	$sql_all.=$tpl_arr[4]?' desc':' asc';
	//数量
	if(isset($tpl_arr[5])){$num_arr=explode(',',$tpl_arr[5]);}
	$from_num=isset($num_arr[0])?$num_arr[0]:0;
	$end_num=isset($num_arr[1])?$num_arr[1]:0;
	$sql_all.=" limit {$from_num},{$end_num}";
	$sql.=$sql_all;
    $rel=$GLOBALS['mysql']->fetch_asc($sql);
	
	$list_php=empty($channel_info['list_php'])?'show_list.php':$channel_info['list_php'];
	$content_php=empty($channel_info['content_php'])?'show_content.php':$channel_info['content_php'];
	
	if(!empty($rel)){
		$i=1;
		$num=count($rel);
		$path=CMS_SELF;
		foreach($rel as $k=>$v){
			if($titlelen){
				$rel[$k]['title']=cn_substr($v['title'],$titlelen);
			}
			//标题样式
			if($rel[$k]['title_color']||$rel[$k]['title_style']){
			$font_style='<font style="';
			$font_style.=empty($rel[$k]['title_color'])?'':'color:'.$rel[$k]['title_color'].';';
			if($rel[$k]['title_style']==1){
			$font_style.='font-weight:bold;';
			}elseif($rel[$k]['title_style']==2){
				$font_style.='font-style:italic;';
			}elseif($rel[$k]['title_style']==3){
				$font_style.='text-decoration:underline;';
			}
			$font_style.='">';
			//配置标题长度只处理样式标题长度
			$font_style.=empty($tpl_arr[6])?$rel[$k]['title']:cn_substr($rel[$k]['title'],$tpl_arr[6]);
			$font_style.="</font>";
			$rel[$k]['style_title']=$font_style;//样式标题
			}else{
			$rel[$k]['style_title']=empty($tpl_arr[6])?$rel[$k]['title']:cn_substr($rel[$k]['title'],$tpl_arr[6]);
			}
			
			$rel[$k]['target']=$v['is_open']?'target="_blank"':'';//新窗口
			$rel[$k]['url']=((!$v['is_html'])&&($_confing['web_html'][0])&&(!$v['purview']))?$path.$v['url']:$path.$content_php.'?id='.$v['id'];
			$rel[$k]['url']=($v['is_url'])?$v['url_add']:$rel[$k]['url'];
			$v['tbpic']=empty($v['tbpic'])?'no_pc.gif':$v['tbpic'];
			$rel[$k]['thumb_pic']=$path.'upload/'.$v['tbpic'];
			$rel[$k]['autoindex']=$i;
			$rel[$k]['first']=($i==1)?1:0;
			$rel[$k]['num']=$i;
			$rel[$k]['last']=($num==$i)?1:0;
			$i=$i+1;
		}
	}
	return $rel;
}

//标示内容,可通过后台配置使用
function get_block($tpl_id){
	if(empty($tpl_id)){return;}
	//获取后台配置信息
	$sql="select id from ".DB_PRE."tpl where lang='".$GLOBALS['lang']."' and tpl_id='".$tpl_id."'";
	$t_id=$GLOBALS['mysql']->fetch_asc($sql);
	$tpl_arr=get_tpl_tag_value($t_id[0]['id']);
	if(empty($tpl_arr[0])){return;}
	$block=$GLOBALS['mysql']->fetch_asc("select content from ".DB_PRE."block where id=".$tpl_arr[0]);
	return $block[0]['content'];
}

//输出语言种类
//$row输出数量
function lang($row=''){
	if(file_exists(DATA_PATH.'cache/lang_cache.php')){include(DATA_PATH.'cache/lang_cache.php');}//载入语言缓存
	global $lang;
	$_confing=get_confing($GLOBALS['lang']);
	$path=CMS_SELF;//安装根目录
	$arr=array();
	if(!empty($lang_cache)){
	$num=count($lang_cache);
	$i=0;
		foreach($lang_cache as $k=>$v){
			if(!$v['lang_is_use']){
				unset($lang_cache[$k]);
				continue;
			}
			if($v['lang_is_url']){
			$arr[$k]['url']=$v['lang_url'];
			}else{
			if(file_exists(DATA_PATH.$v['lang_tag'].'_info.php')){include(DATA_PATH.$v['lang_tag'].'_info.php');}
			$is_html=isset($_confing['web_html'][0])?$_confing['web_html'][0]:'';
			//主要访问语言
			if(get_index_url($v['lang_tag'])){
				$arr[$k]['url']=$path;
			}else{
				$arr[$k]['url']=($is_html)?$path.'index_'.$v['lang_tag'].'.html':$path.'index.php?lang='.$v['lang_tag'];
			}
			unset($_confing);
			}
			$arr[$k]['lang'] = $v['lang_tag'];
			$arr[$k]['target']=$v['lang_is_open']?'target="_blank"':'';//新窗口
			$arr[$k]['class']=($v['lang_tag']==$lang)?"class=\"focus\"":"";
			$arr[$k]['lang_name']=$v['lang_name'];
			$arr[$k]['first']=($i==0)?1:0;
			$i=$i+1;
			$arr[$k]['last']=($num==$i)?1:0;
			
		}
	}
	return $arr;
}

//中间导航
function nav_middle(){
	global $lang,$cat_id,$cateid,$parent_id;
	if(file_exists(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php')){include(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php');}//当前语言下的栏目
	$_confing=get_confing($GLOBALS['lang']);
	$rel=array();
	$is_main_lang=get_index_url($lang);//是否是进站语言
	$cat_id=empty($cat_id)?$cateid:$cat_id;//判断当前栏目ID，输出高亮
	if(!empty($cate_list)){
		foreach($cate_list as $k=>$v){
		$cate_nav=empty($v['cate_nav'])?array(''):explode(',',$v['cate_nav']);
		if(in_array('2',$cate_nav)){
			if($v['cate_hide']){
				unset($cate_list[$k]);
				continue;
			}
			
			$channel_info=get_cate_info($v['cate_channel'],$GLOBALS['channel']);//获得内容模型信息
			$list_php=$channel_info['list_php'];

			$path=CMS_SELF;
			$rel[$k]=$cate_list[$k];
			if($v['cate_tpl']==2){
				$url=$v['cate_url'];
			}else{
				$url=($v['cate_html']&&$_confing['web_html'][0])?$path.'htm/'.$v['cate_fold_name']:$path.$list_php.'?id='.$v['id'];
				if($v['cate_tpl']==3){
					$url=($v['cate_html']&&$_confing['web_html'][0])?$path.'htm/'.$v['cate_fold_name'].'/':$path.$list_php.'?id='.$v['id'];
				}
				//表单
				if($v['cate_channel']=='-9'){
					$url=($v['cate_html']&&$_confing['web_html'][0])?$path.'htm/'.$v['cate_fold_name']:$path.'order/order.php?id='.$v['id'];
				}
			}
			$rel[$k]['cate_pic1']=CMS_SELF.'upload/'.$v['cate_pic1'];
			$rel[$k]['cate_pic2']=CMS_SELF.'upload/'.$v['cate_pic2'];
			$rel[$k]['cate_pic3']=CMS_SELF.'upload/'.$v['cate_pic3'];
			$rel[$k]['class']='';
			if($parent_id==$v['id']){$rel[$k]['class']="focus";}
			$rel[$k]['url']=$url;
			$rel[$k]['cate_name']=$v['cate_name'];
			$rel[$k]['target']=intval($v['cate_is_open'])?'target="_blank"':'';
			$rel[$k]['child']=get_child_cate($v['id'],$lang);
		}else{
			unset($cate_list[$k]);
		}
		}
	}
	//存在留言本放在后面
	$sql="select book_pos from ".DB_PRE."book_info where id=1";
	$pos=$GLOBALS['mysql']->get_row($sql);
	$pos_arr=empty($pos)?array():explode(',',$pos);
	$is_book=(is_array($pos_arr))?in_array('1',$pos_arr):'';
	if($is_book){
		$book['cate_name']=$GLOBALS['language']['book'];
		if($is_main_lang)
		{
			$book['url']=CMS_SELF.'book/book.php';
		}
		else
		{
			$book['url']=CMS_SELF.'book/book.php?lang='.$lang;
		}
		$book['class']=$GLOBALS['book_focus'];
		$rel[]=$book;
	}
	
	if(!empty($rel)){
		$i=1;
		$num=count($rel);
		foreach($rel as $k=>$v){
			$rel[$k]['autoindex']=$i;
			$rel[$k]['first']=($i==1)?1:0;
			$rel[$k]['last']=($num==$i)?1:0;
			$i=$i+1;
		}
	}
	return $rel;
}

//底部导航
function nav_bottom(){
	global $lang,$cat_id,$language,$cate_list;
	$_confing=get_confing($GLOBALS['lang']);
	if(file_exists(DATA_PATH.$lang.'_info.php')){include(DATA_PATH.$lang.'_info.php');}
	if(file_exists(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php')){include(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php');}//当前语言下的栏目
	$rel=array();
	$is_main_lang=get_index_url($lang);//是否是进站语言
	$path=CMS_SELF;
	if(!empty($cate_list)){
		foreach($cate_list as $k=>$v){
		$cate_nav=empty($v['cate_nav'])?array(''):explode(',',$v['cate_nav']);
		if(in_array('3',$cate_nav)){
			if($v['cate_hide']){
				unset($cate_list[$k]);
				continue;
			}
			
			$channel_info=get_cate_info($v['cate_channel'],$GLOBALS['channel']);//获得内容模型信息
			$list_php=empty($channel_info['list_php'])?'show_list.php':$channel_info['list_php'];
			
			$rel[$k]=$cate_list[$k];
			$rel[$k]['cate_pic1']=CMS_SELF.'upload/'.$v['cate_pic1'];
			$rel[$k]['cate_pic2']=CMS_SELF.'upload/'.$v['cate_pic2'];
			$rel[$k]['cate_pic3']=CMS_SELF.'upload/'.$v['cate_pic3'];
			$rel[$k]['target']=intval($v['cate_is_open'])?'target="_blank"':'';//新窗口
			if($v['cate_tpl']==2){
			$url=$v['cate_url'];
			}else{
			$url=($v['cate_html']&&$_confing['web_html'][0])?$path.'htm/'.$v['cate_fold_name']:$path.$list_php.'?id='.$v['id'];
			if($v['cate_tpl']==3){
			$url=($v['cate_html']&&$_confing['web_html'][0])?$path.'htm/'.$v['cate_fold_name'].'/':$path.$list_php.'?id='.$v['id'];
			}
			//表单
			if($v['cate_channel']=='-9'){
				$url=($v['cate_html']&&$_confing['web_html'][0])?$path.'htm/'.$v['cate_fold_name']:$path.'order/order.php?id='.$v['id'];
			}
			}
			$rel[$k]['url']=$url;
		}else{
			unset($cate_list[$k]);
		}
		}
	}
	
	if($is_main_lang)
	{
		$map_arr['url']=$_confing['web_html'][0]?$path.'htm/'.$lang.'_sitemap.html':$path.'sitemap/sitemap.php';
	}
	else
	{
		$map_arr['url']=$_confing['web_html'][0]?$path.'htm/'.$lang.'_sitemap.html':$path.'sitemap/sitemap.php?lang='.$lang;
	}
	$map_arr['cate_name']=$language['sitemap'];
	$rel[]=$map_arr;
	//存在留言本放在后面
	$sql="select book_pos from ".DB_PRE."book_info where id=1";
	$pos=$GLOBALS['mysql']->get_row($sql);
	$pos_arr=empty($pos)?array():explode(',',$pos);
	$is_book=(is_array($pos_arr))?in_array('2',$pos_arr):'';
	if($is_book){
		$book['cate_name']=$GLOBALS['language']['book'];
		if($is_main_lang)
		{
			$book['url']=CMS_SELF.'book/book.php';
		}
		else
		{
			$book['url']=CMS_SELF.'book/book.php?lang='.$lang;
		}
		$rel[]=$book;
	}
	if(!empty($rel)){
		$i=1;
		$num=count($rel);
		foreach($rel as $k=>$v){
			$rel[$k]['autoindex']=$i;
			$rel[$k]['first']=($i==1)?1:0;
			$rel[$k]['last']=($num==$i)?1:0;
			$i=$i+1;
		}
	}
	return $rel;
}

//热门搜索关键字
function get_hot_words(){
	$_confing=get_confing($GLOBALS['lang']);
	if(empty($_confing['hot_key'])){return;}
	$rel=explode('|',$_confing['hot_key']);
	$arr=array();
	foreach($rel as $k=>$v){
		$arr[$k]['url']=CMS_SELF.'search/search.php?lang='.$GLOBALS['lang'].'&key='.$v;
		$arr[$k]['name']=$v;
	}
	return $arr;
}

//搜索
function get_search(){
global $channel;
if(!empty($GLOBALS['key'])){
$rel_search=$GLOBALS['mysql']->fetch_asc('select*from '.DB_PRE."maintb where lang='".$GLOBALS['lang']."' and (title like '%".$GLOBALS['key']."%' or info like '%".$GLOBALS['key']."%') order by id desc limit ".$GLOBALS['pagenum'].",".$GLOBALS['pagesize']);
$rel=array();
if(!empty($rel_search)){
foreach($rel_search as $k=>$v){
	if($v['channel']==1){continue;}
	
	$channel_info=get_cate_info($v['channel'],$GLOBALS['channel']);//获得内容模型信息
	$content_php=empty($channel_info['content_php'])?'show_content.php':$channel_info['content_php'];
	
	$rel[$k]['title']=str_replace($GLOBALS['key'],'<span style="color:red">'.$GLOBALS['key'].'</span>',$v['title']);
	$rel[$k]['info']=str_replace($GLOBALS['key'],'<span style="color:red">'.$GLOBALS['key'].'</span>',$v['info']);
	$rel[$k]['url']=((!$v['is_html'])&&($GLOBALS['_confing']['web_html'][0])&&(!$v['purview']))?CMS_SELF.$v['url']:CMS_SELF.$content_php.'?id='.$v['id'];
	$rel[$k]['url']=($v['is_url'])?$v['url_add']:$rel[$k]['url'];
}
}
}
return $rel;
}


//搜索列表分页
function get_search_page(){
	global $page,$query,$total_num,$total_page;
	return page('',$page,$query,$total_num,$total_page,'',1);
}

//网站地图
function get_sitemap(){
	$_confing=get_confing($GLOBALS['lang']);
	if(empty($GLOBALS['lang'])){return;}
	$parent=$GLOBALS['mysql']->fetch_asc("select*from ".DB_PRE."category where cate_parent=0 and lang='".$GLOBALS['lang']."' order by cate_order desc");
	$path=CMS_SELF;
	$rel=array();
	if(!empty($parent)){
		foreach($parent as $row){
			
			$channel_info=get_cate_info($row['cate_channel'],$GLOBALS['channel']);//获得内容模型信息
			$list_php=empty($channel_info['list_php'])?'show_list.php':$channel_info['list_php'];
	
			$url=($row['cate_html']&&$_confing['web_html'][0])?$path.'htm/'.$row['cate_fold_name']:$path.$list_php.'?id='.$row['id'];
			if($row['cate_tpl']==3){
			$url=($row['cate_html']&&$_confing['web_html'][0])?$path.'htm/'.$row['cate_fold_name'].'/':$path.$list_php.'?id='.$row['id'];
			}
			$rel[$row['id']]['url']=$url;
			$rel[$row['id']]['name']=$row['cate_name'];
			$rel[$row['id']]['child']=get_sitemap_child($row['id']);
			
		}
	}
	return $rel;
}


/**
 * 获得模型表内容
 *
 * @access  public
 * @param   $table:模型表;$filter:过滤标示(如推荐等);$order:排序;$pic:是否有图片;$limit:数量
 * @return  array
 */
 
 function get_channel_content($table,$limit='0,5',$order_type='id',$filter='',$pic='no',$order='desc',$lang=''){
 	if(empty($table)){return;}
	global $category,$channel;
 	$sql="select m.*,a.* from ".DB_PRE."maintb as m left join ".DB_PRE.$table." as a on m.id=a.id where m.id=a.id and m.verify=0";
	$sql.=empty($filter)?'':" and m.filter like '%".$filter."%'";
	if($pic=='no'){
		$sql.='';
	}elseif($pic=='yes'){
		$sql.=" and m.tbpic != ''";
	}
	$sql.=(empty($lang))?" and m.lang='".$GLOBALS['lang']."'":" and m.lang='".$lang."'";
	$sql.=(in_array($order_type,array('id','hits','addtime','updatetime')))?" GROUP BY m.id order by m.top desc, m.".$order_type:" GROUP BY m.id order by m.c_order desc,m.top desc, m.id ";
	$sql.=(in_array($order,array('asc','desc')))?' '.$order:' desc';
	$sql.=empty($limit)?' limit 0,5':" limit ".$limit;
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	//获取频道表，只能获取父级栏目频道表
	
	$channel_info=get_cate_info($row['cate_channel'],$GLOBALS['channel']);//获得内容模型信息
	$list_php=empty($channel_info['list_php'])?'show_list.php':$channel_info['list_php'];
	
	$arr=array();
	if(!empty($rel)){
		$path=CMS_SELF;
		$i=1;
		foreach($rel as $k=>$v){
			$rel[$k]['title'] = $v['title'];//标题
			if($rel[$k]['title_color']||$rel[$k]['title_style']||$rel[$k]['is_open']){
			$font_style='';
			$font_style.=empty($rel[$k]['title_color'])?'':'color:'.$rel[$k]['title_color'].';';
			if($rel[$k]['title_style']==1){
			$font_style.='font-weight:bold;';
			}elseif($rel[$k]['title_style']==2){
				$font_style.='font-style:italic;';
			}elseif($rel[$k]['title_style']==3){
				$font_style.='text-decoration:underline;';
			}
			$rel[$k]['style']=$font_style;
			$rel[$k]['style_title']=$rel[$k]['title'];//样式标题
			}else{
			$rel[$k]['style_title']=$rel[$k]['title'];
			}
			$rel[$k]['target']=$v['is_open']?'target="_blank"':'';//新窗口	
			if($v['purview']){
				$url=$path.'show_content.php?id='.$v['id'];
			}else{
				$url=(!$v['is_html']&&!($GLOBALS['_confing']['web_html'][0]))?$path.'show_content.php?id='.$v['id']:$path.$v['url'];
			}	
			$rel[$k]['url']=($v['is_url'])?$v['url_add']:$url;//链接
			$v['tbpic']=empty($v['tbpic'])?'no_pc.gif':$v['tbpic'];
			$rel[$k]['thumb_pic']=CMS_SELF.'upload/'.$v['tbpic'];//图片
			$cate_info=get_cate_info($v['category'],$category);//获取栏目信息
			$cate_url=(!$v['is_html']&&!($GLOBALS['_confing']['web_html'][0]))?$path.'show_list.php?id='.$cate_info['id']:$path.$cate_info['cate_fold_name'];
			$rel[$k]['cate_url'] = $cate_url;//栏目url
			$rel[$k]['cate_name'] = $cate_info['cate_name'];//栏目名称
			$rel[$k]['cate_pic1']=CMS_SELF.'upload/'.$cate_info['cate_pic1'];
			$rel[$k]['cate_pic2']=CMS_SELF.'upload/'.$cate_info['cate_pic2'];
			$rel[$k]['cate_pic3']=CMS_SELF.'upload/'.$cate_info['cate_pic3'];
			$rel[$k]['cate_content']=CMS_SELF.'upload/'.$cate_info['cate_content'];
			$rel[$k]['autoindex']=$i;
			$rel[$k]['first']=($i==1)?1:0;
			$rel[$k]['last']=($num==$i)?1:0;
			$i=$i+1;
		}
		
	}
	return $rel;
 }
 
 /**
 * 通过栏目id获得指定栏目内容,栏目id为多个用,分割；只能获取同一模型下的内容
 *
 * @access  public
 * @param   $cate_id:栏目id;$filter:过滤标示(如推荐等);$order:排序;$pic:是否有图片;$limit:数量
 * @return  array
 */
function get_cate_content($cate_id='',$limit='0,5',$order_type='id',$filter='',$pic='no',$order='desc',$lang=''){
 	if(empty($cate_id)){return;}
	global $category , $channel;
	$cate_id_rel = explode(',',$cate_id);
	$cate_info=get_cate_info($cate_id_rel[0],$category);//获得栏目信息
	$channel_id = $cate_info['cate_channel'];//获得栏目模型ID
	unset($cate_info);//释放栏目信息，下面将会用到
	$channel_info = get_cate_info($channel_id,$channel);//获得栏目模型信息
	
	$content_php=empty($channel_info['content_php'])?'show_content.php':$channel_info['content_php'];
	$list_php=empty($channel_info['list_php'])?'show_list.php':$channel_info['list_php'];
	
	$table = $channel_info['channel_table'];//获得栏目模型表
	if(count($cate_id_rel)>1)
	{//多个栏目
		$cate_id_all=$cate_id;
	}
	else
	{//一个栏目获取该栏目下级栏目
		$child = get_child_id($cate_id);//获得栏目的下级栏目
		$cate_id_all=empty($child)?$cate_id:$cate_id.$child;//组合栏目ID
	}
	$sql="select m.*,f.* from ".DB_PRE."maintb as m left join ".DB_PRE.$table." as f on f.id = m.id where m.id=f.id and m.verify=0 and m.category in (".$cate_id_all.")";
	$sql.=empty($filter)?'':" and m.filter like '%".$filter."%'";
	if($pic=='no'){
		$sql.='';
	}elseif($pic=='yes'){
		$sql.=" and m.tbpic <> ''";
	}
	$sql.=(empty($lang))?" and m.lang='".$GLOBALS['lang']."'":" and m.lang='".$lang."'";
	$sql.=(in_array($order_type,array('id','hits','addtime','updatetime')))?" GROUP BY m.id order by m.c_order desc,m.top desc, m.".$order_type:" GROUP BY m.id order by m.c_order desc, m.top desc, m.id ";
	$sql.=(in_array($order,array('asc','desc')))?' '.$order:' desc';
	$sql.=empty($limit)?' limit 0,5':" limit ".$limit;
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	if(!empty($rel)){
		$path=CMS_SELF;
		$i=1;
		foreach($rel as $k=>$v){
			$rel[$k]['title'] = $v['title'];//标题
			if($rel[$k]['title_color']||$rel[$k]['title_style']||$rel[$k]['is_open']){
			$font_style='';
			$font_style.=empty($rel[$k]['title_color'])?'':'color:'.$rel[$k]['title_color'].';';
			if($rel[$k]['title_style']==1){
			$font_style.='font-weight:bold;';
			}elseif($rel[$k]['title_style']==2){
				$font_style.='font-style:italic;';
			}elseif($rel[$k]['title_style']==3){
				$font_style.='text-decoration:underline;';
			}
			$rel[$k]['style']=$font_style;
			$rel[$k]['style_title']=$rel[$k]['title'];//样式标题
			}else{
			$rel[$k]['style_title']=$rel[$k]['title'];
			}
			$rel[$k]['target']=$v['is_open']?'target="_blank"':'';//新窗口	
			if($v['purview']){
				$url=$path.$content_php.'?id='.$v['id'];
			}else{
				$url=(!$v['is_html']&&!($GLOBALS['_confing']['web_html'][0]))?$path.$content_php.'?id='.$v['id']:$path.$v['url'];
			}	
			$rel[$k]['url']=($v['is_url'])?$v['url_add']:$url;//链接
			$v['tbpic']=empty($v['tbpic'])?'no_pc.gif':$v['tbpic'];
			$rel[$k]['thumb_pic']=CMS_SELF.'upload/'.$v['tbpic'];//图片
			$cate_info=get_cate_info($v['category'],$category);//获取栏目信息
			$cate_url=(!$v['is_html']&&!($GLOBALS['_confing']['web_html'][0]))?$path.$list_php.'?id='.$cate_info['id']:$path.'htm/'.$cate_info['cate_fold_name'];
			$rel[$k]['cate_url'] = $cate_url;//栏目url
			$rel[$k]['cate_name'] = $cate_info['cate_name'];//栏目名称
			$rel[$k]['cate_pic1']=CMS_SELF.'upload/'.$cate_info['cate_pic1'];
			$rel[$k]['cate_pic2']=CMS_SELF.'upload/'.$cate_info['cate_pic2'];
			$rel[$k]['cate_pic3']=CMS_SELF.'upload/'.$cate_info['cate_pic3'];
			$rel[$k]['cate_content']=CMS_SELF.'upload/'.$cate_info['cate_content'];
			$rel[$k]['autoindex']=$i;
			$rel[$k]['first']=($i==1)?1:0;
			$rel[$k]['last']=($num==$i)?1:0;
			$i=$i+1;
		}
	}
	return $rel;
}

 /**
 * 获得片段内容，通过标识获取
 *
 * @access  public
 * @param   $block:标示名
 * @return  string[返回标示内容]
 */
 function get_block_content($block=''){
 	if(empty($block)){return;}
	$sql="select content from ".DB_PRE."block where tag = '".$block."' and lang='".$GLOBALS['lang']."'";
	$rel = $GLOBALS['mysql']->fetch_asc($sql);
	return $rel[0]['content'];
 }
 
 
  /**
 * 获得其它内容【列表页和内容页自动获取】
 *
 * @access  public
 * @param   $cate_id:栏目id;$filter:过滤标示(如推荐等);$order_type:排序类型;$pic:是否有图片;$limit:数量
 * @return  array
 */
  function get_else_content($cate_id='',$limit='0,5',$order_type='id',$filter='',$pic='no',$order='desc',$lang=''){
  	$cate_id = empty($cate_id)?$GLOBALS['cateid']:$cate_id;//获得栏目ID，不存在获取内容页的栏目ID
	if(empty($cate_id)){return;}
	global $category,$channel;
	$cate_info=get_cate_info($cate_id,$category);//获得栏目信息
	$channel_id = $cate_info['cate_channel'];//获得栏目模型ID
	if($channel_id=='1'){return;}
	unset($cate_info);//释放栏目信息，下面将会用到
	$channel_info = get_cate_info($channel_id,$channel);//获得栏目模型信息
	
	$content_php=empty($channel_info['content_php'])?'show_content.php':$channel_info['content_php'];
	$list_php=empty($channel_info['list_php'])?'show_list.php':$channel_info['list_php'];
	
	$table = $channel_info['channel_table'];//获得栏目模型表
	if(empty($table)){return;}
	$child = get_child_id($cate_id);//获得栏目的下级栏目
	$cate_id_all=empty($child)?$cate_id:$cate_id.$child;//组合栏目ID
	$sql="select m.*,f.* from ".DB_PRE."maintb as m left join ".DB_PRE.$table." as f on f.id = m.id where m.id=f.id and m.verify=0 and m.category in (".$cate_id_all.")";
	$sql.=empty($filter)?'':" and m.filter like '%".$filter."%'";
	if($pic=='no'){
		$sql.='';
	}elseif($pic=='yes'){
		$sql.=" and m.tbpic <> ''";
	}
	$sql.=(empty($lang))?" and m.lang='".$GLOBALS['lang']."'":" and m.lang='".$lang."'";
	$sql.=(in_array($order_type,array('id','hits','addtime','updatetime')))?" GROUP BY m.id order by m.c_order desc,m.top desc, m.".$order_type:" GROUP BY m.id order by m.c_order desc,m.top desc, m.id ";
	$sql.=(in_array($order,array('asc','desc')))?' '.$order:' desc';
	$sql.=empty($limit)?' limit 0,5':" limit ".$limit;
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	if(!empty($rel)){
		$path=CMS_SELF;
		$i=1;
		foreach($rel as $k=>$v){
			$rel[$k]['title'] = $v['title'];//标题
			if($rel[$k]['title_color']||$rel[$k]['title_style']||$rel[$k]['is_open']){
			$font_style='';
			$font_style.=empty($rel[$k]['title_color'])?'':'color:'.$rel[$k]['title_color'].';';
			if($rel[$k]['title_style']==1){
			$font_style.='font-weight:bold;';
			}elseif($rel[$k]['title_style']==2){
				$font_style.='font-style:italic;';
			}elseif($rel[$k]['title_style']==3){
				$font_style.='text-decoration:underline;';
			}
			$rel[$k]['style'] = $font_style;
			$rel[$k]['style_title']=$rel[$k]['title'];//样式标题
			}else{
			$rel[$k]['style_title']=$rel[$k]['title'];
			}
			$rel[$k]['target']=$v['is_open']?'target="_blank"':'';//新窗口	
			if($v['purview']){
				$url=$path.'show_content.php?id='.$v['id'];
			}else{
				$url=(!$v['is_html']&&!($GLOBALS['_confing']['web_html'][0]))?$path.$content_php.'?id='.$v['id']:$path.$v['url'];
			}	
			$rel[$k]['url']=($v['is_url'])?$v['url_add']:$url;//链接
			$v['tbpic']=empty($v['tbpic'])?'no_pc.gif':$v['tbpic'];
			$rel[$k]['thumb_pic']=CMS_SELF.'upload/'.$v['tbpic'];//图片
			$cate_info=get_cate_info($v['category'],$category);//获取栏目信息
			$cate_url=(!$v['is_html']&&!($GLOBALS['_confing']['web_html'][0]))?$path.$list_php.'?id='.$cate_info['id']:$path.$cate_info['cate_fold_name'];
			$rel[$k]['cate_url'] = $cate_url;//栏目url
			$rel[$k]['cate_name'] = $cate_info['cate_name'];//栏目名称
			$rel[$k]['cate_pic1']=CMS_SELF.'upload/'.$cate_info['cate_pic1'];
			$rel[$k]['cate_pic2']=CMS_SELF.'upload/'.$cate_info['cate_pic2'];
			$rel[$k]['cate_pic3']=CMS_SELF.'upload/'.$cate_info['cate_pic3'];
			$rel[$k]['cate_content']=CMS_SELF.'upload/'.$cate_info['cate_content'];
			$rel[$k]['autoindex']=$i;
			$rel[$k]['first']=($i==1)?1:0;
			$rel[$k]['last']=($num==$i)?1:0;
			$i=$i+1;
		}
	}
	return $rel;
	
  }
  
  
 /**
 * 获得表单【后台可添加表单】
 *
 * @access  public
 * @param   $form_id:表单标示
 * @return  string
 */
 
 function get_form($form_id=''){
 	if(empty($form_id)){
		$sql="select form_id from ".DB_PRE."category where id=".intval($GLOBALS['id']);
		$rel=$GLOBALS['mysql']->fetch_asc($sql);
		return empty($rel[0]['form_id'])?'':form_fields($rel[0]['form_id'],CMS_SELF);
	}else{
		return form_fields($form_id,CMS_SELF);
	}
 }
 
 
 /**
 * 获得留言内容
 *
 * @access  public
 * @param   $limit:数量;$lang:语言标示;$is_reply:过滤留言,1为回复。0为所有;$order:排序，id为id排序,addtime为时间排序
 * @return  array
 */
 function get_book_content($limit='0,5',$order='addtime',$is_reply='0',$lang=''){
	$lang=empty($lang)?$GLOBALS['lang']:$lang;
	$sql="select*from ".DB_PRE."book where verify=1 and lang='".$lang."'";
	$sql.=($is_reply)?" and reply <> ''":'';
	$sql.=empty($order)?" order by addtime desc":" order by ".$order." desc";
	$sql.=empty($limit)?" limit 0,5":" limit ".$limit;
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	return $rel;	
 }
 
 
 /**
 * 返回内容页内容
 *
 * @access  public
 * @param   $param - 主表或是附表字段
 * @return  array
 */
 function content($param=''){
	return $GLOBALS['content'][$param];
 }
 
  /**
 * 返回程序页中定义的变量值
 *
 * @access  public
 * @param   $param - 返回程序页中定义的变量值
 * @return  array
 */
 function get_web_param($param=''){
 	return $GLOBALS[$param];
 }
 
   /**
 * 获取模型表主表中的字段值，根据ID值获取,该函数未作错误检测，要建好模型和内容后才能使用
 *
 * @access  public
 * @param   $id-添加的内容ID值，$tabel-模型表，$field-表中的字段
 * @return  array
 */
 function get_table_field_value($id='',$table='',$field=''){
 	if(empty($id)||empty($table)||empty($field)){return;}
	$sql="select {$field} from ".DB_PRE.$table." where id=".$id;
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	return $rel[0];
 }

   /**
 * 根据模板ID值获取栏目信息和栏目相关内容
 *
 * @access  public
 * @param   $tpl_id:模板标示id;$filter:过滤标示(如推荐等);$order_type:排序类型;$pic:是否有图片;$limit:数量
 * @return  array
 */
 function get_tpl_cate_content($tpl_id='',$limit='0,5',$order_type='id',$filter='',$pic='no',$order='desc',$lang=''){
 	$tpl_id = empty($tpl_id)?'':intval($tpl_id);//获得栏目模板ID，不存在获取内容页的栏目模板ID
	$lang=empty($lang)?$GLOBALS['lang']:$lang;
	if(empty($tpl_id)){return;}
	global $category,$channel;
	$_confing=get_confing($GLOBALS['lang']);
	
	
	$sql="SELECT id,cate_tpl,cate_is_open,cate_html,cate_name,cate_title_seo,cate_channel,cate_fold_name,cate_url,cate_pic1,cate_pic2,cate_pic3,cate_content from ".DB_PRE."category WHERE lang='".$lang."' and cate_hide=0 and cate_channel != -9 AND cate_channel != 1 AND temp_id=".$tpl_id;
	$cate_rel=$GLOBALS['mysql']->fetch_asc($sql);
	$cate_id=$cate_rel[0]['id'];//获得栏目信息
	$channel_id=$cate_rel[0]['cate_channel'];//内容模型id
	$channel_info = get_cate_info($channel_id,$channel);//获得栏目模型信息
	
	$content_php=empty($channel_info['content_php'])?'show_content.php':$channel_info['content_php'];
	$list_php=empty($channel_info['list_php'])?'show_list.php':$channel_info['list_php'];
	
	if(empty($cate_id)){return;}
	$return_arr=array();
	$return_arr['cate']['cate_name']=$cate_rel[0]['cate_name'];//栏目名称
	if($cate_rel[0]['cate_tpl']==2){
		$cate_url=$cate_rel[0]['cate_url'];
	}else{
		$cate_url=($cate_rel[0]['cate_html']&&$_confing['web_html'][0])?CMS_SELF.'htm/'.$cate_rel[0]['cate_fold_name']:$path.$list_php.'?id='.$cate_rel[0]['id'];
	}
	$return_arr['cate']['cate_url']=$cate_url;//栏目地址
	$rerurn_arr['cate']['target']=intval($cate_rel[0]['cate_is_open'])?'target="_blank"':'';//是否新窗口
	$rerurn_arr['cate']['cate_pi1']=empty($cate_rel[0]['cate_pic1'])?'':CMS_SELF.'upload/'.$cate_rel[0]['cate_pic1'];
	$rerurn_arr['cate']['cate_pi2']=empty($cate_rel[0]['cate_pic2'])?'':CMS_SELF.'upload/'.$cate_rel[0]['cate_pic2'];
	$rerurn_arr['cate']['cate_pi3']=empty($cate_rel[0]['cate_pic3'])?'':CMS_SELF.'upload/'.$cate_rel[0]['cate_pic3'];
	$rerurn_arr['cate']['cate_content']=$cate_rel[0]['cate_content'];
	
	
	
	$table = $channel_info['channel_table'];//获得栏目模型表
	$child = get_child_id($cate_id);//获得栏目的下级栏目
	$cate_id_all=empty($child)?$cate_id:$cate_id.$child;//组合栏目ID
	
	$sql="select m.*,f.* from ".DB_PRE."maintb as m left join ".DB_PRE.$table." as f on f.id = m.id where m.id=f.id and m.verify=0 and m.category in (".$cate_id_all.")";
	$sql.=empty($filter)?'':" and m.filter like '%".$filter."%'";
	if($pic=='no'){
		$sql.='';
	}elseif($pic=='yes'){
		$sql.=" and m.tbpic <> ''";
	}
	$sql.=" and m.lang='".$lang."'";
	$sql.=(in_array($order_type,array('id','hits','addtime','updatetime')))?" GROUP BY m.id order by m.c_order desc,m.top desc, m.".$order_type:" GROUP BY  m.id order by m.c_order desc,m.top desc, m.id ";
	$sql.=(in_array($order,array('asc','desc')))?' '.$order:' desc';
	$sql.=empty($limit)?' limit 0,5':" limit ".$limit;
	
	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	
	if(!empty($rel)){
		$num = count($rel);
		$path=CMS_SELF;
		$i=1;
		foreach($rel as $k=>$v){
			$rel[$k]['title'] = $v['title'];//标题
			if($v['title_color']||$v['title_style']||$v['is_open']){
			$font_style='';
			$font_style.=empty($v['title_color'])?'':'color:'.$v['title_color'].';';
			if($v['title_style']==1){
			$font_style.='font-weight:bold;';
			}elseif($v['title_style']==2){
				$font_style.='font-style:italic;';
			}elseif($v['title_style']==3){
				$font_style.='text-decoration:underline;';
			}
			$rel[$k]['style'] = $font_style;
			$rel[$k]['style_title']=$v['title'];//样式标题
			}else{
			$rel[$k]['style_title']=$v['title'];
			}
			$rel[$k]['target']=$v['is_open']?'target="_blank"':'';//新窗口	
			if($v['purview']){
				$url=$path.$content_php.'?id='.$v['id'];
			}else{
				$url=(!$v['is_html']&&!($GLOBALS['_confing']['web_html'][0]))?$path.$content_php.'?id='.$v['id']:$path.$v['url'];
			}	
			$rel[$k]['url']=($v['is_url'])?$v['url_add']:$url;//链接
			$v['tbpic']=empty($v['tbpic'])?'no_pc.gif':$v['tbpic'];
			$rel[$k]['thumb_pic']=CMS_SELF.'upload/'.$v['tbpic'];//图片
			$cate_info=get_cate_info($v['category'],$category);//获取栏目信息
			$cate_url=(!$v['is_html']&&!($GLOBALS['_confing']['web_html'][0]))?$path.$list_php.'?id='.$cate_info['id']:$path.$cate_info['cate_fold_name'];
			$rel[$k]['cate_url'] = $cate_url;//栏目url
			$rel[$k]['cate_name'] = $cate_info['cate_name'];//栏目名称
			$rel[$k]['autoindex']=$i;
			$rel[$k]['first']=($i==1)?1:0;
			$rel[$k]['last']=($num==$i)?1:0;
			$i=$i+1;
		}
	}
	$return_arr['contents']=$rel;
	return $return_arr;
 }
 
   /**
 * 通过模板id取得当前栏目下的子栏目及其内容
 *
 * @access  public
 * @param   $id-添加的内容ID值，$tabel-模型表，$field-表中的字段
 * @return  array
 */ 
 function get_all_cate_content($tpl_id='',$content='no',$limit='0,5',$order_type='id',$filter='',$pic='no',$order='desc',$lang=''){
 	$tpl_id = empty($tpl_id)?'':intval($tpl_id);//获得栏目模板ID，不存在获取内容页的栏目模板ID
	$lang=empty($lang)?$GLOBALS['lang']:$lang;
	if(empty($tpl_id)){return;}
	//提前载入栏目和模型缓存，方便使用
	global $category,$channel;
	$_confing=get_confing($GLOBALS['lang']);
	
	$sql="SELECT id from ".DB_PRE."category WHERE lang='".$lang."' AND temp_id=".$tpl_id;
	$cate_rel=$GLOBALS['mysql']->fetch_asc($sql);
	$parent=$cate_rel[0]['id'];
	unset($cate_rel);
	if(empty($parent)){return;}
	$sql="SELECT id,cate_tpl,cate_is_open,cate_html,cate_name,cate_title_seo,cate_channel,cate_fold_name,cate_url,cate_pic1,cate_pic2,cate_pic3,cate_content from ".DB_PRE."category WHERE lang='".$lang."' and cate_hide=0 and cate_channel != -9 AND cate_channel != 1 AND cate_parent=".$parent;
	$cate_rel=$GLOBALS['mysql']->fetch_asc($sql);
	$return_arr=array();
	$cate_arr=array();
	$cate_loop=array();
	
	if(!empty($cate_rel)){
		foreach($cate_rel as $c_v){
			
			$channel_info = get_cate_info($v['cate_channel'],$GLOBALS['channel']);//获得栏目模型信息
			$content_php=empty($channel_info['content_php'])?'show_content.php':$channel_info['content_php'];
			$list_php=empty($channel_info['list_php'])?'show_list.php':$channel_info['list_php'];
			
			if($v['cate_tpl']==2){
				$cate_url=$c_v['cate_url'];
			}else{
				$cate_url=($c_v['cate_html']&&$_confing['web_html'][0])?CMS_SELF.'htm/'.$c_v['cate_fold_name']:$path.$list_php.'?id='.$c_v['id'];
				if($c_v['cate_tpl']==3){
					$cate_url=($c_v['cate_html']&&$_confing['web_html'][0])?CMS_SELF.'htm/'.$c_v['cate_fold_name'].'/index.html':$path.$list_php.'?id='.$c_v['id'];
				}
			}
		$cate_arr['cate_name']=$c_v['cate_name'];//栏目名称	
		$cate_arr['cate_url']=$cate_url;//栏目地址
		$cate_arr['target']=intval($c_v['cate_is_open'])?'target="_blank"':'';//是否新窗口
		$cate_arr['cate_pic1']=empty($c_v['cate_pic1'])?'':CMS_SELF.'upload/'.$c_v['cate_pic1'];
		$cate_arr['cate_pic2']=empty($c_v['cate_pic2'])?'':CMS_SELF.'upload/'.$c_v['cate_pic2'];
		$cate_arr['cate_pic3']=empty($c_v['cate_pic3'])?'':CMS_SELF.'upload/'.$c_v['cate_pic3'];
		$cate_arr['cate_content']=$c_v['cate_content'];
		//获取内容
		if($content=='yes'){$cate_loop=get_cate_content($c_v['id'],$limit,$order_type,$filter,$pic,$order,$lang);}
		$return_arr[$c_v['id']]['cate']=$cate_arr;
		$return_arr[$c_v['id']]['contents']=$cate_loop;
		}
	}
	return $return_arr;
 }
 
/**
 * 根据模板ID获得列表页子栏目
 *
 * @access  public
 * @param   $tpl:模板id的值
 * @return  array
 */
function get_tpl_list_nav($tpl_id=''){
	$lang=$GLOBALS['lang'];
	global $cateid;
	if(empty($tpl_id)){
		$cate = $GLOBALS['cat_id'];
	}else{
		$tpl_id = intval($tpl_id);//获得栏目模板ID，不存在获取内容页的栏目模板ID
		$sql="SELECT id from ".DB_PRE."category WHERE lang='".$lang."' AND temp_id=".$tpl_id;
		$cate_rel=$GLOBALS['mysql']->fetch_asc($sql);
		$cate=empty($cate_rel[0]['id'])?$GLOBALS['cateid']:$cate_rel[0]['id'];
	}
	//如果当前栏目没有下级，存在上级则返回上级
	if(!empty($cate)){
		if(file_exists(DATA_PATH.'cache_cate/cache_category_all.php')){include(DATA_PATH.'cache_cate/cache_category_all.php');}
			$cate_info=get_cate_info($cate,$category);
		$child_num=$GLOBALS['mysql']->fetch_asc("select COUNT(id) as haschild from ".DB_PRE."category where cate_parent=".$cate);
		$cate=($child_num[0]['haschild'])?$cate:$cate_info['cate_parent'];
	}	
	if(!$cate) return;
	if(file_exists(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php')) 
		include(DATA_PATH.'cache_cate/cate_list_'.$lang.'.php');//当前语言下的栏目
	$nav_arr=array();
	if(!empty($cate_list)){
		foreach($cate_list as $k=>$v){
			if($v['cate_parent']==$cate&&!$v['cate_hide']){

				$channel_info = get_cate_info($v['cate_channel'],$GLOBALS['channel']);//获得栏目模型信息

				$content_php=empty($channel_info['content_php'])?'show_content.php':$channel_info['content_php'];
				$list_php=empty($channel_info['list_php'])?'show_list.php':$channel_info['list_php'];

				$path=CMS_SELF;
				$nav_arr[$k]['target']=intval($v['cate_is_open'])?'target="_blank"':'';//新窗口
				if($v['cate_tpl']==2){
					$nav_arr[$k]['url']=$v['cate_url'];
				}else{
					$nav_arr[$k]['url']=(($v['cate_html'])&&($GLOBALS['_confing']['web_html'][0]))?$path.'htm/'.$v['cate_fold_name']:$path.$list_php.'?id='.$v['id'];
					if($v['cate_tpl']==3){
						$nav_arr[$k]['url']=($v['cate_html']&&$GLOBALS['_confing']['web_html'][0])?$path.'htm/'.$v['cate_fold_name'].'/index.html':$path.$list_php.'?id='.$v['id'];
					}
				}	
				//表单
				if($v['cate_channel']=='-9'){
					$nav_arr[$k]['url']=(($v['cate_html'])&&($GLOBALS['_confing']['web_html'][0]))?$path.'htm/'.$v['cate_fold_name']:$path.'order/order.php?id='.$v['id'];
				}
				if($v['id']==$cateid){
					$nav_arr[$k]['class']="focus";
				}
				$nav_arr[$k]['cate_name']=$v['cate_name'];
				$nav_arr[$k]['cate_pic1']=CMS_SELF.'upload/'.$cate_info['cate_pic1'];
				$nav_arr[$k]['cate_pic2']=CMS_SELF.'upload/'.$cate_info['cate_pic2'];
				$nav_arr[$k]['cate_pic3']=CMS_SELF.'upload/'.$cate_info['cate_pic3'];
				$nav_arr[$k]['cate_content']=$cate_info['cate_content'];
				$nav_arr[$k]['id']=$v['id'];
				$nav_arr[$k]['cate_tpl']=$v['cate_tpl'];
				$nav_arr[$k]['child']=get_child_cate($v['id'],$GLOBALS['lang']);
			}
		}
	}
	if(!empty($nav_arr)){
		$i=1;
		$num=count($nav_arr);
		foreach($nav_arr as $k=>$v){
			$nav_arr[$k]['autoindex']=$i;
			$nav_arr[$k]['first']=($i==1)?1:0;
			$nav_arr[$k]['last']=($num==$i)?1:0;
			$i=$i+1;
		}
	}
	return $nav_arr;
}
 
/**
 * 获取主广告幻灯图片
 *
 * @access  public
 * @param   $tpl_id:分类调用id的值
 * @return  array
 */
 function get_flash($tpl_id=''){
 	if(empty($tpl_id)){return;}
	global $lang;
	//获取栏目id
	$cate_rel=$GLOBALS['mysql']->fetch_asc("select id from ".DB_PRE."flash_ad_cate where cate_tpl_id=".$tpl_id);
	$sql="select*from ".DB_PRE."flash_ad where lang='".$lang."' and cate_id=".$cate_rel[0]['id'];
	$rel = $GLOBALS['mysql']->fetch_asc($sql);
	if(!empty($rel)){
		$i=1;
		$num=count($rel);
		foreach($rel as $k=>$v){
			$rel[$k]['title']=$v['pic_text'];
			$rel[$k]['url']=$v['pic_url'];
			$rel[$k]['pic']=CMS_SELF.'upload/'.$v['pic'];
			$rel[$k]['autoindex']=$i;
			$rel[$k]['first']=($i==1)?1:0;
			$rel[$k]['last']=($num==$i)?1:0;
			$i=$i+1;
		}
	}
	return $rel;
 } 
 
 
   /**
 * 根据内容或列表页第一个关键词获取内容，不存在关键词随机获取
 *
 * @access  public
 * @param   $is_rand:1为随机;$filter:过滤标示(如推荐等);$order_type:排序类型;$pic:是否有图片;$limit:数量
 * @return  array
 */
  function get_rand_content($key='',$limit='0,5',$order_type='id',$filter='',$pic='no',$order='desc',$lang=''){
  	$sql_key = '';
	$sql_rand ='';
  	if($key)
	{
	
		$key_arr = explode(',',$key);
		$sql_key = " and (";
		$key_num = count($key_arr);
		$sql_or='';
		foreach($key_arr as $k=>$v){
			if($k!=($key_num-1))
			{
				$sql_key.=" m.keywords like '%".$v."%' or";
			}
			else
			{
				$sql_key.=" m.keywords like '%".$v."%'";
			}
			if($k==2){break;}
		}
		$sql_key.=")";
	}
	else
	{
		$sql_rand = ' rand(),';
	}
  	$cate_id = $GLOBALS['cateid'];//获得栏目ID，不存在获取内容页的栏目ID
	if(empty($cate_id)){return;}
	global $category,$channel;
	$cate_info=get_cate_info($cate_id,$category);//获得栏目信息
	$channel_id = $cate_info['cate_channel'];//获得栏目模型ID
	unset($cate_info);//释放栏目信息，下面将会用到
	$channel_info = get_cate_info($channel_id,$channel);//获得栏目模型信息
	
	$content_php=empty($channel_info['content_php'])?'show_content.php':$channel_info['content_php'];
	$list_php=empty($channel_info['list_php'])?'show_list.php':$channel_info['list_php'];
	
	$table = $channel_info['channel_table'];//获得栏目模型表
	if(empty($table)){return;}
	$child = get_child_id($cate_id);//获得栏目的下级栏目
	$cate_id_all=empty($child)?$cate_id:$cate_id.$child;//组合栏目ID
	$sql="select m.*,f.* from ".DB_PRE."maintb as m left join ".DB_PRE.$table." as f on f.id = m.id where m.id=f.id and m.verify=0 and m.category in (".$cate_id_all.")";
	$sql.=empty($filter)?' ':" and m.filter like '%".$filter."%'";
	$sql.=$sql_key;
	if($pic=='no'){
		$sql.='';
	}elseif($pic=='yes'){
		$sql.=" and m.tbpic <> ''";
	}
	$sql.=(empty($lang))?" and m.lang='".$GLOBALS['lang']."'":" and m.lang='".$lang."'";
	
	$sql.=(in_array($order_type,array('id','hits','addtime','updatetime')))?" GROUP BY m.id order by".$sql_rand." m.top desc, m.".$order_type:" GROUP BY m.id order by".$sql_rand." m.top desc, m.id ";
	$sql.=(in_array($order,array('asc','desc')))?' '.$order:' desc';

	$sql.=empty($limit)?' limit 0,5':" limit ".$limit;

	$rel=$GLOBALS['mysql']->fetch_asc($sql);
	if(!empty($rel)){
		$path=CMS_SELF;
		$i=1;
		foreach($rel as $k=>$v){
			$rel[$k]['title'] = $v['title'];//标题
			if($rel[$k]['title_color']||$rel[$k]['title_style']||$rel[$k]['is_open']){
			$font_style='';
			$font_style.=empty($rel[$k]['title_color'])?'':'color:'.$rel[$k]['title_color'].';';
			if($rel[$k]['title_style']==1){
			$font_style.='font-weight:bold;';
			}elseif($rel[$k]['title_style']==2){
				$font_style.='font-style:italic;';
			}elseif($rel[$k]['title_style']==3){
				$font_style.='text-decoration:underline;';
			}
			$rel[$k]['style'] = $font_style;
			$rel[$k]['style_title']=$rel[$k]['title'];//样式标题
			}else{
			$rel[$k]['style_title']=$rel[$k]['title'];
			}
			$rel[$k]['target']=$v['is_open']?'target="_blank"':'';//新窗口	
			if($v['purview']){
				$url=$path.'show_content.php?id='.$v['id'];
			}else{
				$url=(!$v['is_html']&&!($GLOBALS['_confing']['web_html'][0]))?$path.$content_php.'?id='.$v['id']:$path.$v['url'];
			}	
			$rel[$k]['url']=($v['is_url'])?$v['url_add']:$url;//链接
			$v['tbpic']=empty($v['tbpic'])?'no_pc.gif':$v['tbpic'];
			$rel[$k]['thumb_pic']=CMS_SELF.'upload/'.$v['tbpic'];//图片
			$cate_info=get_cate_info($v['category'],$category);//获取栏目信息
			$cate_url=(!$v['is_html']&&!($GLOBALS['_confing']['web_html'][0]))?$path.$list_php.'?id='.$cate_info['id']:$path.$cate_info['cate_fold_name'];
			$rel[$k]['cate_url'] = $cate_url;//栏目url
			$rel[$k]['cate_name'] = $cate_info['cate_name'];//栏目名称
			$rel[$k]['cate_pic1']=CMS_SELF.'upload/'.$cate_info['cate_pic1'];
			$rel[$k]['cate_pic2']=CMS_SELF.'upload/'.$cate_info['cate_pic2'];
			$rel[$k]['cate_pic3']=CMS_SELF.'upload/'.$cate_info['cate_pic3'];
			$rel[$k]['cate_content']=CMS_SELF.'upload/'.$cate_info['cate_content'];
			$rel[$k]['autoindex']=$i;
			$rel[$k]['first']=($i==1)?1:0;
			$rel[$k]['last']=($num==$i)?1:0;
			$i=$i+1;
		}
	}
	return $rel;
	
  }
 
?>
