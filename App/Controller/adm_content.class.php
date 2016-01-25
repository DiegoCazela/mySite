<?php 

namespace App\Controller;

// Action
require_once('../vendor/SON/Controller/action.class.php');

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
class Adm_content extends Action {

	public $parameter = array();

	public function __construct(){
		//manda renderizar navbar_nav_adm
		$this->renderNavbarNav();
	}

	public function photo() {
		require_once('../App/Model/photo.class.php');
		$photo = new Photo();

		$id = $this->getURL();

		if(isset($_GET['action'])) {
			switch ($_GET['action']) {
				case 'insert': {
					if(!empty($_FILES['photo']['name'])) {
						$photo_size = $_FILES['photo']['size'];
						$photo_type = $_FILES['photo']['type'];
						$photo_tmp_name = $_FILES['photo']['tmp_name'];

						$photo_type = substr($photo_type, 6);

						if(strstr('.jpg;.jpeg;.gif;.png', $photo_type)) {
				        	$photo_name = md5(uniqid(time())) . "." . $photo_type;
				 
				 			if(file_exists('assets/img/photo/')) {
					        	$photo_path = "assets/img/photo/" . $photo_name;
				        	} else {
								echo '<h2>A imagem nao pode ser salva no diretorio assets/img/photo/ devido erro</h2>';
							}

							move_uploaded_file($photo_tmp_name, $photo_path);

							$photo = new Photo($photo_name, $photo_size, $photo_type);
							$insertPhoto = $photo->insertPhoto();

							if(!empty($insertPhoto)) {
								echo $insertPhoto;
							}
						} else {
							echo '<h2>Tipo de arquivo incorreto</h2>';
						}
					} 
					break;
				}
				case 'edit': {
					$selectOnePhoto_edit = $photo->selectOnePhoto($id);
					if(isset($_GET['operation']) && $_GET['operation'] == 'ok') {
						if(!empty($_FILES['photo_edit']['name'])) {
							if(file_exists('assets/img/photo/')) {
								unlink('assets/img/photo/' . $selectOnePhoto_edit[0]->content_photo_name);
							} else {
								echo '<h2>A imagem nao foi deletada do diretorio assets/img/photo/</h2>';
							}

							$photo_edit_size = $_FILES['photo_edit']['size'];
							$photo_edit_type = $_FILES['photo_edit']['type'];
							$photo_edit_tmp_name = $_FILES['photo_edit']['tmp_name'];

							$photo_edit_type = substr($photo_edit_type, 6);

							if(strstr('.jpg;.jpeg;.gif;.png', $photo_edit_type)) {
					        	$photo_edit_name = md5(uniqid(time())) . "." . $photo_edit_type;

					        	$photo_edit_path = "assets/img/photo/" . $photo_edit_name;

								move_uploaded_file($photo_edit_tmp_name, $photo_edit_path);

								$photo = new Photo($photo_edit_name, $photo_edit_size, $photo_edit_type);
								$updateOnePhoto = $photo->updateOnePhoto($id);

								if(!empty($updateOnePhoto)) {
									echo $updateOnePhoto;
								}
							} else {
								echo '<h2>Tipo de arquivo incorreto</h2>';
							}
						}
					} 
					break;
				}
				case 'delete': {
					$selectOnePhoto_delete = $photo->selectOnePhoto($id);
					$deleteOnePhoto = $photo->deleteOnePhoto($id);

					if(!empty($selectOnePhoto_delete[0]->content_photo_name) && !empty($deleteOnePhoto)) {
						if(file_exists('assets/img/photo/')) {
							unlink('assets/img/photo/' . $selectOnePhoto_delete[0]->content_photo_name);
						} else {
							echo '<h2>A imagem nao foi deletada do diretorio assets/img/photo/</h2>';
						}
						echo $deleteOnePhoto;
					}
				}
			}
		} else {
			echo '<h2>Acao diferente de insert, edit e delete</h2>';
		}

		$selectPhoto = $photo->selectPhoto();
		require_once('../App/View/Adm_content/photo.php');
	}

	public function characteristics() {
		require_once('../App/Model/characteristics.class.php');
		$characteristics = new Characteristics();

		$id = $this->getURL();

		if(isset($_GET['action'])) {
			switch ($_GET['action']) {
				case 'insert': {
					if(!empty($_POST['text'])) {
						$characteristics = new Characteristics($_POST['text']);
						$insertCharacteristics = $characteristics->insertCharacteristics();

						if(!empty($insertCharacteristics)) {
							echo $insertCharacteristics;
						}
					} 
					break;
				}
				case 'edit': {
					$selectOneCharacteristics_edit = $characteristics->selectOneCharacteristics($id);
					if(isset($_GET['operation']) && $_GET['operation'] == 'ok') {
						if(!empty($_POST['text_edit'])) {
							$characteristics = new Characteristics($_POST['text_edit']);
							$updateOneCharacteristics = $characteristics->updateOneCharacteristics($id);

							if(!empty($updateOneCharacteristics)) {
								echo $updateOneCharacteristics;
							}
						}
					}
					break;
				}
				case 'delete': {
					$deleteOneCharacteristics = $characteristics->deleteOneCharacteristics($id);

					if(!empty($deleteOneCharacteristics)) {
						echo $deleteOneCharacteristics;
					}
					break;
				}
			}
		} else {
			echo '<h2>Acao diferente de insert, edit e delete</h2>';
		}

		$selectCharacteristics = $characteristics->selectCharacteristics();
		require_once('../App/View/Adm_content/characteristics.php');
	}

