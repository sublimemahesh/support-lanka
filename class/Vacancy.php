<?php

/**
 * Description of Vacancy
 *
 * @author official
 */
class Vacancy {

    public $id;
    public $company;
    public $title;
    public $designation;
    public $salary;
    public $age;
    public $gender;
    public $deadline;
    public $job_type;
    public $description;
    public $status;
    public $rank;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`company`,`title`,`designation`,`salary`,`age`,`gender`,`deadline`,`job_type`,`description`,`status`,`rank`,`sort` FROM `vacancy` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->company = $result['company'];
            $this->title = $result['title'];
            $this->designation = $result['designation'];
            $this->salary = $result['salary'];
            $this->age = $result['age'];
            $this->gender = $result['gender'];
            $this->deadline = $result['deadline'];
            $this->job_type = $result['job_type'];
            $this->description = $result['description'];
            $this->status = $result['status'];
            $this->rank = $result['rank'];
            $this->sort = $result['sort'];
            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `vacancy` (`company`, `title`, `designation`, `salary`, `age`, `gender`, `deadline`, `job_type`, `description`, `status`, `rank`, `sort`) VALUES  ('"
                . $this->company . "','"
                . $this->title . "','"
                . $this->designation . "','"
                . $this->salary . "','"
                . $this->age . "','"
                . $this->gender . "','"
                . $this->deadline . "','"
                . $this->job_type . "','"
                . $this->description . "','"
                . $this->status . "','"
                . $this->rank . "','"
                . $this->sort . "')";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            $last_id = mysql_insert_id();

            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }

    public function all() {

        $query = "SELECT * FROM `vacancy` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE `vacancy` SET "
                . "`title` ='" . $this->title . "', "
                . "`designation` ='" . $this->designation . "', "
                . "`salary` ='" . $this->salary . "', "
                . "`age` ='" . $this->age . "', "
                . "`gender` ='" . $this->gender . "', "
                . "`deadline` ='" . $this->deadline . "', "
                . "`job_type` ='" . $this->job_type . "', "
                . "`description` ='" . $this->description . "' "
                . "WHERE `id` = '" . $this->id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }

    public function delete() {

        $query = 'DELETE FROM `vacancy` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function arrange($key, $vacan) {

        $query = "UPDATE `vacancy` SET `sort` = '" . $key . "'  WHERE id = '" . $vacan . "'";

        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

    public function GetVacancyByCompany($company) {

        $query = "SELECT * FROM `vacancy` WHERE `company` = '" . $company . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }
    
    

    public function GetVacancyById($id) {

        $query = "SELECT * FROM `vacancy` WHERE `id` = '" . $id . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

}
