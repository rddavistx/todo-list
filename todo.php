<?php

ob_start();
session_start();
    // initialize errors variable

		include 'header.php';

	$errors = "";

	// connect to database

require ('dbconnect.php');




	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
      $priority = $_POST['priority'];
			$location = $_POST['location'];
			$email = $_SESSION['email'];
			$sql = "INSERT INTO tasks (email,task, priority, location) VALUES ('$email', '$task', '$priority', '$location')";
			mysqli_query($db, $sql);
			header('location: todo.php');
		}
	}


  // delete task

  if (isset($_GET['del_task'])) {
  $id = $_GET['del_task'];

  mysqli_query($db, "DELETE FROM tasks WHERE id='$id' LIMIT 1" );
  header('location: todo.php');
  }

  // select all tasks if page is visited or refreshed
  $tasks = mysqli_query($db, "SELECT * FROM tasks WHERE email ='" . $_SESSION['email'] . "'");







?>


<body>
	<div class="container" style="text-align:center;">
	<div class="heading">
		<h2 style="font-style: 'Helvetica';"><?php echo $_SESSION['usr_name1']; ?>'s To Do List </h2>
	</div>
	<form method="post" action="todo.php" class="input_form">
		<h3>Location:</h3>
		<input type="radio" name="location"
		<?php if (isset($location) && $location=="1") echo "checked";?>
		value="1">School
		<input type="radio" name="location"
		<?php if (isset($location) && $location=="2") echo "checked";?>
		value="2">Home




		<h3>Priority:</h3>
<input type="radio" name="priority"
<?php if (isset($priority) && $priority=="1") echo "checked";?>
value="1">Priority 1
<input type="radio" name="priority"
<?php if (isset($priority) && $priority=="2") echo "checked";?>
value="2">Priority 2
<input type="radio" name="priority"
<?php if (isset($priority) && $priority=="3") echo "checked";?>
value="3">Priority 3
<input type="radio" name="priority"
<?php if (isset($priority) && $priority=="4") echo "checked";?>
value="4">Priority 4
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button><br>
	</form>
<div style="text-align:center">
	<a href="logout.php">Logout</a>
</div>


<?php if (isset($errors)) { ?>
<p><?php echo $errors; ?></p>
<?php } ?>





<div class="school">
	<h2 style="color:#bf5700">School</h2>
<div>
  <h2>Priority 1</h2>
  <table>
	<thead>
		<tr>
			<th class="number">Number</th>
			<th>Tasks</th>
      <!-- <th>Priority</th> -->
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM tasks WHERE priority = '1' AND location = '1' AND email ='" . $_SESSION['email'] . "'");



		$i = 1; while ($row = mysqli_fetch_array($tasks)) {
			$id = $row['id']?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <a href='update.php?id=<?php echo $id; ?>'><?php echo $row['task']; ?></a> </td>
        <!-- <td class="task"> <?php echo $row['priority']; ?> </td> -->
				<td class="delete">
					<a href="todo.php?del_task=<?php echo $id; ?>">x</a>
				</td>
			</tr>
		<?php $i++; } ?>
	</tbody>
</table>
</div>



<div>
  <h2>Priority 2</h2>
  <table>
	<thead>
		<tr>
			<th class="number">Number</th>
			<th>Tasks</th>
      <!-- <th>Priority</th> -->
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM tasks WHERE priority = '2' AND location = '1' AND email ='" . $_SESSION['email'] . "'");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) {
			$id = $row['id']?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"><a href='update.php?id=<?php echo $id; ?>'><?php echo $row['task']; ?></a> </td>
        <!-- <td class="task"> <?php echo $row['priority']; ?> </td> -->
				<td class="delete">
					<a href="todo.php?del_task=<?php echo $row['id'] ?>">x</a>
				</td>
			</tr>
		<?php $i++; } ?>
	</tbody>
</table>
</div>


<div>
  <h2>Priority 3</h2>
  <table>
	<thead>
		<tr>
			<th class="number">Number</th>
			<th>Tasks</th>
      <!-- <th>Priority</th> -->
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM tasks WHERE priority = '3' AND location = '1' AND email ='" . $_SESSION['email'] . "'");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) {
			$id = $row['id']?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <a href='update.php?id=<?php echo $id; ?>'><?php echo $row['task']; ?></a> </td>
        <!-- <td class="task"> <?php echo $row['priority']; ?> </td> -->
				<td class="delete">
					<a href="todo.php?del_task=<?php echo $row['id'] ?>">x</a>
				</td>
			</tr>
		<?php $i++; } ?>
	</tbody>
