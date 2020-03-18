<?php
include("settings.php");

if (isset($_POST['code'])) {
    $name = $_POST['name'];
    $code = $_POST['code'];
    mysqli_query($con,"DELETE FROM files WHERE code = '$code'");
    unlink('uploads/' . $name);
}

$result = mysqli_query($con, "SELECT * FROM files");
?>
<br>
<table class="table" id="tests-table" style="">
<tr>
<th>Filename</th>
<th>Code</th>
<th>Options</th>
</tr>
<?php
while ($row = mysqli_fetch_array($result)) {
    echo "<tr><td>" . $row['name'] . "</td><td>" . $row['code'] . "</td><td>"; ?>
    <form method="POST">
    <input type="hidden" id="code" name="code" value="<?php echo $row['code'] ?>" />
    <input type="hidden" id="name" name="name" value="<?php echo $row['name'] ?>" />
    <button>Delete</button>
    </form>
    </td></tr>
<?php } $result->close(); ?>
</table>

<html>
    <style>
        #drop_file_zone {
            background-color: #EEE;
            border: #999 5px dashed;
            width: 290px;
            height: 200px;
            padding: 8px;
            font-size: 18px;
        }
        #drag_upload_file {
            width: 50%;
            margin: 0 auto;
        }
        #drag_upload_file p {
            text-align: center;
        }
        #drag_upload_file #selectfile {
            display: none;
        }
    </style>
    <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
        <div id="drag_upload_file">
            <p>Drop file here</p>
            <p>or</p>
            <p><input type="button" value="Select File" onclick="file_explorer();"></p>
            <input type="file" id="selectfile">
        </div>
    </div>
    
    <h3>Beta 1.0.1</h3>
    <h5>This is an experimental project I made in like 15 mins to test stuff.</h5>
    <h5>WARNING! Do not upload sensitive files here as other user's can see both the names and codes of everyone's files.</h5>
    <button onClick="window.location.reload();">Refresh</button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  var fileobj;
  function upload_file(e) {
    e.preventDefault();
    fileobj = e.dataTransfer.files[0];
    ajax_file_upload(fileobj);
  }
 
  function file_explorer() {
    document.getElementById('selectfile').click();
    document.getElementById('selectfile').onchange = function() {
        fileobj = document.getElementById('selectfile').files[0];
      ajax_file_upload(fileobj);
    };
  }
 
  function ajax_file_upload(file_obj) {
    if(file_obj != undefined) {
        var form_data = new FormData();                  
        form_data.append('file', file_obj);
      $.ajax({
        type: 'POST',
        url: 'ajax.php',
        contentType: false,
        processData: false,
        data: form_data,
        success:function(response) {
          alert(response);
          $('#selectfile').val('');
        }
      });
    }
  }
</script>
</html>
