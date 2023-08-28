<?php
	include("json.class.php");
	$json=new json();
	$data=$json->getRows();
	if(!empty($_POST['save']))
	{
		$newData=[
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],
			'country' => $_POST['country']
		];
		$json->insert($newData);
		header('location:index.php');
	}
	if(!empty($_GET['did']))
	{
		$delete=$_GET['did'];
		$Delete=$json->deleteData($delete);
		header('location:index.php');
	}
	
		?>
			<table border="1" width="50%">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Country</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
		<?php
	if($data)
	{
		$n=0;
		foreach($data as $row)
		{	$n++;
			?>
				<tr>
					<td><?php echo $n;?></td>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['email'];?></td>
					<td><?php echo $row['phone'];?></td>
					<td><?php echo $row['country'];?></td>
					<td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
					<td><a href="index.php?did=<?php echo $row['id']; ?>">Delete</a></td>
				</tr>
			<?php
		}
		?>
			</table>
		<?php
	}
	else
	{
		echo "data not found";
	}
	
	if (!empty($_POST['edit'])) 
	{
		$id = $_POST['id'];
		$upData = [
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'phone' => $_POST['phone'],
			'country' => $_POST['country']
		];

		$updateResult = $json->update($upData, $id);
		if ($updateResult) 
		{
			header('location:index.php');
		}
		else 
		{
			echo "Failed to update data.";
		}
	}
?>
<br><br>
<a href="add.php">New Member</a>