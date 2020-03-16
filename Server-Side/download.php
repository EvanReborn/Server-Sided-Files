<?php
if ($_SERVER["REQUEST_METHOD"] != "POST")
    die("Don't settle here. We did. We regret.");
    
$con = mysqli_connect("localhost", "u792718613_Evan", "cLRN4dzVMK5qLhUJLJ", "u792718613_valance");
if (mysqli_connect_error()) 
    die("Failed to connect to DB!");

$code = $con->real_escape_string($_POST['code']);

$file_url = '';

$result = mysqli_query($con, "SELECT * FROM files WHERE code = '$code'");
while ($row = mysqli_fetch_array($result)) 
{
    $file_url = 'uploads/' . $row['name'];
    break;
}

header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
readfile($file_url);
?>
