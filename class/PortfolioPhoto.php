<?php

/**
 * Description of PortfolioPhoto
 *
 * @author official
 */
class PortfolioPhoto {

    public $id;
    public $portfolio;
    public $image_name;
    public $caption;
    public $sort;

    public function __construct($id) {
        if ($id) {

            $query = "SELECT `id`,`portfolio`,`image_name`,`caption`,`sort` FROM `portfolio_photos` WHERE `id`=" . $id;

            $db = new Database();

            $result = mysql_fetch_array($db->readQuery($query));

            $this->id = $result['id'];
            $this->portfolio = $result['portfolio'];
            $this->image_name = $result['image_name'];
            $this->caption = $result['caption'];
            $this->sort = $result['sort'];

            return $this;
        }
    }

    public function create() {

        $query = "INSERT INTO `portfolio_photos` (`portfolio`,`image_name`,`caption`,`sort`) VALUES  ('"
                . $this->portfolio . "','"
                . $this->image_name . "', '"
                . $this->caption . "', '"
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

        $query = "SELECT * FROM `portfolio_photos` ORDER BY sort ASC";
        $db = new Database();
        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }

        return $array_res;
    }

    public function update() {

        $query = "UPDATE  `portfolio_photos` SET "
                . "`portfolio` ='" . $this->portfolio . "', "
                . "`image_name` ='" . $this->image_name . "', "
                . "`caption` ='" . $this->caption . "', "
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

        $query = 'DELETE FROM `portfolio_photos` WHERE id="' . $this->id . '"';

        $db = new Database();

        return $db->readQuery($query);
    }

    public function getPortfolioPhotosById($id) {

        $query = "SELECT * FROM `portfolio_photos` WHERE `portfolio`= $id ORDER BY sort ASC";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

    public function arrange($key, $img) {
        $query = "UPDATE `portfolio_photos` SET `sort` = '" . $key . "'  WHERE id = '" . $img . "'";
        $db = new Database();
        $result = $db->readQuery($query);
        return $result;
    }

}
