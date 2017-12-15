<nav class="navbar navbar-inverse navbar-fixed-top mg-nav">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo BASE_URL ?>" target="_self">Marion Le Hérisson</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?php echo isset($article['article_type_id']) && $article['article_type_id'] == 3 ? 'class="active"' : '' ?>>
                    <a href="<?php echo BASE_URL ?>" target="_self">Blog</a>
                </li>
                <li <?php echo THISPAGE == 'articles' || (isset($article) && $article['article_type_id'] == 1) ? 'class="active"' : '' ?>>
                    <a href="<?php echo BASE_URL ?>articles" target="_self">Articles</a>
                </li>
                    <?php if (DEBUG == 1) : ?>
                    <li <?php echo THISPAGE == 'projects' ? 'class="active"' : '' ?>>
                        <a href="<?php echo BASE_URL ?>projects" target="_self">Projets</a>
                    </li>
                    <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="page_content">

    <?php
// https://bootsnipp.com/snippets/featured/bootstrap-docs-sidebar
// https://bootsnipp.com/snippets/RE68M
