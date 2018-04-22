<?php
$page_title = "Plan Details";
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
                    <button type="submit"
                            name="delete"
                            class="btn btn-success"
                            onclick="return confirm('Are you sure you want to delete this plan?')">
                        <i class="fas fa-check"></i></button>
                </div>
            </div>
        </div>
    </header>
<?php include TEMPLATE_PATH . '/footer.php'; ?>