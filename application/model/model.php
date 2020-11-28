<?php

require APP . 'entity/Course.php';
require APP . 'entity/Campus.php';
require APP . 'entity/Tp.php';
require APP . 'entity/Unit.php';
require APP . 'entity/UnitOffering.php';

class Model
{
	private $servername;
	private $username;
	private $password;
	private $dbname;

    /**
     * @param object $db A PDO database connection
     */
    public function __construct($db)
    {
		$this->servername = "localhost";
		$this->username = "jtioz_tp";
		$this->password = "jtitp2017";
		$this->dbname = "jtioz_timetableapp";

        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    /*
    function logIn($username, $password){
    $sql = "SELECT password FROM users WHERE username = ?";
    $query = $this->db->prepare($sql);
    $query->bind_param("s",$username);
    $query->execute();
    $query->bind_result($result);
    $query->fetch();
    if($result == $password)
    return true;
    else
    return false;
    }

    function signUp($username, $password, $name, $mob, $email){
    $sql = "INSERT INTO users VALUES (?,?,?,?,?,?)";
    $query = $this->db->prepare($sql);
    $query->bind_param("ssssss",$username, $password, $name, $notVerified, $email, $mob);
    $notVerified = "not verified";
    $success = $query->execute();

    if ($success == true)
    return true;
    else
    return false;
    }
     */

    /**
     * using
     */
    public function getAllCourses()
    {
        $courses = array();
        $sql = "SELECT * FROM `courses` WHERE `enabled` = 1";
        $result = mysqli_query($this->db, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $courses[] = new Course($row['id'], $row['course_name'], $row['course_code'], $row['wp'], $row['sup_hours']);
        }
        return $courses;
    }

    public function getCourse($course_id)
    {
        $course = null;
        $sql = "SELECT * FROM `courses` WHERE `enabled` = 1 and `id`='$course_id'";
        $result = mysqli_query($this->db, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $course = new Course($row['id'], $row['course_name'], $row['course_code'], $row['wp'], $row['sup_hours']);
        }
        return $course;
    }

    /**
     * using
     */
    public function getAllCampuses()
    {
        $campuses = array();
        $sql = "SELECT * FROM `campuses` WHERE `enabled` = 1";
        $result = mysqli_query($this->db, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $campuses[] = new Campus($row['id'], $row['campus_name'], $row['campus_address'], $row['enabled']);
        }
        return $campuses;
    }

    public function getCampus($campus_id)
    {
        $campus = null;
        $sql = "SELECT * FROM `campuses` WHERE `enabled` = 1 and `campus_id` = '$campus_id'";
        $result = mysqli_query($this->db, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $campus = new Campus($row['campus_id'], $row['campus_name'], $row['campus_address']);
        }
        return $campus;
    }

    /**
     * using
     */
    public function createNewTp($name, $course, $campus, $startdate, $enddate, $timing, $strength, $method, $days)
    {
        $sql = "INSERT INTO `training_plans` (`tp_name`, `course_id`, `campus_id`, `start_date`, `end_date`, `time`, `strength`, `training_method`, `days`) VALUES ('$name', '$course', '$campus', '$startdate', '$enddate', '$timing', '$strength', '$method', '$days')";
        if (mysqli_query($this->db, $sql) === true) {
            $lastId = mysqli_insert_id($this->db);
            $this->addNewRow($lastId, 1);
            return $lastId;
        } else {
            echo mysqli_error($this->db);
        }
    }

    public function getAllTpsS()
    {
        $tps = array();
        $sql = "SELECT * FROM `offerings` WHERE `enabled` = 1";
        $result = mysqli_query($this->db, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $tps[] = new TrainingPlan($row['offering_id'], $row['tp_name'], $row['course_id'], $row['campus_id'], $row['start_date'], $row['end_date'], $row['time'], $row['strength'], $row['training_method']);
        }
        return $tps;
    }

    /**
     * using
     */
    public function getAllTps()
    {
        $tps = array();
        $sql = "SELECT * FROM `training_plans` WHERE `enabled` = 1";
        $result = mysqli_query($this->db, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $tps[] = new Tplan($row['id'], $row['tp_name']);
        }
        return $tps;
    }

    public function addNewRow($timetableId, $orderNumber)
    {
        $servername = $this->servername;
        $username = $this->username;
        $password = $this->password;
        $dbname = $this->dbname;

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "update table_rows set order_number = (order_number + 1) where timetable_id = $timetableId and order_number >= $orderNumber";

        if ($conn->query($sql) === true) {
            $result = json_encode(array("status" => "success"));
        } else {
            $result = json_encode(array("status" => $conn->error));
        }

        $sql = "insert into table_rows (unit_id, order_number, timetable_id) values (1, $orderNumber, $timetableId)";

        if ($conn->query($sql) === true) {
            $result = json_encode(array("status" => "success"));
        } else {
            $result = json_encode(array("status" => $conn->error));
        }
        $conn->close();
        return $result;
    }

    public function rollOver($timetableId, $mode)
    {
        $servername = $this->servername;
        $username = $this->username;
        $password = $this->password;
        $dbname = $this->dbname;;

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "update table_rows set order_number = (order_number - $mode) where timetable_id = $timetableId";

        if ($conn->query($sql) === true) {
            $result = json_encode(array("status" => "success"));
        } else {
            $result = json_encode(array("status" => $conn->error));
        }

		if ($mode == 1)  {
        	$sql = "update table_rows set order_number = (select (max(order_number) + 1) from (select * from table_rows) as m where timetable_id = $timetableId) where timetable_id = $timetableId and order_number = 0";
		} else {
			$sql = "update table_rows set order_number = 1 where timetable_id = $timetableId and order_number = (select max(order_number) from (select * from table_rows) as m where m.timetable_id = $timetableId)";
		}
        if ($conn->query($sql) === true) {
            $result = json_encode(array("status" => "success"));
        } else {
            $result = json_encode(array("status" => $conn->error));
        }

        $conn->close();
        return $result;

    }

    public function getRows($timeTableId)
    {

        $servername = $this->servername;
        $username = $this->username;
        $password = $this->password;
        $dbname = $this->dbname;

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT a.*, b.unit_code, b.unit_name, b.nominal_hours, b.core, b.assessment_methods FROM (SELECT * FROM table_rows WHERE timetable_id = " . $timeTableId . " and enabled = 1) a LEFT JOIN units b ON a.unit_id = b.id";

        $result = $conn->query($sql);

        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        $conn->close();

        return $rows;
    }

    public function getUnits($courseId)
    {
        $servername = $this->servername;
        $username = $this->username;
        $password = $this->password;
        $dbname = $this->dbname;

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM course_unit_map c left join units u on c.unit_id = u.id where c.course_id = $courseId";

        $result = $conn->query($sql);

        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }

        $conn->close();

        return $rows;
    }

