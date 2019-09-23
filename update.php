<?php
include 'header.php';

ob_start();
session_start();

$update_msg = "";

$db = mysqli_connect("localhost", "root", "Davis1988", "todo");

$id = $_GET['id'];
$query = mysqli_query($db, "SELECT * FROM tasks WHERE id = $id");

if ($row = mysqli_fetch_array($query)) {
  $task = $row['task'];
  $priority  = $row['priority'];
  $location = $row['location'];
  $notes = $row['notes'];

}

if (isset($_POST['submit'])) {
  $update_msg = "Task updated. Click <a href='todo.php'>HERE</a> to return to task list.";
  $id = $_POST['id'];
  $task = $_POST['task'];
  $priority = $_POST['priority'];
  $location = $_POST['location'];
  $notes = $_POST['notes'];
  $sql = "UPDATE tasks SET task = '$task', priority = '$priority', location = '$location', notes = '$notes' WHERE id='$id' ";
  mysqli_query($db, $sql);


}

?>



<body>

<div class="heading">
  <h2 style="font-style: 'Helvetica';">ToDo List Application </h2>
</div>

<div class="input-form" style="text-align:center;">
<form method="post" action="update.php">
  <h3>Location:</h3>
  <input type="radio" name="location" value="1"
  <?php if ($location=="1") echo "checked";?>
  >School
  <input type="radio" name="location" value="2"
  <?php if ($location=="2") echo "checked";?>
  >Home




  <h3>Priority:</h3>
<input type="radio" name="priority" value="1"
<?php if ($priority=="1") echo "checked";?>
>Priority 1
<input type="radio" name="priority" value="2"
<?php if ($priority=="2") echo "checked";?>
>Priority 2
<input type="radio" name="priority" value="3"
<?php if ($priority=="3") echo "checked";?>
>Priority 3
<input type="radio" name="priority" value="4"
<?php if ($priority=="4") echo "checked";?>
>Priority 4

</div>
<div style="text-align:center;">

  <p>Task:</p>
  <input type="hidden" name="id" class="update_task" value="<?php echo $id;?>">
  <input type="text" name="task" class="update_task" value="<?php echo $task;?>">

  <p>Notes:</p>
  <textarea rows="10" name="notes" class="update_task textarea_task" value="<?php echo $notes;?>"><?php echo htmlspecialchars($notes);?></textarea><br>
  <button type="submit" name="submit" id="add_btn" class="add_btn">Update Task</button><br>
</div>


</form>

<div>
<?php if (isset($update_msg)) { ?>
<p><?php echo $update_msg; ?></p>
<?php } ?>
</div>

<?php
include 'footer.php';
 ?>
