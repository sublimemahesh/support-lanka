<?php

class Search {
//member,city
    public function members($keyword) {

        $query = "SELECT DISTINCT `member`.*
            FROM  
            `member` member, 
            `skill` skill, 
            `skill_details` skill_details,
            `city` city
            WHERE  
            ((city.id = member.city AND city.name = '" . $keyword . "' OR 
             member.id = skill_details.member AND member.name = '" . $keyword . "')OR
            skill.id = skill_details.skill AND skill.name = '" . $keyword . "' )";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }
    
//company,city
    public function company($keyword) {

        $query = "SELECT DISTINCT `company`.*
            FROM  
            `company` company, 
            `vacancy` vacancy, 
            `city` city
            WHERE 
            (city.id = company.city AND city.name = '" . $keyword . "' OR
            company.id = vacancy.company AND company.name = '" . $keyword . "' )";

        $db = new Database();

        $result = $db->readQuery($query);
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            array_push($array_res, $row);
        }
        return $array_res;
    }

}
