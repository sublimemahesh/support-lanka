<?php

/**
 * Description of Company
 *
 * @author official
 */
class Company {

    public $id;
    public $logo_image;
    public $name;
    public $industry;
    public $city;
    public $company_register_number;
    public $address;
    public $since;
    public $team_size;
    public $views;
    public $about;
    public $contact_number;
    public $email;
    public $map;
    public $username;
    public $password;
    public $resetcode;
    public $rank;
    public $status;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`logo_image`,`name`,`industry`,`city`,`company_register_number`,`address`,`since`,`team_size`,`views`,`about`,`contact_number`,`email`,`map`,`username`,`resetcode`,`rank`,`status` FROM `company` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->logo_image = $result['logo_image'];
            $this->name = $result['name'];
            $this->industry = $result['industry'];
            $this->city = $result['city'];
            $this->company_register_number = $result['company_register_number'];
            $this->address = $result['address'];
            $this->since = $result['since'];
            $this->team_size = $result['team_size'];
            $this->views = $result['views'];
            $this->about = $result['about'];
            $this->contact_number = $result['contact_number'];
            $this->email = $result['email'];
            $this->map = $result['map'];
            $this->username = $result['username'];
            $this->resetcode = $result['resetcode'];
            $this->rank = $result['rank'];
            $this->status = $result['status'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `company` (`logo_image`,`name`,`industry`,`city`,`company_register_number`,`address`,`since`,`team_size`,`views`,`about`,`contact_number`,`email`,`map`,`username`,`password`,`resetcode`,`rank`,`status`) VALUES  ('"
                . $this->logo_image . "','"
                . $this->name . "','"
                . $this->industry . "','"
                . $this->city . "','"
                . $this->company_register_number . "','"
                . $this->address . "','"
                . $this->since . "','"
                . $this->team_size . "','"
                . $this->views . "','"
                . $this->about . "','"
                . $this->contact_number . "','"
                . $this->email . "','"
                . $this->map . "','"
                . $this->username . "','"
                . $this->password . "','"
                . $this->resetcode . "','"
                . $this->rank . "','"
                . $this->status . "')";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            $last_id = mysql_insert_id();

            return $this->__construct($last_id);
        } else {
            return FALSE;
        }
    }

    public function login($username, $password) {

        $query = "SELECT * FROM `company` WHERE `username`= '" . $username . "' AND `password`= '" . $password . "'";

        $db = new Database();

        $result = mysql_fetch_array($db->readQuery($query));

        if (!$result) {
            return FALSE;
        } else {

            $this->id = $result['id'];
            $company = $this->__construct($this->id);

            if (!isset($_SESSION)) {
                session_start();
                session_unset($_SESSION);
            }

            $_SESSION["login_com"] = TRUE;

            $_SESSION["id_com"] = $company->id;
            $_SESSION["logo_image_com"] = $company->logo_image;
            $_SESSION["name_com"] = $company->name;
            $_SESSION["industry_com"] = $company->industry;
            $_SESSION["city_com"] = $company->city;
            $_SESSION["company_register_number_com"] = $company->company_register_number;
            $_SESSION["address_com"] = $company->address;
            $_SESSION["since_com"] = $company->since;
            $_SESSION["team_size_com"] = $company->team_size;
            $_SESSION["views_com"] = $company->views;
            $_SESSION["about_com"] = $company->about;
            $_SESSION["contact_number_com"] = $company->contact_number;
            $_SESSION["email_com"] = $company->email;
            $_SESSION["map_com"] = $company->map;
            $_SESSION["username_com"] = $company->username;
            $_SESSION["resetcode_com"] = $company->resetcode;
            $_SESSION["rank_com"] = $company->rank;
            $_SESSION["status_com"] = $company->status;

            return TRUE;
        }
    }

    public function authenticate() {

        if (!isset($_SESSION)) {
            session_start();
        }

        $id = NULL;

        if (isset($_SESSION["id_com"])) {
            $id = $_SESSION["id_com"];
        }

        $query = "SELECT `id` FROM `company` WHERE `id`= '" . $id . "'";

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

        unset($_SESSION["id_com"]);
        unset($_SESSION["logo_image_com"]);
        unset($_SESSION["name_com"]);
        unset($_SESSION["industry_com"]);
        unset($_SESSION["city_com"]);
        unset($_SESSION["company_register_number_com"]);
        unset($_SESSION["address_com"]);
        unset($_SESSION["since_com"]);
        unset($_SESSION["team_size_com"]);
        unset($_SESSION["views_com"]);
        unset($_SESSION["about_com"]);
        unset($_SESSION["contact_number_com"]);
        unset($_SESSION["email_com"]);
        unset($_SESSION["map_com"]);
        unset($_SESSION["username_com"]);
        unset($_SESSION["password_com"]);
        unset($_SESSION["resetcode_com"]);
        unset($_SESSION["rank_com"]);
        unset($_SESSION["status_com"]);

        return TRUE;
    }

    public function all() {

        $query = "SELECT * FROM `company`";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `company` SET "
                . "`logo_image` ='" . $this->logo_image . "', "
                . "`name` ='" . $this->name . "', "
                . "`industry` ='" . $this->industry . "', "
                . "`city` ='" . $this->city . "', "
                . "`company_register_number` ='" . $this->company_register_number . "', "
                . "`address` ='" . $this->address . "', "
                . "`since` ='" . $this->since . "', "
                . "`team_size` ='" . $this->team_size . "', "
                . "`views` ='" . $this->views . "', "
                . "`about` ='" . $this->about . "', "
                . "`contact_number` ='" . $this->contact_number . "', "
                . "`email` ='" . $this->email . "', "
                . "`map` ='" . $this->map . "', "
                . "`username` ='" . $this->username . "', "
                . "`resetcode` ='" . $this->resetcode . "', "
                . "`rank` ='" . $this->rank . "', "
                . "`status` ='" . $this->status . "' "
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

        $query = 'DELETE FROM `company` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function checkOldPass($id, $password) {

        $enPass = md5($password);

        $query = "SELECT `id` FROM `company` WHERE `id`= '" . $id . "' AND `password`= '" . $enPass . "'";

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

        $query = "UPDATE  `company` SET "
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

        $query = "SELECT `email`,`username` FROM `company` WHERE `email`= '" . $email . "'";

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

        $query = "UPDATE  `company` SET "
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

    public function SelectForgetMember($email) {

        if ($email) {

            $query = "SELECT `email`,`username`,`resetcode` FROM `company` WHERE `email`= '" . $email . "'";

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->username = $result['username'];
            $this->email = $result['email'];
            $this->resetcode = $result['resetcode'];

            return $result;
        }
    }

    public function SelectResetCode($code) {

        $query = "SELECT `id` FROM `company` WHERE `resetcode`= '" . $code . "'";

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

        $query = "UPDATE  `company` SET "
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

    public function ChangeLogoPic($company, $file) {

        $query = "UPDATE  `company` SET "
                . "`logo_image` ='" . $file . "' "
                . "WHERE `id` = '" . $company . "'";

        $db = new Database();

        $result = $db->readQuery($query);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function GetCompanyByCity($city) {

        $query = "SELECT * FROM `company` WHERE `member` = '" . $city . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

}
