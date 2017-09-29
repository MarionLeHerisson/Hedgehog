<div class="col-md-2"></div>

<div class="col-md-6">
	<h1><?php echo $lastArticle['title']; ?></h1>
	<textarea id="editor-intro" class="none"><?php echo $lastArticle['intro'];?></textarea>
	<textarea id="editor-content" class="none"><?php echo $lastArticle['content'];?></textarea>

	<div id="preview-intro"></div>
	<div id="preview-content"></div>
</div>

<div class="col-md-2 col-sm-3 offset-sm-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>À propos</h4>
            <p>Marion Hurteau est une développeuse parisienne qui a entrepris un voyage d'environ 9 mois en <em>Nouvelle-Zélande</em>. Accompagnée de son
            ami Michel - ou Mike pour les kiwis - elle vous raconte ici ses aventures !</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
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
