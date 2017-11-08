<div class="col-md-2"></div>

<div class="col-md-<?php echo ($article['article_type_id'] == 3) ? 6 : 8 ?>">
	<h1><?php echo $article['title']; ?></h1>
  <i><?php echo $article['created_at']; ?></i>

  <hr>

	<textarea id="editor-intro" class="none"><?php echo $article['intro'];?></textarea>
	<textarea id="editor-content" class="none"><?php echo $article['content'];?></textarea>

	<div id="preview-intro"></div>
	<div id="preview-content"></div>

<?php if($article['article_type_id'] == 3) {
  require_once(BASE_PATH . 'Application/View/blocks/nextprev.php');
}?>

<!-- C O M M E N T S -->
<?php
    if($comments != '' || DEBUG == 1) {
        require_once(BASE_PATH . 'Application/View/blocks/comments.php');
      }
      require_once(BASE_PATH . 'Application/View/blocks/addComment.php');
?>


</div>

<!-- A S I D E -->
<?php if($article['article_type_id'] == 3) {
  require_once(BASE_PATH . 'Application/View/aside.php');
} ?>


<script type="text/javascript">
	showPreview('-intro');
	showPreview('-content');
</script>

