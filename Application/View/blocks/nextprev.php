<hr>
<div class="col-md-12">
  <?php if($prev['url'] != ''): ?>

  <div id="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <a href="<?php echo $prev['url']; ?>" target="_self">
      Précédent : <?php echo $prev['title']; ?>
    </a>
  </div>
  <?php endif; ?>

  <?php if($next['url'] != ''): ?>
  <div id="next">
    <a href="<?php echo $next['url']; ?>" target="_self">
      Suivant : <?php echo $next['title']; ?>
    </a>
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  </div>
  <?php endif; ?>
</div>
