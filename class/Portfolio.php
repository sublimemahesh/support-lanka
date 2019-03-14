<?php

/**
 * Description of Portfolio
 *
 * @author official
 */
class Portfolio {

    public $id; 
    public $skill_detail;
    public $title;
    public $date;
    public $description;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT  * FROM `portfolio` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id']; 
            $this->skill_detail = $result['skill_detail'];
            $this->title = $result['title'];
            $this->date = $result['date'];
            $this->description = $result['description'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `portfolio` (`skill_detail`, `title`, `date`, `description`, `sort`) VALUES  ('"               
                . $this->skill_detail . "','"
                . $this->title . "','"
                . $this->date . "','"
                . $this->description . "','"
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

        $query = "SELECT * FROM `portfolio` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE `portfolio` SET "
                . "`title` ='" . $this->title . "', "
                . "`date` ='" . $this->date . "', "
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

        $query = 'DELETE FROM `portfolio` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function arrange($key, $portf) {

        $query = "UPDATE `portfolio` SET `sort` = '" . $key . "'  WHERE id = '" . $portf . "'";

        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

    public function GetPortfolioBySkillDetails($skill_detail) {

        $query = "SELECT * FROM `portfolio` WHERE `skill_detail` = '" . $skill_detail . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function GetPortfolioByMember($member) {

        $query = "SELECT portfolio.id, portfolio.skill_detail, portfolio.title, portfolio.date, portfolio.description, portfolio.sort  FROM `portfolio` join `skill_details` ON portfolio.skill_detail = skill_details.id join `member` ON skill_details.member = member.id WHERE member.id = '" . $member . "' ORDER BY  portfolio.sort  ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function GetPortfolioById($id) {

        $query = "SELECT * FROM `portfolio` WHERE `id` = '" . $id . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function GetPortfolioMemberId($id) {

        $query = "SELECT * FROM `portfolio` WHERE `member` = '" . $id . "' ORDER BY `sort` ASC";
      
        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

}
