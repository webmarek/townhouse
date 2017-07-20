<?php
require('../config.php');
require('../classes/Model.php');

class Support extends Model
{ //it extends model only for the sake of PDO and database connection

    public function fetchColumn()
    {
        $this->execute();
        return $this->stmt->fetchColumn();
    }

    public function processDataMinor()
    {

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $year = $post['year'];
        settype($year, "integer");
        $month = $post['month'];
        settype($month, "integer");
        $resource = $post['resource'];
        settype($resource, "string");
        $flat = $post['flat'];
        settype($flat, "integer");

         $this->query("SELECT COUNT(:resource) FROM `usage` WHERE `year`= :year AND `month` = :month AND `user` = :flat");


        $this->bind(':year', $year, PDO::PARAM_INT);
        $this->bind(':month', $month, PDO::PARAM_INT);
        $this->bind(':resource', $resource);
        $this->bind(':flat', $flat, PDO::PARAM_INT);

        $howManyRows = $this->fetchColumn();

        echo $howManyRows;

    }

    public function processDataMajor()
    {

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $year = $post['year'];
        $month = $post['month'];

        $this->query("SELECT COUNT(*) FROM `usage` WHERE `year`= :year AND `month` = :month");

        $this->bind(':year', $year, PDO::PARAM_INT);
        $this->bind(':month', $month, PDO::PARAM_INT);

        $howManyRows = $this->fetchColumn();

        echo $howManyRows;

    }

    public function editParticular()
    {

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $year = $post['year'];
        settype($year, "integer");
        $month = $post['month'];
        settype($month, "integer");
        $flat = $post['flat'];
        settype($flat, "integer");

        $this->query("SELECT * FROM `usage` WHERE `year`= :year AND `month` = :month AND `user`= :flat");

        $this->bind(':year', $year, PDO::PARAM_INT);
        $this->bind(':month', $month, PDO::PARAM_INT);
        $this->bind(':flat', $flat, PDO::PARAM_INT);


        $row = $this->single();

        $data = array(
            "hwater" => $row['hwater'],
            "cwater" => $row['cwater'],
            "electricity" => $row['electricity']
        );

        echo json_encode($data);

    }
}

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if ($post['driver'] == "major") {

    $support = new Support;

    $support->processDataMajor();

} elseif ($post['driver'] == "minor") {

    $support = new Support;

    $support->processDataMinor();

} elseif ($post['driver'] == "particular") {

    $support = new Support;

    $support->editParticular();
}



