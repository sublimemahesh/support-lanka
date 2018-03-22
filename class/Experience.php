<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Experience
 *
 * @author official
 */
class Experience {

    public $id;
    public $skill_detail;
    public $description;
    public $working_place;
    public $duration;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`skill_detail`,`description`,`working_place`,`duration`,`sort` FROM `experience` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->skill_detail = $result['skill_detail'];
            $this->description = $result['description'];
            $this->working_place = $result['working_place'];
            $this->duration = $result['duration'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `experience` (`skill_detail`, `description`, `working_place`, `duration`, `sort`) VALUES  ('"
                . $this->skill_detail . "','"
                . $this->description . "','"
                . $this->working_place . "','"
                . $this->duration . "','"
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

        $query = "SELECT * FROM `experience` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE `experience` SET "
                . "`description` ='" . $this->description . "', "
                . "`working_place` ='" . $this->working_place . "', "
                . "`duration` ='" . $this->duration . "' "
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

        $query = 'DELETE FROM `experience` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function arrange($key, $exp) {
        $query = "UPDATE `experience` SET `sort` = '" . $key . "'  WHERE id = '" . $exp . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

    public function GetExperienceBySkillDetails($skill_detail) {

        $query = "SELECT * FROM `experience` WHERE `skill_detail` = '" . $skill_detail . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function GetExperienceById($id) {

        $query = "SELECT * FROM `experience` WHERE `id` = '" . $id . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

}
