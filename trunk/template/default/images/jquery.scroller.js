(function($) {
    $.fn.extend({
        //滚动图片插件
        scroller: function (options) {
            var defaults = {
	                count: 4,
	                times: 3000,
	                duration: 500,
	                auto: 1
           		};
            var options = $.extend(defaults, options);

            var obj = $(this);
			obj.wrap('<div class="ui_scroller_container"><div class="ui_scroller"></div></div>');

			var showImg = function(){
				obj.find("img").each(function(i){
					if(i<options.count){
						if($(this).attr("src") != $(this).attr("rel")){
							$(this).attr("src",$(this).attr("rel"));
							//$(this).parent("a").css("background","url("+$(this).attr("rel")+")");
						}
					}
				});
			}
			showImg();

            //首先判断是否满足滚动条件 获取li个数长度和设置滚动的个数进行比较
            if (obj.find("li").length <= options.count) {
                obj.find(".ui_scroller_prev, .ui_scroller_next").hide();
                return;
            };
            //设置一个变量 当点击一次运行未结束之间没有事件
            var iswork = true;
            //计算滚动的长度 =获取div的长度除设置显示的个数
            var scwidth = 0 - (obj.parent().width() / options.count);

            //容器的长度
            obj.width(Math.abs(obj.find("li").size() * scwidth) + "px");

            //向左移动的方法
            var moveleft = function () {
                    if (iswork) {
                        iswork = false;
                        //给ul定义动作，当运行完第一个的时候把第一个移除放入最后一个位置，并且重置到初始值
                        obj.animate({
                            'margin-left': scwidth
                        }, options.duration, function () {
                            obj.find("li").eq(0).appendTo(obj);
							showImg();
                            obj.css({
                                'margin-left': 0
                            });
                            iswork = true;
                        });
                    };
                };

            //向右移动的方法
            var moveRight = function () {
                    if (iswork) {
                        iswork = false;
                        //给ul定义动作，当运行完最后一个的时候把最后一个移除放入第一个位置，并且重置到初始值
                        obj.find("li").last().prependTo(obj);
                        obj.css({
                            'margin-left': scwidth
                        });
                        obj.animate({
                            'margin-left': 0
                        }, options.duration, function () {
							showImg();
                            iswork = true;
                        });
                    }
                };


            //给左右按钮新增点击事件
    		obj.after("<a href='javascript:;' class='ui_scroller_prev'></a><a href='javascript:;' class='ui_scroller_next'></a>");
    		obj.parent().find(".ui_scroller_prev").bind("click",function(){ moveRight();});
    		obj.parent().find(".ui_scroller_next").bind("click",function(){ moveleft();});

			if(options.auto == 1 ){
				//定义自动播放参数接收函数
				var autoMove = function()
				{
					moveleft();
				};

				var sit;
				//开始运行
				function startMove()
				{
					sit = setInterval(autoMove,options.times);
				};
				startMove();

				//新增图片悬停 停止播放效果
				obj.parent().hover(
					function()
					{
						//鼠标滑过移除事件自动播放事件
						 clearInterval(sit);
					},
					function()
					{
						//重新播放函数
						 startMove();
				});
			}
        }

    });
})(jQuery);