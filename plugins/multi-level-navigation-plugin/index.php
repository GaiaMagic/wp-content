“？PHP的
 / * 

插件名称：多级导航插件
插件地址：http://pixopoint.com/multi-level-navigation/ 
说明：A WordPress插件增加了一个多层次的CSS的下拉/弹出/滑块菜单，你的WordPress博客。访问<a href="http://pixopoint.com/multi-level-navigation/">可湿性粉剂多级导航插件“页</ 1”为更多有关插件，或者我们的导航“一的HREF =”HTTP信息：/ / pixopoint.com /论坛/编辑？板= 4.0“”支撑板“/ 1”为菜单添加到您的主题帮助。 
作者：PixoPoint Web开发/瑞安赫利尔
版本：2.2.1 
作者地址：http://pixopoint.com/ 

版权所有（c）2008 PixoPoint网页开发

该程序是自由软件，您可以重新发布和/或修改
它根据GNU通用公共许可证第二版的规定
出版自由软件基金会。 

本程序是，希望这将是有益的， 
但没有任何担保，甚至没有暗示的保证
适销性或针对特定用途的保证。见
 License.txt文件包含在此了解更多信息插件。 

 * / 

 / /版本的源代码数字显示
 $ pixopoint_mln_version = '2 .2.1'; 

 / /添加了对旧版本的WordPress支持
如果（！定义（'WP_CONTENT_URL'））（定义（'WP_CONTENT_URL'，get_option（'siteurl ').'/可湿性粉剂内容'）;） 
如果（！定义（'WP_PLUGIN_URL'））（定义（'WP_PLUGIN_URL'，WP_CONTENT_URL。'/插件'）;） 

 / /尝试添加本地化支持
功能my_init（）（load_plugin_textdomain（'pixopoint_mln'，“/ wp-content/plugins/multi-level-navigation-plugin/languages /");} 
 add_action（'初始化'，'my_init'）; 

 / /添加到一个数组的各个菜单项选择
 $ suckerfish_menuitem =阵列（get_option（'suckerfish_menuitem1'），get_option（'suckerfish_menuitem2'），get_option（'suckerfish_menuitem3'），get_option（'suckerfish_menuitem4'），get_option（'suckerfish_menuitem5'），get_option（'suckerfish_menuitem6'），get_option（' suckerfish_menuitem7'），get_option（'suckerfish_menuitem8'），get_option（'suckerfish_menuitem9'），get_option（'suckerfish_menuitem10'））; 
 $ suckerfish_2_menuitem =阵列（get_option（'suckerfish_2_menuitem1'），get_option（'suckerfish_2_menuitem2'），get_option（'suckerfish_2_menuitem3'），get_option（'suckerfish_2_menuitem4'），get_option（'suckerfish_2_menuitem5'），get_option（'suckerfish_2_menuitem6'），get_option（' suckerfish_2_menuitem7'），get_option（'suckerfish_2_menuitem8'），get_option（'suckerfish_2_menuitem9'），get_option（'suckerfish_2_menuitem10'））; 

 / /设置javsscript位置和得到的CSS 
 $ javascript_location = WP_PLUGIN_URL。'/ multi-level-navigation-plugin/scripts /'; 
 $ suckerfish_css = get_option（'suckerfish_css'）; 

 / /如果在管理页面，然后加载管理页面的东西
如果（is_admin（））（要求（'admin_page.php'）;） 

 / /如果维护模式是关闭的，然后立即加载插件
 elseif（get_option（'suckerfish_maintenance'）='上'！）（要求（'core.php中'）;） 

 / /否则负载维护模式
否则（要求（'maintenance.php'）;） 

 ？“
