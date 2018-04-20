<?php

try {
    require "../install.php";
    require "../config.php";
    $connection = new PDO($dsn, $username, $password, $options);
    $sql = "SELECT * FROM plan";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();

    session_start();
    $_SESSION["plan_id"] = $plan_id;


} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>
<?php include 'templates/header.php'; ?>
<section id="plans">
    <div class="container">
        <h5 class="section-title h1">PLAN OVERVIEW</h5>
        <div class="row">
            <?php foreach ($result as $row) { ?>
                <div class="col-xs-12 col-sm-6 col-md-4 card-padding">
                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                        <div class="mainflip">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h4 class="card-title"><?php echo $row["plan_name"]; ?></h4>
                                        <p><?php echo $row["plan_description"]; ?></p>
                                        <p><b><i>Plan difficulty:</i></b> <?php echo $row["plan_difficulty"]; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <ul class="list-group">
                                            <li class="list-group-item">Leg Day</li>
                                            <li class="list-group-item">Upper Arm Day</li>
                                        </ul>
                                        <a href="plan_detail.php?plan=<?php echo $row["id"];?>" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-edit"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php include 'templates/footer.php'; ?>
