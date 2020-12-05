<?php
class Controller
{
    /**
     * @var null Database Connection
     */
    public $db = null;
    /**
     * @var null Model
     */
    public $model = null;

    function __construct()
    {
        $this->openDatabaseConnection();
        $this->loadModel();
    }

    private function openDatabaseConnection()
    {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);	
    }
    /**
     * Loads the "model".
     * @return object model
     */
    public function loadModel()
    {
        require APP . 'model/model.php';
        $this->model = new Model($this->db);
    }
}