<?php

/**
 * Description of Award
 *
 * @author official
 */
class Award {

    public $id;
    public $title;
    public $member;
    public $duration;
    public $description;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`title`,`member`,`duration`,`description`,`sort` FROM `award` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->title = $result['title'];
            $this->member = $result['member'];
            $this->duration = $result['duration'];
            $this->description = $result['description'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `award` (`member`, `title`, `description`, `duration`, `sort`) VALUES  ('"
                . $this->member . "','"
                . $this->title . "','"
                . $this->description . "','"
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

        $query = "SELECT * FROM `award` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE `award` SET "
                . "`title` ='" . $this->title . "', "
                . "`duration` ='" . $this->duration . "', "
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

        $query = 'DELETE FROM `award` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function arrange($key, $award) {
        $query = "UPDATE `award` SET `sort` = '" . $key . "'  WHERE id = '" . $award . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

    public function GetAwardByMember($member) {

        $query = "SELECT * FROM `award` WHERE `member` = '" . $member . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function GetAwardById($id) {

        $query = "SELECT * FROM `award` WHERE `id` = '" . $id . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function deleteAwardsByMember($member) {

        $query = "DELETE FROM `award` WHERE `member`= '" . $member . "'";

        $db = new Database();
        $result = $db->readQuery($query);

        return $result;
    }

}