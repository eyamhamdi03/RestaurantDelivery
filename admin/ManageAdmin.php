<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admins</title>
</head>
<body style="background-color:white">
<?php include ('nav.php');?>
<section style="margin-top:100px;">
<a href="add-admin.php" class="btn-success btn">Add Admin</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">fullname</th>
      <th scope="col">username</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $db = new PDO('mysql:host=localhost;dbname=RestaurantDelivery', 'root', '');
    $sql = "SELECT * FROM Admins";
    $res = $db->query($sql);
    $count = $res->rowCount();
    if ($count > 0) {
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['AdminId'];
            $full_name = $row['full_name'];
            $username = $row['username'];
  ?>
    <tr>
        <th><?php echo $id;?></th>
        <td><?php echo $full_name;?></td>
        <td><?php echo $username; ?></td>
        <td style="width: 200px;">
            <a href="#" onclick="confirmDelete(<?php echo $id; ?>);" class="btn-danger btn">Delete</a>
        </td>
    </tr>
  <?php
        }
    } else {
        echo "<div class='alert alert-danger'>No admins available</div>";
    }
  ?>
  </tbody>
  <script>
function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this admin?")) {
        window.location.href = "<?php echo SITEURL; ?>DeleteAdmin.php?id=" + id;
    }
}
</script>
</table>
</section>
</body>
</html>
