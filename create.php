<?php
include 'inc/header.php';
include 'Database.php';
?>

<?php
$db = new Database();

if (isset($_POST['submit'])) {
  $name  = mysqli_real_escape_string($db->link, $_POST['name']);
  $email = mysqli_real_escape_string($db->link, $_POST['email']);
  $skill = mysqli_real_escape_string($db->link, $_POST['skill']);
  if ($name == '' || $email == '' || $skill == '') {
    $error = "Field must not empty!";
  }
  else {
    $query  = "INSERT INTO person(name, email, skill) VALUES('$name','$email','$skill')";
    $create = $db->insert($query);
  }
}

?>

<form action="create.php" method="post">
  <?php if (isset($error)): { ?>
    <span style='color:red'>Field should not be empty!</span>
  <?php } endif; ?>

  <table>
    <tr>
      <td>Name</td>
      <td> <input type="text" name="name" value="" placeholder="Enter name"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td> <input type="text" name="email" value="" placeholder="Enter email"></td>
    </tr>
    <tr>
      <td>Skill</td>
      <td> <input type="text" name="skill" value="" placeholder="Enter skill"></td>
    </tr>
    <tr>
      <td></td>
      <td> <input type="submit" name="submit" value="Submit"></td>
    </tr>
  </table>
</form>
<a href="index.php">Home</a>

<?php include 'inc/footer.php'; ?>
