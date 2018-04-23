<?php

require_once "../private/install.php";
include PRIVATE_PATH . '/query_functions.php';

$connection = new PDO($dsn, $username, $password, $options);
$plan = get_plan($connection, $_GET['plan']);

foreach ($plan as $first_plan) {
    $page_title = $first_plan['plan_name'];
}
include TEMPLATE_PATH . '/header.php';
?>
<header>
    <div class="jumbotron">
        <div class="row banner">
            <div class="col">
                <a href="index.php"
                   class="btn btn-success btn-back"><i
                            class="fas fa-chevron-left"></i></a>
            </div>
            <div class="col">
                <h1 class="site-title"><?php echo $page_title ?></h1>
            </div>
            <div class="col">
                <button
                        class="btn btn-success" id="add-new-day"><i
                            class="fas fa-plus"></i></button>
            </div>
        </div>
    </div>
</header>
<main class="main-area">
    <div class="centered">
        <section>
            <?php
            $day_result = get_workout_days($connection, $_GET['plan']);
            if (!empty($day_result)) {
                foreach ($day_result as $day_row) { ?>
                    <article class="card">
                        <div class="card-content">
                            <h2><?php echo $day_row['day_name'] ?></h2>
                            <ul class="list-group day-group">
                                <li class="list-group-item">
                                    <div class="row ex-heading">
                                        <div class="col"> <h5>Order</h5></div>
                                        <div class="col"> <h5>Description</h5></div>
                                        <div class="col"><h5>Duration</h5></div>
                                    </div></li>
                                <?php
                                $exercise_instances_result = get_exercise_instances($connection, $day_row['id']);
                                foreach ($exercise_instances_result as $exercise_instances_row) { ?>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col"> <?php echo $exercise_instances_row['order'] ?></div>
                                            <div class="col"> <?php echo $exercise_instances_row['exercise_name'] ?></div>
                                            <div class="col"><?php echo $exercise_instances_row['exercise_duration'] ?></div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </article>

                <?php }
            } else { ?>
                <p>No exercises found</p>
            <?php } ?>

        </section>
    </div>
</main>
<?php include TEMPLATE_PATH . '/footer.php'; ?>
