
<?php 
if (isset($_GET['suatc'])) {?>
   <script>
Swal.fire({
  icon: "success",
  title: "Sửa thành công",
  showConfirmButton: false,
  timer: 1500
});
      </script>
    <?php } ?>

<?php 
if (isset($_GET['deletetc'])) {?>
   <script>
Swal.fire({
  icon: "success",
  title: "Xóa sản phẩm thành công",
  showConfirmButton: false,
  timer: 1500
});
      </script>
    <?php } ?>
