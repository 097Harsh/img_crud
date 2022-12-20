<?php
include 'connect.php';

//editcode
$id = $_GET['editid'];
$result = $obj->query("select * from file_task where id='$id'");
$row = $result->fetch_object();


//edit code
$e = $row->company;
$h=$row->size;
$g = $row->stock;
$h1=explode(",",$h);
// echo '<pre>';
// print_r($row);

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

		$exe = $obj->query("update file_task set name='$p_name',price='$price',description='$desc',stock='$stock',company='$company',size ='$s1', f_name='$filename' where id='$id' ");
		if($exe)
		{
			unlink("upload/$row->f_name");
			echo "<script>alert('File Updated Successfullly');document.location='read.php';</script>";
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
<!DOCTYPE html>

<html>
    <head>
        <title>Upload file</title>
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
            <table border="1" cellspacing="0" cellpadding="10" align="center">
                <tr>
                    <td>Product</td>
                    <td><input type="text" name="p_name" id="p_name" value="<?php echo $row->name; ?>"></td>
                </tr>
                <tr>
                    <td>price</td>
                    <td><input type="price" name="price" id="price" value="<?php echo $row->price; ?>"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <textarea id="desc" name="desc"><?php echo $row->description; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Stock</td>
                    <td>
                        <label for="stock">In</label>
                        <input type="radio" name="stock" id="stock" value="in" <?php if ($g == 'in') echo 'checked';?>>
                        <label for="stock">Out</label>
                        <input type="radio" name="stock" id="stock" value="out" <?php if ($g == 'out') echo 'checked';?>>
                    </td>
                </tr>
                <tr>
                    <td>Company</td>
                    <td>
                        <select name="company" id="company">
                            <option value="select">select</option>
                            <option value="TATA"  <?php if ($e == 'TATA') echo 'selected'?>>TATA</option>
                            <option value="Zudio"  <?php if ($e == 'Zudio') echo 'selected'?>>Zudio</option>
                            <option value="SS"  <?php if ($e == 'SS') echo 'selected'?>>SS</option>
                            <option value="LG"  <?php if ($e == 'LG') echo 'selected'?>>LG</option>
                            <option value="amazon"  <?php if ($e == 'amazon') echo 'selected'?>>amazon</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>size</td>
                    <td>
                        <label for="size">S</label>
                        <input type="checkbox" name="size[]" id="size" value="S" <?php if(in_array("S", $h1)) echo "checked"; ?>> 
                        <label for="size">M</label>
                        <input type="checkbox" name="size[]" id="size" value="M" <?php if(in_array("M", $h1)) echo "checked"; ?>>
                        <label for="size">XL</label>
                        <input type="checkbox" name="size[]" id="size" value="Xl" <?php if(in_array("Xl", $h1)) echo "checked"; ?>>
                        <label for="size">XXl</label>
                        <input type="checkbox" name="size[]" id="size" value="XXl" <?php if(in_array("XXl", $h1)) echo "checked"; ?>>
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