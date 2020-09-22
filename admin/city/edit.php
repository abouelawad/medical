<!-- call app.php -->
<?php require_once "../../app.php"; ?>
<!-- call the header file -->
<?php include ADMIN . 'inc/header.php'; ?>

<div class="container">
    <div class="row">
       <?php
            if (isset($_GET['city_id']) && is_numeric($_GET['city_id'])) {
                $city_id = $_GET['city_id'];
                $row = getOne('cities', "city_id = $city_id" );

                if(empty($row))
                abort();
            }else {
                aredirect('city/view.php');
            }
        //==========UPDATE============//

            if (isset($_POST['submit'])) {
                foreach ($_POST as $key => $value) {
                    $$key = prepareInput($value);  
                }

                // name validation 
                if (!isRequired($name)) {
                    $errors['name'] = "required";
                } elseif (!isString($name)) {
                    $errors['name'] = "name should be a valid name";
                } elseif (!isLessThan($name, 100)) {
                    $errors['name'] = "name should not be more then 100";
                }

                // if validation passes 
                if (empty($errors)) {
                    #Requested Task
                    $data = ['city_name' => $name]; 
                    $isUpdated =  update('cities', $data , "city_id = '$city_id'" );
                    if ($isUpdated) {
                        $sucsess = $row['city_name'] . ' updated successfully';
                        $row = getOne('cities', "city_id = $city_id");
                    }
                }
            }
        ?>

       

        <div class="col-8 mx-auto my-5">
            <div class="card-header">
                <h3 class="text-center">Edit Info About City</h3>

                <div>
                    <form class="border p-5 my-3 " method="POST" action="">
                        <div class="form-group">
                            <label for="name" class="text-dark "> Name
                                 <?php getErrors('name');
                                        if (!empty($sucsess)) {
                                            echo "<span class='text-success'>$sucsess</span>";
                                        }; ?>
                            </label>
                            <input type="hidden" name="id">
                            <input type="text" name="name" class="form-control" id="name" value="<?php 
                              echo $row['city_name'];
                            ?>">
                           
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary btn-block">Save</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

<?php require_once ADMIN . "inc/footer.php"; ?>