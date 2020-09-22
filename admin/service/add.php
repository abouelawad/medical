<!-- call app.php -->
<?php require_once "../../app.php"; ?>
<!-- call the header file -->
<?php include ADMIN . 'inc/header.php'; ?>


<?php
if (isset($_POST['submit'])) {
    foreach ($_POST as $key => $value) {
        $$key = prepareInput($value);
    }

    if (!isrequired($name)) {
        $errors['name'] = "required";
    } elseif (!isString($name)) {
        $errors['name']  = "name should be a valid name";
    } elseif (!isLessThan($name, 100)) {
        $errors['name']  = "name should not be more then 100";
    }

    if (empty($errors)) {
        $data = ['service_name' => $name];
        $isInserted = insert('services', $data);
        if ($isInserted) {
            $sucsess = 'new service is add successfully';
        }
    }
}; ?>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <div class="card-header">
                <h3 class="text-center">Add New Service</h3>
                <?php
                if (!empty($sucsess)) {
                    echo "<div class='alert alert-success'>$sucsess</div>";
                };
                ?>

                <div>
                    <form class="border p-5 my-3 " method="POST" action="">
                        <div class="form-group">
                            <label for="name" class="text-dark ">Service Name
                                <?php getErrors('name'); ?>
                            </label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

<!-- call footer.php -->
<?php include ADMIN . "inc/footer.php"; ?>