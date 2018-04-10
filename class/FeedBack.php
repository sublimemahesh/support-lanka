<?php

/**
 * Description of FeedBack
 *
 * @author official
 */
class FeedBack {

    public $id;
    public $name;
    public $date_time;
    public $image_name;
    public $comment;
    public $is_active;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name`,`date_time`,`image_name`,`comment`,`is_active`,`sort` FROM `feedback` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->date_time = $result['date_time'];
            $this->image_name = $result['image_name'];
            $this->comment = $result['comment'];
            $this->is_active = $result['is_active'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `feedback` (`name`,`date_time`,`image_name`,`comment`,`is_active`,`sort`) VALUES  ('"
                . $this->name . "','"
                . $this->date_time . "','"
                . $this->image_name . "', '"
                . $this->comment . "', '"
                . $this->is_active . "', '"
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

        $query = "SELECT * FROM `feedback` ORDER BY sort ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `feedback` SET "
                . "`name` ='" . $this->name . "', "
                . "`date_time` ='" . $this->date_time . "', "
                . "`image_name` ='" . $this->image_name . "', "
                . "`comment` ='" . $this->comment . "', "
                . "`is_active` ='" . $this->is_active . "', "
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

        $query = 'DELETE FROM `feedback` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function activeFeedBack() {

        $query = "SELECT * FROM `feedback` WHERE is_active = '1'";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function pendingFeedBack() {

        $query = "SELECT * FROM `feedback` WHERE is_active = '0'";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function arrange($key, $img) {
        $query = "UPDATE `feedback` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
