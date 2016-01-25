<?php

namespace SON\Init;

abstract class Bootstrap {
	private $routes;

	public function __construct() {
		$this->iniRoutes();
		$this->run($this->getUrl());
	}

	abstract protected function iniRoutes();

	protected function run($url) {
		// foreach ($this->routes as $key => $value) {

		for ($key=0; $key < count($this->routes); $key++) { 
			switch ($url) {
				case '/': {
					if ($this->routes[$key]['route'] == '/') {
						require_once('../App/Controller/index.class.php');
				
						$class = 'App\\Controller\\' . ucfirst($this->routes[$key]['controller']);

						//instancio o controller
						$controller = new $class;

						//chama a action do controller
						$action = $this->routes[$key]['action'];
						$controller->$action();
						//sair do loop for
						$key = count($this->routes);
					}
					break;
				}
				case '/modal_login': {
					if ($this->routes[$key]['route'] == '/modal_login') {
						require_once('../App/Controller/login.class.php');

						$class = 'App\\Controller\\' . ucfirst($this->routes[$key]['controller']);

						//instancio o controller
						$controller = new $class;

						//chama a action do controller
						$action = $this->routes[$key]['action'];
						$controller->$action();
						//sair do loop for
						$key = count($this->routes);
					}
					break;
				}
				case '/users_login': {
					if ($this->routes[$key]['route'] == '/users_login') {
						require_once('../App/Controller/login.class.php');

						$class = 'App\\Controller\\' . ucfirst($this->routes[$key]['controller']);

						//instancio o controller
						$controller = new $class;

						//chama a action do controller
						$action = $this->routes[$key]['action'];
						$controller->$action();
						//sair do loop for
						$key = count($this->routes);
					}
					break;
				}
				case '/photo': {
					if ($this->routes[$key]['route'] == '/photo') {
						require_once('../App/Controller/adm_content.class.php');

						$class = 'App\\Controller\\' . ucfirst($this->routes[$key]['controller']);

						//instancio o controller
						$controller = new $class;

						//chama a action do controller
						$action = $this->routes[$key]['action'];
						$controller->$action();
						//sair do loop for
						$key = count($this->routes);
					}
					break;
				}
				case '/characteristics': {
					if ($this->routes[$key]['route'] == '/characteristics') {
						require_once('../App/Controller/adm_content.class.php');
	
						$class = 'App\\Controller\\' . ucfirst($this->routes[$key]['controller']);

						//instancio o controller
						$controller = new $class;

						//chama a action do controller
						$action = $this->routes[$key]['action'];
						$controller->$action();
						//sair do loop for
						$key = count($this->routes);
					}
					break;
				}
				case '/presentation': {
					if ($this->routes[$key]['route'] == '/presentation') {
						require_once('../App/Controller/adm_content.class.php');

						$class = 'App\\Controller\\' . ucfirst($this->routes[$key]['controller']);

						//instancio o controller
						$controller = new $class;

						//chama a action do controller
						$action = $this->routes[$key]['action'];
						$controller->$action();
						//sair do loop for
						$key = count($this->routes);
					}
					break;
				}
				case '/portifolio': {
					if ($this->routes[$key]['route'] == '/portifolio') {
						require_once('../App/Controller/adm_content.class.php');

						$class = 'App\\Controller\\' . ucfirst($this->routes[$key]['controller']);

						//instancio o controller
						$controller = new $class;

						//chama a action do controller
						$action = $this->routes[$key]['action'];
						$controller->$action();

						//sair do loop for
						$key = count($this->routes);
					}
					break;
				}
				case '/skills': {
					if ($this->routes[$key]['route'] == '/skills') {
						require_once('../App/Controller/adm_content.class.php');

						$class = 'App\\Controller\\' . ucfirst($this->routes[$key]['controller']);

						//instancio o controller
						$controller = new $class;

						//chama a action do controller
						$action = $this->routes[$key]['action'];
						$controller->$action();
						//sair do loop for
						$key = count($this->routes);
					}
					break;
				}
				default: {
					echo '<h2>URL nao existe</h2>';
					//sair do loop for
					$key = count($this->routes);
					break;
				}
			}
		}
	}

	protected function setRoutes(array $routes) {
		$this->routes = $routes;
	}

	protected function getUrl() {
		return parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
	}
}