</table>
</div>



<div>
  <h2>Priority 4</h2>
  <table>
	<thead>
		<tr>
			<th class="number">Number</th>
			<th>Tasks</th>
      <!-- <th>Priority</th> -->
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM tasks WHERE priority = '4' AND location = '1' AND email ='" . $_SESSION['email'] . "'");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) {
			$id = $row['id']?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"><a href='update.php?id=<?php echo $id; ?>'><?php echo $row['task']; ?></a> </td>
        <!-- <td class="task"> <?php echo $row['priority']; ?> </td> -->
				<td class="delete">
					<a href="todo.php?del_task=<?php echo $row['id'] ?>">x</a>
				</td>
			</tr>
		<?php $i++; } ?>
	</tbody>
</table>
</div>
</div>



<div>
	<h2 style="border-top: 5px solid #bf5700; padding-top: 40px; color:#bf5700">Home</h2>
<div>
  <h2>Priority 1</h2>
  <table>
	<thead>
		<tr>
			<th class="number">Number</th>
			<th>Tasks</th>
      <!-- <th>Priority</th> -->
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM tasks WHERE priority = '1' AND location = '2' AND email ='" . $_SESSION['email'] . "'");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) {
			$id = $row['id']?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"><a href='update.php?id=<?php echo $id; ?>'><?php echo $row['task']; ?></a> </td>
        <!-- <td class="task"> <?php echo $row['priority']; ?> </td> -->
				<td class="delete">
					<a href="todo.php?del_task=<?php echo $row['id'] ?>">x</a>
				</td>
			</tr>
		<?php $i++; } ?>
	</tbody>
</table>
</div>



<div>
  <h2>Priority 2</h2>
  <table>
	<thead>
		<tr>
			<th class="number">Number</th>
			<th>Tasks</th>
      <!-- <th>Priority</th> -->
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM tasks WHERE priority = '2' AND location = '2' AND email ='" . $_SESSION['email'] . "'");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) {
			$id = $row['id']?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"><a href='update.php?id=<?php echo $id; ?>'><?php echo $row['task']; ?></a> </td>
        <!-- <td class="task"> <?php echo $row['priority']; ?> </td> -->
				<td class="delete">
					<a href="todo.php?del_task=<?php echo $row['id'] ?>">x</a>
				</td>
			</tr>
		<?php $i++; } ?>
	</tbody>
</table>
</div>


<div>
  <h2>Priority 3</h2>
  <table>
	<thead>
		<tr>
			<th class="number">Number</th>
			<th>Tasks</th>
      <!-- <th>Priority</th> -->
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM tasks WHERE priority = '3' AND location = '2' AND email ='" . $_SESSION['email'] . "'");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) {
			$id = $row['id']?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"><a href='update.php?id=<?php echo $id; ?>'><?php echo $row['task']; ?></a> </td>
        <!-- <td class="task"> <?php echo $row['priority']; ?> </td> -->
				<td class="delete">
					<a href="todo.php?del_task=<?php echo $row['id'] ?>">x</a>
				</td>
			</tr>
		<?php $i++; } ?>
	</tbody>
</table>
</div>



<div>
  <h2>Priority 4</h2>
  <table>
	<thead>
		<tr>
			<th class="number">Number</th>
			<th>Tasks</th>
      <!-- <th>Priority</th> -->
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM tasks WHERE priority = '4' AND location = '2' AND email ='" . $_SESSION['email'] . "'");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) {
			$id = $row['id']?>
			<tr>
				<td> <?php echo $id; ?> </td>
				<td class="task"><a href='update.php?id=<?php echo $id; ?>'><?php echo $row['task']; ?></a> </td>
        <!-- <td class="task"> <?php echo $row['priority']; ?> </td> -->
				<td class="delete">
					<a href="todo.php?del_task=<?php echo $row['id'] ?>">x</a>
				</td>
			</tr>
		<?php $i++; } ?>
	</tbody>
</table>
</div>
</div>








<?php include "footer.php"; ?>