	public function presentation() {
		require_once('../App/Model/presentation.class.php');
		$presentation = new Presentation();

		$id = $this->getURL();

		if(isset($_GET['action'])) {
			switch ($_GET['action']) {
				case 'insert': {
					if(!empty($_POST['presentation_text']) && !empty($_POST['curriculum_text'])) {
						$presentation = new Presentation($_POST['presentation_text'], $_POST['curriculum_text']);
						$insertPresentation = $presentation->insertPresentation();

						if(!empty($insertPresentation)) {
							echo $insertPresentation;
						}
					} 
					break;
				}
				case 'edit': {
					$selectOnePresentation_edit = $presentation->selectOnePresentation($id);
					if(isset($_GET['operation']) && $_GET['operation'] == 'ok') {
						if(!empty($_POST['presentation_text_edit']) && !empty($_POST['curriculumt_text_edit'])) {
							$presentation = new Presentation($_POST['presentation_text_edit'], $_POST['curriculumt_text_edit']);
							$updateOnePresentation = $presentation->updateOnePresentation($id);

							if(!empty($updateOnePresentation)) {
								echo $updateOnePresentation;
							}
						}
					}
					break;
				}
				case 'delete': {
					$deleteOnePresentation = $presentation->deleteOnePresentation($id);

					if(!empty($deleteOnePresentation)) {
						echo $deleteOnePresentation;
					}
					break;
				}
			}
		}

		$selectPresentation = $presentation->selectPresentation();
		require_once('../App/View/Adm_content/presentation.php');
	}

	public function skills() {
		require_once('../App/Model/skills.class.php');
		$skills = new Skills();

		$id = $this->getURL();

		if(isset($_GET['action'])) {
			switch ($_GET['action']) {
				case 'insert': {
					if(!empty($_POST['text']) && !empty($_POST['nivel'])) {
						$skills = new Skills($_POST['text'], $_POST['nivel']);
						$insertSkills = $skills->insertSkills();

						if(!empty($insertSkills)) {
							echo $insertSkills;
						}
					} 
					break;
				}
				case 'edit': {
					$selectOneSkills_edit = $skills->selectOneSkills($id);
					if(isset($_GET['operation']) && $_GET['operation'] == 'ok') {
						if(!empty($_POST['text_edit']) && !empty($_POST['nivel'])) {
							$skills = new Skills($_POST['text_edit'], $_POST['nivel']);
							$updateOneSkills = $skills->updateOneSkills($id);

							if(!empty($updateOneSkills)) {
								echo $updateOneSkills;
							}
						}
					}
					break;
				}
				case 'delete': {
					$deleteOneSkills = $skills->deleteOneSkills($id);

					if(!empty($deleteOneSkills)) {
						echo $deleteOneSkills;
					}
					break;
				}
			}
		} else {
			echo '<h2>Acao diferente de insert, edit e delete</h2>';
		}

		$selectBasicSkills = $skills->selectBasicSkills();
		$selectIntermediateSkills = $skills->selectIntermediateSkills();
		$selectAdvancedSkills = $skills->selectAdvancedSkills();
		require_once('../App/View/Adm_content/skills.php');
	}

