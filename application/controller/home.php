<?php
class Home extends Controller
{
    
    public function index()
    {
        require APP . 'view/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/footer.php';
    }

    public function newTp()
    {
        $courseList = $this->model->getAllCourses();
        $campusList = $this->model->getAllCampuses();
        // load views
        include APP . 'view/header.php';
        include APP . 'view/home/createNew.php';
        include APP . 'view/footer.php';
    }

    public function createNew()
    {
        
        $days = "";
        if(isset($_GET['days'])) {
            foreach ($_GET['days'] as $day){
                $days = $days.$day;
            }
        }

        $id = $this->model->createNewTp($_GET['name'], $_GET['course'], $_GET['campus'], $_GET['startdate'], $_GET['enddate'], $_GET['timing'], $_GET['strength'], $_GET['method'], $days);
        header('Location: '.URL.'public/tps?id='.$id);
    }

    public function savePage()
    {
        $myfile = fopen("tps/" . $_POST['name'] . ".html", "w") or die("Unable to open file!");
        $txt = "<html>" . $_POST['page'] . "</html>";
        fwrite($myfile, $txt);
        fclose($myfile);
    }
}
