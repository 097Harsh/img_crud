<?php

include 'connect.php';

$result = $obj->query("select * from file_task");

?>

<table border="1" align="center" cellspacing="0" cellpadding="10">
	<?php
	while($row = $result->fetch_object())
	{
		?>

	<tr>
        <td>Product_id</td>
        <td><?php echo $row->id; ?></td>
        <td rowspan="8"><img src="upload/<?php echo $row->f_name; ?>" height="100" width="100"></td>
    </tr>
    <tr>
        <td>Product Name</td>
        <td><?php echo $row->name; ?></td>
    </tr>
	<tr>
		<td>Price</td>
        <td><?php echo $row->price; ?></td>
	</tr>
	<tr>
		<td>Stock</td>
        <td><?php echo $row->stock; ?></td>
	</tr>
	<tr>
		<td>Description</td>
        <td><?php echo $row->description; ?></td>
	</tr>
	<tr>
		<td>Company</td>
        <td><?php echo $row->company; ?></td>
	</tr>
	<tr>
		<td>Size</td>
        <td><?php echo $row->size; ?></td>
	</tr>
	<tr>
		<td><a href="delete.php?delid=<?php echo $row->id; ?>">delete</a></td>
		<td><a href="edit.php?editid=<?php echo $row->id; ?>">edit</a></td>
	</tr>
	<?php
		}
	?>
	<tr>
		<td colspan="3" align="center">
			<a href="read3.php">Go to read3</a>
		</td>
	</tr>
</table>