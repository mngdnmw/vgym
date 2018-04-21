<?php
require_once "../private/install.php";
include TEMPLATE_PATH.'/header.php';
?>
<section id="plans">
    <div class="container">
        <h5 class="section-title h1">PLAN OVERVIEW</h5>
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
                                        <p><b><i>Plan difficulty:</i></b> <?php echo $plan_row["plan_difficulty"]; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <?php
                                        $sql = "SELECT * FROM plan_days WHERE plan_id = :plan_id ORDER BY `order`";
                                        $plan_id = $plan_row['id'];
                                        $statement = $connection->prepare($sql);
                                        $statement->bindParam(':plan_id', $plan_id, PDO::PARAM_STR);
                                        $statement->execute();
                                        $result = $statement->fetchAll();

                                        foreach ($result as $row)

                                        ?>
                                        <ul class="list-group">
                                            <li class="list-group-item"><?php echo $row["day_name"]?></li>
                                        </ul>
                                        <a href="plan_detail.php?plan=<?php echo $plan_row["id"];?>" class="btn btn-primary btn-sm"><i
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
<?php include TEMPLATE_PATH.'/footer.php'; ?>
