<?php
/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // load views
        //TODO :uncomment
        require APP . 'view/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/footer.php';
    }
    /**
     * PAGE: exampleone
     * This method handles what happens when you move to http://yourproject/home/exampleone
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function newTp()
    {
        $courseList = $this->model->getAllCourses();
        $campusList = $this->model->getAllCampuses();
        // load views
        include APP . 'view/header.php';
        include APP . 'view/home/createNew.php';
        include APP . 'view/footer.php';
    }
    /**
     * PAGE: exampletwo
     * This method handles what happens when you move to http://yourproject/home/exampletwo
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */

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
