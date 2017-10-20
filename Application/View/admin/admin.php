<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 09/07/2017
 * Time: 19:28
 */

?>

<div class="col-md-2"></div>

<div class="col-md-8">
    <h2>Welcome <?php echo $_SESSION['login']?> !</h2>
    <br><br>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php require_once(BASE_PATH . 'Application/View/admin/createArticle.php'); ?>
        <?php require_once(BASE_PATH . 'Application/View/admin/addMedia.php'); ?>
        <?php require_once(BASE_PATH . 'Application/View/admin/manageArticles.php'); ?>
        <?php require_once(BASE_PATH . 'Application/View/admin/manageComments.php'); ?>
        <?php include_once(BASE_PATH . 'Application/View/blocks/scrollButton.php'); ?>

    </div>
</div>

<div class="col-md-2"></div>
