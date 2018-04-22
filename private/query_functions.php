<?php

function get_all_workouts($connection)
{
    $sql = "SELECT * FROM plan";
    $plan_statement = $connection->prepare($sql);
    $plan_statement->execute();
    $plan_result = $plan_statement->fetchAll();
    return $plan_result;

}

function get_workout_days($connection, $plan_id)
{
    $sql = "SELECT * FROM plan_days WHERE plan_id = :plan_id ORDER BY `order`";
    $day_statement = $connection->prepare($sql);
    $day_statement->bindParam(':plan_id', $plan_id, PDO::PARAM_STR);
    $day_statement->execute();
    $GLOBALS['day_row_count'] = $day_statement->rowCount();
    $day_result = $day_statement->fetchAll();
    return $day_result;
}


function delete_workout($connection, $plan_id)
{
    $sql = "DELETE FROM plan WHERE id =: plan_id ";
    $sql .= "LIMIT 1";
    $delete_statement = $connection->prepare($sql);
    $delete_statement->bindParam(':plan_id', $plan_id, PDO::PARAM_STR);
    $delete_statement->execute();
    $delete_result = $delete_statement->fetchAll();

    if ($delete_result) {
        echo '<script>console.log("deleted plan!")</script>';
        return true;
    } else {
        echo '<script>console.log("Could not delete plan!")</script>';
        return false;
    }

}

?>