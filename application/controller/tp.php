<?php
/**
 * Class Tp
 */
class Tp extends Controller
{
    /*
     * To get all the training plans
     */
    public function searchTp()
    {
        $tps = $this->model->getAllTps();
        include APP . 'view/header.php';
        include APP . 'view/tp/viewall.php';
        include APP . 'view/footer.php';
    }

    /*
     * TO edit a training plans
     */
    public function editTp()
    {
        $tp = $this->model->getTp($_GET['offering_id']);
        $unitOfferings = $this->model->getAllUnitOffered($_GET['offering_id']);
        //echo $unitOfferings;

        include APP . 'view/header.php';
        include APP . 'view/tp/edit.php';
        include APP . 'view/footer.php';
    }

    public function addNewRow()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $timetableId = $data['timetable_id'];
        $orderNumber = $data['order_number'];

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header("Access-Control-Allow-Headers: Content-Type");

        echo json_encode($this->model->addNewRow($timetableId, $orderNumber));
    }

    public function rollOver()
    {
        $data = json_decode(file_get_contents('php://input'), true);

		$timetableId = $data['timetable_id'];
		$mode = $data['mode'];

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header("Access-Control-Allow-Headers: Content-Type");

        echo json_encode($this->model->rollOver($timetableId, $mode));

    }

    public function getRows()
    {

        $timeTableId = $_GET['id'];

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With");

        echo json_encode($this->model->getRows($timeTableId));
    }

    public function getUnits()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header("Access-Control-Allow-Headers: X-Requested-With");

        $courseId = $_GET['id'];

        echo json_encode($this->model->getUnits($courseId));
    }

    public function updateRow()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header("Access-Control-Allow-Headers: Content-Type");

        $data = json_decode(file_get_contents('php://input'), true);

        $unitId = $data['unit_id'];
		$rowId = $data['id'];
		$orderNumber = $data['order_number'];

        echo json_encode($this->model->updateRow($unitId, $rowId, $orderNumber));
	}
	
	public function getTrainingPlan() {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
		header("Access-Control-Allow-Headers: Content-Type");
		
		$tpId = $_GET['id'];

        echo json_encode($this->model->getTrainingPlan($tpId));
	}

	public function removeRow() {
		header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
		header("Access-Control-Allow-Headers: Content-Type");

		$data = json_decode(file_get_contents('php://input'), true);
		
		$rowId = $data['id'];
		$timetableId = $data['timetable_id'];
		$orderNumber = $data['order_number'];

		echo json_encode($this->model->removeRow($rowId, $timetableId, $orderNumber));
	}

}
