<?php

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $pdo;
    private $stmt;
    private $error;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function create($table, $data)
    {
        try {
            $column = array_keys($data);
            $columnSql = implode(', ', $column);
            $bindingSql = ':' . implode(',:', $column);

            $sql = "INSERT INTO $table ($columnSql) VALUES ($bindingSql)";

            $stm = $this->pdo->prepare($sql);
            foreach ($data as $key => $value) {
                $stm->bindValue(':' . $key, $value);
            }
            $status = $stm->execute();

            return $status ? $this->pdo->lastInsertId() : false;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function columnFilter($table, $column, $value)
    {
        $sql =
            'SELECT * FROM ' .
            $table .
            ' WHERE `' .
            str_replace('`', '', $column) .
            '` = :value';
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':value', $value);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return $success ? $row : [];
    }

    public function loginCheck($email, $password)
    {
        $sql =
            'SELECT * FROM student WHERE `email` = :email AND `password` = :password';
        // echo $sql;
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':password', $password);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return $success ? $row : [];
    }

    public function setLogin($id)
    {
        $sql = 'UPDATE student SET `is_login` = :value WHERE `id` = :id';
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':value', 1);
        $stm->bindValue(':id', $id);
        $success = $stm->execute();
        $stm->closeCursor();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return $success ? $row : [];
    }

    public function unsetLogin($id)
    {
        try {
            $sql = 'UPDATE student SET is_login = :false WHERE id = :id';
            $stm = $this->pdo->prepare($sql);
            $stm->bindValue(':false', '0');
            $stm->bindValue(':id', $id);
            $success = $stm->execute();
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            return $success ? $row : [];
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function setConfirmAndActive($email)
    {
        $sql = 'UPDATE users SET `is_confirmed` = :value WHERE `email` = :email';
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':value', 1);
        $stm->bindValue(':email', $email);
        $success = $stm->execute();
        $stm->closeCursor();    // to solve PHP Unbuffered Queries
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return ($success) ? $row : [];
    }

    public function unsetConfirmAndActive($id)
    {
       try{ 
           $sql        = "UPDATE users SET is_confirmed = :false WHERE id = :id";
           $stm        = $this->pdo->prepare($sql);
           $stm->bindValue(':false','0');
           $stm->bindValue(':id',$id);
           $success = $stm->execute();
           $row     = $stm->fetch(PDO::FETCH_ASSOC);
           return ($success) ? $row : [];
        }
        catch( Exception $e)
        {
            echo($e);
        }
    }

    public function readAll($table)
    {
        $sql = 'SELECT * FROM ' . $table;
        // print_r($sql);
        $stm = $this->pdo->prepare($sql);
        $success = $stm->execute();
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $success ? $row : [];
    }

    public function readAllByLimit($table)
    {
        $sql = 'SELECT id FROM student ORDER BY id DESC LIMIT 1';
        // print_r($sql);
        $stm = $this->pdo->prepare($sql);
        $success = $stm->execute();
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $success ? $row : [];
    }

    public function getById($table, $key, $id)
    {
        $sql = 'SELECT * FROM ' . $table . ' WHERE ' . $key. ' =:'.$key;
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':'.$key, $id);
        $success = $stm->execute();
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $success ? $row : [];
    }

    public function getAddressId($table, $unit, $block, $street_id)
    {
        $sql = 'SELECT * FROM ' . $table . ' WHERE `unit` =:unit' . ' AND `block` =:block' . ' AND `street_id` =:street_id';
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':unit', $unit);
        $stm->bindValue(':block', $block);
        $stm->bindValue(':street_id', $street_id);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return $success ? $row : [];
    }

    public function getEducationId($table, $subjectId, $semesterId, $achedamicYearId, $startDate, $endDate)
    {
        $sql = 'SELECT * FROM ' . $table . ' WHERE `subject_id` =:subject_id' . ' AND `semester_id` =:semester_id' . ' AND `achedamic_year_id` =:achedamic_year_id' . ' AND `end_date` =:start_date' . ' AND `end_date` =:end_date';
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':subject_id', $subjectId);
        $stm->bindValue(':semester_id', $semesterId);
        $stm->bindValue(':achedamic_year_id', $achedamicYearId);
        $stm->bindValue(':start_date', $startDate);
        $stm->bindValue(':end_date', $endDate);
        $success = $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        return $success ? $row : [];
    }

    public function update($table, $id, $data)
    {
        if (isset($data['id'])) {
            unset($data['id']);
        }
        try {
            $columns = array_keys($data);
            function map($item)
            {
                return $item . '=:' . $item;
            }
            $columns = array_map('map', $columns);
            $bindingSql = implode(',', $columns);
            $sql =
                'UPDATE ' . $table . ' SET ' . $bindingSql . ' WHERE `id` =:id';
            $stm = $this->pdo->prepare($sql);

            // Now, we assign id to bind
            $data['id'] = $id;

            foreach ($data as $key => $value) {
                $stm->bindValue(':' . $key, $value);
            }
            $status = $stm->execute();
            // print_r($status);
            return $status;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function delete($table, $id)
    {
        $sql = 'DELETE FROM ' . $table . ' WHERE `id` = :id';
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':id', $id);
        $success = $stm->execute();
        return $success;
    }
}
