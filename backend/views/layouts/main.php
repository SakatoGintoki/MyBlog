<?php 
$this->beginContent('@app/views/layouts/header.php');
$this->endContent(); 
?>
<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="/assets/inspinia/img/profile_small.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="/index.lx">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?=isset(Yii::$app->user->identity->account) ? Yii::$app->user->identity->account : ""?></strong>
                            </span>
                            </span>
                            </a>
                        </div>
                        <div class="logo-element">
                           LX
                        </div>
                    </li>
                    <li <?php if(Yii::$app->controller->id == "index"){?> class="active"<?php }?>>
                        <a href="/index.lx"><i class="fa fa-home"></i> <span class="nav-label">首页</span></a>
                    </li>
                    <li <?php if(Yii::$app->controller->id == "article"){?> class="active"<?php }?>>
                        <a href="/article.lx"><i class="fa fa-th-large"></i> <span class="nav-label">文章管理</span></a>
                    </li>
                    <li <?php if(Yii::$app->controller->id == "menu"){?> class="active"<?php }?>>
                        <a href="/menu.lx"><i class="fa fa-diamond"></i> <span class="nav-label">菜单管理</span></a>
                    </li>
                    <li <?php if(Yii::$app->controller->id == "message"){?> class="active"<?php }?>>
                        <a href="/message.lx"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">留言管理</span></a>
                    </li>
                    <li <?php if(Yii::$app->controller->id == "log"){?> class="active"<?php }?>>
                        <a href="/log.lx"><i class="fa fa-envelope"></i> <span class="nav-label">日志</span></a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        		 <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="javascript:;" id="collapsemenu"><i class="fa fa-bars"></i> </a>
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message"><?=isset(Yii::$app->user->identity->account) ? Yii::$app->user->identity->account : ""?>，欢迎使用<?=Yii::$app->name?></span>
                </li>
                <li>
                    <a href="/site/logout">
                        <i class="fa fa-sign-out"></i>退出系统
                    </a>
                </li>
            </ul>

        </nav>
        </div>
          <div class="row  border-bottom white-bg dashboard-header">
					 <?= $content ?>
                   
            </div>
        <div class="row">
           
                <div class="footer">
                    <div>
                        <strong>Copyright</strong> Example Company &copy; 2014-2017
                    </div>
                </div>
            </div>
        </div>
</div>
  
<?php 
$this->beginContent('@app/views/layouts/footer.php');
$this->endContent(); ?>
</body>
</html>
   