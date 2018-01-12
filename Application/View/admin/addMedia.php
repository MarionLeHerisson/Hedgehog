<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFour">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false"
               aria-controls="collapseFour">
                <span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Add media
            </a>
        </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
        <div class="panel-body">

            <form class="form-inline" enctype="multipart/form-data" id="form_media" action="admin">

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="media_rotate">Pivoter l'image</label>
                        <input type="checkbox" id="media_rotate" name="media_rotate" class="form-control">
                    </div>

                    <div class="form-group none">
                        <label for="rotate_angle">Angle :</label>
                        <select type="checkbox" id="rotate_angle" name="rotate_angle" class="form-control">
                            <option value="90">90</option>
                            <option value="180">180</option>
                            <option value="270">270</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="media_select">Main media</label>
                    <input type="file" id="media_select" name="media_select" class="form-control" placeholder="lalalala">
                </div>

                <div id="mainImg" class="none alert alert-dismissible fade in col-md-12" role="alert">
                    <button type="button" class="close" onclick="closePopin()">
                        <span>×</span>
                    </button>
                    <p id="mainImgMsg"></p>
                </div>
            </form>

        </div>
    </div>
</div>
