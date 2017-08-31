<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 09/07/2017
 * Time: 19:08
 */

// type : if article -> issue summary / expected behavior / ... + theme (if project -> theme ?)

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
<!--            <form method="post" action="admin" id="formEditArticle" enctype="multipart/form-data">-->
                <div class="none">
                    <input type="text" id="author_id" name="author_id" value="<?php echo $author_id ?>">
                    <input type="text" id="article_id" name="article_id" value="<?php echo $article_id ?>">
                    <input type="text" id="main_media" name="main_media" value="<?php echo $main_media?>">
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" id="title" name="title" placeholder="Title of new or existing article">
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
                <div class="form-group none" id="theme_parent">
                    <label for="theme">Theme</label>
                    <select class="form-control" id="theme" name="theme">
                        <?php echo $themes; ?>
                    </select>
                </div>
                <form class="form-inline" enctype="multipart/form-data" id="form_main_media" action="admin">
                    <div class="form-group">
                        <label for="main_media_select">Main media</label>
                        <input type="file" id="main_media_select" name="main_media_select">
                    </div>

                    <div id="mainImg" class="none alert alert-dismissible fade in col-md-12" role="alert">
                        <button type="button" class="close" onclick="closePopin()">
                            <span>×</span>
                        </button>
                        <p id="mainImgMsg"></p>
                    </div>
                </form>
                <div class="form-group">
                    <label for="editor-intro">Introduction</label>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#editor-intro-tab">Editor</a></li>
                        <li><a onclick="showPreview('-intro')" data-toggle="tab" href="#preview-intro-tab">Preview</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="editor-intro-tab" class="tab-pane fade in active">
                            <textarea name="editor-intro" id="editor-intro" rows="3" class="form-control"></textarea>
                        </div>
                        <div id="preview-intro-tab" class="tab-pane fade in">
                            <p id="preview-intro"></p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="editor-content">Content</label>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#editor-content-tab">Editor</a></li>
                        <li><a onclick="showPreview('-content')" data-toggle="tab" href="#preview-content-tab">Preview</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="editor-content-tab" class="tab-pane fade in active">
                            <textarea name="editor-content" id="editor-content" rows="20" class="form-control"></textarea>
                        </div>
                        <div id="preview-content-tab" class="tab-pane fade in">
                            <p id="preview-content"></p>
                        </div>
                    </div>
                </div>

                <div id="createArt" class="none alert alert-dismissible fade in col-md-12" role="alert">
                    <button type="button" class="close" onclick="closePopin()">
                        <span>×</span>
                    </button>
                    <p id="createArtMsg"></p>
                </div>

                <button type="button" class="btn btn-warning" id="createArticle">Done</button>
                <button type="button" class="btn btn-default" id="resetArticle">Reset</button>
<!--            </form>-->
        </div>
    </div>
</div>
