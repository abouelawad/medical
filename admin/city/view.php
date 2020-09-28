<!-- call app.php -->
<?php require_once "../../app.php"; ?>
<!-- call the header file -->
<?php include ADMIN . 'inc/header.php'; ?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center my-3">View All Cities</h1>
        </div>
        <div class="col-8 mx-auto my-5 border p-3">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Active</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cities = getAll('cities'); ?>
                    <?php foreach ($cities as $city) : ?>
                        <tr>
                            <td> <?= typeCount(); ?> </td>
                            <td><?php echo ucfirst($city['city_name']); ?></td>
                            <td>
                                <input type="checkbox" class="is-active" <?php if ($city['city_is_active']) echo "checked"; ?> data-id="<?= $city['city_id'] ;?>"></td>
                            <td>
                                <a href="<?php echo AURL . "city/edit/" . $city['city_id']; ?>" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <a href="<?php echo AURL . "city/delete/" . $city['city_id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>


                </tbody>
            </table>
        </div>


    </div>
</div>
<!-- call footer.php -->

<?php require_once ADMIN . "inc/scripts.php"; ?>

<script>
    $('.is-active').change(function () {
        let state = $(this).prop("checked");
        let id  = $(this).attr("data-id");
        console.log(state,id);
    })
</script>



</body>

</html>