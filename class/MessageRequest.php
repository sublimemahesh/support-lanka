<?php

/**
 * Description of MessageRequest
 *
 * @author official
 */
class MessageRequest {

    public $id;
    public $date;
    public $company;
    public $member;
    public $contact;
    public $email;
    public $title;
    public $message;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`date`,`company`,`member`,`contact`,`email`,`title`,`message` FROM `message_request` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->date = $result['date'];
            $this->company = $result['company'];
            $this->member = $result['member'];
            $this->contact = $result['contact'];
            $this->email = $result['email'];
            $this->title = $result['title'];
            $this->message = $result['message'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `message_request` (`date`, `company`, `member`, `contact`, `email`, `title`, `message`) VALUES  ('"
                . $this->date . "','"
                . $this->company . "', '"
                . $this->member . "', '"
                . $this->contact . "', '"
                . $this->email . "', '"
                . $this->title . "', '"
                . $this->message . "')";

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

        $query = "SELECT * FROM `message_request` ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `message_request` SET "
                . "`contact` ='" . $this->contact . "', "
                . "`email` ='" . $this->email . "', "
                . "`title` ='" . $this->title . "', "
                . "`message` ='" . $this->message . "' "
                . "WHERE `id` = '" . $this->id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return $this->__construct($this->id);
        } else {
            return FALSE;
        }
    }

    public function arrange($key, $mess) {
        $query = "UPDATE `message_request` SET `sort` = '" . $key . "'  WHERE id = '" . $mess . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

    public function delete() {

        $query = 'DELETE FROM `message_request` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function getMessageRequestByCompany($company) {

        $query = "SELECT * FROM `message_request` WHERE `company`= '" . $company . "'";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function GetMessageRequestByMember($member) {

        $query = "SELECT * FROM `message_request` WHERE `member` = '" . $member . "'";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

}
