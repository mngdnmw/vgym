<?php

function get_all_workouts($connection)
{
    try {
        $sql = "SELECT * ";
        $sql .= "FROM `plan`;";
        $plan_statement = $connection->prepare($sql);
        $plan_statement->execute();
        $plan_result = $plan_statement->fetchAll();
        return $plan_result;
    } catch (PDOException $error) {
        echo '<script>console.log("' . $error->getMessage() . '")</script>';
    }

}

function get_workout_days($connection, $plan_id)
{
    try {
        $sql = "SELECT * ";
        $sql .= "FROM `plan_days` ";
        $sql .="WHERE plan_id =:plan_id ";
        $sql .="ORDER BY `order`;";
        $day_statement = $connection->prepare($sql);
        $day_statement->bindParam(':plan_id', $plan_id, PDO::PARAM_STR);
        $day_statement->execute();
        $GLOBALS['day_row_count'] = $day_statement->rowCount();
        $day_result = $day_statement->fetchAll();
        return $day_result;
    } catch (PDOException $error) {
        echo '<script>console.log("' . $error->getMessage() . '")</script>';
    }
}


function delete_workout($connection, $plan_id)
{
    try {

        $sql = "DELETE p, pd ";
        $sql .= "FROM `plan` p ";
        $sql .= "JOIN `plan_days` pd ON pd.plan_id = p.id ";
        $sql .= "WHERE p.id =:plan_id;";
        $delete_statement = $connection->prepare($sql);
        $delete_statement->bindParam(':plan_id', $plan_id, PDO::PARAM_INT);
        $delete_statement->execute();
        $count = $delete_statement->rowCount();
        if ($count > 0) {
            echo '<script>console.log("deleted plan!")</script>';
            return true;
        } else {
            echo '<script>console.log("Could not delete plan!")</script>';
            return false;
        }


    } catch (PDOException $error) {
        echo '<script>console.log("' . $error->getMessage() . '")</script>';
    }


}

?>