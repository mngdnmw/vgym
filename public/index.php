<?php
$page_title = "Plan Overview";
require_once "../private/install.php";
include TEMPLATE_PATH . '/header.php';
?>
<section id="plans">
    <div class="container">
        <div class="section-title h1"><?php echo $page_title ?>
            <a href="" class="btn btn-primary btn-sm" style="float: right;"><i class="fas fa-plus"></i></a>
        </div>
        <div class="row">
            <?php
            try {
                $connection = new PDO($dsn, $username, $password, $options);
                $sql = "SELECT * FROM plan";
                $plan_statement = $connection->prepare($sql);
                $plan_statement->execute();
                $plan_result = $plan_statement->fetchAll();

            } catch (PDOException $error) {
                echo $sql . "<br>" . $error->getMessage();
            }
            foreach ($plan_result as $plan_row) { ?>

                <div class="col-xs-12 col-sm-6 col-md-4 card-padding">
                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                        <div class="mainflip">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h4 class="card-title"><?php echo $plan_row["plan_name"]; ?></h4>
                                        <p><?php echo $plan_row["plan_description"]; ?></p>
                                        <p><b><i>Plan difficulty:</i></b> <?php echo $plan_row["plan_difficulty"]; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <?php
                                        $sql = "SELECT * FROM plan_days WHERE plan_id = :plan_id ORDER BY `order`";
                                        $plan_id = $plan_row['id'];
                                        $day_statement = $connection->prepare($sql);
                                        $day_statement->bindParam(':plan_id', $plan_id, PDO::PARAM_STR);
                                        $day_statement->execute();
                                        $day_result = $day_statement->fetchAll();
                                        ?>
                                        <ul class="list-group day-group">
                                            <?php
                                            foreach ($day_result as $row) { ?>
                                                <li class="list-group-item"><?php echo $row['day_name'] ?></li>
                                            <?php } ?>
                                        </ul>
                                        <?php
                                        if ($day_result && $day_statement->rowCount() > 0) { ?>
                                            <a href="plan_detail.php?plan=<?php echo $plan_row["id"]; ?>"
                                               class="btn btn-primary btn-sm"><i
                                                        class="fas fa-edit"></i></a>
                                            <a href="plan_detail.php?plan=<?php echo $plan_row["id"]; ?>"
                                               class="btn btn-primary btn-sm"><i
                                                        class="fas fa-trash"></i></a>
                                        <?php } else { ?>
                                            <p>No workout days added</p>
                                            <a href="plan_detail.php?plan=<?php echo $plan_row["id"]; ?>"
                                               class="btn btn-primary btn-sm"><i
                                                        class="fas fa-plus"></i></a>
                                        <?php } ?>
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
<?php include TEMPLATE_PATH . '/footer.php'; ?>
