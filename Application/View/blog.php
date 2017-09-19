<div class="col-md-2"></div>

<div class="col-md-6">
	<h1><?php echo $lastArticle['title']; ?></h1>
	<textarea id="editor-intro" class="none"><?php echo $lastArticle['intro'];?></textarea>
	<textarea id="editor-content" class="none"><?php echo $lastArticle['content'];?></textarea>

	<div id="preview-intro"></div>
	<div id="preview-content"></div>
</div>

<script type="text/javascript">
	showPreview('-intro');
	showPreview('-content');
</script>

<?php
// http://wildflame.me/jekyll-simple/

// Post title
// Post date
// Post content
// br
// and so on

// Afficher les 10 derniers posts, puis lien vers archive = listing
