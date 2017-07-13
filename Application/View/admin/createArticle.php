<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 09/07/2017
 * Time: 19:08
 */

// type : if article -> issue summary / expected behavior / ... + theme (if project -> theme ?)
// Title
// intro
// content
// url
// online
?>

<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false"
               aria-controls="collapseOne">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Article edition
            </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <form>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" id="title" name="title" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="url">Url</label>
                    <input class="form-control" type="text" id="url" name="url" placeholder="Url">
                </div>
                <div class="form-group">
                    <label for="online">Status</label>
                    <input name="online" id="online" type="checkbox" data-toggle="toggle"
                           data-on="Online" data-off="Offline" data-onstyle="warning">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select class="form-control" id="type" name="type">
                        <?php echo $types; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="intro">Introduction</label>
                    <textarea name="intro" id="intro" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" rows="20" class="form-control"></textarea>
                </div>
            </form>
        </div>
    </div>
</div>
