<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comments
 *
 * @author Suharshana DsW
 */
class Comments {

    public $id;
    public $member;
    public $name;
    public $email;
    public $mobile;
    public $comment;
    public $is_active;
    public $queue;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT  * FROM `comments` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->member = $result['member'];
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->mobile = $result['mobile'];
            $this->comment = $result['comment'];
            $this->is_active = $result['is_active'];
            $this->queue = $result['queue'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `comments` (`member`,`name`,`email`,`mobile`, `comment`,`is_active`,`queue`) VALUES  ('"
                . $this->member . "','"
                . $this->name . "','"
                . $this->email . "','"
                . $this->mobile . "','"
                . $this->comment . "', '"
                . $this->is_active . "', '"
                . $this->queue . "')";

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

        $query = "SELECT * FROM `comments` ORDER BY queue ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getCommentByMember($member) {

        $query = "SELECT * FROM `comments` WHERE `member` = '" . $member . "' AND `is_active` = 0";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `comments` SET "
                . "`name` ='" . $this->name . "', "
                . "`email` ='" . $this->email . "', "
                . "`mobile` ='" . $this->mobile . "', "
                . "`image_name` ='" . $this->image_name . "', "
                . "`comment` ='" . $this->comment . "', "
                . "`is_active` ='" . $this->is_active . "', "
                . "`queue` ='" . $this->queue . "' "
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

        $query = 'DELETE FROM `comments` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function activeComments() {

        $query = "SELECT * FROM `comments` WHERE is_active = '1'";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function pendingComments() {

        $query = "SELECT * FROM `comments` WHERE is_active = '0'";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function arrange($key, $img) {
        $query = "UPDATE `comments` SET `queue` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
