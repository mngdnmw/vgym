<?php

require_once "../private/install.php";

$page_title = "Plan Overview";
include TEMPLATE_PATH . '/header.php';
include PRIVATE_PATH . '/query_functions.php';

$connection = new PDO($dsn, $username, $password, $options);
//
//if (isset($_POST['delete'])) {
//
//    $plan_id = $_POST['id'];
//    if (delete_workout($connection, $plan_id)) {
//        echo "<script type='text/javascript'>alert('Plan successfully deleted');</script>";
//    } else {
//        echo "<script type='text/javascript'>alert('PPlan could not be deleted');</script>";
//    }
//
//}
?>

<header>
    <div class="jumbotron">
        <div class="row banner">
            <div class="col"></div>
            <div class="col">
                <h1 class="site-title"><?php echo $page_title ?></h1>
            </div>
            <div class="col">
                <a href="create_plan.php"
                   class="btn btn-success"><i
                            class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
</header>
<main class="main-area">
    <div class="centered">
        <section class="cards">
            <?php
            $plan_result = get_all_workouts($connection);
            if (!empty($plan_result)) {
                foreach ($plan_result as $plan_row) { ?>
                    <article class="card">
                        <div class="card-content">
                            <h2><?php echo $plan_row["plan_name"]; ?></h2>
                            <p><?php echo $plan_row["plan_description"]; ?></p>
                            <p><b><i>Plan difficulty:</i></b> <?php echo $plan_row["plan_difficulty"]; ?>
                            </p>
                            <div class="row button-row">
                                <form>
                                    <input type="hidden">
                                    <button type="button"
                                            name="delete"
                                            class="btn btn-warning btn-sm"
                                            data-toggle="modal"
                                            data-target="#pageModal"
                                            data-id="@<?php echo $plan_row["id"]; ?>">
                                        <i class="fas fa-trash"></i></button>
                                </form>
                                <form>
                                    <input type="hidden">
                                    <a href="plan_detail.php?plan=<?php echo $plan_row["id"]; ?>"
                                       class="btn btn-primary btn-sm"><i
                                                class="fas fa-edit"></i></a>
                                </form>
                            </div>
                        </div>
                    </article>
                <?php }
            } else { ?>
                <p>No plans found</p>
            <?php } ?>
        </section>
    </div>
</main>
<?php include TEMPLATE_PATH . '/footer.php'; ?>

