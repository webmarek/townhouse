<?php

class AdminModel extends Model
{

    public function Index()
    {
        return;
    }

    public function addMonthAll()
    {

        $data = [
            'flatNrs' => [],
        ];

        $this->query('SELECT `user` FROM `uzytkownicy`');

        $rows = $this->resultSet();

        foreach ($rows as $user) {
            $data['flatNrs'][] = $user['user'];
        }

//odtad zajmuje sie zgarnianiem z tablicy $_POST[]

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($post['submit'])) {

            $year = $post['year'];
            settype($year, "integer");
            $month = $post['month'];
            settype($month, "integer");

            foreach ($data['flatNrs'] as $input) {

                $hwater = $post['hwater' . $input];
                settype($hwater, "integer");
                $cwater = $post['cwater' . $input];
                settype($cwater, "integer");
                $electricity = $post['electricity' . $input];
                settype($electricity, "integer");

                /* var_dump($input);
                 echo "<br>";
                 echo 'electricity'.$input;
                 echo "<br>";
                 echo $year;
                 echo "<br>";
                 echo "zimnawoda " .$cwater;
                 echo "<br>";
                 var_dump($hwater);
                 echo "<br>";
                 var_dump($cwater);
                 echo "<br>";
                 var_dump($electricity);
                 echo "<br>";
                 var_dump($year);
                 echo "<br>";
                 var_dump($month);
                 echo "<br>";*/


                if (
                    ((!empty($hwater)) && (is_int($hwater)) && ($hwater > 0)) &&
                    ((!empty($cwater)) && (is_int($cwater)) && ($cwater > 0)) &&
                    ((!empty($electricity)) && (is_int($electricity)) && ($electricity > 0))
                ) {

                    $this->query('INSERT INTO `usage` (user, year, month, hwater, cwater, electricity) VALUES (:user, :year, :month, :hwater, :cwater, :electricity )');

                    $this->bind(':user', $input, PDO::PARAM_INT);
                    $this->bind(':year', $year, PDO::PARAM_INT);
                    $this->bind(':month', $month, PDO::PARAM_INT);
                    $this->bind(':hwater', $hwater, PDO::PARAM_INT);
                    $this->bind(':cwater', $cwater, PDO::PARAM_INT);
                    $this->bind(':electricity', $electricity, PDO::PARAM_INT);

                    $this->execute();

                    if ($this->lastInsertId()) {
                        // Redirect

                        ob_start();
                        echo "<script>alert('dane umieszczono pomyślnie');</script>";
                        header('Location: ' . ROOT_URL . 'admins/addMonthAll');
                        ob_end_flush();
                    }
                }
            }
        }

        return $data;
    }

    public function editParticular()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($post['submit'])) {


            //pierwsza czesc formularza

            $year = $post['year'];
            settype($year, "integer");
            $month = $post['month'];
            settype($month, "integer");
            $user = $post['flat'];
            settype($user, "integer");

            //druga czesc formularza

            $hwater = $post['hwaterUpdate'];
            settype($hwater, "integer");
            $cwater = $post['cwaterUpdate'];
            settype($cwater, "integer");
            $electricity = $post['electricityUpdate'];
            settype($electricity, "integer");

            if (($hwater === 0) && ($cwater === 0) && ($electricity === 0)) {

                $this->query('DELETE FROM `usage` WHERE `year` = :year AND `month`=:month AND `user` = :user ');

                $this->bind(':year', $year, PDO::PARAM_INT);
                $this->bind(':month', $month, PDO::PARAM_INT);
                $this->bind(':user', $user, PDO::PARAM_INT);

                $this->execute();

            } else {

                $this->query('UPDATE `usage` SET `hwater`=:hwater,`cwater`=:cwater,`electricity`=:electricity WHERE `year` = :year AND `month`=:month AND `user` = :user ');

                $this->bind(':hwater', $hwater, PDO::PARAM_INT);
                $this->bind(':cwater', $cwater, PDO::PARAM_INT);
                $this->bind(':electricity', $electricity, PDO::PARAM_INT);
                $this->bind(':year', $year, PDO::PARAM_INT);
                $this->bind(':month', $month, PDO::PARAM_INT);
                $this->bind(':user', $user, PDO::PARAM_INT);

                $this->execute();
            }

        }

        return;
    }
}