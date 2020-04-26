<?php $this->beginContent('@app/views/layouts/bootstrap_table.php'); ?>
<?php $this->endContent(); ?>



<form class="form-horizontal">
	<div class="row">
		<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12 mt-10">
			<div class="ibox">
				<div class="ibox-title">
					<h5>用户列表</h5>
				</div>
				<div class="ibox-content">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label text-right">文章标题</label>
						<div class="col-sm-2">
							<div class="input-group m-b">
								<input type="text" class="form-control" id="title" name="title">
							</div>
						</div>
						<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12 text-right">
							<button class="btn btn-success" type="button"
								onclick="ufnRefreshTable('1')">
								<i class="fa fa-search"></i>&nbsp;查询
							</button>
						</div>
					</div>


					<div class="table-responsive row mt-10">
						<table class="table table-striped table-bordered table-hover"
							id="tblDataList"></table>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<script type="text/javascript">
        var strQryUrl = "/article/getdata ";
        var intPageSize = 20;

        $(function(){
            ufnDoQuery();
        });
        
        function ufnGetParams(objParams) {
        	var strTitle = $("#title").val();
            return {
                "page_size"     : objParams.limit,
                "page_index"   : objParams.offset,
                "title"       : strTitle,  
            };
        }

        function ufnBuildTable(objData) {
            var strStatus = objData.Status;
            if (strStatus != "1") {
                layer.msg(objData.Msg);
                return;
            }
            //如果没有错误则返回数据，渲染表格
            return {
                total : objData.DataCount,
                rows  : objData.Data
            };
        }

        function ufnRefreshTable(strPageNumber) {
            if (strPageNumber != null) {
                $('#tblDataList').bootstrapTable('refresh', {url: strQryUrl, pageNumber: 1});
            } else {
                $('#tblDataList').bootstrapTable('refresh', {url: strQryUrl});
            }
        }

        function ufnDoQuery() {
            $('#tblDataList').bootstrapTable({
                url: strQryUrl,                     //请求后台的URL（*）
                contentType: "application/x-www-form-urlencoded",
                locale: "zh-CN",
                method: 'post',                     //请求方式（*）
                dataType: 'json',                   //数据返回格式
                striped: true,                      //是否显示行间隔色
                cache: false,                       //是否使用缓存（*）
                pagination: true,                   //是否显示分页（*）
                sortable: true,                     //是否启用排序
                sortOrder: "asc",                   //排序方式
                selectItemName: "chkItems",         //复选框Name
                queryParams: ufnGetParams,          //传递参数（*）
                sidePagination: "server",           //分页方式：client客户端分页，server服务端分页（*）
                pageNumber:1,                       //初始化加载第一页，默认第一页
                pageSize: 20,                       //每页的记录行数（*）
                pageList: [20, 50, 100],            //可供选择的每页的行数（*）
                strictSearch: false,                //局部搜索
                uniqueId: 'ID',                     //
                idField: 'ID',                      //主键列
                clickToSelect: false,               //是否启用点击选中行
                cardView: false,                    //是否显示详细视图
                detailView: false,                  //是否显示父子表
                responseHandler: ufnBuildTable,     //渲染表格
                columns: [
                     {
                        field: 'article_id',
                        title: 'ID',
                        align: 'center',
                        valign: 'middle',
                        sortable: true,
                    }, {
                        field: 'title',
                        title: '文章标题',
                        align: 'center',
                        valign: 'middle',
                        sortable: true,
                    }, {
                        field: 'article_type',
                        title: '文章类型',
                        align: 'center',
                        valign: 'middle',
                        sortable: true,
                    }, {
                        field: 'author',
                        title: '作者',
                        align: 'center',
                        valign: 'middle',
                        sortable: true,
                    }, {
                        field: 'create_time',
                        title: '创建时间',
                        align: 'center',
                        valign: 'middle',
                        sortable: true,
                    }, {
                        field: 'istop',
                        title: '是否置顶',
                        align: 'center',
                        valign: 'middle',
                        sortable: true,
                    },{
                        field: 'is_ppt',
                        title: '是否设置轮播图',
                        align: 'center',
                        valign: 'middle',
                        sortable: true,
                    }, {
                        field: 'ID',
                        title: '操作',
                        align: 'center',
                        valign: 'middle',
                        formatter:function(value, row, index){
                            //row：当前行的数据
                            var strHtml = "";
                            strHtml += "<button type=\"button\" onclick=\"Dodelete('"+row["article_id"]+"')\" class=\"btn btn-outline delete btn-info btn-xs\">删除</button>";
                            return strHtml;
                        }
                    },
                ]
            });
        }

       function Dodelete(strArticleId){
			layer.confirm("确认删除吗？", {title:'警告', btn: ['确认', '取消'] },function(index){
				$.ajax({
					 url:"/article/delete",
					 type:"post",
					 data:{"article_id":strArticleId},
					 dataType:"JSON",
					 success:function(objData){
						layer.msg(objData.Msg,function(){
							if(objData.Status == "1"){
									ufnRefreshTable();
								}
						});
					 },
					 error: function (error) {
	                        layer.msg("网络错误，请重试.");
	                    }
				});
			});
       }
</script>