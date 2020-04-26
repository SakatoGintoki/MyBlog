
    <form class="form-horizontal" id="frmDetail" action="/article/save" method="post" enctype="multipart/form-data">
        <input type="hidden" id="hdnDetailId" name="hdnDetailId" value="<?=isset($arrData["ID"]) ? $arrData["ID"] : "" ?>">
        <div class="row">
           <?php if(Yii::$app->session->hasFlash('success')){?>
                <div class="alert alert-success alert-dismissable col-xs-12 col-md-12 col-sm-12 col-lg-12">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo Yii::$app->session->hasFlash('success') ? Yii::$app->session->getFlash('success') : '' ?>
                </div>
           <?php }?>
            <?php if(Yii::$app->session->hasFlash('error')){?>
                <div class="alert alert-danger alert-dismissable col-xs-12 col-md-12 col-sm-12 col-lg-12">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo Yii::$app->session->hasFlash('error') ? Yii::$app->session->getFlash('error') : '' ?>
                </div>
            <?php }?>
            <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>文章修改</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">文章标题<span class="remind_star">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="title" name="title" value="<?=isset($arrData["title"]) ? $arrData["title"] : "" ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">文章类型</label>
                            <div class="col-sm-4">
                                <textarea class="form-control" id="article_type" name="article_type"><?=isset($arrData["article_type"]) ? $arrData["article_type"] : "" ?></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label text-right">作者</label>
                            <div class="col-sm-4">
                                <textarea class="form-control" id="author" name="author"><?=isset($arrData["author"]) ? $arrData["author"] : "" ?></textarea>
                            </div>
                        </div>
                        
                        </div>
		                <div class="form-group row">
		                    <div class="col-sm-3 col-form-label text-right"><b>是否轮播图：</b><b><input type="checkbox" name="is_ppt" value="1" <?php if(@$article['is_ppt'])echo 'checked'; ?>>是</b></div>
		                </div>
		                <div class="form-group row">
		                    <div class="col-sm-3 col-form-label text-right"><b>是否显示到首页：</b><b><input type="checkbox" name="istop" value="1" <?php if(@$article['istop'])echo 'checked'; ?>>是</b></div>
		                </div>
                        <div class="hr-line-dashed"></div>
                        <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12 text-center">
                        	<input type="hidden" name="_csrf-backend" value="<?=Yii::$app->request->csrfToken?>" />
                            <button class="btn btn-success" type="button" onclick="ufnDoSave()">
                                <i class="fa fa-check-circle-o"></i>&nbsp;保存
                            </button>
                            <button class="btn btn-default" type="button" onclick="ufnDoBack()">
                                <i class="fa fa-reply"></i>&nbsp;取消
                            </button>
                             <a class="btn btn-primary" href="/article/edit">
                                <i class="fa fa-plus"></i>&nbsp;新增
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        function ufnDoSave() {
            if ($("#title").val().trim() == "") {
                layer.tips('文章标题不能为空.', '#title', {tips: [2, '#FF0000'], time: 4000});
                $("#title").focus();
                return false;
            }
            //
            $("#frmDetail").submit();
        }

        function ufnDoBack() {
            window.location.href = "/article.lx";
        }
    </script>
