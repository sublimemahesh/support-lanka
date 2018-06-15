<?php

/**
 * Description of Member
 *
 * @author HP
 */
class Member {

    public $id;
    public $name;
    public $email;
    public $nic_number;
    public $date_of_birthday;
    public $contact_number;
    public $about_me;
    public $home_address;
    public $city;
    public $profile_picture;
    public $username;
    public $password;
    public $privacy;
    public $job_type;
    public $resetcode;
    public $rank;
    public $status;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`name`,`email`,`nic_number`,`date_of_birthday`,`contact_number`,`about_me`,`home_address`,`city`,`profile_picture`,`username`,`privacy`,`job_type`,`status`,`rank` FROM `member` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->nic_number = $result['nic_number'];
            $this->date_of_birthday = $result['date_of_birthday'];
            $this->contact_number = $result['contact_number'];
            $this->about_me = $result['about_me'];
            $this->home_address = $result['home_address'];
            $this->city = $result['city'];
            $this->profile_picture = $result['profile_picture'];
            $this->username = $result['username'];
            $this->privacy = $result['privacy'];
            $this->job_type = $result['job_type'];
            $this->rank = $result['rank'];
            $this->status = $result['status'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `member` (`name`,`email`,`nic_number`,`date_of_birthday`,`contact_number`,`about_me`,`home_address`,`city`,`profile_picture`,`username`,`password`,`privacy`,`job_type`,`status`,`rank`) VALUES  ('"
                . $this->name . "','"
                . $this->email . "','"
                . $this->nic_number . "','"
                . $this->date_of_birthday . "','"
                . $this->contact_number . "','"
                . $this->about_me . "','"
                . $this->home_address . "','"
                . $this->city . "','"
                . $this->profile_picture . "','"
                . $this->username . "','"
                . $this->password . "','"
                . $this->privacy . "','"
                . $this->job_type . "','"
                . $this->status . "','"
                . $this->rank . "')";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            $last_id = mysql_insert_id();

            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }

    public function Search($keyword, $city) {

        $w = array();
        $where = '';

        if (!empty($keyword)) {

            $w[] = "`name` LIKE '%" . $keyword . "%' ";
        }

        if (!empty($categories)) {
            $w[] = "`city` = '" . $city . "' ";
        }

        if (count($w)) {
            $where = "WHERE " . implode(' AND ', $w);
        }

        $query = "SELECT * FROM `member` $where ";

        $db = new Database();

        $result = $db->readQuery($query);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function getAllByCity($city) {

        $query = "SELECT * FROM `member` WHERE `city` = '" . $city . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function GetMemberByCity($city) {

        $query = "";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function activeMember() {

        $query = "SELECT * FROM `member` WHERE status = '1'";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function login($nic_number, $password) {
        
        $query = "SELECT * FROM `member` WHERE `nic_number`= '" . $nic_number . "' AND `password`= '" . $password . "' AND `status`= '" . 1 . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {

            $this->id = $result['id'];
            $member = $this->__construct($this->id);
    
            if (!isset($_SESSION)) {
                session_start();
                session_unset($_SESSION);
            }

            $_SESSION["login"] = TRUE;

            $_SESSION["id"] = $member->id;
            
            $_SESSION["name"] = $member->name;
            $_SESSION["email"] = $member->email;
            $_SESSION["nic_number"] = $member->nic_number;
            $_SESSION["date_of_birthday"] = $member->date_of_birthday;
            $_SESSION["contact_number"] = $member->contact_number;
            $_SESSION["about_me"] = $member->about_me;
            $_SESSION["home_address"] = $member->home_address;
            $_SESSION["city"] = $member->city;
            $_SESSION["profile_picture"] = $member->profile_picture;
            $_SESSION["username"] = $member->username;
            $_SESSION["status"] = $member->status;
            $_SESSION["rank"] = $member->rank;

         
            return TRUE;
        }
    }

    public function authenticate() {

        if (!isset($_SESSION)) {
            session_start();
        }

        $id = NULL;

        if (isset($_SESSION["id"])) {
            $id = $_SESSION["id"];
        }

        $query = "SELECT `id` FROM `member` WHERE `id`= '" . $id . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {

            return TRUE;
        }
    }

    public function logOut() {

        if (!isset($_SESSION)) {
            session_start();
        }

        unset($_SESSION["id"]);
        unset($_SESSION["name"]);
        unset($_SESSION["email"]);
        unset($_SESSION["nic_number"]);
        unset($_SESSION["date_of_birthday"]);
        unset($_SESSION["contact_number"]);
        unset($_SESSION["about_me"]);
        unset($_SESSION["home_address"]);
        unset($_SESSION["city"]);
        unset($_SESSION["profile_picture"]);
        unset($_SESSION["username"]);
        unset($_SESSION["password"]);
        unset($_SESSION["status"]);
        unset($_SESSION["rank"]);

        return TRUE;
    }

    public function all() {

        $query = "SELECT * FROM `member` ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function all1($pageLimit, $setLimit) {

        $query = "SELECT * FROM `member` where `privacy`= '1' LIMIT " . $pageLimit . " , " . $setLimit . " ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `member` SET "
                . "`name` ='" . $this->name . "', "
                . "`email` ='" . $this->email . "', "
                . "`nic_number` ='" . $this->nic_number . "', "
                . "`date_of_birthday` ='" . $this->date_of_birthday . "', "
                . "`contact_number` ='" . $this->contact_number . "', "
                . "`about_me` ='" . $this->about_me . "', "
                . "`home_address` ='" . $this->home_address . "', "
                . "`city` ='" . $this->city . "', "
                . "`profile_picture` ='" . $this->profile_picture . "', "
                . "`username` ='" . $this->username . "', "
                . "`status` ='" . $this->status . "', "
                . "`rank` ='" . $this->rank . "', "
                . "`job_type` ='" . $this->job_type . "' "
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

        $SKILL_DETAILS = new SkillDetail(NULL);
        $EDUCATION = new Education(NULL);
        $AWARD = new Award(NULL);

        $result = $SKILL_DETAILS->deleteSkilldetailsByMember($this->id);
        $result = $EDUCATION->deleteEducationsByMember($this->id);
        $result = $AWARD->deleteAwardsByMember($this->id);

        if ($result) {
            $query = 'DELETE FROM `member` WHERE id="' . $this->id . '"';
        }

        $db = new Database();

        return $db->readQuery($query);
    }

    public function checkOldPass($id, $password) {

        $enPass = md5($password);

        $query = "SELECT `id` FROM `member` WHERE `id`= '" . $id . "' AND `password`= '" . $enPass . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function changePassword($id, $password) {

        $enPass = md5($password);

        $query = "UPDATE  `member` SET "
                . "`password` ='" . $enPass . "' "
                . "WHERE `id` = '" . $id . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function checkEmail($email) {
        $query = "SELECT `email`,`username` FROM `member` WHERE `email`= '" . $email . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {
            return $result;
        }
    }

    public function CheckNicNumber($nic_number) {
        $query = "SELECT `email`,`nic_number` FROM `member` WHERE `nic_number`= '" . $nic_number . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {
            return $result;
        }
    }

    public function GenarateCode($email) {

        $rand = rand(10000, 99999);

        $query = "UPDATE  `member` SET "
                . "`resetcode` ='" . $rand . "' "
                . "WHERE `email` = '" . $email . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function GenarateCodeMember($nic_number) {

        $rand = rand(10000, 99999);

        $query = "UPDATE  `member` SET "
                . "`resetcode` ='" . $rand . "' "
                . "WHERE `nic_number` = '" . $nic_number . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function SelectForgetMember($nic_number) {

        if ($nic_number) {

            $query = "SELECT `email`,`nic_number`,`resetcode` FROM `member` WHERE `nic_number`= '" . $nic_number . "'";

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));
            $this->nic_number = $result['nic_number'];
            $this->email = $result['email'];
            $this->resetcode = $result['resetcode'];

            return $result;
        }
    }

    public function getNextAvailableUsername() {

        $query = "SELECT MAX(id)+1 FROM `member`";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        return 'SUP' . str_pad($result["MAX(id)+1"], 6, '0', STR_PAD_LEFT);
    }

    public function SelectResetCode($code) {

        $query = "SELECT `id` FROM `member` WHERE `resetcode`= '" . $code . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {

            return TRUE;
        }
    }

    public function updatePassword($password, $code) {

        $enPass = md5($password);

        $query = "UPDATE  `member` SET "
                . "`password` ='" . $enPass . "' "
                . "WHERE `resetcode` = '" . $code . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function ChangeProPic($member, $file) {

        $query = "UPDATE  `member` SET "
                . "`profile_picture` ='" . $file . "' "
                . "WHERE `id` = '" . $member . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function showPagination($per_page, $page) {

        $page_url = "?";
        $query = "SELECT COUNT(*) as totalCount FROM `member` ";
        $rec = mysql_fetch_array(mysql_query($query));
        $total = $rec['totalCount'];
        $adjacents = "2";

        $page = ($page == 0 ? 1 : $page);
        $start = ($page - 1) * $per_page;

        $prev = $page - 1;
        $next = $page + 1;
        $setLastpage = ceil($total / $per_page);
        $lpm1 = $setLastpage - 1;

        $setPaginate = "";
        if ($setLastpage > 1) {
            $setPaginate .= "<ul class='setPaginate'>";
            $setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
            if ($setLastpage < 7 + ($adjacents * 2)) {
                for ($counter = 1; $counter <= $setLastpage; $counter++) {
                    if ($counter == $page)
                        $setPaginate .= "<li><a class='current_page'>$counter</a></li>";
                    else
                        $setPaginate .= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                }
            }
            elseif ($setLastpage > 5 + ($adjacents * 2)) {
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li><a class='current_page'>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                    }
                    $setPaginate .= "<li class='dot'>...</li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";
                }
                elseif ($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $setPaginate .= "<li><a href='{$page_url}page=1'>1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=2'>2</a></li>";
                    $setPaginate .= "<li class='dot'>...</li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li><a class='current_page'>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                    }
                    $setPaginate .= "<li class='dot'>..</li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";
                }
                else {
                    $setPaginate .= "<li><a href='{$page_url}page=1'>1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=2'>2</a></li>";
                    $setPaginate .= "<li class='dot'>..</li>";
                    for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li><a class='current_page'>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";
                    }
                }
            }

            if ($page < $counter - 1) {
                $setPaginate .= "<li><a href='{$page_url}page=$next'>Next</a></li>";
                $setPaginate .= "<li><a href='{$page_url}page=$setLastpage'>Last</a></li>";
            } else {
                $setPaginate .= "<li><a class='current_page'>Next</a></li>";
                $setPaginate .= "<li><a class='current_page'>Last</a></li>";
            }

            $setPaginate .= "</ul>\n";
        }


        echo $setPaginate;
    }

    public function showPaginationSkill($per_page, $page, $skill) {

        $page_url = "?";

        $query = "SELECT DISTINCT COUNT(*) as totalCount FROM  `skill_details` WHERE `skill`= '" . $skill . "' ORDER BY `sort` ASC";

        $rec = mysql_fetch_array(mysql_query($query));
        $total = $rec['totalCount'];
        $adjacents = "2";

        $page = ($page == 0 ? 1 : $page);
        $start = ($page - 1) * $per_page;

        $prev = $page - 1;
        $next = $page + 1;
        $setLastpage = ceil($total / $per_page);
        $lpm1 = $setLastpage - 1;

        $setPaginate = "";
        if ($setLastpage > 1) {
            $setPaginate .= "<ul class='setPaginate'>";
            $setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
            if ($setLastpage < 7 + ($adjacents * 2)) {
                for ($counter = 1; $counter <= $setLastpage; $counter++) {
                    if ($counter == $page)
                        $setPaginate .= "<li><a class='current_page'>$counter</a></li>";
                    else
                        $setPaginate .= "<li><a href='{$page_url}page=$counter'&skill=$skill>$counter</a></li>";
                }
            }
            elseif ($setLastpage > 5 + ($adjacents * 2)) {
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li><a class='current_page'>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter'&skill=$skill>$counter</a></li>";
                    }
                    $setPaginate .= "<li class='dot'>...</li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$lpm1'&skill=$skill>$lpm1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$setLastpage'&skill=$skill>$setLastpage</a></li>";
                }
                elseif ($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $setPaginate .= "<li><a href='{$page_url}page=1'&skill=$skill>1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=2'&skill=$skill>2</a></li>";
                    $setPaginate .= "<li class='dot'>...</li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li><a class='current_page'>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter'&skill=$skill>$counter</a></li>";
                    }
                    $setPaginate .= "<li class='dot'>..</li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$lpm1'&skill=$skill>$lpm1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$setLastpage'&skill=$skill>$setLastpage</a></li>";
                }
                else {
                    $setPaginate .= "<li><a href='{$page_url}page=1'&skill=$skill>1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=2'&skill=$skill>2</a></li>";
                    $setPaginate .= "<li class='dot'>..</li>";
                    for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li><a class='current_page'>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter'&skill=$skill>$counter</a></li>";
                    }
                }
            }

            if ($page < $counter - 1) {
                $setPaginate .= "<li><a href='{$page_url}page=$next'&skill=$skill>Next</a></li>";
                $setPaginate .= "<li><a href='{$page_url}page=$setLastpage'&skill=$skill>Last</a></li>";
            } else {
                $setPaginate .= "<li><a class='current_page'>Next</a></li>";
                $setPaginate .= "<li><a class='current_page'>Last</a></li>";
            }

            $setPaginate .= "</ul>\n";
        }


        echo $setPaginate;
    }

}