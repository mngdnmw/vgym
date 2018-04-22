<?php

require_once "../private/install.php";

$page_title = "Plan Overview";
include TEMPLATE_PATH . '/header.php';
include PRIVATE_PATH . '/query_functions.php';

$connection = new PDO($dsn, $username, $password, $options);

if (isset($_POST['delete'])) {

    $plan_id = $_POST['id'];
    if(delete_workout($connection, $plan_id)){
        echo "<script type='text/javascript'>alert('Plan successfully deleted');</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('PPlan could not be deleted');</script>";
    }

}
?>

<header>
    <div class="jumbotron">
        <h1 class="site-title"><?php echo $page_title ?></h1>
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
                                    <a href="plan_detail.php?plan=<?php echo $plan_row["id"]; ?>"
                                       class="btn btn-primary btn-sm"><i
                                                class="fas fa-edit"></i></a>
                                </form>
                                <form method="post">
                                    <input type="hidden" value="<?php echo $plan_row["id"]; ?>"
                                           name="id">
                                    <button type="submit"
                                            name="delete"
                                            class="btn btn-primary btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this plan?')">
                                        <i class="fas fa-trash"></i></button>
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

