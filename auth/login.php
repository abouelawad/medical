<?php require_once "../app.php"; ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= URL; ?>assets/css/bootstrap.css">

    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto my-5">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>

                        <?php
                        if (isset($_POST['submit'])) {
                            // print_r($_POST);
                            foreach ($_POST as $key => $value) {
                                $$key = prepareInput($value);
                            }

                        // email validation 
                        if (!isRequired($email)) {
                            $errors['email'] = "required";
                        } elseif (!isEmail($email)) {
                            $errors['email'] = "email should be a valid email";
                        } elseif (!isLessThan($email, 100)) {
                            $errors['email'] = "email should not be more then 100";
                        }

                        // password validation 
                        if (!isRequired($password)) {
                            $errors['password'] = "required";
                        } elseif (!isString($password)) {
                            $errors['password'] = "password should be a string";
                        } elseif (!isLessThan($password, 255)) {
                            $errors['password'] = "password should not be more then 100";
                        }
                    


                        // if validation passes 

                        if(empty($errors)){
                        $admin = getOne('admins', "admin_email = '$email' ");  

                            if(!empty($admin))
                            {
                                $passwordMatches = password_verify($password , $admin['admin_password']);

                                if($passwordMatches) {

                                    #regenerate session id 
                                    // session_regenerate_id(true);
                                    #store admin data in sessions
                                   
                                    setSession('admin_id'    ,$admin['admin_id']   );  
                                    setSession('admin_email' ,$admin['admin_email']);  
                                    setSession('admin_name'  ,$admin['admin_name'] );  
                                    setSession('admin_type'  ,$admin['admin_type'] );


                                    // redirect to admin
                                    

                                    aredirect('index.php');
                                }else{
                                    echo "password is not correct";
                                }
                            }else{ 
                                echo "email is not correct";
                            }
                         }
                        }
                        ?>

                        <div>
                            <form class="border p-5 my-3 " method="POST" action="">
                                <div class="form-group">
                                    <label for="email" class="text-dark ">Email <?php getErrors('email') ?></label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="password" class="text-dark ">Password <?php getErrors('password'); ?></label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo URL; ?>assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="<?php echo URL; ?>assets/js/bootstrap.js"></script>
</body>

</html>