<?php
require_once "../private/install.php";
$connection = new PDO($dsn, $username, $password, $options);
if (!$connection) {
    die('Connection failed');
}

if (isset($_POST['create'])) {
    try {
        $wname = $_POST['wname'];
        $wdesc = $_POST['wdesc'];
        $wdiff = $_POST['wdiff'];
        $dname = $_POST['dname'];
        $ename = $_POST['ename'];
        $edur = $_POST['edur'];

        $sql = "INSERT INTO `plan` (`plan_name`, `plan_description`, `plan_difficulty`) VALUES (:wname, :wdesc, :wdiff); ";
        $sql .= "SET @last_plan_id = LAST_INSERT_ID(); ";
        $sql .= "INSERT INTO `plan_days` ( `plan_id`, `day_name`, `order`) VALUES (@last_plan_id, :dname, 1); ";
        $sql .= "SET @last_day_id = LAST_INSERT_ID(); ";
        $sql .= "INSERT INTO `exercise_instances` ( `exercise_id`, `day_id`, `exercise_duration`, `order`) VALUES (:ename, @last_day_id, :edur, 1);";


        $statement = $connection->prepare($sql);
        $statement->bindParam(':wname', $wname, PDO::PARAM_STR);
        $statement->bindParam(':wdesc', $wdesc, PDO::PARAM_STR);
        $statement->bindParam(':wdiff', $wdiff, PDO::PARAM_INT);
        $statement->bindParam(':dname', $dname, PDO::PARAM_INT);
        $statement->bindParam(':ename', $ename, PDO::PARAM_STR);
        $statement->bindParam(':edur', $edur, PDO::PARAM_INT);


        $statement->execute();
        $result = $statement->fetchAll();

    } catch (PDOException $error) {
        echo '<script>console.log("' . $error->getMessage() . '")</script>';
    }
}
?>