<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Inoki Shaw">
    <meta name="keywords" content="Lego;Robot;Creation;Shanghai University">
    <meta name="description" content="Shanghai University Creation Club Official Website">

    <title>创幻社Markdown Editor</title>
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/md-styles.css">
    <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
	<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
	<!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
		require_once("./api/level.php");
    $level = new LevelSystem(0, $_COOKIE["creation_uuid"]);
    if ($level->validate()){
				$atype = $_GET["type"];
				$target = $_GET["target"];
				if(empty($atype))
						$atype = 0;	// new
				else if($atype==2)
						$atype == 2;
				else
						$atype = 1;	// static
				// TO-DO  read article old version
?>
	<div id="float-layer">
			<span><strong>当前文章：  </strong></span>
<?php 
		if($atype==0)
				echo "<a class='btn btn-default' href='javascript:newArticle()'>提交</a>";
		else
				echo "<a class='btn btn-default' href='javascript:staticArticle()'>提交</a>";
?>		
	</div>
	<div id="html-main-container" class="main-container col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <textarea id="html-main-textarea"></textarea>
  </div>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document" style="z-index:11;">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Tips</h4>
		  </div>
		  <div class="modal-body">
			<p style="font-size:1.6em;">
				<span> 点击 <span class="fa fa-eye"> </span>预览</span><br/>
				<span> 点击 <span class="fa fa-columns"> </span>分屏模式可实时预览</span><br/>
			</p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>
	<script>
		var simplemde = new SimpleMDE({
			toolbar: [	{name: "bold", action: SimpleMDE.toggleBold, className: "fa fa-bold", title: "粗体"},
						{name: "italic", action: SimpleMDE.toggleItalic, className: "fa fa-italic", title: "斜体"},
						{name: "strikethrough", action: SimpleMDE.toggleStrikethrough, className: "fa fa-strikethrough", title: "划掉"},
						"|",
						{name: "heading", action: SimpleMDE.toggleHeadingSmaller, className: "fa fa-header", title: "标题"},
						{name: "heading-bigger", action: SimpleMDE.toggleHeadingBigger, className: "fa fa-lg fa-header", title: "大标题"},
						"|",
						{name: "code", action: SimpleMDE.toggleCodeBlock, className: "fa fa-code", title: "代码块"},
						{name: "quote", action: SimpleMDE.toggleBlockquote, className: "fa fa-quote-left", title: "引用"},
						{name: "link", action: SimpleMDE.drawLink, className: "fa fa-link", title: "链接"},
						{name: "image", action: SimpleMDE.drawImage, className: "fa fa-picture-o", title: "引用图片"},
						{name: "table", action: SimpleMDE.drawTable, className: "fa fa-table", title: "表格"},
						{name: "horizontal-rule", action: SimpleMDE.drawHorizontalRule, className: "fa fa-minus", title: "分隔符"},
						{name: "unordered-list", action: SimpleMDE.toggleUnorderedList, className: "fa fa-list-ul", title: "列表"},
						{name: "ordered-list", action: SimpleMDE.toggleOrderedList, className: "fa fa-list-ol", title: "有序列表"},
						"|",
						"preview","side-by-side",
					],
			tabSize:4
		});
		function md_run(){
			alert(simplemde.options.previewRender(simplemde.value()));
		}
		function customLoad(){
			$('#myModal').modal("show");
			SimpleMDE.toggleFullScreen(simplemde);
		}
		window.onload = customLoad;
	</script>
<?php
		} else
				require_once("./api/console/no_permission.php");
?>
</body>
</html>