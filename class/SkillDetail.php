<?php

/**
 * Description of SkillDetails
 *
 * @author official
 */
class SkillDetail {

    public $id;
    public $member;
    public $skill;
    public $sub_skill;
    public $percentage;
    public $description;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`member`,`skill`,`sub_skill`,`percentage`,`description`,`sort` FROM `skill_details` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->member = $result['member'];
            $this->skill = $result['skill'];
            $this->sub_skill = $result['sub_skill'];
            $this->percentage = $result['percentage'];
            $this->description = $result['description'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `skill_details` (`member`, `skill`,`sub_skill`, `percentage`, `description`, `sort`) VALUES  ('"
                . $this->member . "','"
                . $this->skill . "', '"
                . $this->sub_skill . "', '"
                . $this->percentage . "', '"
                . $this->description . "', '"
                . $this->sort . "')";
        dd($query);
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

        $query = "SELECT * FROM `skill_details` ORDER BY `sort` ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `skill_details` SET "
                . "`percentage` ='" . $this->percentage . "', "
                . "`sub_skill` ='" . $this->sub_skill . "', "
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

    public function arrange($key, $img) {
        $query = "UPDATE `skill_details` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

    public function delete() {

        $query = 'DELETE FROM `skill_details` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function getSkillDetailsById($skill) {

        $query = "SELECT * FROM `skill_details` WHERE `skill`= '" . $skill . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function GetSkillByMember($member) {

        $query = "SELECT * FROM `skill_details` WHERE `member` = '" . $member . "' ORDER BY `sort` ASC";
        
        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function CheckSkillIsExisByMember($member, $skill) {

        $query = "SELECT * FROM `skill_details` WHERE `member` = '" . $member . "' AND  `skill` = '" . $skill . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if (mysql_num_rows($result) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function CheckSubSkillIsExisByMember($member, $Subskill) {

        $query = "SELECT * FROM `skill_details` WHERE `member` = '" . $member . "' AND  `skill` = '" . $Subskill . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if (mysql_num_rows($result) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function SkilldetailsBySkillDistinct($skill) {

        $query = "SELECT DISTINCT skill,member FROM `skill_details` WHERE `skill`= '" . $skill . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function deleteSkilldetailsByMember($member) {

        $query = "DELETE FROM `skill_details` WHERE `member`= '" . $member . "'";

        $db = new Database();
        $result = $db->readQuery($query);

        return $result;
    }

    public function deleteSkilldetailsByMemberAndSkill($member,$skill) {

        $query = "DELETE FROM `skill_details` WHERE `member`= '" . $member . "' AND `skill`='" . $skill . "'";
       
        $db = new Database();
        $result = $db->readQuery($query);

        return $result;
    }

}