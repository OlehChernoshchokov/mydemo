<?php
/**
 * Created by PhpStorm.
 * User: Andrii
 * Date: 15.07.2015
 * Time: 12:49
 */

class Blog
{
    /**
     * @return array
     */
    public function getList()
    {
        /** @var PDO $dbh */
        $dbh = Registry::get('db');
        $sql = "SELECT * FROM blog WHERE status = 1 ORDER BY date ASC";

        $sth = $dbh->query($sql);

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getById($id)
    {
        $id = (int)$id;
        /** @var PDO $dbh */
        $dbh = Registry::get('db');

        $sql = 'SELECT * FROM blog WHERE id = :id LIMIT 1';
        $sth = $dbh->prepare($sql);
        $sth->execute(
            array(
                'id' => $id
            )
        );

        $book = $sth->fetch(PDO::FETCH_ASSOC);
        return $book;
    }

    public function getListByIdArray(Array $arr)
    {
        $params_amount = count($arr);
        $sql_params = array();
        for ($i = 1; $i <= $params_amount; $i++) {
            array_push($sql_params, '?');
        }
        $sql_params = implode(',', $sql_params);


        /** @var PDO $dbh */
        $dbh = Registry::get('db');
        $sth = $dbh->prepare("SELECT * FROM blog WHERE id IN ({$sql_params})");

        //print_r($sth);
        $sth->execute($arr);
        //die;

        return $sth->fetchAll(PDO::FETCH_ASSOC);





    }


}