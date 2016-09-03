<?php 

namespace App\Controller;

// Action
require_once('../vendor/SON/Controller/action.class.php');
//Users_login
require_once('../App/Model/users_login.class.php');

// Action
use SON\Controller\Action;
// Users_login
use App\Model\UsersLogin;

//controller que vai ser comparado a pasta dentro de App/View/pasta
class Login extends Action {

	public function user() {
		//manda renderizar
		$this->render('modal_login.html');
	}

	public function users_login() {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$usersLogin = new UsersLogin($email, $password);
		$users_cpf = $usersLogin->selectUsersLogin();
		
		if($users_cpf) { 
			//manda renderizar navbar_nav_adm
			$this->renderNavbarNav();
		} else {
			echo '<h2>Usuario nao autenticado</h2>';
		}
	}
}