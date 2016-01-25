<?php 

namespace SON\Controller;

abstract class Action {

	// public function __construct() {
	// 	$this->view = new \stdClass;
	// }

	protected function render($action) {
		$actual = get_class($this);
		$singleClassName = str_replace('App\\Controller\\', '', $actual);
		require_once('../App/View/' . $singleClassName . '/' . $action);
	}

	protected function getURL() {
		if(isset($_GET['id'])) {
			return $id = $_GET['id'];
		}
	}

	protected function renderNavbarNav() {
		require_once('../App/View/Login/navbar_nav_adm.html');
	}

}