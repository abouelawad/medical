<script src="<?php echo URL; ?>assets/js/jquery-3.5.1.slim.min.js"></script>
<script src="<?php echo URL; ?>assets/js/popper.min.js"></script>
<script src="<?php echo URL; ?>assets/js/bootstrap.js"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  $(".delete-record").click(() => {
    let state = confirm("Are You Shure From Deleteing This Order ?");
    if (state) {
      return true;
    } else {
      return false;
    }
  })
</script>