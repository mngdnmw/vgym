<?php
$page_title = "Plan Details";
require_once "../private/install.php";
include TEMPLATE_PATH . '/header.php'; ?>
<section id="plan_details">
    <div class="container">
        <div class="section-title h1"> <?php echo $page_title ?>
            <a href="index.php" class="btn btn-primary btn-sm" style="float: left;"><i class="fas fa-chevron-left"></i></a>
            <a href="" class="btn btn-primary btn-sm" style="float: right;"><i class="fas fa-plus"></i></a>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
                <div class="card">
                    <div class="card-body text-center mt-4">
                        <p>Leg Day</p>
                        <ul class="list-group">
                            <li class="list-group-item">Squat</li>
                            <li class="list-group-item">Running</li>
                        </ul>
                        <a href="plan_detail.php" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                <p>Stuff</p>
                <ul class="list-group">
                    <li class="list-group-item">Squat</li>
                    <li class="list-group-item">Running</li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</section>
<?php include TEMPLATE_PATH . '/footer.php'; ?>
