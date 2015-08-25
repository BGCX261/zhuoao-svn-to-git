DROP TABLE IF EXISTS `bees_admin_group`;
CREATE TABLE `bees_admin_group` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `admin_group_name` varchar(60) NOT NULL,
  `admin_group_info` varchar(255) DEFAULT NULL,
  `admin_group_purview` text COMMENT '分组权限-字符串以,分割',
  `is_disable` mediumint(8) NOT NULL DEFAULT '0' COMMENT '是否禁用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
INSERT INTO `bees_admin_group` VALUES('1','超级管理员','可以管理后台所有功能，没有任何限制','all_purview','0');
INSERT INTO `bees_admin_group` VALUES('2','信息发布员 ','发布信息内容的管理员','content_create,content_edit','0');
DROP TABLE IF EXISTS `bees_alone`;
CREATE TABLE `bees_alone` (
  `id` mediumint(8) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `bees_alone` VALUES('17','<div class=\"arc_body\">\r\n<div class=\"us\">\r\n<p>BEES企业网站管理系统（以下称BEES）是一个基于PHP+Mysql架构的企业网站管理系统。BEES 采用模块化方式开发，功能强大灵活易于扩展，并且完全开放源代码，多种语言分站，为企业网站建设和外贸提供解决方案。</p>\r\n<p><br />\r\n<strong>主要特性：</strong></p>\r\n<p><br />\r\n<span style=\"color: rgb(0, 0, 255);\">1、支持多种语言</span></p>\r\n<p><br />\r\nBEES支持多种语言，后台添加自动生成，可为每种语言分配网站风格。</p>\r\n<p><br />\r\n<span style=\"color: rgb(0, 0, 255);\">2、功能强大灵活</span></p>\r\n<p><br />\r\nBEES除内置的文章、产品等模型外，还可以自定义生成其它模型，满足不同的需求</p>\r\n<p><br />\r\n<span style=\"color: rgb(0, 0, 255);\">3、自定义表单系统</span></p>\r\n<p><br />\r\nBEES可自定义表单系统，后台按需要生成，将生成的标签加到模板中便可使用。</p>\r\n<p><br />\r\n<span style=\"color: rgb(0, 0, 255);\">4、模板制作方便</span></p>\r\n<p><br />\r\n采用MVC设计模式实现了程序与模板完全分离，使用原生php函数，后台可以对模板进行编辑，分别适合美工和程序员使用。</p>\r\n<p><br />\r\n<span style=\"color: rgb(0, 0, 255);\">5、用户体验好</span></p>\r\n<p><br />\r\n前台、后台、会员中心模板都采用 DIV+CSS，兼容 IE 和 Firefox 浏览器，访问速度快。</p>\r\n<p><br />\r\n<span style=\"color: rgb(0, 0, 255);\">6、支持用户反馈信息</span></p>\r\n<p><br />\r\n<span style=\"color: rgb(0, 0, 255);\">7、SEO优化</span></p>\r\n<p>可设置网站SEO参数及所有页面SEO信息，如关键词、页面描述等，可以自定义url生成；</p>\r\n<p><span style=\"color: rgb(0, 0, 255);\">8、人性化后台操作</span></p>\r\n<p>维护管理更方便</p>\r\n<p>可全站生成静态html页面</p>\r\n<p>&nbsp;</p>\r\n<p>官方网站：http://www.beescms.com</p>\r\n<p>交流论坛：http://www.beescms.com/bbs</p>\r\n<p>在线帮助：http://www.beescms.com/help</p>\r\n</div>\r\n</div>');
DROP TABLE IF EXISTS `bees_article`;
CREATE TABLE `bees_article` (
  `id` mediumint(8) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `bees_article` VALUES('1','<p>在企业网站中会存在一些单页内容，主要通过栏目或是其他链接进入，单页内容直接显示内容，不经过内容列表页或是其它页面，大多数都是独立的一个页面，如关于我们、公司简介等独立的页面。</p>\r\n<p>BEES企业建站系统中通过单页内容模型添加这些页面。操作如下：</p>\r\n<p><strong>一、建立栏目。</strong></p>\r\n<p>进入后台》内容管理》栏目管理，添加栏目，<span style=\"color: rgb(255, 0, 0);\">内容模型选择单页模型</span>，如图：</p>\r\n<p><img height=\"35\" width=\"269\" src=\"/beescms3/upload/img/20110625/20110625120320.gif\" alt=\"\" /></p>\r\n<p>填写其它栏目信息，创建单页栏目。</p>\r\n<p><strong>二、添加内容</strong></p>\r\n<p>栏目创建后，进入后台》内容管理》添加单页内容，会看到刚才添加的栏目，如果添加了多个栏目会依次列出，选择相应的栏目就可以添加相应的单页内容。</p>\r\n<p>单页内容添加完后就可以显示</p>\r\n<p><span style=\"color: rgb(0, 0, 255);\">进入后台》内容管理》单页内容管理可以对添加的单页内容进行修改和删除操作。</span></p>');
INSERT INTO `bees_article` VALUES('2','<p>一个企业网站中都会存在一些片段内容，如联系方式等，这些片段内容不是一个独立的页面，只是一个或几个页面中的一些内容，</p>\r\n<p>使用BEES企业建站系统添加这些片段内容主要使用标示内容。操作如下：</p>\r\n<p><strong>一、通过后台》内容管理》添加标示内容进入添加标示内容界面。</strong></p>\r\n<p><span style=\"color: rgb(0, 0, 255);\"><span class=\"help\" title=\"请使用汉字、数字、字母,填写后不可更改\">标示名称</span></span><span class=\"help\" title=\"请使用汉字、数字、字母,填写后不可更改\">&mdash;&mdash;使用英文，主要通过模板中的标签调用输出。如果使用的是默认模板，填写以下标示名称将会自动输出对应的标示内容。</span></p>\r\n<p><span style=\"color: rgb(255, 0, 0);\">contact_us输出中文联系方式；contact_us_en输出英文联系方式；about_us输出中文简介；about_us_en输出英文简介</span></p>\r\n<p><span style=\"color: rgb(0, 0, 255);\">标示内容</span>&mdash;&mdash;主要的内容，如联系方式、公司简介等，可上传图片并对内容进行排版。</p>\r\n<p><strong>二、<a href=\"http://www.beescms.com/\">企业网站模板</a>中输出。</strong></p>\r\n<p>如果使用默认模板，填写上面的标示名称会自动输出内容，自己定义的标示名称在模板中要调用下才能输出内容。</p>\r\n<p>修改下面的函数：</p>\r\n<p><span style=\"color: rgb(255, 0, 0);\">get_block_content(\'<strong>标示名称</strong>\')</span></p>\r\n<p>如自定义标示名称为<span style=\"color: rgb(255, 0, 0);\">test</span>，调用为get_block_content(\'<span style=\"color: rgb(255, 0, 0);\">test\'</span>)</p>\r\n<p>函数的相关使用和调用可以查看在线帮助http://www.beescms.com/help</p>');
INSERT INTO `bees_article` VALUES('3','<p>BEES网站管理系统中的输出设置功能需要在动态页面访问下才能获取模板中的配置位置。操作流程如下：</p>\r\n<p><span style=\"color: rgb(0, 0, 255);\">1、安装完程序后，动态访问首页或其它页面</span></p>\r\n<p>该过程程序会自动获取模板中使用了输出功能的标签（通过tpl_id标签属性获取）。</p>\r\n<p><span style=\"color: rgb(0, 0, 255);\">2、进入后台输出设置就可以配置相关位置</span></p>\r\n<p>当动态访问网站后在输出设置地方就会列出可以配置的模板位置，根据标签的不同配置的内容也不同，有内容列表配置、标示内容配置、表单配置。</p>\r\n<p><span style=\"color: rgb(255, 0, 0);\"><strong>注意事项：</strong></span></p>\r\n<p><span style=\"color: rgb(255, 0, 0);\">在开启html静态生成功能下不会生成配置列表，需要动态访问后生成</span></p>\r\n<p><span style=\"color: rgb(255, 0, 0);\">更换模板的时候会清空以前模板的配置<br />\r\n</span></p>\r\n<p><span style=\"color: rgb(255, 0, 0);\">更换模板后要动态访问下网站重新生成配置，生成配置后再开启html功能。<br />\r\n</span></p>\r\n<p><span style=\"color: rgb(255, 0, 0);\">修改模板输出配置标签要动态访问后再开启html功能</span></p>');
INSERT INTO `bees_article` VALUES('4','<p>BEES<a href=\"http://www.beescms.com/\">企业网站管理系统</a>内置多种内容模型，并且可以自定义内容模型，内容模型分别对应使用的模板。如图：</p>\r\n<p><img height=\"233\" width=\"781\" alt=\"\" src=\"/beescms3/upload/img/20110625/20110625120451.gif\" /></p>\r\n<p>可以关闭开启内容模型，添加内容的时候也会显示开启的内容模型</p>\r\n<p>通过右边的管理字段可进入内容模型的地段列表，所有的信息都通过字段添加处理。如图：</p>\r\n<p><img height=\"305\" width=\"825\" alt=\"\" src=\"/beescms3/upload/img/20110625/20110625120453.gif\" /></p>\r\n<p>通过右边的修改进入字段修改，<span style=\"color: rgb(255, 0, 0);\">字段的修改会影响到数据的输入，请谨慎操作</span></p>\r\n<p>可以修改字段的相关内容及其默认值</p>');
INSERT INTO `bees_article` VALUES('5','<p>解决BEES<a href=\"http://www.beescms.com/\">企业网站管理系统</a>首页空白没有内容的方法：</p>\r\n<p><strong>1、首先要确保网站添加了栏目和内容</strong>，每个栏目至少有10篇内容，如果栏目和内容都没有那就没办法了。</p>\r\n<p><strong>2、栏目显示的设置</strong>，添加和修改栏目的时候，只要勾选&lsquo;导航位置&rsquo;一项就可以把栏目显示在网站中部和底部，如图：</p>\r\n<p><img height=\"33\" width=\"318\" alt=\"企业网站导航设置\" src=\"/beescms3/upload/img/20110625/20110625120511.gif\" /></p>\r\n<p><strong>3、联系方式、公司简介位置的显示</strong>，这些地方通过添加标示内容输出，1.7版本只要添加标示名为<span style=\"color: rgb(0, 0, 255);\">contact_us</span>，则自动输出联系方式。添加<span style=\"color: rgb(0, 0, 255);\">about_us</span>输出公司简介，如图：</p>\r\n<p><img height=\"170\" width=\"583\" alt=\"企业网站添加联系方式\" src=\"/beescms3/upload/img/20110625/20110625120512.gif\" /></p>\r\n<p><strong>4、使用后台输出设置功能</strong>，输出设置可以设置和输出网站中一些位置的内容，需要先动态访问网站才能生成设置列表（静态页面不能生成），找到列表中的位置设置输出的栏目就可以输出内容。</p>\r\n<p>BEES<a href=\"http://www.beescms.com/\">企业网站管理系统</a>模板制作和使用帮助：http://www.beescms.com/help</p>');
INSERT INTO `bees_article` VALUES('6','<p>BEES<a href=\"http://www.beescms.com/\">企业网站管理系统</a>是多语言系统，在支持多语言的情况下，可以选择一种语言作为进入网站的语言。</p>\r\n<p>如默认语言有简体中文和英文，新装程序进入网站默认是中文。</p>\r\n<p>可以通过后台设置进入网站的语言。</p>\r\n<p>在后台》网站设置》首页设置中设置语言，如图：</p>\r\n<p><img height=\"50\" width=\"356\" alt=\"BEES&lt;a href=\" src=\"/beescms3/upload/img/20110625/20110625122858.gif\" /></p>\r\n<p>通过下拉选择语言确定保存，如果开启HTML需要生成下html页面。</p>');
INSERT INTO `bees_article` VALUES('7','<p>在BEES<a href=\"http://www.beescms.com/\">企业网站管理系统</a>中添加了栏目后会跳转到栏目管理界面，在这里可以对添加的栏目进行各种操作，界面如下：</p>\r\n<p><img height=\"100\" width=\"600\" alt=\"BEES&lt;a href=\" src=\"/beescms3/upload/img/20110625/20110625122936.gif\" /></p>\r\n<p><strong>左边为添加的栏目信息，排序和是否在网站导航中显示。</strong></p>\r\n<p>&lsquo;+&rsquo;可以展开下级栏目。</p>\r\n<p><strong>右边为对栏目的操作。</strong></p>\r\n<p>增加下级栏目：增加当前栏目的下级栏目</p>\r\n<p>修改栏目：可以修改当前栏目的名称等信息。</p>\r\n<p>移动栏目：设置栏目为顶级栏目或是其它栏目的子栏目</p>\r\n<p>删除栏目：删除栏目会连同下级栏目和文章内容一起删除，请慎重操作</p>');
INSERT INTO `bees_article` VALUES('8','<p>BEES<a href=\"http://www.beescms.com/\">企业网站管理系统</a>是一套多语言系统，每种语言是一个独立的网站，拥有该语言的内容及其网站配置信息。</p>\r\n<p>后台操作的时候要切换到相应的语言对该语言添加内容和配置。</p>\r\n<p>语言切换位置在各项功能的顶部，如图：</p>\r\n<p><img height=\"30\" width=\"298\" alt=\"BEES&lt;a href=\" src=\"/beescms3/upload/img/20110625/20110625123017.gif\" />企业网站系统语言切换&quot; /&gt;</p>\r\n<p>当前语言位置会列出系统中使用的语言，当前语言会高亮选中，方便区分其它语言。</p>\r\n<p>切换到需要操作的语言后就可以对该语言进行功能操作了。</p>');
INSERT INTO `bees_article` VALUES('9','<p>BEES<a href=\"http://www.beescms.com/\">企业网站管理系统</a>的模板放在template目录下，如图：</p>\r\n<p><img height=\"58\" width=\"122\" alt=\"BEES&lt;a href=\" src=\"/beescms3/upload/img/20110625/20110625123056.gif\" />企业网站管理系统模板目录&quot; /&gt;</p>\r\n<p>默认模板有简体中文和英文，如图：</p>\r\n<p><img height=\"55\" width=\"314\" alt=\"BEES&lt;a href=\" src=\"/beescms3/upload/img/20110625/20110625123057.gif\" />企业网站管理系统默认模板&quot; /&gt;</p>\r\n<p>将模板文件放在template目录下，进入后台》站点设置切换到修改的语言，找到&lsquo;模板默认风格&rsquo;一项填写模板目录名，如图：</p>\r\n<p><img height=\"31\" width=\"495\" alt=\"填写模板名\" src=\"/beescms3/upload/img/20110625/20110625123058.gif\" /></p>\r\n<p>如简体中文填写&lsquo;default&rsquo;，英文模板\'default_en\'</p>\r\n<p>确定保存就完成了模板安装。</p>');
INSERT INTO `bees_article` VALUES('10','<p><strong>1.企业网站需要灵魂</strong></p>\r\n<p>伴随互联网的飞速普及，及相关建站软件的日新月异，现如今建设一个企业网站已相当容易，即使是对技术一窍不通的小白也能依靠智能软件信手拈来，所以   说，科技很给力。通过观察不难发现，依靠上述这种简单粗暴方式建设网站的企业不再少数，尤其是中小企业，分析原因有三个：一是与其&ldquo;短平快&rdquo;的经营思路有  关；二是成本低廉；三是不重视。</p>\r\n<p>上周与国内某知名网站建设专家讨论企业网站建设话题，其中谈到的一点至今仍记忆犹新：企业网站需要灵魂。可以判断：依靠上述那种依靠智能软件或简单抄袭完成的网站一定是缺少灵魂的。</p>\r\n<p>那如何才能建立一个有灵魂的企业网站呢？在这之前，我们需要先知晓何为企业网站的灵魂？简单说来就是：<span style=\"color: rgb(0, 0, 255);\">逻辑，想用户之所想的逻辑，有效传递品牌价值的逻辑。</span></p>\r\n<p>如何才能做到想用户之所想，并有效传递品牌价值呢？</p>\r\n<p>乍一想，可能会感觉无从下手，其实就是缺少方法论。刚刚在最新一期《销售与市场》杂志上看到一句很贴切的形容&ldquo;模式&rdquo;的话，即：<span style=\"color: rgb(255, 0, 0);\">有地图者不迷路，有模式者不盲目</span>。没错，模式，或者说方法论其实就是做事情的指南针。</p>\r\n<p><strong>2.企业网站建设方法论</strong></p>\r\n<p>近期与Google、百度两位同学打交道比较多，以下是在两位童鞋帮助下，集思广益后总结整理出的一套有效的企业网站建设方法论，希望对各位热爱网站运营的朋友有所参考价值，也欢迎各位拍砖、发言。</p>\r\n<p><span style=\"color: rgb(0, 0, 255);\">第一步：目标明确</span></p>\r\n<p>建站之前首先要明确企业网站的目的是什么，期待企业官网做什么？如：是在线销售？品牌信息传递？信息查询？</p>\r\n<p><span style=\"color: rgb(0, 0, 255);\">第二步：策略分析</span></p>\r\n<p>明确网站目标后，要开始目标受众分析（来企业网站做什么，兴趣点是什么）、自身现状分析（品牌影响力如何，产品线如何、服务水平如何）及行业竞品调研（行业对手都在怎么做）；</p>\r\n<p><span style=\"color: rgb(0, 0, 255);\">第三步：方案制定</span></p>\r\n<p>通过综合策略分析后，需要明确我们要做什么（定义需求），以及如何实现。</p>\r\n<p><span style=\"color: rgb(0, 0, 255);\">第四步：项目执行</span></p>\r\n<p>明确实现方案后，需要制定网站架构，开始创意设计、内容组织、程序开发等工作。</p>\r\n<p><span style=\"color: rgb(0, 0, 255);\">第五步：维护和提高</span></p>\r\n<p>最后，网站上线后，还有更重要的工作：运营维护、数据监测、结果追踪。这样才能形成闭环，推动网站持续、稳定、向前发展。</p>\r\n<p>纯文字的介绍可能不太直观，绘制了一张示意图（如下），可以对上述一揽子方法论一目了然。按此思路执行，有血有肉有灵魂的企业网站将水到渠成。</p>');
INSERT INTO `bees_article` VALUES('11','<p><strong>一、上网站，看文章</strong><br />\r\n当您刚进入这个行业的时候，肯定感到很新奇、很兴奋，感觉这个行业即神秘又充满了魅力，恨不得马上做出一、两个大项目来。但是江礼坤在这里奉劝您，先把这些问题、想法都放到一边，静下心来，先将网络推广做个大概的了解后，再开始折腾：<br />\r\n先把推广领域的专业网站都放入收藏夹，没事的时候就多上去学习一下。特别是一些业内的专家、知名人士，您应该熟记他们的名字和博客，他们写出来的东西，都是非常有价值的。<br />\r\n再把相关品的行业网站也放入收藏夹，经常了解行业动态。推广的手段是固定的，但推广的具体内容却是根据具体的行业情况和用户需求来制订，所以一定要时刻了解相关产品行业动态，及时掌握用户需求。</p>\r\n<p><strong>二、加入行业QQ群</strong><br />\r\n通过几天的学习，相信您对网络推广已经有了一个大概的认识，也有了一些初步的想法和困惑，急于想找人帮你解惑。此时可以适当的加一些专业群，与同行和前辈们交流一下经验。加群时，注意以下几点:<br />\r\n1、群不在多在于精。前期不要加太多群，视自身精力而定。先加推广方面的经验交流群，因为这个阶段是学习期，应以学习为主。<br />\r\n2、进群先改群名片。个人建议群名片用真名+公司名的方式：一来可以推广自己，二来推广了公司。一定要保证自己的名字在群成员列表的前十名，这样才能加深别人对你的印象。<br />\r\n3、主动发言多交流。新人刚入行，大家都不认识你，而且咱们进群也主要是为了讨教学习；所以放低姿态，多多主动与人交流。将这些人发展成你的第一批人脉资源。<br />\r\n4、积极申请管理员。很多人懒得申请群管理，认为管群麻烦，其实不然。群管理员的好处是显而易见的，所有的群员都会记住他，而且印象深刻。在群里，管理员是权威的。所以对于新人来说，成为一个群的管理，是提升知名度、拓展网络人脉的最佳捷径。</p>\r\n<p>　　学习到一定阶段时，开始多加群。同时尝试加一些与推广目标人群有关的QQ群，比如要推女性产品，就可以加一些女性群。当群达到一定数量后，开始尝试做QQ群广告。方法和注意事项如下：<br />\r\n方法一：在群里直接发广告。最传统的方法。关键点是不要在加入群后，就近不及待的马上发广告。否则不但你的广告没人点，而且还会被人T掉。正确的方法是  加入群后，先花几天时间与大家聊天，交流一下感情，尤其是要和群主管理员混熟，然后再开始发广告。此时发的广告才会有人看，而且也不会被T。发广告的时  候，不要太频，一天最多发一条足矣，否则会引起大家反感。内容方面越人性化越好。<br />\r\n方法二：利用群邮件发广告。俺一直认为QQ推广中，这是最好的方法。关于具体邮件内容技巧不多说了。只说一个很白痴，但又很关键的问题：想利用群邮件做广告，一定要多加群邮件功能开放的群。因为这个功能是由群主和群管理员控制，很多群是关闭的。</p>\r\n<p><strong>三、加入论坛/SNS</strong><br />\r\n群影响范围毕竟有限，高级群也不过五百人。所以想与更多人交流、达到更好的推广效果，就需要寻求更大的平台，而这个平台的不二人选，就是论坛，其次就是当下最火的SNS。先选两个论坛，一个SNS。<br />\r\n第一个论坛选与推广有关的，比如推一把论坛，这里聚集了很多推广方面的人才和高手，是学习推广的最佳平台。第二个论坛选与目标用户群有关的。比如推广的  是与电脑有关的产品，就可以到爱好者论坛，这是国内最专业的电脑知识普及论坛之一，拥有近百万的会员。第三个SNS，还是选与推广有关的，这样的SNS很  多，比如5G、郭吉军的爱聚集、TW同学录等。当然，如果您精力和时间很充足，也可以多找一些论坛和SNS。<br />\r\n注册好这些论坛和SNS后，多多  的上去与人交流、提升自己的等级、增加在网站里面的知名度。多与人交流是为了获取知识与经验，当你在行业论坛里等级高了就会发现，自己已经不知不觉从一只   菜鸟成长成为一个老鸟了；增加知名度是为了积累人脉、提升影响力。当你在一个坛子里人尽皆知时就会发现，即使发广告贴，也会有一堆人来帮你顶。其实这就是  最简单的论坛营销了：）</p>\r\n<div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div>\r\n<p><strong>四、建立QQ群</strong><br />\r\n经过前面三步，您基本上已经脱离了菜鸟的行列，有了一定经验和人脉，现在可以尝试将这些资源整合。建群是整合人脉最佳的途径之一，所以赶紧建一个属于自己的群吧。除此之外，群还有两个最大的好处：<br />\r\n1、自己的群可以随便用，想怎么发广告，就怎么发广告。<br />\r\n2、群主是最权威的。当你与群里的活跃分子谈合作时，就会发现很容易谈成，原因就在于群主的权威性。其实权威性是影响别人的重要手段之一，关于这个问题，以后江礼坤会专门撰文说明。<br />\r\n小贴士：本文系推一把创始人、蓝色烽火成员江礼坤原创，想看更多文章请搜索推一把或江礼坤，或登陆江礼坤(拼音)点卡母。转载时请保留此版权信息。</p>\r\n<p><strong>五、参加线下聚会</strong><br />\r\n很多朋友认为，刚入行的新人应该多多参加线下聚会，其实不然。经常参加聚会的朋友  都知道：一般线下聚会，特别是大型的活动，基本上就是换换名片，没有什么实际效果。聚会参加的多了，也顶多混个脸熟，效果也不。所以我的建议是：先在线上   混个脸熟，有了一定的认知和了解后，再参加线下聚会。这时再参加聚会时，相互没有陌生感，情感会得到进一步的提升。同时在聚会中，他们还会为你介绍更多朋  友。而经过朋友介绍之后换的名片才是最有价值的。最重要的，一次见一群人，肯定比你一一上门拜访要节省好多成本。</p>\r\n<p><strong>六、建立博客网站</strong><br />\r\n有了前五步的沉淀，相信您的经验已经比较丰富了，应该也操作过几个项目了。此时应  该将您之前的知识，综合运用和整合一下。最好的方法就是实践，开博客是首选，如果有条件，也可以建个个人网站。此举的目的是为了全面的了解网站建设的过  程，提升自身的综合素质。如果操作得当，说不准一个名站就此诞生了。<br />\r\n对于具体的策划过程，可以到江礼坤的博客参看以前的文章。在这里只强调两点，这两点一定要完成：<br />\r\n1、把PR值做上去。想提高PR值，就需要你去交换很多的优质链接。这个过程，会极大的提升你的谈判能力，同时会让你对外链的建设有很深的了解。而外链是SEO最重要的组成部分之一。<br />\r\n2、优化至少一个关键字。选至少一个竞争不激烈的关键字，给他优化上去（比如你的名字）。当别人在搜索引擎搜索这个关键字，你的站可以排在第一位时，相当那时你对关键字的优化已经掌握的比较全面了。<br />\r\n以上两天如果执行的到位，那您已经是半个SEO高手了。</p>\r\n<p><strong>七、研究网站模式</strong><br />\r\n前面的这些方法，让您对网络推广、SEO、网站建设、营，都有了一定的了解，同时  也积累了很多人脉与经验，现在你绝对算是个老鸟了。但我们虽然取得了一点小小的成绩，绝不能沾沾自喜，踏步不前。我们要向更高的目标迈进，开拓自己的视  野，让自己从老鸟变成专家。在这个阶段，开始学习其它网站的先进经验，研究各种网站特点、模式，最终的效果要达到能够全面诊断网站、策划网站的水平。<br />\r\n当然了，这是一个漫长的过程，也与个人的环境及自身特点有关。只能靠时间和经验去慢慢的积累。在这里我给大家的建议是：多看文章，多实践；多多交流，多总结；多上网站，多分享，<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br />\r\n<strong>八、开始写原创文章</strong><br />\r\n当你经验很丰富的时候，就可以试着将这些经验写出来。一来可以提升个人知名度，如果能把自己打造成名博或是业内的专家，是最理想的。二来，可以增加软文 写作经验，这也是推广的重点手段之一。关于软文方面，笔者曾撰写过多篇文章，大家如果有兴趣，可以到江礼坤的博客查看。</p>\r\n<p><strong>九、组织线下聚会</strong><br />\r\n当你人脉和经验都已经很丰富的时候，就可以尝试组织线下聚会。先从小聚会开始组织，先从FB聚会开始组织。一点一点延伸到上百人的行业聚会、行业沙龙。此举可以让你大大的扩展人脉、巩固人脉、提升自己的知名度。同时还会大大的提升你的组织能力与协调能力。</p>');
INSERT INTO `bees_article` VALUES('12','<p>企业网站可以起到如下作用：</p>\r\n<p><strong>宣传企业形象与品牌：</strong>企业文化往往是一个企业的灵魂。也是塑造一个企业形象与品牌的根本。通过互联网这个窗口，可以得到更好的传播与推广。</p>\r\n<p><strong>增加客户的忠诚度：</strong>通过网站可以及时反馈顾客使用产品后的意见，发现问题，及时解决问题。加强与客户的沟通，建立与客户交流的便捷渠道，不但可以倾听顾客的意见，了解顾客的心声，还可以加强企业与顾客间的联系，建立良好的关系。（留言本，在线调查，在线联系，E-mail等）</p>\r\n<p><strong>有利于改善售后服务：</strong>在线服务能够更加及时地掌握用户群体，通过网站的交互式服务实现售前、售后的全过程服务。   互联网的特点在于突破地域限制，可以服务于全国各地的用户。同时，网站是一天24小时都一直呈现在顾客面前的。而不像公司的咨询热线，服务电话，只有上班   时间才可以联系到。下班与节假日的时候，客户就无法取得联系，导致信息不能得到及时的反馈，也可能会错过网上订单（客户在节假日可以通过留言本之类的功能  与公司取得联系）。</p>\r\n<p><strong>公司产品在线推广：</strong>通过网站全面展示企业经营的所有产品。互联网足以令您的产品与品牌更加形象立体地呈现在用户面前，比传统的宣传模式更加的丰富多彩、更加全面，更易于发布与传播。</p>\r\n<p><strong>时代发展的潮流：</strong>假如一个企业连网站都没有，给客户的印象是：这是不是一个正规的企业，怎么连网站都没有。</p>\r\n<p><strong>信息的及时更新：</strong>网站内容可以随时更新，这点对于现代企业来说很重要。有的企业由于发生变故，甚至连地址、电话都变了，但是名片，传统的宣传海报上印的却是以前的电话与地址，这不能不说令人遗憾。而网站却可以随时更新，可以反映你企业的最新情况。还可以发布招聘信息，代理加盟信息等等。</p>\r\n<p><strong>开辟网络营销渠道：</strong>扩大产品的销售渠道，企业网站可以满足一部分客户网上查询产品信息与采购的需要，抓住互联网商机，开展电子商务。网络营销不但可以作为传统营销的补充；还可以拓展新的市场空间，接触更多潜在的消费群体。</p>\r\n<p><strong>推广成本大大降低：</strong>与传统销售行业相比，网络营销可以减少很多环节，产品通过网站由公司直接到达客户手中，省去了大中小批发商和零售商，以及中间过程中涉及到的广告宣传，物流与仓储等等。不但大大减少了人力物力，节约费用，降低成本，还有利于提高营销效率。</p>');
INSERT INTO `bees_article` VALUES('13','<p><strong>1、相关行业新闻</strong>，这是做为原创内容的资料来源，但必须认真修改资料内容，保证一定的原创性和新鲜感。避免简单复制。</p>\r\n<p><strong>2、公司企业新闻</strong>，如果是新企业，不妨多留意公司的事情，然后记录下来，形成文字，这就是原创，突出的关键词就是公司的品牌文化和公司的理念，增加了网站的收录数量，也会提升企业的网络形象！ 等同于企业发展一样，需要不断维护才有所成就的！</p>\r\n<p><strong>3、相关技术类文字</strong>，围绕公司的服务或产品，按对公司技术和产品的认知程序而定，可以请求公司各个部门，将他们最熟知的技术原创整理出来，然出关键词内容，这样就增加了技术类相关，产品相关、服务相关的内容。</p>\r\n<p><strong>4、员工的情感或者原创文章</strong>，发动企业每一个员工，愿意为企业的发展贡献一份力量。在网站上开辟员工情感、原创文章专栏，即获得了很好的原创内容来 源又提升了员工对公司的情感，访客对企业的情感认知，如此这样一个有血有肉的企业，谁能说它存在的虚幻性，由此，对网络营销、网站口碑推广大有帮助。<strong><br />\r\n</strong></p>');
INSERT INTO `bees_article` VALUES('14','<p>　　<strong>一、宣传为主，企业网站应有效提升形象</strong></p>\r\n<p>　　如果一个企业没有网站，一定就失去了在互联网上参与竞争的一次机会。很多公司做的网站的伊始目的也仅仅是，通过搜索引擎可以查询到自己公司的信   息即可。尤其为数众多的中小企业，甚至是十几二十人的微型企业，受制于成本预算在选择网站建设公司的时候，价格就成了关键的抉择因素。如此考虑选择可以理  解，毕竟对刚起步的小公司小企业来说，资金永远都是一个必须慎重考虑的问题。但是却忽视了更为重要的一个因素没有顾忌，那就是做网站的目的是什么?</p>\r\n<p>　　毋庸置疑，企业网站建设的目的绝对不仅是有网站那么简单，而网站更类似企业在互联网上的一张名片，承载着企业形象传达的的任务。一个设计精美细   节完美的网站，无疑的将给浏览者一个良好的印象。同样的，制作粗糙甚至打开速度满如老牛拉破车似的网站，会给用户留下不悦印象，在激烈的竞争中就处于劣势  地位了。网站设计精良能有效的传递包装企业形象，浏览者会在认可网站设计制作的同时，一同认企业。如果呈现给用户的是一个粗制滥造的网站，还不如不做网  站，与其给用户留下不良印象，还不如给其一个想象的空间。</p>\r\n<p>　　<strong>二、营销至上，搜索引擎优化不容被忽视</strong></p>\r\n<p>　　我们经常会听到用户问询，做网站会有什么效果，能否有效提升销售业绩?这个近似直白的问题，多少让从事网站建设的网络公司有些尴尬。企业既然投   入了一份费用，自然就想从中得到合理的回报，这种要求这种想法本身无可厚非。但是网站本身去了正常的展示宣传，本身是不会自动起到任何作用的。就想名片就   想产品宣传单页一样，不去散发它不去主动的宣传展示它，其意义无异于一张废纸。除去传统的宣传方式，比如将网址域名印刷在名片上印刷在宣传单页上，搜索引 擎所带来的效果更不能忽视。</p>\r\n<p>　　有调查数据表明，超过90%以上的网民习惯于通过搜索引擎寻找资源，在中文搜索市场，百度更是一路绝尘以    83%的市场占有率遥遥领先。搜索引擎极其所带来的互联网营销模式，已经慢慢得到用户的认可和接受。面向用户的企业网站建设，在有效传递和包装企业形象的   同时，一定不能忽视对搜索引擎的友好性。换句话说，就是网站建设制作一定要符合搜索引擎的检索抓取标准，而后通过不断丰富网站内容，不断提升网站质量和权  重，以获得搜索引擎的不断认可。面向搜索引擎的网站开发建设，不仅只是面对优化，还包括搜索竞价广告的投放等。</p>\r\n<p>　<strong>　三、用户向导，建设面向用户的企业网站</strong></p>\r\n<p>　　无论是基于提升企业现象，有效宣传展示包装企业，还是通过搜索引擎优化或投放竞价广告，有效辅助销售。网站最终是要给用户看的，只有得到用户认   可的网站，才是真正意义上的优质网站。良好的用户体验表现之一，就是网站可以快速稳定的加载运行，一般而言，一个网站超过10秒钟无法打开，就无疑的将会   失去一次参与竞争的机会。很多公司为了更炫目的展现企业形象，倾向于使用大幅动画导入页面，其实这不仅不利于搜索引擎抓取页面内容，不利于网站优化，同时  更不利于用户体验。动画需要加载到本地后才能播放执行的，而加载的过程同时是用户等待的过程。</p>\r\n<p>　　网站打开速度如何，或者能否稳定运行，不仅取决于程序是否规范简洁，网站主机的选择也至关重要。服务器配置高，托管的机房线路优越带宽充足，网   站的加载速度就会得意提升。在保证网站稳定快速运行的同时，内容更新也很关键。我们经常看到和很多公司网站建设制作完成后，经年累月的不更新，即使网站上   有新闻动态栏目，也只是很久以前的复制拷贝而已。甚至有些网站已经出现乱码错位等现象，一样持久不得解决处理。这样的网站，即使设计的在精美，在搜索引擎 上排名再靠前，投入再多的费用在竞价广告上又如何呢?一样不会得到用户的认可。</p>');
INSERT INTO `bees_article` VALUES('15','<p><strong>首先，我们认为网站编辑必须有基本的美学认知</strong>，因为她们必须对网站的视觉美观做把关，这么说比较笼统，何谓网站 的美观？我们认为这必须从网站的架构  说起，这包含了网页阅读的轨迹以及点击的行为分析，重点内容应该放在什么位置，网站上面的banner又该放在什么地方等，这看似微不足道，却可能影响网  站的成败；此外，标题或者文章内文的字体、字号、用色等也是一门学问，我们所熟知的一些大行门户对于这些都有详细的规範，甚至是广告主想来投放广告的  banner都有所规範，比方说：banner的尺寸是否吻合、图片或者文字是否清晰、用色以及风格是否跟网站主调相近、banner本身是否影响网站整  体的美观等&hellip;</p>\r\n<p><strong>第二、才是内容更新的频率</strong>，如果希望用户能够经常的造访网站，那么网站更新的频繁度就很重要，让用户随时想到并 可以来访，甚至是採用push的方式  来提醒用户（RSS或者SNS），告诉他们内容已经更新，而不仅仅是更新的频繁度，最好还要固定的时间做更新，并让用户知道这个时间点，让用户养成定期造  访的习惯，如果能够培养起这种习惯，网站就很容易把人气带动起来。</p>\r\n<p><strong>第三点、要讲的是网站编辑本身的专业度以及对于趋势话题的敏锐度</strong>，这点必须跟第二点作搭配，我们可以观察到有不 少网站都是利用这点起家的，比方说：  紧跟着Apple产品的上市时间，同时领先其他媒体做第一手的报导，并且言之有物，以及后续的追踪报导；这就如同电视台的记者，而除了抢速度之外，对于消   息来源的真实度还要能够做出一些判断，小道消息虽然可以报导，但如果把他报导成真的消息，那就影响网站的可信度了；除了抢速度这种话题的经营之外，还有另   一种就是具特色话题，也许时间因素没那么强，但可以因为精心的编辑与报导而带动风潮者，而要兼顾这两者，网站编辑必须随时的观注一些主流媒体、相关的外电  报导甚至是一些知名的博客等。</p>\r\n<div style=\"page-break-after: always;\"><span style=\"display: none;\">&nbsp;</span></div>\r\n<p><strong>第四点，网站标题准确度或者内容生动撰写的能力</strong>，当然首先应该归避一些敏感性的话题（尤其在内地），举凡三俗或 者政治方面的须避免；而相同一个题材可能  有数十个网站同时报导，并且有上百个网站到处转载，如果没有好的标题以及生动的内容，那网站只是成千上百个相同网站之一，更何况其中很多大站，能见度极其   的低，所以标题以及内容如何跟别人不一样，观点跟其他网站不同，标题也比其他网站有渲染力，这就是差异，而这对于搜索引擎的收录与排名也会有所帮助，因为  网站的&rdquo;个性&rdquo;以及&rdquo;差异性&rdquo;很重要，每当一个网站的编辑更换时，我们总是能够感受到这种差异，内容要客观，但也要有一些主观的见解。</p>\r\n<p><strong>第五点、是专题的规划力，很多网站忽略了这一点</strong>，如果我们说日常的文章更新是一种长尾化的永续经营，那专题就是 一种重点吸引眼球的操作方法，专题的  规划往往也来自于新趋势、新产品、或者时下大家关注的焦点话题，专题更是一种完整性的内容集合，比方说：当大家关注平板电脑的发展，那就针对这个话题做一   个所有平板电脑产品的集合性话题，并且把iOS或者Android或者其他潜在的平台都做分析，完整的呈现给读者，这就是一种单点突破的方法，因为一般单   篇式的文章往往是片面的，用户得到的讯息不全，以至于他们还要从其他管道来蒐罗相关讯息，这时就很容易流失用户，而专题就可避免这种流失的机会，同时专题   的报导因为主要关键词一再出现，也有利于搜索引擎的操作。但是专题的操作往往也比较耗费人力，更何况一个话题操作得当的网站往往同一个时间有几个专题同时  穿插着。</p>\r\n<p><strong>第六点，对于网站关键词的布局安排</strong>，虽然说Facebook为主的社交网站已经慢慢取代Google成为一些网 站流量贡献的主要来源，但是搜索引擎仍是  三大流量来源之一，因此如何布局关键词，让主要关键词或者长尾关键词被收录，并尽可能排在搜索列表的前头，对流量产生了很大的影响，不少网站其实有抓到了  趋势以及新的话题，也做了一些标题以及内文的优化，但很可惜在关键词的布局上仍旧有待加强，而这对于网站经营的结果有很大的差异。</p>\r\n<p><strong>最后一点，与同业的互动交流</strong>，一个好的网站编辑，除了能够关起门来做好自己的工作本份之外，他还需要经常跟同业 进行交流互动，这是一个经验分享与相  互学习的过程，同时这也可以建立起供稿的系统，往往很多的内容不是自己所能塬创产生（网站编辑不是三头六臂），而是由外界来提供再稍佳修饰润笔，这是一个  共同创作的过程，此外，同业之间的交流也能够分享很多对于趋势以及产品的观点，有助于自我专业能力的提升。</p>\r\n<p>其实，网站经营的目的不外乎网站流量以及用户的忠诚度，而网站编辑就是带动这些指标一个很重要的关键，应该说，一个称职的网站编辑也同时能够胜任很多的工作，因为他们除了能够站在用户的角度来思考，还知道如何掌握用户的胃口，有志者，加入网站编辑这个行列吧&hellip;</p>\r\n<p>文章来源：三十而慄（转载请注明出处链接）</p>');
DROP TABLE IF EXISTS `bees_ask`;
CREATE TABLE `bees_ask` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `addtime` varchar(60) NOT NULL,
  `reply` text,
  `member` mediumint(8) NOT NULL,
  `replytime` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bees_auto_fields`;
CREATE TABLE `bees_auto_fields` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(60) NOT NULL,
  `use_name` varchar(60) NOT NULL COMMENT '表单提示文字',
  `field_type` varchar(60) NOT NULL,
  `field_value` varchar(255) DEFAULT NULL COMMENT '字段默认值',
  `field_length` mediumint(8) DEFAULT NULL,
  `channel_id` mediumint(8) NOT NULL COMMENT '所属频道id',
  `field_info` varchar(255) DEFAULT NULL COMMENT '字段提示信息',
  `is_disable` mediumint(8) NOT NULL,
  `check_value` varchar(60) DEFAULT NULL,
  `field_order` mediumint(8) NOT NULL DEFAULT '10',
  `is_del` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
INSERT INTO `bees_auto_fields` VALUES('1','content','内容','html','','255','2','','0','','1','1');
INSERT INTO `bees_auto_fields` VALUES('2','model','型号','text','','255','3','','0','','1','1');
INSERT INTO `bees_auto_fields` VALUES('4','marketprice','市场价格','text','','255','3','','0','','3','0');
INSERT INTO `bees_auto_fields` VALUES('28','content','详细内容','html','','255','5','','0','','16','1');
INSERT INTO `bees_auto_fields` VALUES('6','down','下载地址','upload_file','','255','4','','0','','1','1');
INSERT INTO `bees_auto_fields` VALUES('27','content','详细内容','html','','255','4','','0','','4','1');
INSERT INTO `bees_auto_fields` VALUES('10','jobnum','招聘人数','text','','255','5','','0','','2','0');
INSERT INTO `bees_auto_fields` VALUES('12','jopaddress','工作地点','text','','255','5','','0','','5','0');
INSERT INTO `bees_auto_fields` VALUES('16','joblasttime','截止日期','text','2011-1-2','255','5','','0','','9','0');
INSERT INTO `bees_auto_fields` VALUES('26','content','详细介绍','html','','255','3','','0','','4','1');
INSERT INTO `bees_auto_fields` VALUES('24','content','详细内容','html','','255','1','','0','','1','1');
INSERT INTO `bees_auto_fields` VALUES('25','pics','产品图片','upload_pic_more','','255','3','','0','','10','0');
INSERT INTO `bees_auto_fields` VALUES('29','filesize','文件大小','text','','255','4','单位为K','0','','3','1');
INSERT INTO `bees_auto_fields` VALUES('30','filetype','文件类型','select','.exe,.rar,其他','255','4','','0','','2','1');
INSERT INTO `bees_auto_fields` VALUES('32','wholesale','批发说明','textarea','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','255','3','','0','','6','0');
INSERT INTO `bees_auto_fields` VALUES('33','shipping','运费说明','textarea','申通快递：江浙沪首重3公斤--5元，续重超过的，加收10元，除新疆，西藏，甘肃，宁夏，内蒙古，青海等地运费首重1公斤18元，续重加收18元，其他省份均为首重1公斤10元，续重加收10元。','255','3','','0','','7','0');
INSERT INTO `bees_auto_fields` VALUES('34','trading','交易方式','textarea','','255','3','','0','','8','0');
INSERT INTO `bees_auto_fields` VALUES('35','contact','联系方式','textarea','<br>电话：\r\n<br>移动电话：\r\n<br>传真：\r\n<br>地址：\r\n<br>邮编：\r\n<br>公司网站：','255','3','','0','','9','0');
DROP TABLE IF EXISTS `bees_block`;
CREATE TABLE `bees_block` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `tag` varchar(60) NOT NULL,
  `content` text,
  `tag_name` varchar(255) DEFAULT NULL,
  `lang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
INSERT INTO `bees_block` VALUES('4','contact_us','<p>联系电话：</p>\r\n<p>QQ：</p>\r\n<p>联系地址：</p>\r\n<p>网址：<a href=\"http://www.beescms.com\">http://www.beescms.com</a></p>\r\n<p>论坛：<a href=\"http://www.beescms.com/bbs\">http://www.beescms.com/bbs</a></p>\r\n<p>帮助：<a href=\"http://www.beescms.com/help\">http://www.beescms.com/help</a></p>','','');
INSERT INTO `bees_block` VALUES('5','about_us','<p><img alt=\"\" style=\"width: 96px; float: left; height: 122px;\" src=\"/beescms3/upload/fck/20110625030630_fck.png\" />BEES 企业网站管理系统拥有简单方便的模板标签，能够快速做出模板；自定义表单，自定义模型，内置新闻、下载、产品、招聘、单页模型；SEO功   能，每个页面都可以单独SEO优化，并且可以自定义URL生成；多语言，多风格，每种语言每个页面都可以定义风格；html静态页面生成功能；人性化后台 操作，不用太多知识就可以快速建好网站，维护管理方便。</p>','','');
INSERT INTO `bees_block` VALUES('6','about_us','<p><img alt=\"\" style=\"width: 96px; float: left; height: 122px;\" src=\"../upload/fck/20110625030630_fck.png\" />BEES 企业网站管理系统拥有简单方便的模板标签，能够快速做出模板；自定义表单，自定义模型，内置新闻、下载、产品、招聘、单页模型；SEO功   能，每个页面都可以单独SEO优化，并且可以自定义URL生成；多语言，多风格，每种语言每个页面都可以定义风格；html静态页面生成功能；人性化后台 操作，不用太多知识就可以快速建好网站，维护管理方便。</p><br />','公司简介','cn');
INSERT INTO `bees_block` VALUES('7','contact_us','<p>联系电话：</p><p>QQ：</p><p>联系地址：</p><p>网址：<a href=\"http://www.beescms.com/\" _fcksavedurl=\"http://www.beescms.com\">http://www.beescms.com</a></p><p>论坛：<a href=\"http://www.beescms.com/bbs\" _fcksavedurl=\"http://www.beescms.com/bbs\">http://www.beescms.com/bbs</a></p><p>帮助：<a href=\"http://www.beescms.com/help\" _fcksavedurl=\"http://www.beescms.com/help\">http://www.beescms.com/help</a></p><br />','联系方式','cn');
DROP TABLE IF EXISTS `bees_book`;
CREATE TABLE `bees_book` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(60) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `book_type` mediumint(8) NOT NULL DEFAULT '0' COMMENT '0-留言,1-投诉,2-询问,3-售后',
  `pr_id` mediumint(8) DEFAULT NULL COMMENT '产品',
  `book_title` varchar(60) NOT NULL,
  `book_content` text NOT NULL,
  `addtime` varchar(60) NOT NULL,
  `reply` text,
  `verify` mediumint(8) NOT NULL DEFAULT '0',
  `lang` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `bees_book` VALUES('1','测试名','test@163.com','2','23','询问价格','问下这个产品的价格','1309053643','','1','cn');
DROP TABLE IF EXISTS `bees_book_info`;
CREATE TABLE `bees_book_info` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `is_book` varchar(60) DEFAULT NULL,
  `book_pos` varchar(60) DEFAULT NULL,
  `book_verify` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `bees_book_info` VALUES('1','1','2','0');
DROP TABLE IF EXISTS `bees_category`;
CREATE TABLE `bees_category` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `custom_url` varchar(255) DEFAULT NULL,
  `cate_name` varchar(60) NOT NULL,
  `cate_mb_is` mediumint(8) NOT NULL,
  `cate_hide` mediumint(8) NOT NULL,
  `cate_channel` mediumint(8) NOT NULL,
  `cate_fold_name` varchar(60) NOT NULL,
  `cate_order` mediumint(8) NOT NULL,
  `cate_rank` mediumint(8) DEFAULT '0',
  `cate_tpl` mediumint(8) NOT NULL,
  `cate_tpl_index` varchar(60) DEFAULT NULL,
  `cate_tpl_list` varchar(60) DEFAULT NULL,
  `cate_tpl_content` varchar(60) DEFAULT NULL,
  `cate_title_seo` varchar(60) DEFAULT NULL,
  `cate_key_seo` varchar(60) DEFAULT NULL,
  `cate_info_seo` varchar(350) DEFAULT NULL,
  `lang` varchar(60) NOT NULL,
  `cate_parent` mediumint(8) NOT NULL,
  `cate_html` mediumint(8) NOT NULL DEFAULT '0',
  `cate_nav` varchar(60) NOT NULL DEFAULT '0',
  `is_content` mediumint(8) DEFAULT '0',
  `cate_url` varchar(60) DEFAULT NULL,
  `cate_is_open` mediumint(8) NOT NULL DEFAULT '0',
  `form_id` mediumint(8) DEFAULT NULL,
  `cate_pic1` varchar(255) DEFAULT NULL,
  `cate_pic2` varchar(255) DEFAULT NULL,
  `cate_pic3` varchar(255) DEFAULT NULL,
  `cate_content` text,
  `temp_id` mediumint(8) DEFAULT NULL,
  `list_num` mediumint(8) NOT NULL DEFAULT '20',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
INSERT INTO `bees_category` VALUES('4','','新闻中心','0','0','2','xwzx','1','0','0','','list_article.html','article_content.html','','','','cn','0','1','2','0','http://','0','8','','','','','2','3');
INSERT INTO `bees_category` VALUES('5','','产品中心','0','0','3','cpzx','2','0','0','','list_product.html','product_content.html','','','','cn','0','1','2','0','http://','0','8','','','','','3','20');
INSERT INTO `bees_category` VALUES('6','','下载中心','0','0','4','xzzx','3','0','0','','list_down.html','down_content.html','','','','cn','0','1','2','0','http://','0','8','','','','','0','20');
INSERT INTO `bees_category` VALUES('7','','招聘中心','0','0','5','zpzx','4','0','0','','list_job.html','job_content.html','','','','cn','0','1','2','0','http://','0','8','','','','','0','20');
INSERT INTO `bees_category` VALUES('8','','关于我们','0','0','1','gywm','5','0','3','','list_alone.html','alone_content.html','','','','cn','0','1','2','1','http://','0','8','','','','','0','20');
INSERT INTO `bees_category` VALUES('9','','企业新闻','0','0','2','xwzx/qyxw','1','0','0','','list_article.html','article_content.html','','','','cn','4','1','','0','http://','0','8','','','','','0','20');
INSERT INTO `bees_category` VALUES('10','','使用帮助','0','0','2','xwzx/sybz','2','0','0','','list_article.html','article_content.html','','','','cn','4','1','','0','http://','0','8','','','','','0','20');
INSERT INTO `bees_category` VALUES('11','','手提包','0','0','3','cpzx/stb','1','0','0','','list_product.html','product_content.html','','','','cn','5','1','','0','http://','0','8','','','','','4','20');
INSERT INTO `bees_category` VALUES('12','','产品订购','0','0','-9','cpdg','6','0','0','','list_order.html','order_content.html','','','','cn','8','1','2','0','http://','0','5','','','','','0','20');
INSERT INTO `bees_category` VALUES('13','','公文包','0','0','3','cpzx/gwb','2','0','0','','list_product.html','product_content.html','','','','cn','5','1','','0','http://','0','8','','','','','0','20');
INSERT INTO `bees_category` VALUES('14','','真皮包','0','0','3','cpzx/zpb','3','0','0','','list_product.html','product_content.html','','','','cn','5','1','','0','http://','0','8','','','','','0','20');
INSERT INTO `bees_category` VALUES('15','','办公设备','0','0','3','cpzx/bgsb','4','0','0','','list_product.html','product_content.html','','','','cn','5','1','','0','http://','0','8','','','','','0','20');
INSERT INTO `bees_category` VALUES('16','','数码用品','0','0','3','cpzx/smyp','5','0','0','','list_product.html','product_content.html','','','','cn','5','1','','0','http://','0','8','','','','','0','20');
INSERT INTO `bees_category` VALUES('17','','喷墨打印机','0','0','3','cpzx/bgsb/pmdyj','10','0','0','','list_product.html','product_content.html','','','','cn','15','1','','0','http://','0','8','','','','','0','20');
DROP TABLE IF EXISTS `bees_channel`;
CREATE TABLE `bees_channel` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `channel_name` varchar(60) NOT NULL,
  `channel_mark` varchar(60) NOT NULL,
  `channel_table` varchar(60) NOT NULL,
  `is_disable` mediumint(8) NOT NULL,
  `is_member` mediumint(8) DEFAULT NULL,
  `channel_mb_grade` mediumint(8) DEFAULT '0',
  `is_verify` mediumint(8) NOT NULL COMMENT '发布内容是否审核',
  `is_del` mediumint(8) NOT NULL DEFAULT '0',
  `channel_order` mediumint(8) NOT NULL DEFAULT '10',
  `is_alone` mediumint(8) NOT NULL DEFAULT '0',
  `list_php` varchar(150) DEFAULT NULL,
  `content_php` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
INSERT INTO `bees_channel` VALUES('1','单页模型','alone','alone','0','0','2','0','1','5','1','alone/alone.php','alone/show_alone.php');
INSERT INTO `bees_channel` VALUES('2','文章模块','article','article','0','0','2','0','0','1','0','article/article.php','article/show_article.php');
INSERT INTO `bees_channel` VALUES('3','产品模块','product','product','0','0','2','0','0','2','0','product/product.php','product/show_product.php');
INSERT INTO `bees_channel` VALUES('4','下载模块','down','down','0','0','2','0','0','3','0','down/down.php','down/show_down.php');
INSERT INTO `bees_channel` VALUES('5','招聘模块','job','job','0','0','2','0','0','4','0','job/job.php','job/show_job.php');
DROP TABLE IF EXISTS `bees_cmsinfo`;
CREATE TABLE `bees_cmsinfo` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `info_tag` varchar(60) DEFAULT NULL COMMENT '配置信息标识',
  `info_array` text COMMENT '配置信息内容',
  `info_name` varchar(60) DEFAULT NULL COMMENT '配置信息名',
  `lang_tag` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
INSERT INTO `bees_cmsinfo` VALUES('1','sys','array (\n  \'web_upload_file\' => \'zip|gz|rar|iso|doc|xsl|ppt|wps|swf|mpg|mp3|rm|rmvb|wmv|wma|wav|mid|mov\',\n  \'thump_width\' => \'300\',\n  \'thump_height\' => \'200\',\n  \'upload_size\' => \'2024000\',\n  \'web_member\' => \n  array (\n    0 => \'1\',\n  ),\n  \'is_member\' => \n  array (\n    0 => \'1\',\n  ),\n  \'member_mail\' => \n  array (\n    0 => \'1\',\n  ),\n  \'member_no_name\' => \'admin|administrator|user|users\',\n  \'image_is\' => \n  array (\n    0 => \'1\',\n  ),\n  \'image_url_is\' => \n  array (\n    0 => \'1\',\n  ),\n  \'image_type\' => \n  array (\n    0 => \'1\',\n  ),\n  \'image_text\' => \'www.beescms.com\',\n  \'image_text_color\' => \'0,0,0\',\n  \'image_text_size\' => \'12\',\n  \'pic\' => \'mark_logo.gif\',\n  \'image_position\' => \n  array (\n    0 => \'9\',\n  ),\n  \'mail_type\' => \n  array (\n    0 => \'1\',\n  ),\n  \'mail_host\' => \'smtp.163.com\',\n  \'mail_pot\' => \'25\',\n  \'mail_mail\' => \'\',\n  \'mail_user\' => \'admin\',\n  \'mail_pw\' => \'admin\',\n  \'mail_js\' => \'\',\n  \'mail_jw\' => \'BEESCMS企业网站管理系统 http://www.beescms.com\',\n  \'safe_open\' => \n  array (\n    0 => \'1\',\n    1 => \'2\',\n    2 => \'3\',\n  ),\n  \'web_content_title\' => \'180\',\n  \'web_content_info\' => \'200\',\n  \'is_hits\' => \'1\',\n  \'fialt_words\' => \'她妈|它妈|他妈|你妈|去死|贱人|非典|艾滋病|阳痿\',\n  \'arc_html\' => \n  array (\n    0 => \'1\',\n  ),\n)','系统配置','');
INSERT INTO `bees_cmsinfo` VALUES('2','index_info','array (\n  \'flash_is\' => \'0\',\n  \'index_lang\' => \'9\',\n)','首页配置','');
INSERT INTO `bees_cmsinfo` VALUES('6','info','array (\n  \'web_name\' => \'BEES企业网站管理系统_企业建站系统_外贸网站建设_企业CMS_PHP营销企业网站模板_免费开源的PHP企业网站程序\',\n  \'web_url\' => \'http://localhost/beescms3/\',\n  \'web_path\' => \'/beescms3/\',\n  \'web_html\' => \'0\',\n  \'is_cache\' => \'0\',\n  \'cache_time\' => \'30\',\n  \'web_template\' => \'default\',\n  \'web_address\' => \'\',\n  \'web_phone\' => \'\',\n  \'web_mail\' => \'\',\n  \'web_powerby\' => \'BEESCMS企业网站管理系统_企业网站制作更便利,企业网站建设和管理更方便<br>\',\n  \'web_keywords\' => \'\',\n  \'web_description\' => \'BEES企业网站管理系统，是一套模板程序完全分离，采用PHP+MYSQL技术开发，具备强大的SEO功能，简单操作的自助建站系统，只要会打字就能建设企业网站，更有免费营销企业网站模板提供下载，是建设外贸网站，公司企业网站的好助手\',\n  \'web_beian\' => \'\',\n  \'web_yinxiao\' => \'\',\n  \'hot_key\' => \'BEESCMS|教程|帮助|企业网站程序\',\n)','网站配置','cn');
DROP TABLE IF EXISTS `bees_collect`;
CREATE TABLE `bees_collect` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `member_id` mediumint(8) NOT NULL,
  `arc_id` mediumint(8) NOT NULL,
  `addtime` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bees_down`;
CREATE TABLE `bees_down` (
  `id` mediumint(8) NOT NULL,
  `down` varchar(255) DEFAULT NULL,
  `body` text,
  `content` text,
  `filesize` varchar(255) DEFAULT NULL,
  `filetype` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `bees_down` VALUES('16','http://www.beescms.com','','<div class=\"arc_body\">\r\n<div class=\"us\">\r\n<p>BEES企业网站管理系统（以下称BEES）是一个基于PHP+Mysql架构的企业网站管理系统。BEES 采用模块化方式开发，功能强大灵活易于扩展，并且完全开放源代码，多种语言分站，为企业网站建设和外贸提供解决方案。</p>\r\n<p><br />\r\n<strong>主要特性：</strong></p>\r\n<p><br />\r\n<span style=\"color: rgb(0, 0, 255);\">1、支持多种语言</span></p>\r\n<p><br />\r\nBEES支持多种语言，后台添加自动生成，可为每种语言分配网站风格。</p>\r\n<p><br />\r\n<span style=\"color: rgb(0, 0, 255);\">2、功能强大灵活</span></p>\r\n<p><br />\r\nBEES除内置的文章、产品等模型外，还可以自定义生成其它模型，满足不同的需求</p>\r\n<p><br />\r\n<span style=\"color: rgb(0, 0, 255);\">3、自定义表单系统</span></p>\r\n<p><br />\r\nBEES可自定义表单系统，后台按需要生成，将生成的标签加到模板中便可使用。</p>\r\n<p><br />\r\n<span style=\"color: rgb(0, 0, 255);\">4、模板制作方便</span></p>\r\n<p><br />\r\n采用MVC设计模式实现了程序与模板完全分离，使用原生php函数，后台可以对模板进行编辑，分别适合美工和程序员使用。</p>\r\n<p><br />\r\n<span style=\"color: rgb(0, 0, 255);\">5、用户体验好</span></p>\r\n<p><br />\r\n前台、后台、会员中心模板都采用 DIV+CSS，兼容 IE 和 Firefox 浏览器，访问速度快。</p>\r\n<p><br />\r\n<span style=\"color: rgb(0, 0, 255);\">6、支持用户反馈信息</span></p>\r\n<p><br />\r\n<span style=\"color: rgb(0, 0, 255);\">7、SEO优化</span></p>\r\n<p>可设置网站SEO参数及所有页面SEO信息，如关键词、页面描述等，可以自定义url生成；</p>\r\n<p><span style=\"color: rgb(0, 0, 255);\">8、人性化后台操作</span></p>\r\n<p>维护管理更方便</p>\r\n<p>可全站生成静态html页面</p>\r\n<p>&nbsp;</p>\r\n<p>官方网站：http://www.beescms.com</p>\r\n<p>交流论坛：http://www.beescms.com/bbs</p>\r\n<p>在线帮助：http://www.beescms.com/help</p>\r\n</div>\r\n</div>','','.exe');
DROP TABLE IF EXISTS `bees_flash_ad`;
CREATE TABLE `bees_flash_ad` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `pic` varchar(255) DEFAULT NULL,
  `pic_url` varchar(255) DEFAULT NULL,
  `pic_text` varchar(255) DEFAULT NULL,
  `pic_order` mediumint(8) NOT NULL DEFAULT '10',
  `lang` varchar(60) CHARACTER SET latin1 NOT NULL,
  `cate_id` mediumint(8) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
INSERT INTO `bees_flash_ad` VALUES('1','img/20110625/201106251133539086.gif','http://www.beescms.com','','1','cn','1');
INSERT INTO `bees_flash_ad` VALUES('2','img/20110625/201106251134131106.gif','http://www.beescms.com','','10','cn','1');
DROP TABLE IF EXISTS `bees_flash_ad_cate`;
CREATE TABLE `bees_flash_ad_cate` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(60) NOT NULL,
  `cate_tpl_id` mediumint(8) DEFAULT '0',
  `is_disable` mediumint(8) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `bees_flash_ad_cate` VALUES('1','默认','0','1');
DROP TABLE IF EXISTS `bees_flash_info`;
CREATE TABLE `bees_flash_info` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `flash_width` varchar(60) DEFAULT NULL,
  `flash_height` varchar(60) DEFAULT NULL,
  `flash_style` mediumint(8) NOT NULL,
  `lang` varchar(60) NOT NULL,
  `cate_id` mediumint(8) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bees_form`;
CREATE TABLE `bees_form` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `form_name` varchar(60) NOT NULL,
  `form_mark` varchar(60) NOT NULL,
  `is_disable` mediumint(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
INSERT INTO `bees_form` VALUES('5','产品购买','prinfo','0');
INSERT INTO `bees_form` VALUES('8','在线应聘','webjob','0');
DROP TABLE IF EXISTS `bees_formfield`;
CREATE TABLE `bees_formfield` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(60) NOT NULL,
  `use_name` varchar(60) NOT NULL,
  `field_type` varchar(60) NOT NULL,
  `field_value` varchar(255) NOT NULL,
  `field_length` mediumint(8) NOT NULL,
  `form_id` mediumint(8) NOT NULL,
  `field_info` varchar(60) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `is_disable` mediumint(8) NOT NULL,
  `form_order` mediumint(8) NOT NULL DEFAULT '0',
  `is_empty` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
INSERT INTO `bees_formfield` VALUES('8','title','主题','text','','255','5','','0','1','0');
INSERT INTO `bees_formfield` VALUES('9','username','姓名','text','','255','5','','0','3','0');
INSERT INTO `bees_formfield` VALUES('10','sex','性别','select','男士,女士','255','5','','0','5','1');
INSERT INTO `bees_formfield` VALUES('17','address','详细地址','text','','255','5','','0','7','0');
INSERT INTO `bees_formfield` VALUES('12','mail','邮箱','text','','255','5','','0','6','1');
INSERT INTO `bees_formfield` VALUES('13','tel','联系电话','text','','255','5','','0','4','0');
INSERT INTO `bees_formfield` VALUES('14','content','其它内容','textarea','','255','5','','0','9','0');
INSERT INTO `bees_formfield` VALUES('18','addcode','邮政编码','text','','255','5','','0','8','0');
INSERT INTO `bees_formfield` VALUES('19','jobname','姓名','text','','255','8','','0','1','0');
INSERT INTO `bees_formfield` VALUES('20','jobsex','性别','select','男,女','255','8','','0','2','0');
INSERT INTO `bees_formfield` VALUES('21','jobmoth','出生年月','text','','255','8','','0','3','0');
INSERT INTO `bees_formfield` VALUES('22','jobjg','籍贯','text','','255','8','','0','4','0');
INSERT INTO `bees_formfield` VALUES('23','jobxl','学历','text','','255','8','','0','5','0');
INSERT INTO `bees_formfield` VALUES('24','jobzy','专业','text','','255','8','','0','6','0');
INSERT INTO `bees_formfield` VALUES('25','jobbyyx','毕业院校','text','','255','8','','0','7','0');
INSERT INTO `bees_formfield` VALUES('26','jobphone','联系电话','text','','255','8','','0','8','0');
INSERT INTO `bees_formfield` VALUES('27','jobmail','E–mail','text','','255','8','','0','9','0');
INSERT INTO `bees_formfield` VALUES('28','jobhj','所获奖项','textarea','','255','8','','0','10','0');
INSERT INTO `bees_formfield` VALUES('29','jobgzjl','工作经历','textarea','','255','8','','0','11','0');
INSERT INTO `bees_formfield` VALUES('30','jobzyjn','专业技能','textarea','','255','8','','0','12','0');
INSERT INTO `bees_formfield` VALUES('31','jobyyah','业余爱好','textarea','','255','8','','0','13','0');
DROP TABLE IF EXISTS `bees_formlist`;
CREATE TABLE `bees_formlist` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `form_id` mediumint(8) DEFAULT NULL,
  `form_time` varchar(60) DEFAULT NULL,
  `form_ip` varchar(60) DEFAULT NULL,
  `is_read` mediumint(8) NOT NULL DEFAULT '0',
  `member_id` mediumint(8) DEFAULT '0',
  `arc_id` mediumint(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bees_job`;
CREATE TABLE `bees_job` (
  `id` mediumint(8) NOT NULL,
  `jobnum` varchar(255) DEFAULT NULL,
  `jopaddress` varchar(255) DEFAULT NULL,
  `joblasttime` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `bees_job` VALUES('24','1','北京','2012-1-2','<p><strong>岗位职责 <br />\r\n</strong>1、专业人员职位，在上级的领导和监督下定期完成量化的工作要求，并能独立处理和解决所负责的任务；<br />\r\n2、协助财务预算、审核、监督工作，按照公司及政府有关部门要求及时编制各种财务报表并报送相关部门；<br />\r\n3、负责员工报销费用的审核、凭证的编制和登帐；<br />\r\n4、对已审核的原始凭证及时填制记帐；<br />\r\n5、准备、分析、核对税务相关问题；<br />\r\n6、审计合同、制作帐目表格。<br />\r\n<br />\r\n<strong>任职资格 <br />\r\n</strong>1、财务、会计专业大专以上学历，持有会计证；<br />\r\n2、有财务会计工作经历者优先；<br />\r\n3、熟悉会计报表的处理，会计法规和税法，熟练使用财务软件；<br />\r\n4、良好的学习能力、独立工作能力和财务分析能力；<br />\r\n5、工作细致，责任感强，良好的沟通能力、团队精神。</p>');
DROP TABLE IF EXISTS `bees_keywords`;
CREATE TABLE `bees_keywords` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `keywords` varchar(60) NOT NULL,
  `wordsurl` varchar(60) NOT NULL,
  `lang` varchar(60) CHARACTER SET ucs2 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bees_lang`;
CREATE TABLE `bees_lang` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(60) NOT NULL,
  `lang_order` mediumint(8) NOT NULL,
  `lang_tag` varchar(60) NOT NULL,
  `lang_is_use` mediumint(8) NOT NULL DEFAULT '1',
  `lang_is_open` mediumint(8) NOT NULL,
  `lang_is_url` mediumint(8) NOT NULL,
  `lang_url` varchar(60) DEFAULT NULL,
  `lang_is_fix` mediumint(8) NOT NULL DEFAULT '0',
  `lang_main` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
INSERT INTO `bees_lang` VALUES('10','English','9','en','1','0','0','http://','0','0');
INSERT INTO `bees_lang` VALUES('9','简体中文','10','cn','1','0','0','http://','1','1');
DROP TABLE IF EXISTS `bees_lang_cate`;
CREATE TABLE `bees_lang_cate` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `lang_cate` varchar(60) NOT NULL,
  `lang_info` text,
  `lang` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
INSERT INTO `bees_lang_cate` VALUES('1','模板语言','模板中使用到的语言，如栏目名等','cn');
INSERT INTO `bees_lang_cate` VALUES('2','全局语言','程序中使用的语言，为了程序运行正常，请勿删除','cn');
INSERT INTO `bees_lang_cate` VALUES('3','信息提示','前台一些反馈信息','cn');
INSERT INTO `bees_lang_cate` VALUES('4','会员中心','会员中心使用的导航等语言','cn');
INSERT INTO `bees_lang_cate` VALUES('18','会员中心','会员中心使用的导航等语言','en');
INSERT INTO `bees_lang_cate` VALUES('17','信息提示','前台一些反馈信息','en');
INSERT INTO `bees_lang_cate` VALUES('16','全局语言','程序中使用的语言，为了程序运行正常，请勿删除','en');
INSERT INTO `bees_lang_cate` VALUES('15','模板语言','模板中使用到的语言，如栏目名等','en');
DROP TABLE IF EXISTS `bees_lang_lang`;
CREATE TABLE `bees_lang_lang` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `lang_tag` varchar(60) NOT NULL,
  `lang_value` varchar(240) DEFAULT NULL,
  `lang` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=376 DEFAULT CHARSET=utf8;
INSERT INTO `bees_lang_lang` VALUES('5','pages','共','cn');
INSERT INTO `bees_lang_lang` VALUES('6','pagesize','条记录','cn');
INSERT INTO `bees_lang_lang` VALUES('7','page','当前第','cn');
INSERT INTO `bees_lang_lang` VALUES('8','pagehome','首页','cn');
INSERT INTO `bees_lang_lang` VALUES('9','pageend','尾页','cn');
INSERT INTO `bees_lang_lang` VALUES('10','pagapre','上一页','cn');
INSERT INTO `bees_lang_lang` VALUES('11','pagenext','下一页','cn');
INSERT INTO `bees_lang_lang` VALUES('12','pagego','转到','cn');
INSERT INTO `bees_lang_lang` VALUES('13','previous','上一条','cn');
INSERT INTO `bees_lang_lang` VALUES('14','next','下一条','cn');
INSERT INTO `bees_lang_lang` VALUES('15','nonestr','没有了','cn');
INSERT INTO `bees_lang_lang` VALUES('16','index','首页','cn');
INSERT INTO `bees_lang_lang` VALUES('17','sitemap','网站地图','cn');
INSERT INTO `bees_lang_lang` VALUES('19','index_news','新闻中心','cn');
INSERT INTO `bees_lang_lang` VALUES('20','index_company','公司简介','cn');
INSERT INTO `bees_lang_lang` VALUES('21','contact','联系方式','cn');
INSERT INTO `bees_lang_lang` VALUES('22','products','产品展示','cn');
INSERT INTO `bees_lang_lang` VALUES('23','products_nav','产品导航','cn');
INSERT INTO `bees_lang_lang` VALUES('24','links','友情链接','cn');
INSERT INTO `bees_lang_lang` VALUES('25','location','当前位置','cn');
INSERT INTO `bees_lang_lang` VALUES('26','rec_content','推荐产品','cn');
INSERT INTO `bees_lang_lang` VALUES('27','hot_content','热门内容','cn');
INSERT INTO `bees_lang_lang` VALUES('28','rec_products','推荐产品','cn');
INSERT INTO `bees_lang_lang` VALUES('29','like_content','相关内容','cn');
INSERT INTO `bees_lang_lang` VALUES('30','content_hits','点击次数','cn');
INSERT INTO `bees_lang_lang` VALUES('31','content_pubdate','更新时间','cn');
INSERT INTO `bees_lang_lang` VALUES('32','close','关闭','cn');
INSERT INTO `bees_lang_lang` VALUES('33','print','打印','cn');
INSERT INTO `bees_lang_lang` VALUES('34','add_favorites','加入收藏','cn');
INSERT INTO `bees_lang_lang` VALUES('35','current_time','当前时间','cn');
INSERT INTO `bees_lang_lang` VALUES('36','member_home','中心首页','cn');
INSERT INTO `bees_lang_lang` VALUES('37','member_info','用户信息','cn');
INSERT INTO `bees_lang_lang` VALUES('38','member_ask','会员咨询','cn');
INSERT INTO `bees_lang_lang` VALUES('39','member_fav','我的收藏','cn');
INSERT INTO `bees_lang_lang` VALUES('40','member_wel','欢迎你回来!','cn');
INSERT INTO `bees_lang_lang` VALUES('41','member_grade','用户级别','cn');
INSERT INTO `bees_lang_lang` VALUES('42','member_last_login','上次登陆时间','cn');
INSERT INTO `bees_lang_lang` VALUES('43','member_last_login_ip','上次登陆IP','cn');
INSERT INTO `bees_lang_lang` VALUES('44','member_login_num','登录次数','cn');
INSERT INTO `bees_lang_lang` VALUES('45','member_home_title','用户中心统计','cn');
INSERT INTO `bees_lang_lang` VALUES('46','member_birth','出生日期','cn');
INSERT INTO `bees_lang_lang` VALUES('47','member_sex','性别','cn');
INSERT INTO `bees_lang_lang` VALUES('48','member_sex_none','保密','cn');
INSERT INTO `bees_lang_lang` VALUES('49','member_sex_man','男','cn');
INSERT INTO `bees_lang_lang` VALUES('50','member_sex_woman','女','cn');
INSERT INTO `bees_lang_lang` VALUES('51','member_mail','电子邮件','cn');
INSERT INTO `bees_lang_lang` VALUES('52','member_js','联系QQ','cn');
INSERT INTO `bees_lang_lang` VALUES('53','member_tel','固定电话','cn');
INSERT INTO `bees_lang_lang` VALUES('54','member_phone','手机','cn');
INSERT INTO `bees_lang_lang` VALUES('55','sys_dec','参数说明','cn');
INSERT INTO `bees_lang_lang` VALUES('56','sys_value','参数值','cn');
INSERT INTO `bees_lang_lang` VALUES('57','sys_name','变量名','cn');
INSERT INTO `bees_lang_lang` VALUES('58','sys_submit','确定','cn');
INSERT INTO `bees_lang_lang` VALUES('59','sys_reset','取消','cn');
INSERT INTO `bees_lang_lang` VALUES('60','member_ask_manage','咨询管理','cn');
INSERT INTO `bees_lang_lang` VALUES('61','member_ask_add','添加咨询','cn');
INSERT INTO `bees_lang_lang` VALUES('62','member_ask_title','咨询标题','cn');
INSERT INTO `bees_lang_lang` VALUES('63','member_ask_content','咨询内容','cn');
INSERT INTO `bees_lang_lang` VALUES('64','sys_title','标题','cn');
INSERT INTO `bees_lang_lang` VALUES('65','sys_time','添加时间','cn');
INSERT INTO `bees_lang_lang` VALUES('66','sys_stas','状态','cn');
INSERT INTO `bees_lang_lang` VALUES('67','sys_caozuo','操作','cn');
INSERT INTO `bees_lang_lang` VALUES('68','member_password_old','旧密码','cn');
INSERT INTO `bees_lang_lang` VALUES('69','member_password_new','新密码','cn');
INSERT INTO `bees_lang_lang` VALUES('70','member_password_newt','确认新密码','cn');
INSERT INTO `bees_lang_lang` VALUES('71','member_index','网站首页','cn');
INSERT INTO `bees_lang_lang` VALUES('72','member_out','退出登陆','cn');
INSERT INTO `bees_lang_lang` VALUES('73','member_login_user','用户名','cn');
INSERT INTO `bees_lang_lang` VALUES('74','member_login_pass','登陆密码','cn');
INSERT INTO `bees_lang_lang` VALUES('75','member_login_code','验证码','cn');
INSERT INTO `bees_lang_lang` VALUES('76','member_login','登陆','cn');
INSERT INTO `bees_lang_lang` VALUES('77','member_regist','注册会员','cn');
INSERT INTO `bees_lang_lang` VALUES('78','member_reg_nich','昵称','cn');
INSERT INTO `bees_lang_lang` VALUES('79','member_reg_pass','登陆密码','cn');
INSERT INTO `bees_lang_lang` VALUES('80','member_reg_passt','确认密码','cn');
INSERT INTO `bees_lang_lang` VALUES('81','member_reg_mail','电子邮箱','cn');
INSERT INTO `bees_lang_lang` VALUES('82','member_reg_mail_info','每个电子邮邮箱只能注册一个帐号','cn');
INSERT INTO `bees_lang_lang` VALUES('83','member_login_info','账号登陆','cn');
INSERT INTO `bees_lang_lang` VALUES('84','member_msg','请先登录','cn');
INSERT INTO `bees_lang_lang` VALUES('85','member_msg2','验证码不正确','cn');
INSERT INTO `bees_lang_lang` VALUES('86','member_smg3','用户名或密码不能为空','cn');
INSERT INTO `bees_lang_lang` VALUES('87','member_msg3','用户名名或密码不正确','cn');
INSERT INTO `bees_lang_lang` VALUES('88','member_msg4','登录失败,该账号已被锁定','cn');
INSERT INTO `bees_lang_lang` VALUES('89','member_msg5','会员注册已经暂停','cn');
INSERT INTO `bees_lang_lang` VALUES('90','member_msg6','用户名只能是字母数字，4以上长度','cn');
INSERT INTO `bees_lang_lang` VALUES('91','member_msg7','昵称只能是字母数字，4以上长度','cn');
INSERT INTO `bees_lang_lang` VALUES('92','member_msg8','密码不能为空','cn');
INSERT INTO `bees_lang_lang` VALUES('93','member_msg9','两次密码不一样','cn');
INSERT INTO `bees_lang_lang` VALUES('94','member_msg10','邮箱不正确','cn');
INSERT INTO `bees_lang_lang` VALUES('95','member_msg11','该用户名不能注册','cn');
INSERT INTO `bees_lang_lang` VALUES('96','member_msg12','已经存在相同的用户名，请更换用户名','cn');
INSERT INTO `bees_lang_lang` VALUES('97','member_msg13','该邮箱已经被使用,请更换','cn');
INSERT INTO `bees_lang_lang` VALUES('98','member_msg14','用户注册成功','cn');
INSERT INTO `bees_lang_lang` VALUES('99','msg_info','不存在flash引导页模板','cn');
INSERT INTO `bees_lang_lang` VALUES('100','msg_info2','不存在【@】语言首页模板','cn');
INSERT INTO `bees_lang_lang` VALUES('101','msg_info3','找不到【@】语言模板文件','cn');
INSERT INTO `bees_lang_lang` VALUES('102','msg_info4','请先生成【@】语言首页','cn');
INSERT INTO `bees_lang_lang` VALUES('103','msg_info5','请先更新栏目缓存','cn');
INSERT INTO `bees_lang_lang` VALUES('104','msg_info6','请先更新频道缓存','cn');
INSERT INTO `bees_lang_lang` VALUES('105','msg_info7','你当前的会员权限不能浏览','cn');
INSERT INTO `bees_lang_lang` VALUES('106','msg_info8','该内容未审核,还不能浏览','cn');
INSERT INTO `bees_lang_lang` VALUES('107','msg_info9','还没有添加内容','cn');
INSERT INTO `bees_lang_lang` VALUES('108','tpl_look','详细查看','cn');
INSERT INTO `bees_lang_lang` VALUES('109','tpl_file_type','文件类型','cn');
INSERT INTO `bees_lang_lang` VALUES('110','tpl_file_size','文件大小','cn');
INSERT INTO `bees_lang_lang` VALUES('111','tpl_content','详细内容','cn');
INSERT INTO `bees_lang_lang` VALUES('112','tpl_dwon_add','下载地址','cn');
INSERT INTO `bees_lang_lang` VALUES('113','tpl_down','点击下载','cn');
INSERT INTO `bees_lang_lang` VALUES('114','tpl_jobtype','工作性质','cn');
INSERT INTO `bees_lang_lang` VALUES('115','tpl_jobnum','招聘人数','cn');
INSERT INTO `bees_lang_lang` VALUES('116','tpl_jobexp','工作经验','cn');
INSERT INTO `bees_lang_lang` VALUES('117','tpl_jobaddress','工作地点','cn');
INSERT INTO `bees_lang_lang` VALUES('118','tpl_jobage','年龄','cn');
INSERT INTO `bees_lang_lang` VALUES('119','tpl_joblanguage','语言及水平要求','cn');
INSERT INTO `bees_lang_lang` VALUES('120','tpl_joblasttime','截止日期','cn');
INSERT INTO `bees_lang_lang` VALUES('121','tpl_jobsalary','待遇','cn');
INSERT INTO `bees_lang_lang` VALUES('122','tpl_jobheight','身高','cn');
INSERT INTO `bees_lang_lang` VALUES('123','tpl_jobedu','学历','cn');
INSERT INTO `bees_lang_lang` VALUES('124','tpl_jobsex','性别','cn');
INSERT INTO `bees_lang_lang` VALUES('125','tpl_jobtel','联系电话','cn');
INSERT INTO `bees_lang_lang` VALUES('126','tpl_jobmail','EMail','cn');
INSERT INTO `bees_lang_lang` VALUES('127','tpl_jobweb','网址','cn');
INSERT INTO `bees_lang_lang` VALUES('128','tpl_list','列表页','cn');
INSERT INTO `bees_lang_lang` VALUES('129','tpl_spec','产品规格','cn');
INSERT INTO `bees_lang_lang` VALUES('130','tpl_marketprice','产品价格','cn');
INSERT INTO `bees_lang_lang` VALUES('131','tpl_model','产品型号','cn');
INSERT INTO `bees_lang_lang` VALUES('132','tpl_pfsm','批发说明','cn');
INSERT INTO `bees_lang_lang` VALUES('133','tpl_yfsm','运费说明','cn');
INSERT INTO `bees_lang_lang` VALUES('134','tpl_jyfs','交易方式','cn');
INSERT INTO `bees_lang_lang` VALUES('135','tpl_fkxx','反馈信息','cn');
INSERT INTO `bees_lang_lang` VALUES('136','sitemap','Site Map','en');
INSERT INTO `bees_lang_lang` VALUES('137','index_news','News','en');
INSERT INTO `bees_lang_lang` VALUES('138','index_company','Company Profile','en');
INSERT INTO `bees_lang_lang` VALUES('139','contact','Contact','en');
INSERT INTO `bees_lang_lang` VALUES('140','products','Products','en');
INSERT INTO `bees_lang_lang` VALUES('141','products_nav','Navigation','en');
INSERT INTO `bees_lang_lang` VALUES('142','links','Links','en');
INSERT INTO `bees_lang_lang` VALUES('143','location','Location','en');
INSERT INTO `bees_lang_lang` VALUES('144','rec_content','Recommended Content','en');
INSERT INTO `bees_lang_lang` VALUES('145','hot_content','Popular content','en');
INSERT INTO `bees_lang_lang` VALUES('146','rec_products','Recommended Products','en');
INSERT INTO `bees_lang_lang` VALUES('147','like_content','Related Content','en');
INSERT INTO `bees_lang_lang` VALUES('148','content_hits','Clicks','en');
INSERT INTO `bees_lang_lang` VALUES('149','content_pubdate','Updated','en');
INSERT INTO `bees_lang_lang` VALUES('150','close','Close','en');
INSERT INTO `bees_lang_lang` VALUES('151','print','Print','en');
INSERT INTO `bees_lang_lang` VALUES('152','add_favorites','Add to Favorites','en');
INSERT INTO `bees_lang_lang` VALUES('153','tpl_look','Detailed View','en');
INSERT INTO `bees_lang_lang` VALUES('154','tpl_file_type','File Type','en');
INSERT INTO `bees_lang_lang` VALUES('155','tpl_file_size','File Size','en');
INSERT INTO `bees_lang_lang` VALUES('156','tpl_content','Details','en');
INSERT INTO `bees_lang_lang` VALUES('157','tpl_dwon_add','Download','en');
INSERT INTO `bees_lang_lang` VALUES('158','tpl_down','Click to download','en');
INSERT INTO `bees_lang_lang` VALUES('159','tpl_jobtype','Nature of work','en');
INSERT INTO `bees_lang_lang` VALUES('160','tpl_jobnum','Number','en');
INSERT INTO `bees_lang_lang` VALUES('161','tpl_jobexp','Work experience','en');
INSERT INTO `bees_lang_lang` VALUES('162','tpl_jobaddress','Location','en');
INSERT INTO `bees_lang_lang` VALUES('163','tpl_jobage','Age','en');
INSERT INTO `bees_lang_lang` VALUES('164','tpl_joblanguage','Language and level requirements','en');
INSERT INTO `bees_lang_lang` VALUES('165','tpl_joblasttime','Deadline','en');
INSERT INTO `bees_lang_lang` VALUES('166','tpl_jobsalary','Treatment','en');
INSERT INTO `bees_lang_lang` VALUES('167','tpl_jobheight','Height','en');
INSERT INTO `bees_lang_lang` VALUES('168','tpl_jobedu','Education','en');
INSERT INTO `bees_lang_lang` VALUES('169','tpl_jobsex','sex','en');
INSERT INTO `bees_lang_lang` VALUES('170','tpl_jobtel','Contact','en');
INSERT INTO `bees_lang_lang` VALUES('171','tpl_jobmail','EMail','en');
INSERT INTO `bees_lang_lang` VALUES('172','tpl_jobweb','Website','en');
INSERT INTO `bees_lang_lang` VALUES('173','tpl_list','List','en');
INSERT INTO `bees_lang_lang` VALUES('174','tpl_spec','Product Specifications','en');
INSERT INTO `bees_lang_lang` VALUES('175','tpl_marketprice','Product Price','en');
INSERT INTO `bees_lang_lang` VALUES('176','tpl_model','Product Type','en');
INSERT INTO `bees_lang_lang` VALUES('177','tpl_pfsm','Wholesale Help','en');
INSERT INTO `bees_lang_lang` VALUES('178','tpl_yfsm','Shipping instructions','en');
INSERT INTO `bees_lang_lang` VALUES('179','tpl_jyfs','Trading','en');
INSERT INTO `bees_lang_lang` VALUES('180','tpl_fkxx','Feedback','en');
INSERT INTO `bees_lang_lang` VALUES('181','pages','total','en');
INSERT INTO `bees_lang_lang` VALUES('182','pagesize','Records','en');
INSERT INTO `bees_lang_lang` VALUES('183','page','Current','en');
INSERT INTO `bees_lang_lang` VALUES('184','pagehome','Home','en');
INSERT INTO `bees_lang_lang` VALUES('185','pageend','Last','en');
INSERT INTO `bees_lang_lang` VALUES('186','pagapre','Previous','en');
INSERT INTO `bees_lang_lang` VALUES('187','pagenext','Next','en');
INSERT INTO `bees_lang_lang` VALUES('188','pagego','Go','en');
INSERT INTO `bees_lang_lang` VALUES('189','previous','Previous','en');
INSERT INTO `bees_lang_lang` VALUES('190','next','Next','en');
INSERT INTO `bees_lang_lang` VALUES('191','nonestr','None','en');
INSERT INTO `bees_lang_lang` VALUES('192','index','Home','en');
INSERT INTO `bees_lang_lang` VALUES('193','sys_dec','Parameter Description','en');
INSERT INTO `bees_lang_lang` VALUES('194','sys_value','Parameter values','en');
INSERT INTO `bees_lang_lang` VALUES('195','sys_name','Variable name','en');
INSERT INTO `bees_lang_lang` VALUES('196','sys_submit','OK','en');
INSERT INTO `bees_lang_lang` VALUES('197','sys_reset','Reset','en');
INSERT INTO `bees_lang_lang` VALUES('198','sys_title','Title','en');
INSERT INTO `bees_lang_lang` VALUES('199','sys_time','Add Time','en');
INSERT INTO `bees_lang_lang` VALUES('200','sys_stas','Status','en');
INSERT INTO `bees_lang_lang` VALUES('201','sys_caozuo','Operation','en');
INSERT INTO `bees_lang_lang` VALUES('202','msg_info','There is no template to guide page','en');
INSERT INTO `bees_lang_lang` VALUES('203','msg_info2','There is no language page templates 【@】','en');
INSERT INTO `bees_lang_lang` VALUES('204','msg_info3','【@】 Language can not find the template file','en');
INSERT INTO `bees_lang_lang` VALUES('205','msg_info4','Please generate 【@】 Language Home','en');
INSERT INTO `bees_lang_lang` VALUES('206','msg_info5','Please update column cache','en');
INSERT INTO `bees_lang_lang` VALUES('207','msg_info6','请先更新频道缓存','en');
INSERT INTO `bees_lang_lang` VALUES('208','msg_info7','You can not view the current membership privilege','en');
INSERT INTO `bees_lang_lang` VALUES('209','msg_info8','The content is not reviewed, and can not browse','en');
INSERT INTO `bees_lang_lang` VALUES('210','msg_info9','No Contents','en');
INSERT INTO `bees_lang_lang` VALUES('211','current_time','Current time','en');
INSERT INTO `bees_lang_lang` VALUES('212','member_home','Home','en');
INSERT INTO `bees_lang_lang` VALUES('213','member_info','User Information','en');
INSERT INTO `bees_lang_lang` VALUES('214','member_ask','Member Advisory','en');
INSERT INTO `bees_lang_lang` VALUES('215','member_fav','Favorites','en');
INSERT INTO `bees_lang_lang` VALUES('216','member_wel','Welcome back!','en');
INSERT INTO `bees_lang_lang` VALUES('217','member_grade','User level','en');
INSERT INTO `bees_lang_lang` VALUES('218','member_last_login','Last login time','en');
INSERT INTO `bees_lang_lang` VALUES('219','member_last_login_ip','Last Login IP','en');
INSERT INTO `bees_lang_lang` VALUES('220','member_login_num','Login times','en');
INSERT INTO `bees_lang_lang` VALUES('221','member_home_title','Users statistics','en');
INSERT INTO `bees_lang_lang` VALUES('222','member_birth','Date of birth','en');
INSERT INTO `bees_lang_lang` VALUES('223','member_sex','sex','en');
INSERT INTO `bees_lang_lang` VALUES('224','member_sex_none','secrecy','en');
INSERT INTO `bees_lang_lang` VALUES('225','member_sex_man','man','en');
INSERT INTO `bees_lang_lang` VALUES('226','member_sex_woman','woman','en');
INSERT INTO `bees_lang_lang` VALUES('227','member_mail','E-mail','en');
INSERT INTO `bees_lang_lang` VALUES('228','member_js','Contact MSN','en');
INSERT INTO `bees_lang_lang` VALUES('229','member_tel','Telephone','en');
INSERT INTO `bees_lang_lang` VALUES('230','member_phone','Mobile','en');
INSERT INTO `bees_lang_lang` VALUES('231','member_ask_manage','Consulting','en');
INSERT INTO `bees_lang_lang` VALUES('232','member_ask_add','Add contact','en');
INSERT INTO `bees_lang_lang` VALUES('233','member_ask_title','Consultation Title','en');
INSERT INTO `bees_lang_lang` VALUES('234','member_ask_content','Advisory Content','en');
INSERT INTO `bees_lang_lang` VALUES('235','member_password_old','Old Password','en');
INSERT INTO `bees_lang_lang` VALUES('236','member_password_new','New Password','en');
INSERT INTO `bees_lang_lang` VALUES('237','member_password_newt','Confirm New Password','en');
INSERT INTO `bees_lang_lang` VALUES('238','member_index','Home','en');
INSERT INTO `bees_lang_lang` VALUES('239','member_out','Logout','en');
INSERT INTO `bees_lang_lang` VALUES('240','member_login_user','Username','en');
INSERT INTO `bees_lang_lang` VALUES('241','member_login_pass','Password','en');
INSERT INTO `bees_lang_lang` VALUES('242','member_login_code','Code','en');
INSERT INTO `bees_lang_lang` VALUES('243','member_login','Login','en');
INSERT INTO `bees_lang_lang` VALUES('244','member_regist','Register','en');
INSERT INTO `bees_lang_lang` VALUES('245','member_reg_nich','Nickname','en');
INSERT INTO `bees_lang_lang` VALUES('246','member_reg_pass','Password','en');
INSERT INTO `bees_lang_lang` VALUES('247','member_reg_passt','Confirm Password','en');
INSERT INTO `bees_lang_lang` VALUES('248','member_reg_mail','E-mail','en');
INSERT INTO `bees_lang_lang` VALUES('249','member_reg_mail_info','Each e-mail mailbox can only register an account','en');
INSERT INTO `bees_lang_lang` VALUES('250','member_login_info','Account Login','en');
INSERT INTO `bees_lang_lang` VALUES('251','member_msg','Please login','en');
INSERT INTO `bees_lang_lang` VALUES('252','member_msg2','Incorrect verification code','en');
INSERT INTO `bees_lang_lang` VALUES('253','member_smg3','User name or password can not be empty','en');
INSERT INTO `bees_lang_lang` VALUES('254','member_msg3','User name or password is incorrect','en');
INSERT INTO `bees_lang_lang` VALUES('255','member_msg4','Login fails, the account is locked','en');
INSERT INTO `bees_lang_lang` VALUES('256','member_msg5','Member registration has been suspended','en');
INSERT INTO `bees_lang_lang` VALUES('257','member_msg6','User name can only be alphanumeric, length of 4 or more','en');
INSERT INTO `bees_lang_lang` VALUES('258','member_msg7','Nickname only alphanumeric, length of 4 or more','en');
INSERT INTO `bees_lang_lang` VALUES('259','member_msg8','Password can not be empty','en');
INSERT INTO `bees_lang_lang` VALUES('260','member_msg9','Not the same password twice','en');
INSERT INTO `bees_lang_lang` VALUES('261','member_msg10','E-mail is not correct','en');
INSERT INTO `bees_lang_lang` VALUES('262','member_msg11','The user name can not be registered','en');
INSERT INTO `bees_lang_lang` VALUES('263','member_msg12','The same user name already exists, replace the user name','en');
INSERT INTO `bees_lang_lang` VALUES('264','member_msg13','The mailbox is already in use, replace','en');
INSERT INTO `bees_lang_lang` VALUES('265','member_msg14','User registration is successful','en');
INSERT INTO `bees_lang_lang` VALUES('266','member_msg15','QQ号码不正确','cn');
INSERT INTO `bees_lang_lang` VALUES('267','member_msg16','手机必须为数字','cn');
INSERT INTO `bees_lang_lang` VALUES('268','member_msg17','请从表单提交','cn');
INSERT INTO `bees_lang_lang` VALUES('269','member_msg18','修改成功','cn');
INSERT INTO `bees_lang_lang` VALUES('270','member_msg15','QQ number is not correct','en');
INSERT INTO `bees_lang_lang` VALUES('271','member_msg16','Phone number must be','en');
INSERT INTO `bees_lang_lang` VALUES('272','member_msg17','From the form submission','en');
INSERT INTO `bees_lang_lang` VALUES('273','member_msg18','Successfully modified','en');
INSERT INTO `bees_lang_lang` VALUES('274','msg_info10','参数传递错误,请重新操作','cn');
INSERT INTO `bees_lang_lang` VALUES('275','msg_info10','Parameter error, please try again','en');
INSERT INTO `bees_lang_lang` VALUES('276','member_msg19','标题或内容不能为空','cn');
INSERT INTO `bees_lang_lang` VALUES('277','member_msg20','咨询添加成功','cn');
INSERT INTO `bees_lang_lang` VALUES('278','member_msg21','不存在该咨询','cn');
INSERT INTO `bees_lang_lang` VALUES('279','member_msg22','咨询已经处理,请重新添加','cn');
INSERT INTO `bees_lang_lang` VALUES('280','member_msg23','内容不能为空','cn');
INSERT INTO `bees_lang_lang` VALUES('281','member_msg24','咨询修改成功','cn');
INSERT INTO `bees_lang_lang` VALUES('282','member_msg25','删除成功','cn');
INSERT INTO `bees_lang_lang` VALUES('283','member_msg26','原始密码不正确','cn');
INSERT INTO `bees_lang_lang` VALUES('284','member_msg27','已经退出','cn');
INSERT INTO `bees_lang_lang` VALUES('285','member_msg28','用户中心','cn');
INSERT INTO `bees_lang_lang` VALUES('286','member_msg29','用户登录','cn');
INSERT INTO `bees_lang_lang` VALUES('287','member_msg30','用户注册','cn');
INSERT INTO `bees_lang_lang` VALUES('288','member_msg31','注册会员','cn');
INSERT INTO `bees_lang_lang` VALUES('289','member_msg19','The title or content can not be empty','en');
INSERT INTO `bees_lang_lang` VALUES('290','member_msg20','Consulting added successfully','en');
INSERT INTO `bees_lang_lang` VALUES('291','member_msg21','The consultation does not exist','en');
INSERT INTO `bees_lang_lang` VALUES('292','member_msg22','Consultation has been processed, please re-add','en');
INSERT INTO `bees_lang_lang` VALUES('293','member_msg23','Content can not be empty','en');
INSERT INTO `bees_lang_lang` VALUES('294','member_msg24','Consulting successfully modified','en');
INSERT INTO `bees_lang_lang` VALUES('295','member_msg25','Deleted successfully','en');
INSERT INTO `bees_lang_lang` VALUES('296','member_msg26','The original password is incorrect','en');
INSERT INTO `bees_lang_lang` VALUES('297','member_msg27','Has withdrawn','en');
INSERT INTO `bees_lang_lang` VALUES('298','member_msg28','User Center','en');
INSERT INTO `bees_lang_lang` VALUES('299','member_msg29','User Login','en');
INSERT INTO `bees_lang_lang` VALUES('300','member_msg30','Register','en');
INSERT INTO `bees_lang_lang` VALUES('301','member_msg31','Register','en');
INSERT INTO `bees_lang_lang` VALUES('302','member_msg32','咨询总数','cn');
INSERT INTO `bees_lang_lang` VALUES('303','member_msg33','参数说明','cn');
INSERT INTO `bees_lang_lang` VALUES('304','member_msg34','内容','cn');
INSERT INTO `bees_lang_lang` VALUES('305','member_msg35','说明','cn');
INSERT INTO `bees_lang_lang` VALUES('306','member_msg36','标题','cn');
INSERT INTO `bees_lang_lang` VALUES('307','member_msg37','添加时间','cn');
INSERT INTO `bees_lang_lang` VALUES('308','member_msg38','状态','cn');
INSERT INTO `bees_lang_lang` VALUES('309','member_msg39','操作','cn');
INSERT INTO `bees_lang_lang` VALUES('310','member_msg40','未回复','cn');
INSERT INTO `bees_lang_lang` VALUES('311','member_msg41','已回复','cn');
INSERT INTO `bees_lang_lang` VALUES('312','member_msg42','咨询时间','cn');
INSERT INTO `bees_lang_lang` VALUES('313','member_msg43','回复','cn');
INSERT INTO `bees_lang_lang` VALUES('314','member_msg44','修改','cn');
INSERT INTO `bees_lang_lang` VALUES('315','member_msg45','查看','cn');
INSERT INTO `bees_lang_lang` VALUES('316','member_msg46','删除','cn');
INSERT INTO `bees_lang_lang` VALUES('317','member_msg47','确定','cn');
INSERT INTO `bees_lang_lang` VALUES('318','member_msg48','重置','cn');
INSERT INTO `bees_lang_lang` VALUES('319','member_msg49','已经注册！立即登录','cn');
INSERT INTO `bees_lang_lang` VALUES('320','member_msg50','注册会员您可以：','cn');
INSERT INTO `bees_lang_lang` VALUES('321','member_msg51','1. 保存您的个人资料','cn');
INSERT INTO `bees_lang_lang` VALUES('322','member_msg52','2. 收藏您关注的商品','cn');
INSERT INTO `bees_lang_lang` VALUES('323','member_msg53','3. 及时跟踪反馈信息','cn');
INSERT INTO `bees_lang_lang` VALUES('324','member_msg32','Advisory number','en');
INSERT INTO `bees_lang_lang` VALUES('325','member_msg33','Parameter Description','en');
INSERT INTO `bees_lang_lang` VALUES('326','member_msg34','Content','en');
INSERT INTO `bees_lang_lang` VALUES('327','member_msg35','Help','en');
INSERT INTO `bees_lang_lang` VALUES('328','member_msg36','Title','en');
INSERT INTO `bees_lang_lang` VALUES('329','member_msg37','Added Time','en');
INSERT INTO `bees_lang_lang` VALUES('330','member_msg38','Status','en');
INSERT INTO `bees_lang_lang` VALUES('331','member_msg39','Operation','en');
INSERT INTO `bees_lang_lang` VALUES('332','member_msg40','Did not respond','en');
INSERT INTO `bees_lang_lang` VALUES('333','member_msg41','Has returned','en');
INSERT INTO `bees_lang_lang` VALUES('334','member_msg42','Ask Time','en');
INSERT INTO `bees_lang_lang` VALUES('335','member_msg43','Reply','en');
INSERT INTO `bees_lang_lang` VALUES('336','member_msg44','Modify','en');
INSERT INTO `bees_lang_lang` VALUES('337','member_msg45','View','en');
INSERT INTO `bees_lang_lang` VALUES('338','member_msg46','Delete','en');
INSERT INTO `bees_lang_lang` VALUES('339','member_msg47','OK','en');
INSERT INTO `bees_lang_lang` VALUES('340','member_msg48','Reset','en');
INSERT INTO `bees_lang_lang` VALUES('341','member_msg49','Has been registered! Sign in now','en');
INSERT INTO `bees_lang_lang` VALUES('342','member_msg50','Registered member you can:','en');
INSERT INTO `bees_lang_lang` VALUES('343','member_msg51','1. to save your personal data','en');
INSERT INTO `bees_lang_lang` VALUES('344','member_msg52','2. collection for your interest in the goods','en');
INSERT INTO `bees_lang_lang` VALUES('345','member_msg53','3. timely feedback tracking','en');
INSERT INTO `bees_lang_lang` VALUES('346','member_msg54','修改密码','cn');
INSERT INTO `bees_lang_lang` VALUES('347','member_msg54','Change Password','en');
INSERT INTO `bees_lang_lang` VALUES('348','book','留言本','cn');
INSERT INTO `bees_lang_lang` VALUES('349','book','Guestbook','en');
INSERT INTO `bees_lang_lang` VALUES('350','book_msg1','留言本不能使用','cn');
INSERT INTO `bees_lang_lang` VALUES('351','book_msg2','留言标题不能为空','cn');
INSERT INTO `bees_lang_lang` VALUES('352','book_msg3','留言内容不能为空','cn');
INSERT INTO `bees_lang_lang` VALUES('353','book_msg4','添加成功','cn');
INSERT INTO `bees_lang_lang` VALUES('354','book_msg1','Message this can not be used','en');
INSERT INTO `bees_lang_lang` VALUES('355','book_msg2','Message title can not be empty','en');
INSERT INTO `bees_lang_lang` VALUES('356','book_msg3','Content can not be empty','en');
INSERT INTO `bees_lang_lang` VALUES('357','book_msg4','Successfully added','en');
INSERT INTO `bees_lang_lang` VALUES('358','book_msg5','Message name','en');
INSERT INTO `bees_lang_lang` VALUES('359','book_msg6','Message Title','en');
INSERT INTO `bees_lang_lang` VALUES('360','book_msg7','Message','en');
INSERT INTO `bees_lang_lang` VALUES('361','book_msg5','留言名','cn');
INSERT INTO `bees_lang_lang` VALUES('362','book_msg6','留言标题','cn');
INSERT INTO `bees_lang_lang` VALUES('363','book_msg7','留言内容','cn');
INSERT INTO `bees_lang_lang` VALUES('364','hot_search','热门搜索','cn');
INSERT INTO `bees_lang_lang` VALUES('365','hot_search','HOT','en');
INSERT INTO `bees_lang_lang` VALUES('366','web_type','类型','cn');
INSERT INTO `bees_lang_lang` VALUES('367','web_type','type','en');
INSERT INTO `bees_lang_lang` VALUES('368','liuyan','留言','cn');
INSERT INTO `bees_lang_lang` VALUES('369','liuyan','Message','en');
INSERT INTO `bees_lang_lang` VALUES('370','toushu','投诉','cn');
INSERT INTO `bees_lang_lang` VALUES('371','toushu','Complaint','en');
INSERT INTO `bees_lang_lang` VALUES('372','xunwen','询问','cn');
INSERT INTO `bees_lang_lang` VALUES('373','xunwen','Ask','en');
INSERT INTO `bees_lang_lang` VALUES('374','souhou','售后','cn');
INSERT INTO `bees_lang_lang` VALUES('375','souhou','Sale','en');
DROP TABLE IF EXISTS `bees_link`;
CREATE TABLE `bees_link` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `link_url` varchar(60) NOT NULL,
  `link_name` varchar(60) NOT NULL,
  `link_logo` varchar(60) DEFAULT NULL,
  `link_order` mediumint(8) NOT NULL DEFAULT '1',
  `link_info` varchar(255) DEFAULT NULL,
  `link_mail` varchar(60) DEFAULT NULL,
  `lang` varchar(60) NOT NULL,
  `addtime` varchar(60) DEFAULT NULL,
  `link_type` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
INSERT INTO `bees_link` VALUES('1','http://www.beescms.com','企业网站管理系统','http://','1','','','cn','1309053704','0');
INSERT INTO `bees_link` VALUES('2','http://www.beescms.com/bbs','交流论坛','http://','2','','','cn','1309053729','0');
INSERT INTO `bees_link` VALUES('3','http://www.beescms.com/help','在线帮助','http://','3','','','cn','1309053749','0');
INSERT INTO `bees_link` VALUES('4','http://www.beescms.com','BEES企业网站管理系统','img/20110812/201108121414162883.gif','1','','','cn','1313129685','1');
INSERT INTO `bees_link` VALUES('5','http://www.beesidc.com','域名空间','','1','','','cn','1323935030','0');
DROP TABLE IF EXISTS `bees_maintb`;
CREATE TABLE `bees_maintb` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `filter` varchar(60) DEFAULT NULL,
  `tbpic` varchar(60) DEFAULT NULL,
  `keywords` varchar(60) DEFAULT NULL,
  `info` text,
  `author` varchar(60) DEFAULT NULL,
  `source` varchar(60) DEFAULT NULL,
  `hits` mediumint(8) NOT NULL DEFAULT '0',
  `category` mediumint(8) NOT NULL,
  `channel` mediumint(9) NOT NULL,
  `addtime` varchar(60) NOT NULL,
  `updatetime` varchar(60) DEFAULT NULL,
  `top` mediumint(8) NOT NULL,
  `purview` mediumint(8) NOT NULL COMMENT '浏览权限',
  `is_html` mediumint(8) NOT NULL COMMENT '1为动态浏览,0为静态',
  `verify` mediumint(8) NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT NULL,
  `lang` varchar(60) DEFAULT NULL,
  `is_url` mediumint(8) NOT NULL DEFAULT '0',
  `url_add` varchar(60) DEFAULT NULL,
  `title_color` varchar(60) DEFAULT NULL,
  `title_style` mediumint(8) NOT NULL DEFAULT '0',
  `is_open` mediumint(8) NOT NULL DEFAULT '0',
  `cache_time` varchar(60) DEFAULT NULL,
  `custom_url` varchar(255) DEFAULT NULL,
  `c_order` mediumint(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
INSERT INTO `bees_maintb` VALUES('1','BEES企业建站系统如何添加公司简介等单页内容','','img/20110625/20110625120321_thumb.gif','','在企业网站中会存在一些单页内容，主要通过栏目或是其他链接进入，单页内容直接显示内容，不经过内容列表页或是其它页面，大多数都是独立的一个页面，如关于我们、公司简介等','未知','未知','8','9','2','1308971167','1308971167','0','0','0','0','htm/xwzx/qyxw/2011_0625_1.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('2','BEES企业建站系统如何添加联系方式关于我们等片段内容','','','','一个企业网站中都会存在一些片段内容，如联系方式等，这些片段内容不是一个独立的页面，只是一个或几个页面中的一些内容，\r\n使用BEES企业建站系统添加这些片段内容主要使用标示','未知','未知','379','9','2','1308974794','1308974794','0','0','0','0','htm/xwzx/qyxw/2011_0625_2.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('3','输出设置说明及其更换模板注意事项','','','','BEES网站管理系统中的输出设置功能需要在动态页面访问下才能获取模板中的配置位置。操作流程如下：\r\n1、安装完程序后，动态访问首页或其它页面\r\n该过程程序会自动获取模板中使用','未知','未知','28','9','2','1308974781','1308974781','0','0','0','0','htm/xwzx/qyxw/2011_0625_3.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('4','如何使用内容模型','','img/20110625/20110625120453_thumb.gif','','BEES企业网站管理系统内置多种内容模型，并且可以自定义内容模型，内容模型分别对应使用的模板。如图：\r\n\r\n可以关闭开启内容模型，添加内容的时候也会显示开启的内容模型\r\n通过右','未知','未知','493','9','2','1308974793','1308974793','0','0','0','0','htm/xwzx/qyxw/2011_0625_4.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('5','使用BEES企业网站管理系统首页空白没内容的解决','','img/20110625/20110625120512_thumb.gif','','解决BEES企业网站管理系统首页空白没有内容的方法：\r\n1、首先要确保网站添加了栏目和内容，每个栏目至少有10篇内容，如果栏目和内容都没有那就没办法了。\r\n2、栏目显示的设置，添','未知','未知','225','9','2','1308974819','1308974819','0','0','0','0','htm/xwzx/qyxw/2011_0625_5.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('6','如何设置进站语言','','img/20110625/20110625122859_thumb.gif','','BEES企业网站管理系统是多语言系统，在支持多语言的情况下，可以选择一种语言作为进入网站的语言。\r\n如默认语言有简体中文和英文，新装程序进入网站默认是中文。\r\n可以通过后台设','未知','未知','139','9','2','1308974800','1308974800','0','0','0','0','htm/xwzx/qyxw/2011_0625_6.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('7','BEES企业网站系统使用教程——管理栏目','','img/20110625/20110625122940_thumb.gif','','在BEES企业网站管理系统中添加了栏目后会跳转到栏目管理界面，在这里可以对添加的栏目进行各种操作，界面如下：\r\n\r\n左边为添加的栏目信息，排序和是否在网站导航中显示。\r\n&lsquo','未知','未知','8','9','2','1308974761','1308974761','0','0','0','0','htm/xwzx/qyxw/2011_0625_7.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('8','语言切换说明','','img/20110625/20110625123018_thumb.gif','','BEES企业网站管理系统是一套多语言系统，每种语言是一个独立的网站，拥有该语言的内容及其网站配置信息。\r\n后台操作的时候要切换到相应的语言对该语言添加内容和配置。\r\n语言切换','未知','未知','150','9','2','1308974802','1308974802','0','0','0','0','htm/xwzx/qyxw/2011_0625_8.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('9','如何安装和使用模板','','img/20110625/20110625123057_thumb.gif','','BEES企业网站管理系统的模板放在template目录下，如图：\r\n企业网站管理系统模板目录&quot; /&gt;\r\n默认模板有简体中文和英文，如图：\r\n企业网站管理系统默认模板&quot; /&gt;\r\n将模板文件放在','未知','未知','369','9','2','1308974802','1308974802','0','0','0','0','htm/xwzx/qyxw/2011_0625_9.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('10','企业应该怎样建设企业网站','','','','1.企业网站需要灵魂\r\n伴随互联网的飞速普及，及相关建站软件的日新月异，现如今建设一个企业网站已相当容易，即使是对技术一窍不通的小白也能依靠智能软件信手拈来，所以   说，','未知','未知','93','10','2','1308981978','1308981978','0','0','0','0','htm/xwzx/sybz/2011_0625_10.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('11','企业网站推广的一些途径和方法','','','','一、上网站，看文章\r\n当您刚进入这个行业的时候，肯定感到很新奇、很兴奋，感觉这个行业即神秘又充满了魅力，恨不得马上做出一、两个大项目来。但是江礼坤在这里奉劝您，先把这','未知','未知','302','10','2','1308982015','1308982015','0','0','0','0','htm/xwzx/sybz/2011_0625_11.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('12','企业网站对公司企业的作用及其价值','','','','企业网站可以起到如下作用：\r\n宣传企业形象与品牌：企业文化往往是一个企业的灵魂。也是塑造一个企业形象与品牌的根本。通过互联网这个窗口，可以得到更好的传播与推广。\r\n增加','未知','未知','331','10','2','1308981985','1308981985','0','0','0','0','htm/xwzx/sybz/2011_0625_12.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('13','如何更新公司企业网站内容','','','','1、相关行业新闻，这是做为原创内容的资料来源，但必须认真修改资料内容，保证一定的原创性和新鲜感。避免简单复制。\r\n2、公司企业新闻，如果是新企业，不妨多留意公司的事情，','未知','未知','456','10','2','1308982006','1308982006','0','0','0','0','htm/xwzx/sybz/2011_0625_13.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('14','企业网站建设中如何做好宣传营销','','','','　　一、宣传为主，企业网站应有效提升形象\r\n　　如果一个企业没有网站，一定就失去了在互联网上参与竞争的一次机会。很多公司做的网站的伊始目的也仅仅是，通过搜索引擎可以查','未知','未知','39','10','2','1308981960','1308981960','0','0','0','0','htm/xwzx/sybz/2011_0625_14.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('15','网站编辑需要的技巧','','','','首先，我们认为网站编辑必须有基本的美学认知，因为她们必须对网站的视觉美观做把关，这么说比较笼统，何谓网站 的美观？我们认为这必须从网站的架构  说起，这包含了网页阅读','未知','未知','182','10','2','1308982000','1308982000','0','0','0','0','htm/xwzx/sybz/2011_0625_15.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('16','BEES企业网站管理系统V1.8下载','','','','\r\n\r\nBEES企业网站管理系统（以下称BEES）是一个基于PHP+Mysql架构的企业网站管理系统。BEES 采用模块化方式开发，功能强大灵活易于扩展，并且完全开放源代码，多种语言分站，为企业网站','未知','未知','331','6','4','1308982015','1308982015','0','0','0','0','htm/xzzx/2011_0625_16.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('17','BEES企业网站管理系统简介','','','','\r\n\r\nBEES企业网站管理系统（以下称BEES）是一个基于PHP+Mysql架构的企业网站管理系统。BEES 采用模块化方式开发，功能强大灵活易于扩展，并且完全开放源代码，多种语言分站，为企业网站','未知','未知','91','8','1','1308982008','1308982008','0','0','0','0','','cn','0','','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('18','跃动情怀系列头层牛皮两用包','','img/20110625/20110625145753523.jpg','','产品内容','未知','未知','219','11','3','1308982002','1308985588','0','0','0','0','htm/cpzx/stb/2011_0625_18.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('19','经典牛仔系列时尚单肩包','','img/20110625/201106251458052470.jpg','','','未知','未知','311','11','3','1308981998','1308985572','0','0','0','0','htm/cpzx/stb/2011_0625_19.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('20','高档牛皮男士商务电脑包','','img/20110625/201106251459032990.jpg','','','未知','未知','238','11','3','1308985574','1308985574','0','0','0','0','htm/cpzx/stb/2011_0625_20.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('21','小资情调系列时尚牛皮两用包','','img/20110625/201106251458118388.JPG','','','未知','未知','11','11','3','1308985618','1308985618','0','0','0','0','htm/cpzx/stb/2011_0625_21.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('22','98分贝牛皮单肩包','','img/20110625/201106251458316084.jpg','','','未知','未知','13','11','3','1308985615','1308985615','0','0','0','0','htm/cpzx/stb/2011_0625_22.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('23','可爱圆桶系列头层牛皮斜挎包','','img/20110625/201106251458309992.jpg','','产品内容','未知','未知','367','11','3','1308985564','1308985564','0','0','0','0','htm/cpzx/stb/2011_0625_23.html','cn','0','http://','','0','0','30','','');
INSERT INTO `bees_maintb` VALUES('24','招聘会计','','','','岗位职责 \r\n1、专业人员职位，在上级的领导和监督下定期完成量化的工作要求，并能独立处理和解决所负责的任务；\r\n2、协助财务预算、审核、监督工作，按照公司及政府有关部门要求','未知','未知','248','7','5','1309054017','1309054017','0','0','0','0','htm/zpzx/2011_0626_24.html','cn','0','http://','','0','0','30','','');
DROP TABLE IF EXISTS `bees_market`;
CREATE TABLE `bees_market` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `market_name` varchar(60) DEFAULT NULL,
  `market_type` mediumint(8) NOT NULL DEFAULT '0',
  `market_num` varchar(60) NOT NULL,
  `market_order` varchar(60) NOT NULL DEFAULT '10',
  `market_is` mediumint(8) NOT NULL DEFAULT '1',
  `lang` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `bees_market` VALUES('1','销售客服','1','2429256177','1','1','cn');
DROP TABLE IF EXISTS `bees_member`;
CREATE TABLE `bees_member` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(60) DEFAULT NULL,
  `member_password` varchar(60) NOT NULL,
  `member_nich` varchar(60) NOT NULL,
  `member_purview` mediumint(8) NOT NULL DEFAULT '0',
  `member_user` varchar(60) NOT NULL,
  `member_mail` varchar(60) NOT NULL,
  `member_tel` varchar(60) DEFAULT NULL,
  `is_disable` mediumint(8) NOT NULL DEFAULT '0',
  `member_ip` varchar(60) DEFAULT NULL,
  `member_time` varchar(60) DEFAULT NULL,
  `member_count` mediumint(8) NOT NULL DEFAULT '0',
  `member_qq` varchar(60) DEFAULT NULL,
  `member_phone` varchar(60) DEFAULT NULL,
  `member_sex` mediumint(8) DEFAULT '0',
  `member_addtime` varchar(60) DEFAULT NULL,
  `member_birth` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bees_member_group`;
CREATE TABLE `bees_member_group` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `member_group_name` varchar(60) NOT NULL,
  `member_group_info` varchar(255) NOT NULL,
  `is_disable` mediumint(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
INSERT INTO `bees_member_group` VALUES('1','注册会员','注册完成的所有会员都是这个级别','0');
INSERT INTO `bees_member_group` VALUES('2','VIP会员','注册会员通过管理后台升级的级别','0');
DROP TABLE IF EXISTS `bees_prinfo`;
CREATE TABLE `bees_prinfo` (
  `id` mediumint(8) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `addcode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bees_product`;
CREATE TABLE `bees_product` (
  `id` mediumint(8) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `marketprice` varchar(255) DEFAULT NULL,
  `pics` varchar(255) DEFAULT NULL,
  `content` text,
  `wholesale` text,
  `shipping` text,
  `trading` text,
  `contact` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `bees_product` VALUES('18','','','2,1','<p>产品内容</p>','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','申通快递：江浙沪首重3公斤--5元，续重超过的，加收10元，除新疆，西藏，甘肃，宁夏，内蒙古，青海等地运费首重1公斤18元，续重加收18元，其他省份均为首重1公斤10元，续重加收10元。','','<br>电话：\r\n<br>移动电话：\r\n<br>传真：\r\n<br>地址：\r\n<br>邮编：\r\n<br>公司网站：');
INSERT INTO `bees_product` VALUES('19','','','4','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','申通快递：江浙沪首重3公斤--5元，续重超过的，加收10元，除新疆，西藏，甘肃，宁夏，内蒙古，青海等地运费首重1公斤18元，续重加收18元，其他省份均为首重1公斤10元，续重加收10元。','','<br>电话：\r\n<br>移动电话：\r\n<br>传真：\r\n<br>地址：\r\n<br>邮编：\r\n<br>公司网站：');
INSERT INTO `bees_product` VALUES('20','','','10,','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','申通快递：江浙沪首重3公斤--5元，续重超过的，加收10元，除新疆，西藏，甘肃，宁夏，内蒙古，青海等地运费首重1公斤18元，续重加收18元，其他省份均为首重1公斤10元，续重加收10元。','','<br>电话：\r\n<br>移动电话：\r\n<br>传真：\r\n<br>地址：\r\n<br>邮编：\r\n<br>公司网站：');
INSERT INTO `bees_product` VALUES('21','','','6,5,','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','申通快递：江浙沪首重3公斤--5元，续重超过的，加收10元，除新疆，西藏，甘肃，宁夏，内蒙古，青海等地运费首重1公斤18元，续重加收18元，其他省份均为首重1公斤10元，续重加收10元。','','<br>电话：\r\n<br>移动电话：\r\n<br>传真：\r\n<br>地址：\r\n<br>邮编：\r\n<br>公司网站：');
INSERT INTO `bees_product` VALUES('22','','','8,','','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','申通快递：江浙沪首重3公斤--5元，续重超过的，加收10元，除新疆，西藏，甘肃，宁夏，内蒙古，青海等地运费首重1公斤18元，续重加收18元，其他省份均为首重1公斤10元，续重加收10元。','','<br>电话：\r\n<br>移动电话：\r\n<br>传真：\r\n<br>地址：\r\n<br>邮编：\r\n<br>公司网站：');
INSERT INTO `bees_product` VALUES('23','','','9,8,7,6,4,3,','<p>产品内容</p>','我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发','申通快递：江浙沪首重3公斤--5元，续重超过的，加收10元，除新疆，西藏，甘肃，宁夏，内蒙古，青海等地运费首重1公斤18元，续重加收18元，其他省份均为首重1公斤10元，续重加收10元。','','<br>电话：\r\n<br>移动电话：\r\n<br>传真：\r\n<br>地址：\r\n<br>邮编：\r\n<br>公司网站：');
DROP TABLE IF EXISTS `bees_upfiles`;
CREATE TABLE `bees_upfiles` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `file_info` varchar(255) DEFAULT NULL,
  `file_ext` varchar(255) DEFAULT NULL,
  `file_size` mediumint(8) DEFAULT '0',
  `file_path` varchar(255) DEFAULT NULL,
  `file_time` varchar(255) DEFAULT NULL,
  `hits` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `bees_uppic_cate`;
CREATE TABLE `bees_uppic_cate` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
INSERT INTO `bees_uppic_cate` VALUES('1','产品图片');
INSERT INTO `bees_uppic_cate` VALUES('2','下载图片');
INSERT INTO `bees_uppic_cate` VALUES('3','其它图片');
DROP TABLE IF EXISTS `bees_uppics`;
CREATE TABLE `bees_uppics` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `pic_name` varchar(60) NOT NULL COMMENT '图片名称',
  `pic_url` varchar(255) DEFAULT NULL COMMENT '外部链接',
  `pic_ext` varchar(60) NOT NULL COMMENT '图片后缀',
  `pic_alt` varchar(255) DEFAULT NULL COMMENT '图片alt',
  `pic_size` varchar(60) DEFAULT NULL,
  `pic_path` varchar(60) DEFAULT NULL COMMENT '图片路径',
  `pic_time` varchar(60) DEFAULT NULL COMMENT '图片上传修改时间',
  `pic_thumb` varchar(60) DEFAULT NULL COMMENT '缩略图',
  `pic_cate` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
INSERT INTO `bees_uppics` VALUES('1','201106251457435418','','jpg','','91718','upload/img/20110625/','1308985063','img/20110625/201106251457435418_thumb.jpeg','0');
INSERT INTO `bees_uppics` VALUES('2','20110625145753523','','jpg','','28173','upload/img/20110625/','1308985073','img/20110625/20110625145753523_thumb.jpeg','0');
INSERT INTO `bees_uppics` VALUES('3','201106251457589343','','jpg','','213545','upload/img/20110625/','1308985078','img/20110625/201106251457589343_thumb.jpeg','0');
INSERT INTO `bees_uppics` VALUES('4','201106251458052470','','jpg','','115786','upload/img/20110625/','1308985085','img/20110625/201106251458052470_thumb.jpeg','0');
INSERT INTO `bees_uppics` VALUES('5','201106251458118388','','JPG','','203626','upload/img/20110625/','1308985091','img/20110625/201106251458118388_thumb.jpeg','0');
INSERT INTO `bees_uppics` VALUES('6','201106251458309693','','jpg','','552104','upload/img/20110625/','1308985110','img/20110625/201106251458309693_thumb.jpeg','0');
INSERT INTO `bees_uppics` VALUES('7','201106251458309992','','jpg','','626030','upload/img/20110625/','1308985110','img/20110625/201106251458309992_thumb.jpeg','0');
INSERT INTO `bees_uppics` VALUES('8','201106251458316084','','jpg','','8738','upload/img/20110625/','1308985111','img/20110625/201106251458316084_thumb.jpeg','0');
INSERT INTO `bees_uppics` VALUES('9','201106251459034996','','jpg','','30121','upload/img/20110625/','1308985143','img/20110625/201106251459034996_thumb.jpeg','0');
INSERT INTO `bees_uppics` VALUES('10','201106251459032990','','jpg','','32967','upload/img/20110625/','1308985143','img/20110625/201106251459032990_thumb.jpeg','0');
INSERT INTO `bees_uppics` VALUES('12','201108121414162883','','gif','','2393','upload/img/20110812/','1313129656','','3');
DROP TABLE IF EXISTS `bees_webjob`;
CREATE TABLE `bees_webjob` (
  `id` mediumint(8) NOT NULL,
  `jobname` varchar(255) DEFAULT NULL,
  `jobsex` varchar(255) DEFAULT NULL,
  `jobmoth` varchar(255) DEFAULT NULL,
  `jobjg` varchar(255) DEFAULT NULL,
  `jobxl` varchar(255) DEFAULT NULL,
  `jobzy` varchar(255) DEFAULT NULL,
  `jobbyyx` varchar(255) DEFAULT NULL,
  `jobphone` varchar(255) DEFAULT NULL,
  `jobmail` varchar(255) DEFAULT NULL,
  `jobhj` varchar(255) DEFAULT NULL,
  `jobgzjl` varchar(255) DEFAULT NULL,
  `jobzyjn` varchar(255) DEFAULT NULL,
  `jobyyah` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
