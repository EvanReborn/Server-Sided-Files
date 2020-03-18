<?php
if ($_SERVER["REQUEST_METHOD"] != "POST")
    die("Don't settle here. We did. We regret.");
    
include("settings.php");

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
