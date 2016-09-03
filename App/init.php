<?php 
namespace App;
require_once('../vendor/SON/Init/Bootstrap.class.php');
use \SON\Init\Bootstrap;

class Init extends Bootstrap {

	protected $ar = array();

	protected function iniRoutes() {
		$ar[0] = array('route' => '/', 					'controller' => 'index', 			'action' => 'index');
		$ar[1] = array('route' => '/users_login', 		'controller' => 'login', 			'action' => 'users_login');
		$ar[2] = array('route' => '/user', 		'controller' => 'login', 			'action' => 'user');
		$ar[3] = array('route' => '/characteristics', 	'controller' => 'adm_content', 		'action' => 'characteristics');
		$ar[4] = array('route' => '/portifolio', 		'controller' => 'adm_content', 		'action' => 'portifolio');
		$ar[5] = array('route' => '/photo', 			'controller' => 'adm_content', 		'action' => 'photo');
		$ar[6] = array('route' => '/presentation', 		'controller' => 'adm_content', 		'action' => 'presentation');
		$ar[7] = array('route' => '/skills', 			'controller' => 'adm_content', 		'action' => 'skills');
		$this->setRoutes($ar);
	}

	public static function getDb() {
		$db = new PDO('mysql:host=localhost;port=3306;dbname=site_diego', 'root', '');
		return $db;
	}
}
