<?php

class FlatModel extends Model
{

    public function Index()
    {

        if (!isset($_SESSION['is_logged_in'])) {
            header('location: ' . ROOT_PATH);
            exit();
        }

        $user = $_SESSION['user_data']['user'];

        $data = [
            'cwater' => [],
            'hwater' => [],
            'electricity' => [],
            'last_month_usage' => [],
            'prices' => [],
        ];

        $year = (string)date("Y") - 1; // od tego roku rok poprzedni
        $month = (string)date("n");

        for ($i = 1; $i <= 12; $i++) {

            $this->query('SELECT * FROM `usage` WHERE `user` = ' . $user . ' AND `year` = ' . $year . ' AND `month` = ' . $month);

            $rows = $this->single();

            array_push($data['cwater'], $rows['cwater']);
            array_push($data['hwater'], $rows['hwater']);
            array_push($data['electricity'], $rows['electricity']);

            if ($month <= 11) {
                $month++;
            } elseif ($month === 12) {
                $month = 1;
                $year++;
            }

        }

        $data['last_month_usage']['cwater'] = ($data['cwater'][11] - $data['cwater'][10]);

        $data['last_month_usage']['hwater'] = ($data['hwater'][11] - $data['hwater'][10]);

        $data['last_month_usage']['electricity'] = ($data['electricity'][11] - $data['electricity'][10]);


        $this->query('SELECT `resource_price` FROM `prices` WHERE `resource` = "cold_water"');
        $row = $this->single();
        $data['prices']['cwater'] = $row['resource_price'];

        $this->query('SELECT `resource_price` FROM `prices` WHERE `resource` = "hot_water" ');
        $row = $this->single();
        $data['prices']['hwater'] = $row['resource_price'];

        $this->query('SELECT `resource_price` FROM `prices` WHERE `resource` = "electricity"');
        $row = $this->single();
        $data['prices']['electricity'] = $row['resource_price'];

        return $data;
    }
}
