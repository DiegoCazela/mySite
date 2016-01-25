<?php	

namespace App\Model;
use \PDO;

class UsersLogin {
	public $users_email;
	public $users_password;

	public function __construct($users_email, $users_password) {
		$this->users_email = $users_email;
		$this->users_password = $users_password;
	}
	
	function selectUsersLogin() {
		$sql = "SELECT users_cpf".
				" FROM users_login".
				" WHERE users_email = '{$this->users_email}'".
				" AND users_password = '{$this->users_password}'";
		try{
			$conn = new PDO('mysql:host=localhost;port=3306;dbname=site_diego', 'root', '');
			// $users_cpf = NULL;
			$users_cpf = $conn->query($sql);
			unset($conn);
				if($users_cpf){
					$result = $users_cpf->fetch(PDO::FETCH_OBJ);
					return $result->users_cpf;
				}
		} catch (PDOException $e) {
			print('Erro: ' .$e->getMessage());
			die();
		}
	}

	function updateUsersLogin() {
		$sql = "UPDATE users_login set ".
				" users_email = '{$this->users_email}', ".
				" users_password = '{$this->users_password}' ".
				" WHERE users_cpf = '39403668890'";

		try{
			$conn = new PDO('mysql:host=localhost;port=3306;dbname=site_diego', 'root', '');
			$conn->exec($sql);
			unset($conn);
		} catch (PDOException $e) {
			print('Erro: ' .$e->getMessage());
			die();
		}
	}

}