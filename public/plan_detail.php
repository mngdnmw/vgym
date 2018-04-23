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
                <h1 class="site-title"><?php echo $page_title?></h1>
            </div>
            <div class="col">
                <button
                        class="btn btn-success"><i
                            class="fas fa-plus"></i></button>
            </div>
        </div>
    </div>
</header>
<main class="main-area">
    <div class="centered">
        <section class="cards">
            <?php
            $day_result = get_workout_days($connection, $_GET['plan']);
            if (!empty($day_result)) {
                foreach ($day_result as $row) { ?>
                    <article class="card">
                        <div class="card-content">
                            <h2><?php echo $row['day_name'] ?></h2>
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
