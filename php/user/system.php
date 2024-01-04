<?php
$conn = mysqli_connect("localhost", "root", "", "web_kb2");
$rows = mysqli_query($conn, "SELECT * FROM cart");
?>
<table border = 1 cellpadding = 10>
  <tr>
    <td>#</td>
    <td>Name</td>
    <td>Email</td>
    <td>Age</td>
    <td>Country</td>
    <td>Country</td>
  </tr>
  <?php $i = 1; ?>
  <?php foreach($rows as $row) : ?>
    <tr>
      <td><?php echo $i++; ?></td>
      <td><?php echo $row["cart_id"]; ?></td>
      <td><?php echo $row["created_at"]; ?></td>
      <td><?php echo $row["user_id"]; ?></td>
      <td><?php echo $row["quantity"]; ?></td>
      <td><?php echo $row["product_id"]; ?></td>
    </tr>
  <?php endforeach; ?>
</table>