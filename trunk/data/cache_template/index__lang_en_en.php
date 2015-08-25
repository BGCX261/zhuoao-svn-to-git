<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="description" content="">
<meta name="keywords" content="">
<title></title>
<link href="/template/default/images/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/template/default/images/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/template/default/images/nav.js"></script>
<script type="text/javascript" src="/template/default/images/pic_go.js"></script>
</head>
<body>
<div class="head_contain">
<!--登录-->
<!--
<div class="login_contain">
<div class="head_login" id="user_login">
<form name="form1" action="/member.php" method="post">
<label>Username:</label><input type="text" id="ajax_user" name="user" style="width:100px" />
<label>Password:</label><input type="password" id="ajax_password" name="password" style="width:100px" />
<label>Code:</label><input type="text" name="code" id="ajax_code" style="width:50px" /><img src="/includes/code.php" name="code" border="0" id="code" style="display:block; float:left;cursor:pointer; margin-left:5px; display:inline"/>
<input type="hidden" id="ajax_lang" value="en" name="lang" /><input type="button" style="border:0; margin-left:5px; display:inline; padding:0" src="/template/default/images/login_input2.gif" name="go" id="ajax_login" />
<label><a href="/member/member.php?action=regist&lang=en">Register</a></label>
</form>
<div class="clear"></div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#code').click(function(){
	$(this).attr('src','/includes/code.php?tag='+new Date().getTime());
	});
	$.ajax({
			type:"POST",
			url:"/member/member.php",
			data:"action=is_ajax_login&lang="+"en",
			dataType:"json",
			success:function(data){
				if(data.login==1){
					$('#user_login').html(data.info);
				}
			}	
	});
	$('#ajax_login').click(function(){
		$.ajax({
			type:"POST",
			url:"/member/member.php",
			data:"action=ajax_login&lang="+$('#ajax_lang').val()+"&password="+$('#ajax_password').val()+"&user="+$('#ajax_user').val()+"&code="+$('#ajax_code').val(),
			dataType:"json",
			success:function(data){
				if(data.login==1){
					$('#user_login').html(data.info);
				}else{
					alert(data.info);
				}
			}
		});
	});
	
});
</script>
-->
<div class="head">
	<div class="head_left">
		<div class="logo">
        	<a href="/index.php?lang=en"><img src="/template/default/images/logo_en.gif" border="0" /></a>            
        </div>
	</div>    
    <div class="company_title">
        GREEN LIGHTING  GREEN CHEMICAL    </div>
	<div class="head_right">
		<div class="top_menu">
	        <!-- <a href="#" onclick="javascript:window.external.AddFavorite('http://www.beescms.com','')" title="收藏本站到你的收藏夹">加入收藏</a> -->
						<a href="/"  >简体中文</a>
						<a href="/index.php?lang=en" class="focus" >English</a>
			        </div>
        
	</div>
	<div class="clear"></div>
</div>
</div>
<div style="clear:both"></div>
<div class="head_nav">
	<div class="nav_left">
	<div class="nav_right">
		<ul>
			<li class="first_li focus"><a href="/index.php?lang=en"><span>Home</span></a></li>
			 
			<li class="first_li ">
				<a href="/product/product.php?id=72" ><span>Product</span></a>
	            <ul>
										<li><a href="/product/product.php?id=78">Lighting products</a></li>
										<li><a href="/product/product.php?id=79">Chemical products</a></li>
									</ul>
			</li>		
			 
			<li class="first_li ">
				<a href="/article/article.php?id=73" ><span>Support</span></a>
	            <ul>
										<li><a href="/article/article.php?id=76">Lighting products</a></li>
										<li><a href="/article/article.php?id=77">Chemical products</a></li>
									</ul>
			</li>		
			 
			<li class="first_li ">
				<a href="/article/article.php?id=74" ><span>Human resource</span></a>
	            <ul>
									</ul>
			</li>		
			 
			<li class="first_li ">
				<a href="/alone/alone.php?id=75" ><span>Contact us</span></a>
	            <ul>
									</ul>
			</li>		
					</ul>
        
        <div class="sousuo">
			<form name="form1" action="/search/search.php?lang=en">
				<div class="s_margin">
	            	<input name="key" class="search_text" type="text"/><input type="submit" value="SEARCH" class="find"/><input type="hidden" value="en" name="lang" />
				</div>
                <!--
				<div class="s_margin">
		            <span>HOT：</span>
									</div>
                -->
			</form>
		</div><!--搜索-->
	</div>
	</div>
</div><!--主导航-->



