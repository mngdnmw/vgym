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
            return true;
        } else {
            return false;
        }

    } catch (PDOException $error) {
        echo '<script>console.log("' . $error->getMessage() . '")</script>';
    }


}

?>