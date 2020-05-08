<?php
$con= mysql_connect("localhost","root","");
mysql_select_db("foss",$con);
if($_POST['submit'])
{
    //storing all necessary data into the respective variables.
$file = $_FILES['file'];
$file_name = $file['name'];
$file_type = $file ['type'];
$file_size = $file ['size'];
$file_path = $file ['tmp_name'];


if($file_name!="" && ($file_type="image/jpeg"||$file_type="image/png"||$file_type="image/gif")&& $file_size<=614400) {

	if(move_uploaded_file ($file_path,'images/'.$file_name))//"images" is just a folder name here we will load the file.
		$query=mysql_query("insert into user(photo)values('$file_name')");//mysql command to insert file name with extension 
 
		if($query==true)
		{
    		echo "File Uploaded";
		}
}
}
?>

<html>
<body>
<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="file">
<input type="submit" name="submit" value="Search">
</form>
</body>
</html>






