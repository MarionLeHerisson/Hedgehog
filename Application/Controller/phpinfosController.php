<?php
class phpinfosController {
	public function indexAction() {
		if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 2) {
			phpinfo();
		} else {
			header("location:/");
		}
	}
}