    public function updateRow($unitId, $rowId, $orderNumber)
    {
        $servername = $this->servername;
        $username = $this->username;
        $password = $this->password;
        $dbname = $this->dbname;

		// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if ($orderNumber == -1) {
            $sql = "update table_rows set unit_id = $unitId where id = $rowId";
        } else {
            $sql = "update table_rows set unit_id = $unitId, order_number = $orderNumber where id = $rowId";
        }
		

        if ($conn->query($sql) === true) {
            $result = array("status" => "success");
        } else {
            $result = array("status" => $conn->error);
        }
        $conn->close();

        return $result;
	}
	
	public function getTrainingPlan($tpId) {
		$servername = $this->servername;
        $username = $this->username;
        $password = $this->password;
        $dbname = $this->dbname;;

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select t.*,c.course_name, c.course_code, c.wp, c.sup_hours, d.campus_name, d.campus_address from (SELECT * FROM training_plans where id = $tpId) as t left join courses c on t.course_id = c.id left join campuses d on t.campus_id = d.id";

		$result = $conn->query($sql);
		$rows = [];

        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }

        $conn->close();

        return $rows;
	}

	public function removeRow($rowId, $timetableId, $orderNumber) {
		$servername = $this->servername;
        $username = $this->username;
        $password = $this->password;
        $dbname = $this->dbname;

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select * from table_rows where timetable_id= $timetableId and order_number = $orderNumber";

		$result = $conn->query($sql);
		$rows = [];

		if (!$result){
			return ['status' => 'failed 1'.$conn->error];
		}

        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
		}
		
		if (sizeOf($rows) == 1) {
			$sql = "update table_rows set order_number = order_number - 1 where order_number > $orderNumber";
			$result = $conn->query($sql);

			if (!$result){
				return ['status' => 'failed 2'. $conn->error];
			}
		}

		$sql = "update table_rows set enabled = 0 where id = $rowId";
		$result = $conn->query($sql);

		if (!$result){
			return ['status' => 'failed 3'.$conn->error];
		}
		$conn->close();
		return ['status' => 'success'];
	}
}
