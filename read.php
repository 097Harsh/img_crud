<?php

include 'connect.php';

$result = $obj->query("select * from file_task");

?>

<table border="1" align="center" cellspacing="0" cellpadding="10">
	<tr bgcolor="silver">
		<td> Id</td>
		<td> Product Name</td>
        <td>Price</td>
        <td>Description</td>
        <td>Stock</td>
        <td>Company</td>
        <td>Size</td>
        <td>file name</td>
		<td>Image</td>
		<td>Delete</td>
		<td>Edit</td>
	</tr>
	<?php
	while($row = $result->fetch_object())
	{
		?>
		<tr>
			<td><?php echo $row->id; ?></td>
            <td> <?php echo $row->name; ?></td>
            <td><?php echo $row->price; ?></td>
            <td><?php echo $row->description; ?></td>
            <td><?php echo $row->stock; ?></td>
            <td><?php echo $row->company; ?></td>
            <td><?php echo $row->size; ?></td>
			<td><?php echo $row->f_name; ?></td>
			<td><img src="upload/<?php echo $row->f_name; ?>" height="100" width="100"></td>
			<td><a href="delete.php?delid=<?php echo $row->id; ?>">delete</a></td>
			<td><a href="edit.php?editid=<?php echo $row->id; ?>">edit</a></td>
		</tr>
		<?php
	}
	?>
</table>