<?php require_once "app.php"; ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <title>Medical Services</title>
</head>
<body>
    <?php
    if (isset($_POST['submit'])) {
        //decomposing and preparation
        foreach ($_POST as $key => $value) {
            $$key = prepareInput($value);
        }
        print_r($_POST);

        if (!isRequired($name)) {
            $errors['name'] = "required";
        } elseif (!isString($name)) {
            $errors['name'] = "name should be a String";
        } elseif (!isLessThan($name, 100)) {
            $errors['name'] = "name should not be more then 100";
        }

        // email validation 
        if (!isRequired($email)) {
            $errors['email'] = "required";
        } elseif (!isEmail($email)) {
            $errors['email'] = "email should be a valid email";
        } elseif (!isLessThan($email, 100)) {
            $errors['email'] = "email should not be more then 100";
        }

        if (!isRequired($phone)) {
            $errors['phone'] = "required";
        } elseif (!isString($phone)) {
            $errors['phone'] = "phone should be a String";
        } elseif (!isLessThan($phone, 15)) {
            $errors['phone'] = "phone should not be more then 100";
        }

        #if validation passes
        if (empty($errors)) {
            setSession('user_name', "$name");
            setSession('user_email', "$email");
            setSession('user_Phone', "$phone");
            setSession('user_city', "$city_name");
            setSession('user_service', "$service_name");
        }
    }
    ?>


    <h1 class="text-center py-3 my-3 ">Reservation Form</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <img src="assets/images/5.png" alt="" style="max-width:100%">
                </div>
            </div>
            <div class="col-md-6">
                <div>
                </div>
                <form class="border p-5 my-3 " style="background-color:#4A5055;" method="POST" action="">
                    <div class="form-group">
                        <label for="name" class="text-white">Your Name<?php getErrors('name') ?></label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="name" class="text-white">Your Email<?php getErrors('email') ?></label>
                        <input type="text" name="email" class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label for="name" class="text-white">Your Phone<?php getErrors('phone') ?></label>
                        <input type="text" name="phone" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="city" class="text-white">Your City</label>

                        <?php $rows = getAll('cities'); ?>
                        <select name="city_name" class="form-control" id="city">
                            <?php foreach ($rows as $row) : ?>
                                <option> <?= $row['city_name']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ser" class="text-white">Choose Service</label>
                        <?php $rows = getAll('services'); ?>
                        <select name="service_name" class="form-control" id="ser">
                            <?php foreach ($rows as $row) : ?>
                                <option> <?= $row['service_name']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                </form>

            </div>

        </div>
    </div>



</body>

</html>