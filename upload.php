
<?php 

$msg= "";

if (isset($post['upload']))
{
    $target = "images/".basename($_FILES['image']['name']);

    $db = mysql_connect("localhost","root","gso_data");

    $image = $_FILE['image']['name'];
    $text = $_POST['text'];

    $sql = "INSERT INTO emp_accounts_record (image,text) VALUES ('$image','$text')";
    $mysql_query($db,$sql);

    if (move_upload_file($_FILES['image']['tmp_name'],$target))  
    {
        $msg = "Image uploaded successfully";
    }
    else
    {
        $msg = "There was a problem uploading image";
    }

?>