<br>
<br>

<h3>Commentaires sur cette page</h3>

<?php
	//echo $comments;
?>

<div class="media">
	<h4 class="media-heading">Fahmi Arif</h4>
	<p>
		kalo bisa ya ndak usah gan biar cepet<br>
		<a class="nswrlnk" href="" target="_self">répondre</a>
	</p>
</div>

<div class="answer">

	<div class="media">
		<h4 class="media-heading">Fahmi Arif</h4>
		<p>
			kalo bisa ya ndak usah gan biar cepet<br>
			<a class="nswrlnk" href="" target="_self">répondre</a>
		</p>
	</div>

	<div class="answer">
		<?php require_once(BASE_PATH . 'Application/View/blocks/addComment.html'); ?>
	</div>


	<div class="media">
		<h4 class="media-heading">Fahmi Arif</h4>
		<p>
			kalo bisa ya ndak usah gan biar cepet<br>
			<a href="#">répondre</a>
		</p>
	</div>
</div>

<div class="media">
	<h4>Vous pouvez ajouter votre commentaire ici :</h4>
	<div class="form-group">
        <input class="form-control media-heading title" type="text"
        id="yourname" name="yourname" placeholder="Votre nom">
    </div>
	<div class="form-group">
        <textarea class="form-control" type="textarea"
        id="yourcomment" name="yourcomment" placeholder="Votre commentaire"></textarea>
    </div>
	<button type="button" class="btn btn-warning" onclick="addComment()">Commenter !</button>
</div>

