<?php
function RandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$con = mysqli_connect("enter", "your", "own", "credentials");
if (mysqli_connect_error()) {
    echo "Failed to connect to DB!";
    return;
}

$file = $_FILES['file']['name'];
$code = RandomString(32);

if (file_exists('uploads/' . $file)) {
    echo "The file already exists!";
    return;
}
 
if (!file_exists('uploads')) {
    mkdir('uploads', 0777);
}

if (strpos($file, '.php') !== false) {
    die("Failed to upload. (File is PHP)");
}
 
move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $file);
mysqli_query($con,"INSERT INTO files (name, code) VALUES ('$file', '$code' )");
 
echo 'File uploaded successfully. (' . $_FILES['file']['name'] . ')';
?>
