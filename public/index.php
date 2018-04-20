
<?php

try {
    require "../install.php";
    require "../config.php";
    $connection = new PDO($dsn, $username, $password, $options);
    $sql = "SELECT * FROM plan";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();

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
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                        <div class="mainflip">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><?php echo $row["id"]; ?></p>
                                        <h4 class="card-title"><?php echo $row["plan_name"]; ?></h4>
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
                                        <a href="plan_detail.php" class="btn btn-primary btn-sm"><i
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
