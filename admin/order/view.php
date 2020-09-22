<!-- call app.php -->
<?php require_once "../../app.php"; ?>
<!-- call the header file -->
<?php include ADMIN . 'inc/header.php'; ?>


<div class="container">
    <div class="row">

        <div class="col-12">
            <h1 class="text-center my-3">View All Services</h1>
        </div>
        <div class="col-12 mx-auto my-5 border p-3">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">City</th>
                        <th scope="col">Service</th>
                        <th scope="col">Requested At</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $rows = getAll('orders'); ?>
                    <?php foreach ($rows as $row) : ?>
                        <tr>
                            <td> <?= typeCount(); ?> </td>
                            <td><?php echo ucfirst($row['order_name']); ?></td>
                            <td scope="col"><?php echo $row['order_email']; ?></td>
                            <td scope="col"><?php echo $row['order_phone']; ?></td>
                            <td scope="col">
                                <?php
                                    //STUPID CODE TO HANDE FOREIGN KEY 
                                    $order_city_id = $row['order_city_id'];
                                    $rowCity = getOne('cities', "city_id = $order_city_id ");
                                    echo $rowCity['city_name'];
                                ?>
                            </td>
                            <td scope="col">
                                <?php
                                 //STUPID CODE TO HANDE FOREIGN KEY 
                                $order_service_id = $row['order_service_id'];
                                $rowService = getOne('services', "service_id = $order_service_id ");
                                echo $rowService['service_name'];
                                ?>
                            </td>
                            <td scope="col"><?php echo $row['order_created_at']; ;?></b></td>

                            <td>
                                <a href="<?php echo AURL ."" ;?>" class="btn btn-danger delete-record">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>


                </tbody>
            </table>
        </div>



    </div>
</div>

<!-- call footer.php -->
<?php include ADMIN . "inc/footer.php"; ?>