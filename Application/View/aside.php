<div class="col-md-2 col-sm-3 offset-sm-1 blog-sidebar">
  <!-- PRESENTATION -->
  <div class="sidebar-module sidebar-module-inset">
    <h4>Mais qui êtes-vous ?</h4>
    <p>Marion Hurteau est une étudiante et développeuse parisienne qui a entrepris un voyage de quatre mois en <strong>Nouvelle-Zélande</strong>. Elle vous raconte ici ses aventures !</p>
  </div>

  <!-- LIEN PREMIERE PAGE -->
  <div class="sidebar-module">
    <span class="glyphicon glyphicon-chevron-right"></span>&nbsp;
    <a href="introduction" target="_self">Aller à la première page du blog</a>
  </div>

  <!-- COMPTEUR DE JOURS -->
  <div class="sidebar-module sidebar-module-inset">
    <div id="displayDaysCount">
      <!--<h4><span id="daysCount"></span><sup>ème</sup> jour de voyage.</h4>-->
      <h4>113 jours de voyage.</h4>
    </div>
    <iframe width="100%" height="350" src="https://maphub.net/embed/17969" frameborder="0" allowfullscreen></iframe>
  </div>

  <!-- DIX DERNIER ARTICLES -->
  <div class="sidebar-module">
    <h4>Les <?php echo NB_LAST; ?> derniers posts</h4>
    <ol class="list-unstyled">
      <?php echo $lastPosts; ?>
    </ol>
  </div>

  <?php if(DEBUG == 1): ?>

  <div class="sidebar-module sidebar-module-inset">
    <h4>D'autres photos sont sur Instagram !</h4>
   <!-- InstaWidget -->
    <a href="https://instawidget.net/v/user/marionleherisson" id="link-a3639f98d1d200b0a5c33d71b512f4da5ce3b8d885ed2ca2bb79f23c0051f8ba">@marionleherisson</a>
    <script src="https://instawidget.net/js/instawidget.js?u=a3639f98d1d200b0a5c33d71b512f4da5ce3b8d885ed2ca2bb79f23c0051f8ba&width=223px"></script>

    <h4>Ou alors</h4>
    <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/BbYyLdVDhml/" data-instgrm-version="8" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/BbYyLdVDhml/" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Une publication partagée par Marion (@marionleherisson)</a> le <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2017-11-12T07:44:08+00:00">11 Nov. 2017 à 11 :44 PST</time></p></div></blockquote>
<script async defer src="//platform.instagram.com/en_US/embeds.js"></script>
  </div>

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
