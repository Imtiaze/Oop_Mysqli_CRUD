<?php
include 'inc/header.php';
include 'Database.php';
?>

<?php
$db = new Database();
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM person WHERE id='$id'";
  $editData = $db->edit($query);
}
?>
<?php
if (isset($_POST['update'])) {

  $name = mysqli_real_escape_string($db->link, $_POST['name']);
  $email = mysqli_real_escape_string($db->link, $_POST['email']);
  $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
  if ($name == '' || $email == '' || $skill == '') {
    $error = "Field must not empty!";
  }
  else {
    $query = "UPDATE person SET name='$name', email='$email', skill='$skill' WHERE id='$id' ";
    $update = $db->update($query);
  }
}
?>

<?php
if (isset($_POST['delete'])) {
  $query = "DELETE FROM person WHERE id='$id'";
  $delete = $db->delete($query);
}
?>

<?php
if($editData){
  while($row = $editData->fetch_object()){
    ?>
    <form action="" method="post">
      <?php if (isset($error)): { ?>
        <span style='color:red'>Field should not be empty!</span>
      <?php } endif; ?>
      <table>
        <tr>
          <td>Name</td>
          <td> <input type="text" name="name" value="<?php echo $row->name; ?>" placeholder="Enter name"></td>
        </tr>
        <tr>
          <td>Email</td>
          <td> <input type="text" name="email" value="<?php echo $row->email; ?>" placeholder="Enter email"></td>
        </tr>
        <tr>
          <td>Skill</td>
          <td> <input type="text" name="skill" value="<?php echo $row->skill; ?>" placeholder="Enter skill"></td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" name="update" value="Update">
            <input type="submit" name="delete" value="Delete">
          </td>
        </tr>
      </table>
    </form>
    <?php
  }
}
?>
<a href="index.php">Home</a>

<?php include 'inc/footer.php'; ?>
