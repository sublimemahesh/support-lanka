<?php

/**
 * Description of Industry
 *
 * @author official
 */
class Industry {

    public $id;
    public $name;
    public $image_name;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name`,`image_name`,`sort` FROM `industry` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->image_name = $result['image_name'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `industry` (`name`, `image_name`, `sort`) VALUES  ('"
                . $this->name . "','"
                . $this->image_name . "', '"
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

        $query = "SELECT * FROM `industry` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getIndustryByKeyword($keyword) {

        $query = "SELECT * FROM `industry` WHERE `name` LIKE '" . $keyword . "%' ORDER BY '" . $keyword . "' ASC";

        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `industry` SET "
                . "`name` ='" . $this->name . "', "
                . "`image_name` ='" . $this->image_name . "', "
                . "`sort` ='" . $this->sort . "' "
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

        $SKILL = new Skill(NULL);

        $result = $SKILL->deleteSkillsByIndustry($this->id);

        if ($result) {
            $query = 'DELETE FROM `industry` WHERE id="' . $this->id . '"';
        }

        $db = new Database();

        return $db->readQuery($query);
//        dd($query);
    }

    public function GetIndustryById($id) {

        $query = "SELECT * FROM `industry` WHERE `id` = '" . $id . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function arrange($key, $img) {
        $query = "UPDATE `industry` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
