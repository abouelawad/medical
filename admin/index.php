<?php require_once "../app.php"; ?>
<?php include "inc/header.php"; ?>



<div class="container">
    <div class="row">

        <div class="col-md-6 my-5">
            <div class="card text-center">
                <div class="card-header">
                    All Orders
                </div>
                <div class="card-body">
                    <h5 class="card-title">Show All Orders </h5>
                    <p class="card-text display-3"><?= getCount('orders')['rowsCount']; ?> </p>
                    <a href="<?= AURL . "order/view.php"; ?>" class="btn btn-success">Go To Orders</a>
                </div>
                <div class="card-footer text-muted">

                </div>
            </div>
        </div>

        <div class="col-md-6 mx-auto my-5">
            <div class="card text-center">
                <div class="card-header">
                    All Services
                </div>
                <div class="card-body">
                    <h5 class="card-title">Show All Services</h5>
                    <p class="card-text display-3"> <?= getCount('services')['rowsCount']; ?> </p>
                    <a href="<?= AURL . "service/view.php"; ?>" class="btn btn-success">Go To Services</a>
                </div>
                <div class="card-footer text-muted">

                </div>
            </div>
        </div>

        <div class="col-8 mx-auto my-2">
            <div class="card text-center">
                <div class="card-header">
                    All Orders Today
                </div>
                <div class="card-body">
                    <h5 class="card-title">Show All Orders This Day</h5>
                    <p class="card-text display-3"> <?= getCountWhere('orders', "date(order_created_at) = CURDATE()"); ?> </p>
                    <a href=#" class="btn btn-info">Go To Orders</a>
                </div>
                <div class="card-footer text-muted">

                </div>
            </div>
        </div>


    </div>
</div>

<?php include "inc/footer.php"; ?>