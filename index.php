<?php
include 'inc/header.php';
include 'Database.php';
?>


<?php
$db = new Database();
$query = "SELECT * FROM person";
$read = $db->select($query);
?>

<?php
if (isset($_GET['msg'])) {
  echo "<span style='color:green'>".$_GET['msg']."</span>";
}
?>

<table class="tblone">
  <tr>
    <th width="30%">Name</th>
    <th width="30%">Email</th>
    <th width="20%">Skill</th>
    <th width="20%">Action</th>
  </tr>
  <?php
  if ($read) {
    while($row = $read->fetch_object()){
      ?>
      <tr>
        <td><?php echo $row->name; ?></td>
        <td><?php echo $row->email; ?></td>
        <td><?php echo $row->skill; ?></td>
        <td> <a href="update.php?id=<?php echo urlencode($row->id); ?>">Edit</a></td>
      </tr>
      <?php
    }
  }
  else {
    ?>
    <p>Data is not available</p>
    <?php
  }
  ?>
</table>

<a href="create.php">Create</a>
<a href="index.php">Home</a>

<?php include 'inc/footer.php'; ?>
