<?php
$page_title = "Create Plan";
require_once "../private/install.php";
include PRIVATE_PATH . '/query_functions.php';
include TEMPLATE_PATH . '/header.php';
$connection = new PDO($dsn, $username, $password, $options);
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

                </div>
            </div>
        </div>
    </header>
    <main class="main-area">
        <div class="container">
            <form role="form" id="new-workout">
                <div class="form-group">
                    <h3>Workout</h3>
                    <label for="wname">Workout name</label>
                    <input class="form-control" id="wname">
                </div>
                <div class="form-group">
                    <label for="wdesc">Workout description</label>
                    <input class="form-control" id="wdesc">
                </div>
                <div class="form-group">
                    <label for="wdiff">Workout difficulty</label>
                    <select class="custom-select" id="wdiff">
                        <option value="">Please select</option>
                        <?php for ($x = 1; $x < 4; $x++) { ?>
                            <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <h3>Day</h3>
                    <label for="wname">Workout day name</label>
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
                            id="create-submit"
                            class="btn btn-success">
                        <i class="fas fa-check"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </main>

<?php include TEMPLATE_PATH . '/footer.php'; ?>