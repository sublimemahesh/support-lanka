<?php

/**
 * Description of Vacancy
 *
 * @author official
 */
class Vacancy {

    public $id;
    public $company;
    public $title;
    public $designation;
    public $salary;
    public $age;
    public $gender;
    public $deadline;
    public $job_type;
    public $description;
    public $status;
    public $rank;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`company`,`title`,`designation`,`salary`,`age`,`gender`,`deadline`,`job_type`,`description`,`status`,`rank`,`sort` FROM `vacancy` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->company = $result['company'];
            $this->title = $result['title'];
            $this->designation = $result['designation'];
            $this->salary = $result['salary'];
            $this->age = $result['age'];
            $this->gender = $result['gender'];
            $this->deadline = $result['deadline'];
            $this->job_type = $result['job_type'];
            $this->description = $result['description'];
            $this->status = $result['status'];
            $this->rank = $result['rank'];
            $this->sort = $result['sort'];
            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `vacancy` (`company`, `title`, `designation`, `salary`, `age`, `gender`, `deadline`, `job_type`, `description`, `status`, `rank`, `sort`) VALUES  ('"
                . $this->company . "','"
                . $this->title . "','"
                . $this->designation . "','"
                . $this->salary . "','"
                . $this->age . "','"
                . $this->gender . "','"
                . $this->deadline . "','"
                . $this->job_type . "','"
                . $this->description . "','"
                . $this->status . "','"
                . $this->rank . "','"
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

        $query = "SELECT * FROM `vacancy` ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }
        public function all1($pageLimit, $setLimit) {

        $query = "SELECT * FROM `vacancy` LIMIT " . $pageLimit . " , " . $setLimit . " ";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE `vacancy` SET "
                . "`title` ='" . $this->title . "', "
                . "`designation` ='" . $this->designation . "', "
                . "`salary` ='" . $this->salary . "', "
                . "`age` ='" . $this->age . "', "
                . "`gender` ='" . $this->gender . "', "
                . "`deadline` ='" . $this->deadline . "', "
                . "`job_type` ='" . $this->job_type . "', "
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

        $query = 'DELETE FROM `vacancy` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function arrange($key, $vacan) {

        $query = "UPDATE `vacancy` SET `sort` = '" . $key . "'  WHERE id = '" . $vacan . "'";

        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

    public function GetVacancyByCompany($company) {

        $query = "SELECT * FROM `vacancy` WHERE `company` = '" . $company . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function GetVacancyByCompany1($company, $pageLimit, $setLimit) {

        $query = "SELECT * FROM `vacancy` WHERE `company` = '" . $company . "' LIMIT " . $pageLimit . " , " . $setLimit . "";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function GetVacancyById($id) {

        $query = "SELECT * FROM `vacancy` WHERE `id` = '" . $id . "' ORDER BY `sort` ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function deleteVacancyByCompany($company) {

        $query = "DELETE FROM `vacancy` WHERE `company`= '" . $company . "'";

        $db = new Database();
        $result = $db->readQuery($query);

        return $result;
    }

    public function showPagination($per_page, $page, $company) {

        $page_url = "?";
        if ($company) {
            $query = "SELECT COUNT(*) as totalCount FROM `vacancy` WHERE `company` ='$company'";
        } else {
            $query = "SELECT COUNT(*) as totalCount FROM `vacancy` ";
        }
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
                        $setPaginate .= "<li><a href='{$page_url}page=$counter&&company=$company'>$counter</a></li>";
                }
            }
            elseif ($setLastpage > 5 + ($adjacents * 2)) {
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li><a class='current_page'>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter&&company=$company'>$counter</a></li>";
                    }
                    $setPaginate .= "<li class='dot'>...</li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$lpm1&&company=$company'>$lpm1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$setLastpage&&company=$company'>$setLastpage</a></li>";
                }
                elseif ($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $setPaginate .= "<li><a href='{$page_url}page=1&&company=$company'>1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=2&&company=$company'>2</a></li>";
                    $setPaginate .= "<li class='dot'>...</li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li><a class='current_page'>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter&&company=$company'>$counter</a></li>";
                    }
                    $setPaginate .= "<li class='dot'>..</li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$lpm1&&company=$company'>$lpm1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=$setLastpage&&company=$company'>$setLastpage</a></li>";
                }
                else {
                    $setPaginate .= "<li><a href='{$page_url}page=1&&company=$company'>1</a></li>";
                    $setPaginate .= "<li><a href='{$page_url}page=2&&company=$company'>2</a></li>";
                    $setPaginate .= "<li class='dot'>..</li>";
                    for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++) {
                        if ($counter == $page)
                            $setPaginate .= "<li><a class='current_page'>$counter</a></li>";
                        else
                            $setPaginate .= "<li><a href='{$page_url}page=$counter&&company=$company'>$counter</a></li>";
                    }
                }
            }

            if ($page < $counter - 1) {
                $setPaginate .= "<li><a href='{$page_url}page=$next&&company=$company'>Next</a></li>";
                $setPaginate .= "<li><a href='{$page_url}page=$setLastpage&&company=$company'>Last</a></li>";
            } else {
                $setPaginate .= "<li><a class='current_page'>Next</a></li>";
                $setPaginate .= "<li><a class='current_page'>Last</a></li>";
            }

            $setPaginate .= "</ul>\n";
        }

        echo $setPaginate;
    }

}
