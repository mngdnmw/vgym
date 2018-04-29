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
                foreach ($day_result
                         as $day_row) { ?>
                    <article class="card">
                        <div class="card-content">
                            <h2><?php echo $day_row['day_name'] ?></h2>
                            <ul class="list-group day-group">
                                <li class="list-group-item">
                                    <div class="row ex-heading">
                                        <div class="col"><h5>Order</h5></div>
                                        <div class="col"><h5>Description</h5></div>
                                        <div class="col"><h5>Duration</h5></div>
                                        <div class="col"><h5></h5></div>

                                    </div>
                                </li>
                                <?php
                                $exercise_instances_result = get_exercise_instances($connection, $day_row['id']);
                                foreach ($exercise_instances_result
                                         as $exercise_instances_row) { ?>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col"> <?php echo $exercise_instances_row['order'] ?></div>
                                            <div class="col"> <?php echo $exercise_instances_row['exercise_name'] ?></div>
                                            <div class="col"><?php echo $exercise_instances_row['exercise_duration'] ?></div>
                                            <div class="col">
                                                <div class="row button-row">
                                                    <button class="btn btn-danger" type="button"
                                                            id="btn-delete-exercise">
                                                        <i class="fas fa-trash"></i></button>
                                                    <button class="btn btn-warning" type="button"
                                                            id="btn-edit-exercise">
                                                        <i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-success" type="button"
                                                            id="btn-create-exercise">
                                                        <i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <div id="form-excerise">
                                    <li class="list-group-item" id="new-exercise-li-item">
                                        <form role="form" id="new-exercise-form">
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <select class="custom-select" id="eorder">
                                                            <option value="">Please select</option>
                                                            <!--                                                        --><?php
                                                            //                                                        let size = 0;
                                                            //                                                        foreach (get_all_exercises($connection) as $exercise) {
                                                            //                                                            size++; ?>
                                                            <!--                                                            <option value="-->
                                                            <?php //echo size ?><!--">--><?php //?><!--</option>-->
                                                            <!--                                                        --><?php //} ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <select class="custom-select" id="ename">
                                                            <option value="">Please select</option>
                                                            <?php
                                                            foreach (get_all_exercises($connection) as $exercise) { ?>
                                                                <option value="<?php echo $exercise['id'] ?>"><?php echo $exercise['exercise_name']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" id="edur">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="float-right">
                                                        <button type="submit"
                                                                id="create-day-submit"
                                                                class="btn btn-success">
                                                            <i class="fas fa-check"></i> Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </li>
                                    </div>
                                <?php } ?>
                            </ul>
                        </div>
                    </article>
                    <form role="form" id="new-day-form" class="card">
                        <div class="card-content">
                            <div class="form-group">
                                <input hidden class="form-control" id="wid" value="<?php echo $_GET['plan'] ?>">
                            </div>
                            <div class="form-group">
                                <h3>Day</h3>
                                <label for="dname">Day name</label>
                                <input class="form-control" id="dname">
                            </div>
                            <div class="form-group">
                                <h3>Exercise</h3>
                                <label for="ename">Exercise name</label>
                                <select class="custom-select" id="ename">
                                    <option value="">Please select</option>
                                    <?php
                                    foreach (get_all_exercises($connection) as $exercise) { ?>
                                        <option value="<?php echo $exercise['id'] ?>"><?php echo $exercise['exercise_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edur">Exercise duration (number of seconds)</label>
                                <input type="number" class="form-control" id="edur">
                            </div>
                            <div class="float-right">
                                <button type="submit"
                                        id="create-day-submit"
                                        class="btn btn-success">
                                    <i class="fas fa-check"></i> Submit
                                </button>
                            </div>
                        </div>
                    </form>

                <?php }
            } else { ?>
                <p>No exercises found</p>
            <?php } ?>

        </section>
    </div>
</main>
<?php include TEMPLATE_PATH . '/footer.php'; ?>