<script type="text/javascript">
$(function(){
	//导航
	$(".head_nav .first_li").each(function(index, element) {		
        $(this).hover(function(e) {
			$(this).addClass("hover");
            $(this).children("ul").show();
        }, function(e) {
			$(this).removeClass("hover");
            $(this).children("ul").hide();
        });
    });
	
	//语言
	$(".top_menu a").each(function(index) {
        $(this).addClass("lang_"+(index+1));
    });
});
</script>
<div class="div_margin"></div>
<div class="flash">
<script language='javascript'>
linkarr = new Array();
picarr = new Array();
textarr = new Array();
var swf_width=950;
var swf_height=340;
var files = "";
var links = "";
var texts = "";
//这里设置调用标记
for(i=1;i<picarr.length;i++){
  if(files=="") files = picarr[i];
  else files += "|"+picarr[i];
}
for(i=1;i<linkarr.length;i++){
  if(links=="") links = linkarr[i];
  else links += "|"+linkarr[i];
}
for(i=1;i<textarr.length;i++){
  if(texts=="") texts = textarr[i];
  else texts += "|"+textarr[i];
}
document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="'+ swf_width +'" height="'+ swf_height +'">');
document.write('<param name="movie" value="/data/flash_ad/ad_1/bcastr.swf"><param name="quality" value="high">');
document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
document.write('<param name="FlashVars" value="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'">');
document.write('<embed src="/data/flash_ad/ad_1/bcastr.swf" wmode="opaque" FlashVars="bcastr_file='+files+'&bcastr_link='+links+'&bcastr_title='+texts+'& menu="false" quality="high" width="'+ swf_width +'" height="'+ swf_height +'" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'); document.write('</object>'); 
</script></div><!--幻灯-->
<div class="div_margin"></div>
<div class="contain c_margin" id="index_content">
    <!--核心优势 开始-->
    <div class="hexinyoushi box">
        <div class="box_title"><h2>Core Superiority</h2></div>
        <div class="box_in">
            <div class="j_content">
                <p>
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Core Superiority &nbsp;&nbsp;Core Superiority&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Core Superiority &nbsp;&nbsp;Core Superiority&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Core Superiority &nbsp;&nbsp;Core Superiority&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Core Superiority &nbsp;&nbsp;Core Superiority&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Core Superiority &nbsp;&nbsp;Core Superiority&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Core Superiority &nbsp;&nbsp;Core Superiority</p>
<p>
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Core Superiority &nbsp;&nbsp;Core Superiority&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Core Superiority &nbsp;&nbsp;Core Superiority</p>
	
            </div>
            <!-- <div class="more"><a href="#">&gt;&gt;</a></div> -->
        </div>
    </div>
    <!--核心优势 结束-->

    <!--企业新闻 开始-->
            <!--企业新闻 结束-->
	
    <!--产品导航 开始-->
    <!--
    <div class="box">
        <div class="left_title"><h2>Navigation</h2></div>
        <div class="box_in">
            <div id="category_tree">
                                                <dl>
                    <dt><span class="c_icon"></span><a class="" href="/product/product.php?id=78"  title="Lighting products">Lighting products</a></dt>

                    <dd style="display: none;" id="nav_16">
                    <ul>
                                                <li><a href=" /product/product.php?id=85 ">LED track light</a></li>
                                                <li><a href=" /product/product.php?id=86 ">LED industrial lighting</a></li>
                                                <li><a href=" /product/product.php?id=87 ">LED outdoor lighting</a></li>
                                                <li><a href=" /product/product.php?id=88 ">General commerical lighting</a></li>
                                                <li><a href=" /product/product.php?id=89 ">General outdoor lighting</a></li>
                                                <li><a href=" /product/product.php?id=90 ">General industrial lighting</a></li>
                                                <li><a href=" /product/product.php?id=91 ">Lighting accessaries</a></li>
                                                <li><a href=" /product/product.php?id=92 ">Switch</a></li>
                                            </ul>
                    </dd>
                </dl>
                                <dl>
                    <dt><span class="c_icon"></span><a class="" href="/product/product.php?id=79"  title="Chemical products">Chemical products</a></dt>

                    <dd style="display: none;" id="nav_16">
                    <ul>
                                                <li><a href=" /product/product.php?id=81 ">Polyacrylamide</a></li>
                                                <li><a href=" /product/product.php?id=82 ">Papermaking Additives</a></li>
                                                <li><a href=" /product/product.php?id=83 ">Polymeric aluminum chloride</a></li>
                                                <li><a href=" /product/product.php?id=84 ">Decolorizing agent</a></li>
                                            </ul>
                    </dd>
                </dl>
                            </div>
        </div>
    </div>
    -->
    <!--产品导航 结束-->
    
    <!--热门内容 开始-->
    <!--
        -->
    <!--热门内容 结束-->
    
    <!--联系方式 开始-->
    <!--<div class="box">
        <div class="left_title"><h2>Contact</h2></div>
        <div class="box_in">
            <div class="contact">
                            </div>
        </div>
    </div>-->
    <!--联系方式 结束-->
	
    <!--工程案例 开始-->
    <div class="gongchenganli box">
        <div class="box_title"><h2>Projects</h2></div>
        <div><img src="/template/default/images/bg_gcal.jpg" border="0" /></div>
        <div class="box_in">        	
            <div class="j_content">
                <p>
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Projects&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Projects&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Projects&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Projects</p>
<p>
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Projects&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Projects</p>
	
            </div>
            <div class="more"><a href="#">View more&gt;&gt;</a></div>
        </div>
    </div>
    <!--工程案例 结束-->
    
	<div class="index_left chanpzhanshi box">
		<div class="contain_right_top">
            <div class="box_title"></div>
            <div id="pr_show">
	            <!-- 产品展示 开始 -->
				            
	            <h2 class="box_tab" id="box_tab_1">Lighting products</h2>

	                <div class="pr_contain">
	                    <ul class="pr_all_list scrollPics">
	                        	                    </ul>
	                    <div class="more"><a href="product/product.php?id=78">View more&gt;&gt;</a></div>
	                </div>

	            <!-- 产品展示 结束 -->
	            <!-- 产品展示 开始 -->
					            <h2 class="box_tab" id="box_tab_2">Chemical products</h2>

	                <div class="pr_contain">
	                    <ul class="pr_all_list scrollPics">
	                        	                    </ul>
	                    <div class="more"><a href="product/product.php?id=79">View more&gt;&gt;</a></div>
	                </div>

	            <!-- 产品展示 结束 -->
            </div>
		</div>
        
		<!--
        <div class="div_margin"></div>
				<div class="pr">
			<div class="right_box">
				<div class="right_title"><h2><a href="product/product.php?id=72">Product</a></h2></div>
				<div class="box_in mouse">
					<span class="pic_left" id="prev"></span>
					<div class="pic_contain" id="pic_go">
						<ul class="pr_list" id="g">
													</ul>
					</div>	
					<span class="pic_right" id="next"></span>
					<div class="clear"></div>
					<SCRIPT type="text/javascript">						
						var scrollPic_02 = new ScrollPic();
						scrollPic_02.scrollContId   = "g";
						scrollPic_02.arrLeftId      = "prev";//左箭头ID
						scrollPic_02.arrRightId     = "next"; //右箭头ID
						scrollPic_02.frameWidth     = 595;//显示框宽度
						scrollPic_02.pageWidth      = 120; //翻页宽度
						scrollPic_02.speed          = 10; //移动速度(毫秒，越小越快)
						scrollPic_02.space          = 10; //每次移动像素(单位px，越大越快)
						scrollPic_02.autoPlay       = true; //自动播放
						scrollPic_02.autoPlayTime   = 3; //自动播放间隔时间(秒)
						scrollPic_02.initialize(); //初始化						
					</SCRIPT>
				</div>
			</div>
		</div>
        -->
        <!--产品-->
		
	</div><!--右边内容-->   


</div>



<!--
<div class="web_link">
	<div class="link_title"><h2>Links</h2></div>
	<div class="box_in">
					
		<ul style="clear:both">
					</ul>
		<div class="clear"></div>
	</div>
	<div class="div_margin"></div>
</div>
-->
<!--友情链接结束-->
<script type="text/javascript" src="/template/default/images/jquery.jcarousel.js"></script>
<script type="text/javascript">
$(function(){
	$('.scrollPics').jcarousel({
		wrap: "circular",
		auto: 1,
		scroll: 4
	});
	
	var tab_li = $(".chanpzhanshi .box_tab");
	var tab_con = $(".chanpzhanshi .pr_contain");
	tab_li.first().addClass("on");
	tab_con.first().addClass("show");
	tab_li.each(function(i) {
        $(this).click(function(e) {
            $(this).addClass("on").siblings().removeClass("on");
			tab_con.eq(i).addClass("show").siblings().removeClass("show");
        });
    });
	
	$("#box_tab_2.box_tab").css("margin-left",($("#box_tab_2.box_tab").width()+20));
	
});
</script>
<div class="footer_wrapper">
	<div class="foot">
		<div class="foot_left">
			<div class="foot_nav">
								<a href="/sitemap/sitemap.php?lang=en" title="Site Map">Site Map</a>
                							</div>
		</div><!--left-->
		<div class="foot_right">			
												<p></p>
			<p></p>		
		</div>
		<div class="clear"></div>
	</div>
</div>
<!--页脚-->

    <style type="text/css">
        /*浮动QQ在线客服*/
        .kf_contain{z-index:99; width:32px; right:0; top:100px; position:absolute}
        .kf_contain .kf_list{ width:142px; margin:0 auto; }
		.kf_contain .kf_list .kf_top{width:143px;background:url(/template/default/images/kf_top.gif) no-repeat left top; height:119px;}
		.kf_contain .kf_list .kf_top_en{width:143px;background:url(/template/default/images/kf_top_en.gif) no-repeat left top; height:119px;}
        .kf_list h2{background:url(/template/default/images/kf_bg.png) no-repeat left top; height:18px; width:100px; text-align:center; line-height:18px; font-size:12px; font-weight:normal; color:#fff;margin-bottom:8px; margin-top:8px;}
		.kf_top .kf_time, .kf_top_en .kf_time{margin-left:40px; padding-top:35px;}
		.kf_top .kf_time p, .kf_top_en .kf_time p{height:23px; line-height:23px; overflow:hidden; text-align:center}
		.kf_contain .kf_list .kf_body{padding-top:5px; background:url(/template/default/images/kf_center.gif) repeat-y left top;padding-bottom:10px;overflow:hidden; text-align:center}
       
		.kf_body .kf_body_div{margin-left:40px; }
        .kf_contain .kf_list .kf_body ul{padding:0; width:133px; background-color:#FFFFFF; border:#FFFFFF 1px solid}
        .kf_contain .kf_list .kf_body li{font-size:9pt; list-style-type:none; height:25px; padding-right:5px; clear:both; display:block;}
        .kf_contain .kf_list .kf_body li span{line-height:25px; margin-left:10px;  display:block; vertical-align:middle}
		.kf_contain .kf_list .kf_body li span.lf{float:left}
		.kf_contain .kf_list .kf_body li span.lr{float:right}
		.kf_contain .kf_list  .kf_btm{height:32px; width:143px; background:url(/template/default/images/kf_btm.gif) no-repeat left top;}
		.on_kf{width:32px; height:118px; float:right}
        /*浮动QQ在线客服*/
    </style>
    <form id="form1" runat="server">
    <div>
	<div class="kf_contain" id="kf_contain">
		<div class="on_kf" id="on" onmouseover="kf_on();"><img src="/template/default/images/kf_on_en.gif"  border="0" alt="客服"/></div>
        <div >
            <!-- <div class="kf_list" id="off" onmouseout="kf_off();" okf_topnmousemove="kf_on();"> -->
            <div class="kf_list" id="off">
				<div class="kf_top_en">
					<div class="kf_time">
						<h2>Working Hours</h2>
						<p>Monday to Sunday</p>
						<p>8:00 - 18:00</p>
					</div>
				</div>
                <div class="kf_body">
				<div class="kf_body_div">
					<h2>Online Service</h2>
																</div>
                </div><!--中间-->
				<div class="kf_btm"></div><!--底部-->
            </div>
        </div>
    </div>
	</div>
    </form>


<script type="text/javascript">
    var tips;
    var theTop = 100/*这是默认高度,越大越往下*/;
    var old = theTop;
	var $on_e= document.getElementById("on");
	var	$off_e=document.getElementById("off");
    function initFloatTips() {
        document.getElementById("off").style.display = "none";
        tips = document.getElementById("kf_contain");
        moveTips();
    };
    function moveTips() {
        var sped = 50;
        if (window.innerHeight) {
            pos = window.pageYOffset
        }
        else if (document.documentElement && document.documentElement.scrollTop) {
            pos = document.documentElement.scrollTop
        }
        else if (document.body) {
            pos = document.body.scrollTop;
        }
        pos = pos - tips.offsetTop + theTop;
        pos = tips.offsetTop + pos / 10;
        if (pos < theTop) pos = theTop;
        if (pos != old) {
            tips.style.top = pos + "px";
            sped = 10;
        }
        old = pos;
        setTimeout(moveTips, sped);
    }
    initFloatTips();
	
	
	$("#kf_contain").hover(function() {
		$(this).width("143px");
        $on_e.style.display = "none";
		$off_e.style.display = "block";
    },function() {
		$(this).width("32px");
        $on_e.style.display = "block";
		$off_e.style.display = "none";
    });
</script>



</body>
</html>
