<?php

include 'connect.php';

if(isset($_POST['submit']))
{
    $p_name = $_POST['p_name'];
	$price = $_POST['price'];
	$desc = $_POST['desc'];
	$stock = $_POST['stock'];
	$company = $_POST['company'];
	$size = $_POST['size'];

	$s1 = implode(",", $size);

    $filename = $_FILES['f']['name'];
	$filename_array = explode(".", $filename);
	$ext = strtolower(end($filename_array));

	$tmp      = $_FILES['f']['tmp_name'];
	$path     = "upload/$filename";
	
    if($ext=='jpg' ||$ext=='gif' ||$ext=='png' ||$ext=='jpeg')
	{
		move_uploaded_file($tmp, $path);

		$exe = $obj->query("insert into file_task(name,price,description,stock,company,size,f_name) values('$p_name','$price','$desc',
		'$stock','$company','$s1','$filename')");
		if($exe)
		{
			echo "<script>alert('File Uploaded Successfullly');</script>";
		}
		else
		{
			echo "<script>alert('Error');</script>";
		}
    }
	else
	{
		echo "<script>alert('Invalid File Upload Try Again..');</script>";
	}

}
?>
<html>
    <head>
        <title>Upload file</title>
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
            <table border="1" cellspacing="0" cellpadding="10" align="center">
	           <tr>
					<td>Product</td>
					<td><input type="text" name="p_name" id="p_name"></td>
				</tr>
				<tr>
					<td>price</td>
					<td><input type="price" name="price" id="price"></td>
				</tr>
				<tr>
					<td>Description</td>
					<td>
						<textarea id="desc" name="desc"></textarea>
					</td>
				</tr>
				<tr>
					<td>Stock</td>
					<td>
						<label for="stock">In</label>
						<input type="radio" name="stock" id="stock" value="in">
						<label for="stock">Out</label>
						<input type="radio" name="stock" id="stock" value="out">
					</td>
				</tr>
				<tr>
					<td>Company</td>
					<td>
						<select name="company" id="company">
							<option value="select">select</option>
							<option value="TATA">TATA</option>
							<option value="Zudio">Zudio</option>
							<option value="SS">SS</option>
							<option value="LG">LG</option>
							<option value="amazon">amazon</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>size</td>
					<td>
						<label for="size">S</label>
						<input type="checkbox" name="size[]" id="size" value="S">
						<label for="size">M</label>
						<input type="checkbox" name="size[]" id="size" value="M">
						<label for="size">XL</label>
						<input type="checkbox" name="size[]" id="size" value="Xl">
						<label for="size">XXl</label>
						<input type="checkbox" name="size[]" id="size" value="XXl">
					</td>
				</tr>
	            <tr>
	                    <td>Upload file</td>
	                    <td>
	                        <input type="file" name="f" id="f">
	                    </td>
	                </tr>
	                <tr>
	                    <td colspan="2" align="center">
	                        <input type="submit" name="submit" id="name" value="Upload">
	                    </td>
	                </tr>
            </table> 
        </form>
    </body>
</html>