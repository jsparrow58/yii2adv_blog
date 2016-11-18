<?php
/**
 * @var $baseUrl string;
 */
use yii\helpers\Url;

?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">

                <div class="dropdown profile-element">
                    <span><img alt="image" class="img-circle" src="<?= $baseUrl ?>/images/avatar/profile_small.jpg"/></span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                        <span class="clear">
                            <span class="block m-t-xs"><strong class="font-bold"> <?= Yii::$app->user->identity->username ?></strong></span>
                            <span class="text-muted text-xs block">个人中心 <b class="caret"></b></span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="form_avatar.html">修改头像</a>
                        </li>
                        <li><a href="profile.html">个人资料</a>
                        </li>
                        <li><a href="contacts.html">联系我们</a>
                        </li>
                        <li><a href="mailbox.html">信箱</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html">安全退出</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    H+
                </div>

            </li>
            <li class="active">
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">文章管理</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?= Url::to(['category/index'])?>">栏目管理</a></li>
                    <li><a href="<?= Url::to(['post/index']) ?>">文章列表</a>
                    </li>
                    <li><a href="<?= Url::to(['post/create']) ?>">新建文章</a>
                    </li>
                    <li><a href="index_3.html">主页示例三</a>
                    </li>
                    <li><a href="index_4.html">主页示例四</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="layouts.html"><i class="fa fa-columns"></i> <span class="nav-label">布局</span><span class="label label-danger pull-right">2.0</span></a>
            </li>
            <li>
                <a href="index.html#"><i class="fa fa fa-globe"></i> <span class="nav-label">v2.0新增</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="toastr_notifications.html">Toastr通知</a>
                    </li>
                    <li><a href="nestable_list.html">嵌套列表</a>
                    </li>
                    <li><a href="timeline_v2.html">时间轴</a>
                    </li>
                    <li><a href="forum_main.html">论坛</a>
                    </li>
                    <li><a href="code_editor.html">代码编辑器</a>
                    </li>
                    <li><a href="modal_window.html">模态窗口</a>
                    </li>
                    <li><a href="validation.html">表单验证</a>
                    </li>
                    <li><a href="tree_view_v2.html">树形视图</a>
                    </li>
                    <li><a href="chat_view.html">聊天窗口</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index.html#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">图表</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="graph_echarts.html">百度ECharts</a>
                    </li>
                    <li><a href="graph_flot.html">Flot</a>
                    </li>
                    <li><a href="graph_morris.html">Morris.js</a>
                    </li>
                    <li><a href="graph_rickshaw.html">Rickshaw</a>
                    </li>
                    <li><a href="graph_peity.html">Peity</a>
                    </li>
                    <li><a href="graph_sparkline.html">Sparkline</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">信箱 </span><span class="label label-warning pull-right">16</span></a>
                <ul class="nav nav-second-level">
                    <li><a href="mailbox.html">收件箱</a>
                    </li>
                    <li><a href="mail_detail.html">查看邮件</a>
                    </li>
                    <li><a href="mail_compose.html">写信</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="widgets.html"><i class="fa fa-flask"></i> <span class="nav-label">小工具</span></a>
            </li>
            <li>
                <a href="index.html#"><i class="fa fa-edit"></i> <span class="nav-label">表单</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="form_basic.html">基本表单</a>
                    </li>
                    <li><a href="form_validate.html">表单验证</a>
                    </li>
                    <li><a href="form_advanced.html">高级插件</a>
                    </li>
                    <li><a href="form_wizard.html">步骤条</a>
                    </li>
                    <li><a href="form_webuploader.html">百度WebUploader</a>
                    </li>
                    <li><a href="form_file_upload.html">文件上传</a>
                    </li>
                    <li><a href="form_editors.html">富文本编辑器</a>
                    </li>
                    <li><a href="form_simditor.html">simditor</a>
                    </li>
                    <li><a href="form_avatar.html">头像裁剪上传</a>
                    </li>
                    <li><a href="layerdate.html">日期选择器layerDate</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index.html#"><i class="fa fa-desktop"></i> <span class="nav-label">页面</span></a>
                <ul class="nav nav-second-level">
                    <li><a href="contacts.html">联系人</a>
                    </li>
                    <li><a href="profile.html">个人资料</a>
                    </li>
                    <li><a href="projects.html">项目</a>
                    </li>
                    <li><a href="project_detail.html">项目详情</a>
                    </li>
                    <li><a href="file_manager.html">文件管理器</a>
                    </li>
                    <li><a href="calendar.html">日历</a>
                    </li>
                    <li><a href="faq.html">帮助中心</a>
                    </li>
                    <li><a href="timeline.html">时间轴</a>
                    </li>
                    <li><a href="pin_board.html">标签墙</a>
                    </li>
                    <li><a href="invoice.html">单据</a>
                    </li>
                    <li><a href="login.html">登录</a>
                    </li>
                    <li><a href="register.html">注册</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index.html#"><i class="fa fa-files-o"></i> <span class="nav-label">其他页面</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="search_results.html">搜索结果</a>
                    </li>
                    <li><a href="lockscreen.html">登录超时</a>
                    </li>
                    <li><a href="404.html">404页面</a>
                    </li>
                    <li><a href="500.html">500页面</a>
                    </li>
                    <li><a href="empty_page.html">空白页</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="index.html#"><i class="fa fa-flask"></i> <span class="nav-label">UI元素</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="typography.html">排版</a>
                    </li>
                    <li><a href="icons.html">字体图标</a>
                    </li>
                    <li><a href="iconfont.html">阿里巴巴矢量图标库</a>
                    </li>
                    <li><a href="draggable_panels.html">拖动面板</a>
                    </li>
                    <li><a href="buttons.html">按钮</a>
                    </li>
                    <li><a href="tabs_panels.html">选项卡 & 面板</a>
                    </li>
                    <li><a href="notifications.html">通知 & 提示</a>
                    </li>
                    <li><a href="badges_labels.html">徽章，标签，进度条</a>
                    </li>
                    <li><a href="layer.html">Web弹层组件layer</a>
                    </li>
                    <li><a href="tree_view.html">树形视图</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="grid_options.html"><i class="fa fa-laptop"></i> <span class="nav-label">栅格</span></a>
            </li>
            <li>
                <a href="index.html#"><i class="fa fa-table"></i> <span class="nav-label">表格</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="table_basic.html">基本表格</a>
                    </li>
                    <li><a href="table_data_tables.html">数据表格(DataTables)</a>
                    </li>
                    <li><a href="table_jqgrid.html">jqGrid</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index.html#"><i class="fa fa-picture-o"></i> <span class="nav-label">图库</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="basic_gallery.html">基本图库</a>
                    </li>
                    <li><a href="carousel.html">图片切换</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="index.html#"><i class="fa fa-sitemap"></i> <span class="nav-label">菜单 </span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="index.html#">三级菜单 <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="index.html#">三级菜单 01</a>
                            </li>
                            <li>
                                <a href="index.html#">三级菜单 01</a>
                            </li>
                            <li>
                                <a href="index.html#">三级菜单 01</a>
                            </li>

                        </ul>
                    </li>
                    <li><a href="index.html#">二级菜单</a>
                    </li>
                    <li>
                        <a href="index.html#">二级菜单</a>
                    </li>
                    <li>
                        <a href="index.html#">二级菜单</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="webim.html"><i class="fa fa-comments"></i> <span class="nav-label">即时通讯</span><span class="label label-danger pull-right">New</span></a>
            </li>
            <li>
                <a href="css_animation.html"><i class="fa fa-magic"></i> <span class="nav-label">CSS动画</span></a>
            </li>
            <li>
                <a href="index.html#"><i class="fa fa-cutlery"></i> <span class="nav-label">工具 </span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="form_builder.html">表单构建器</a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
