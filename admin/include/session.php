<?php
if (!isset($_SESSION['admin_id'])) {
?>
  <script>
    window.location = 'login.php';
  </script>
<?php
}
