<?php
class Application
{

    private $url_controller = null;

    public function __construct()
    {
        $this->splitUrl();

        if (!isset($_GET["do"]) && !isset($_POST["do"])) {
            require APP . 'controller/home.php';
            $page = new Home();
            $page->index();
        } elseif (isset($_GET["do"]) && file_exists(APP . 'controller/' . $_GET["controller"] . '.php')) {
            require APP . 'controller/' . $_GET["controller"] . '.php';
            $_GET["controller"] = new $_GET["controller"]();

            if (method_exists($_GET["controller"], $_GET["do"])) { 
                
                $_GET["controller"]->{$_GET["do"]}();
                
            } else {
                if (strlen($_GET["do"]) == 0) {
                    $this->url_controller->index();
                }
                else {
                    header('location: ' . URL . 'problem');
                }
            }
        } elseif (file_exists(APP . 'controller/' . $_POST["controller"] . '.php')) {
            require APP . 'controller/' . $_POST["controller"] . '.php';
            $_POST["controller"] = new $_POST["controller"]();

            if (method_exists($_POST["controller"], $_POST["do"])) {
                
                $_POST["controller"]->$_POST["do"]();
                
            } else {
                if (strlen($_POST["do"]) == 0) {
                    $this->url_controller->index();
                }
                else {
                    header('location: ' . URL . 'problem');
                }
            }
        } 
		else {
            header('location: ' . URL . 'problem');
        }
    }

    /**
     * Get and split the URL
     */
    private function splitUrl()
    {
        if (isset($_GET['url'])) {
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            $this->url_controller = isset($url[0]) ? $url[0] : null;
            $this->url_action = isset($url[1]) ? $url[1] : null;

            unset($url[0], $url[1]);

            $this->url_params = array_values($url);
        }
    }
}