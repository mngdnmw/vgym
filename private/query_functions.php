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

function get_plan($connection, $plan_id)
{
    try {
        $sql = "SELECT * ";
        $sql .= "FROM `plan` ";
        $sql .= "WHERE id =:plan_id ";
        $sql .= "LIMIT 1";
        $plan_statement = $connection->prepare($sql);
        $plan_statement->bindParam(':plan_id', $plan_id, PDO::PARAM_INT);
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
        $sql .= "WHERE plan_id =:plan_id ";
        $sql .= "ORDER BY `order`;";
        $day_statement = $connection->prepare($sql);
        $day_statement->bindParam(':plan_id', $plan_id, PDO::PARAM_INT);
        $day_statement->execute();
        $day_result = $day_statement->fetchAll();
        return $day_result;
    } catch (PDOException $error) {
        echo '<script>console.log("' . $error->getMessage() . '")</script>';
    }
}

function get_exercise_instances($connection, $day_id)
{
    try {
        $sql = "SELECT * ";
        $sql .= "FROM `exercise_instances` ei ";
        $sql .= "JOIN `exercise` e ON e.id = ei.exercise_id ";
        $sql .= "WHERE ei.day_id =:day_id ";
        $sql .= "ORDER BY `order`";
        $exercise_statement = $connection->prepare($sql);
        $exercise_statement->bindParam(':day_id', $day_id, PDO::PARAM_INT);
        $exercise_statement->execute();
        $exercise_result = $exercise_statement->fetchAll();
        return $exercise_result;
    } catch
    (PDOException $error) {
        echo '<script>console.log("' . $error->getMessage() . '")</script>';
    }

}


function get_all_exercises($connection){

    $sql = "SELECT * ";
    $sql .= "FROM `exercise` ";
    $sql .= "ORDER BY `id`;";
    $exercise_statement = $connection->prepare($sql);
    $exercise_statement->execute();
    $exercise_result = $exercise_statement->fetchAll();

    return $exercise_result;

}

?>