<div class="col-md-2"></div>

<div class="col-md-<?php echo ($article['article_type_id'] == 3) ? 6 : 8 ?>">
	<h1><?php echo $article['title']; ?></h1>
  <i><?php echo $article['created_at']; ?></i>

  <hr>

	<textarea id="editor-intro" class="none"><?php echo $article['intro'];?></textarea>
	<textarea id="editor-content" class="none"><?php echo $article['content'];?></textarea>

	<div id="preview-intro"></div>
	<div id="preview-content"></div>

<?php if($article['article_type_id'] == 3) : ?>
  <hr>
  <?php if($prev['url'] != ''): ?>

  <div id="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <a href="<?php echo $prev['url']; ?>" target="_self">
      <?php echo $prev['title']; ?>
    </a>
  </div>
  <?php endif; ?>

  <?php if($next['url'] != ''): ?>
  <div id="next">
    <a href="<?php echo $next['url']; ?>" target="_self">
      <?php echo $next['title']; ?>
    </a>
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  </div>
  <?php endif; ?>
<?php endif; ?>

</div>

<!-- A S I D E -->
<?php if($article['article_type_id'] == 3): ?>
<div class="col-md-2 col-sm-3 offset-sm-1 blog-sidebar">
  <div class="sidebar-module sidebar-module-inset">
    <h4>Mais qui êtes-vous ?</h4>
    <p>Marion Hurteau est une étudiante et développeuse parisienne qui a entrepris un voyage d'environ neuf mois en <strong>Nouvelle-Zélande</strong>. Elle vous raconte ici ses aventures !</p>
  </div>

  <div class="sidebar-module">
    <span class="glyphicon glyphicon-chevron-right"></span>&nbsp;
    <a href="introduction" target="_self">Aller à la première page du blog</a>
  </div>

  <div class="sidebar-module sidebar-module-inset">
    <div id="displayDaysCount">
      <h4><span id="daysCount"></span><sup>ème</sup> jour de voyage.</h4>
    </div>
    <iframe width="100%" height="350" src="https://maphub.net/embed/17969" frameborder="0" allowfullscreen></iframe>
    Le marqueur rouge indique où je me trouve actuellement !
  </div>

  <?php if(DEBUG == 1): ?>
  <div class="sidebar-module">
    <h4>Archives</h4>
    <ol class="list-unstyled">
      <li><a href="#" target="_self">March 2014</a></li>
      <li><a href="#">February 2014</a></li>
      <li><a href="#">January 2014</a></li>
      <li><a href="#">December 2013</a></li>
      <li><a href="#">November 2013</a></li>
      <li><a href="#">October 2013</a></li>
      <li><a href="#">September 2013</a></li>
      <li><a href="#">August 2013</a></li>
      <li><a href="#">July 2013</a></li>
      <li><a href="#">June 2013</a></li>
      <li><a href="#">May 2013</a></li>
      <li><a href="#">April 2013</a></li>
    </ol>
  </div>
<?php endif; ?>
</div>
<?php endif; ?>

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
