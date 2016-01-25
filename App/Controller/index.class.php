<?php 

namespace App\Controller;

// Action
require_once('../vendor/SON/Controller/action.class.php');

// Action
use SON\Controller\Action;
//Photo
use App\Model\Photo;
//Characteristics
use App\Model\Characteristics;
//Presentation
use App\Model\Presentation;
//Skills
use App\Model\Skills;
//Portifolio
use App\Model\Portifolio;

//controller que vai ser comparado a pasta dentro de App/View/pasta
class Index extends Action {

	//action que vai ser comparado ao arquivo dentro de App/View/pasta
	public function index() {

		// inclui os arquivos
		require_once('../App/Model/photo.class.php');
		require_once('../App/Model/characteristics.class.php');
		require_once('../App/Model/presentation.class.php');
		require_once('../App/Model/skills.class.php');
		require_once('../App/Model/portifolio.class.php');

		// instancia os objetos
		$photo = new Photo();
		$characteristics = new Characteristics();
		$presentation = new Presentation();
		$skills = new Skills();
		$portifolio = new Portifolio();

		// chama os metodos
		$selectPhoto = $photo->selectPhoto();
		$selectCharacteristics = $characteristics->selectCharacteristics();
		$selectPresentation = $presentation->selectPresentation();
		$selectBasicSkills = $skills->selectBasicSkills();
		$selectIntermediateSkills = $skills->selectIntermediateSkills();
		$selectAdvancedSkills = $skills->selectAdvancedSkills();
		$selectPortifolio = $portifolio->selectPortifolio();

		// Enviando mensagem de contato
		$to = 'cazela_dracena2005@hotmail.com';
		$subject = 'Contato do site';
		$contactName = $_POST['name'];
		$contactEmail = $_POST['email'];
		$contactPhone = $_POST['phone'];
		$contactMessage = $_POST['message'];

		$body = '<strong>Mensagem de contato</strong><br><br>';
		$body .= '<strong>Nome: </strong>' . $contactName . '<br>';
		$body .= '<strong>Email: </strong>' . $contactEmail . '<br>';
		$body .= '<strong>Telefone: </strong>' . $contactPhone . '<br>';
		$body .= '<strong>Mensagem: </strong>' . $contactMessage . '<br>';

		$header = 'From: ' . $contactEmail . ' Reply-to: ' . $contactEmail;
		$header .= 'Content-type: text/html; charset=utf-8';
		
		$resposta = mail($to, $subject, $body, $header);
		
		// envia os resultados para o index
		require_once('../App/View/Index/index.php');
	}
}