	public function portifolio() {
		require_once('../App/Model/portifolio.class.php');
		$portifolio = new Portifolio();

		$id = $this->getURL();

		if(isset($_GET['action'])) {
			switch ($_GET['action']) {
				// verifica se a acao que esta sendo passada na URL eh de insert (action=insert)
				case 'insert': {
					// verifica se a imagem e o texto estao sendo inseridos 
					// OBS: Eles sao obrigatorios, estao setados no form required
					if(!empty($_POST['text']) and !empty($_FILES['photo']['name'])) {
						$text = $_POST['text'];
						$photo_size = $_FILES['photo']['size'];
						$photo_type = $_FILES['photo']['type'];
						$photo_tmp_name = $_FILES['photo']['tmp_name'];

						// tira o image/ de $photo_edit_type deixando somente o jpg, jpeg, etc
						$photo_type = substr($photo_type, 6);

						// verifica o tipo do arquivo
						if(strstr('.jpg;.jpeg;.gif;.png', $photo_type)) {
							
				        	// gera um nome único para a imagem
				        	$photo_name = md5(uniqid(time())) . "." . $photo_type;
				 
				 			if(file_exists('assets/img/portifolio/')) {
					        	// caminho de onde ficará a imagem
					        	$photo_path = "assets/img/portifolio/" . $photo_name;
				        	} else {
								echo '<h2>A imagem nao pode ser salva no diretorio assets/img/portifolio/ devido erro</h2>';
							}

							// faz o upload da imagem para seu respectivo caminho
							move_uploaded_file($photo_tmp_name, $photo_path);

				 			// instancia o obj passando parametros a serem inseridos
							$portifolio = new Portifolio($text, $photo_name, $photo_size, $photo_type);
							// Insere os dados no banco
							$insertPortifolio = $portifolio->insertPortifolio();
							// unset($portifolio);
							// exibe a mensagem: O conteudo foi inserido com sucesso
							if(!empty($insertPortifolio)) {
								echo $insertPortifolio;
							}
						} else {
							echo '<h2>Tipo de arquivo incorreto</h2>';
						}
					} 
					break;
				}
				// verifica se a acao que esta sendo passada na URL eh de edit (action=edit)
				case 'edit': {
					// faz um select para obter os dados do conteudo a ser editado no form
					$selectOnePortifolio_edit = $portifolio->selectOnePortifolio($id);
					// verifica se a operacao que esta sendo passada na URL e ok (operation=ok)
					if(isset($_GET['operation']) && $_GET['operation'] == 'ok') {
						// verifica se a imagem e o texto estao sendo inseridos
						// OBS: Eles sao obrigatorios, estao setados no form required
						// OBS: Isso significa que nao necessariamente quando a operacao acima for ok
						// o conteudo vai ser editado
						if(!empty($_POST['text_edit']) and !empty($_FILES['photo_edit']['name'])) {
							// verifica se o diretorio das imagens esta correto
							if(file_exists('assets/img/portifolio/')) {
								// deletar o file (jpg, jpeg) de assets/img/portifolio/
								unlink('assets/img/portifolio/' . $selectOnePortifolio_edit[0]->content_portifolios_name);
							} else {
								echo '<h2>A imagem nao foi deletada do diretorio assets/img/portifolio/</h2>';
							}

							$text_edit = $_POST['text_edit'];
							$photo_edit_size = $_FILES['photo_edit']['size'];
							$photo_edit_type = $_FILES['photo_edit']['type'];
							$photo_edit_tmp_name = $_FILES['photo_edit']['tmp_name'];

							// tira o image/ de $photo_edit_type deixando somente o jpg, jpeg, etc
							$photo_edit_type = substr($photo_edit_type, 6);

							// verifica o tipo do arquivo
							if(strstr('.jpg;.jpeg;.gif;.png', $photo_edit_type)) {
								
					        	// gera um nome único para a imagem
					        	$photo_edit_name = md5(uniqid(time())) . "." . $photo_edit_type;
					 
					        	// caminho de onde ficará a imagem
					        	$photo_edit_path = "assets/img/portifolio/" . $photo_edit_name;

								// faz o upload da imagem para seu respectivo caminho
								move_uploaded_file($photo_edit_tmp_name, $photo_edit_path);

					     		// Instancia o obj passando parametros a serem editados
								$portifolio = new Portifolio($text_edit, $photo_edit_name, $photo_edit_size, $photo_edit_type);
						 		// edita os dados no db
								$updateOnePortifolio = $portifolio->updateOnePortifolio($id);
								// unset($portifolio);
								// exibe a mensagem: O conteudo foi atualizado com sucesso
								if(!empty($updateOnePortifolio)) {
									echo $updateOnePortifolio;
								}
							} else {
								echo '<h2>Tipo de arquivo incorreto</h2>';
							}
						} 
					}
					break;
				}
				// verifica se a acao que esta sendo passada na URL e de delete (action=delete)
				case 'delete': {
					// faz um select para obter os dados do conteudo a ser deletado
					$selectOnePortifolio_delete = $portifolio->selectOnePortifolio($id);
					// deleta o conteudo do db
					$deleteOnePortifolio = $portifolio->deleteOnePortifolio($id);

					if(!empty($selectOnePortifolio_delete[0]->content_portifolios_name) && !empty($deleteOnePortifolio)) {
						// verifica se o diretorio das imagens esta correto
						if(file_exists('assets/img/portifolio/')) {
							// deletar o file (jpg, jpeg) de assets/img/portifolio/
							unlink('assets/img/portifolio/' . $selectOnePortifolio_delete[0]->content_portifolios_name);
						} else {
							echo '<h2>A imagem nao foi deletada do diretorio assets/img/portifolio/</h2>';
						}
						// exibe a mensagem: O conteudo foi deletado com sucesso
						echo $deleteOnePortifolio;
					}
					break;
				}
			}
		} else {
			echo '<h2>Acao diferente de insert, edit e delete</h2>';
		}
		
		// Instancia o obj para exibir todos
		$selectPortifolio = $portifolio->selectPortifolio();
		require_once('../App/View/Adm_content/portifolio.php');
		// $this->render('portifolio.php', $selectPortifolio)
	}
}