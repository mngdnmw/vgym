<?php



function get_workout_days($connection, $plan_id){
    $sql = "SELECT * FROM plan_days WHERE plan_id = :plan_id ORDER BY `order`";
    $day_statement = $connection->prepare($sql);
    $day_statement->bindParam(':plan_id', $plan_id, PDO::PARAM_STR);
    $day_statement->execute();
    $GLOBALS['day_row_count'] = $day_statement->rowCount();
    $day_result = $day_statement->fetchAll();
    return $day_result;
}


?>