<!-- call app.php -->
<?php require_once "../../app.php"; ?>
<!-- call the header file -->
<?php include ADMIN . 'inc/header.php'; ?>


<?php
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
    //    $isInserted =  insert('cities', " (city_name) VALUE ('$name')");
       $isInserted =  insert('cities', $data );
       if ($isInserted) {
           $success = 'new city is add successfully';
       }
    }
}
?>

<div class="container">
    <div class="row">

        <div class="col-8 mx-auto my-5">
            <div class="card-header">
                <h3 class="text-center">Add New City</h3>
                <div>
            <?php 
                if (!empty($success)) {
                     echo "<div class='alert alert-success'>$success</div>";
                }; 
            ?>
                    <form class="border p-5 my-3 " method="POST" action="">
                        <div class="form-group">
                            <label for="name" class="text-dark">City Name <?php  getErrors('name');?>
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



<?php require_once ADMIN . "inc/footer.php"; ?>