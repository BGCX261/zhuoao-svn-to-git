$(document).ready(function(){
	$('.nav_right').find('li').hover(function(){
		$(this).find('p').slideDown('fast');
	},function(){
		$(this).find('p').slideUp('fast');
	});	
	
	$('.c_icon').click(function(){
		$(this).parent().next('dd').toggle();
		$(this).toggleClass('j');
	});
	
	//对左侧分类菜单的样式控制
	$('.c_icon').each(function() {
		//判断是否有子菜单，有就显示加号“+”，没有就显示减号“-”
		if($(this).parent().next('dd').find("li").length < 1){
			$(this).addClass('j');
		}
		
		//判断是否选中，选中则展开子菜单
    	if($(this).next().hasClass("focus")){
			$(this).addClass('j');
			$(this).parent().next('dd').toggle();
		}
		
		if($(this).parent().next('dd').find("a.focus").length > 0){
			$(this).parent().next('dd').show();
			$(this).addClass('j');
		}
    });
	
});