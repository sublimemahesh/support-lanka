<?php

/**
 * Description of Education
 *
 * @author official
 */
class Education {

    public $id;
    public $member;
    public $institute;
    public $title;
    public $duration;
    public $stream;
    public $description;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`member`,`institute`,`title`,`duration`,`stream`,`description`,`sort` FROM `education` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->member = $result['member'];
            $this->institute = $result['institute'];
            $this->title = $result['title'];
            $this->duration = $result['duration'];
            $this->stream = $result['stream'];
            $this->description = $result['description'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `education` (`member`, `institute`, `title`, `duration`, `stream`, `description`, `sort`) VALUES  ('" . $this->member . "','"
                . $this->institute . "', '"
                . $this->title . "', '"
                . $this->duration . "', '"
                . $this->stream . "', '"
                . $this->description . "', '"
                . $this->sort . "'"
                . ")";

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

        $query = "SELECT * FROM `education` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE `education` SET "
                . "`institute` ='" . $this->institute . "', "
                . "`title` ='" . $this->title . "', "
                . "`duration` ='" . $this->duration . "', "
                . "`stream` ='" . $this->stream . "', "
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

        $query = 'DELETE FROM `education` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function GetEducationsByMember($member) {

        $query = "SELECT * FROM `education` WHERE `member` = '" . $member . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function deleteEducationsByMember($member) {

        $query = "DELETE FROM `education` WHERE `member`= '" . $member . "'";

        $db = new Database();
        $result = $db->readQuery($query);

        return $result;
    }

}