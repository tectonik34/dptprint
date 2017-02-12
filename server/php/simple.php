<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>  
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="author" content="Fabien Priotto" />
  <meta name="description" content="DEPTPRINT Simple form" />
  <meta name="keywords" content="facult&eacute;, sciences, UM2, service, informatique," />
  <link href="../css/master.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- Bootstrap styles for responsive website layout, supporting different screen sizes -->
  <!-- Bootstrap CSS fixes for IE6 -->
  <!--[if lt IE 7]><link rel="stylesheet" href="css/bootstrap-ie6.min.css"><![endif]-->
  <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
</head>

<body>
     <div id="navigation">    
        <a href="../../index.html" title="Best file form">Compatible browser with best form ? Click here</a>
    </div>

<div id="logosif-fds">

<?php
    
// Simple PHP Upload Script:  http://coursesweb.net/php-mysql/

$uploadpath = './files/';      // directory to store the uploaded files
$max_size = 10000;          // maximum file size, in KiloBytes
$alwidth = 900;            // maximum allowed width, in pixels
$alheight = 800;           // maximum allowed height, in pixels
$allowtype = array('bmp', 'gif', 'jpg', 'jpe', 'png', 'pdf', 'txt');        // allowed extensions

if(isset($_FILES['fileup']) && strlen($_FILES['fileup']['name']) > 1) {
  $uploadpath = $uploadpath . basename( $_FILES['fileup']['name']);       // gets the file name
  $sepext = explode('.', strtolower($_FILES['fileup']['name']));
  $type = end($sepext);       // gets extension
  list($width, $height) = getimagesize($_FILES['fileup']['tmp_name']);     // gets image width and height
  $err = '';         // to store the errors

  // Checks if the file has allowed type, size, width and height (for images)
  if(!in_array($type, $allowtype)) $err .= 'The file: <b>'. $_FILES['fileup']['name']. '</b> not has the allowed extension type.';
  if($_FILES['fileup']['size'] > $max_size*1000) $err .= '<br/>Maximum file size must be: '. $max_size. ' KB.';
  if(isset($width) && isset($height) && ($width >= $alwidth || $height >= $alheight)) $err .= '<br/>The maximum Width x Height must be: '. $alwidth. ' x '. $alheight;

  // If no errors, upload the image, else, output the errors
  if($err == '') {
    if(move_uploaded_file($_FILES['fileup']['tmp_name'], $uploadpath)) { 
      echo 'File: <b>'. basename( $_FILES['fileup']['name']). '</b> successfully uploaded:';
      echo '<br/>File type: <b>'. $_FILES['fileup']['type'] .'</b>';
      echo '<br />Size: <b>'. number_format($_FILES['fileup']['size']/1024, 3, '.', '') .'</b> KB';
      if(isset($width) && isset($height)) echo '<br/>Image Width x Height: '. $width. ' x '. $height;
      echo '<br/><br/>Image address: <b>http://'.$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['REQUEST_URI']), '\\/').'/'.$uploadpath.'</b>';
    }
    else echo '<b>Unable to upload the file.</b>';
  }
  else echo $err;
}
?> 

<div class="container" align="center">
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data"> 
  <input type="file" name="fileup"  /><input type="submit" name='submit' value="Print" /> 
 </form>
</div>

<div>
bmp, gif, jpg, jpe, png, pdf and txt files only.
</div>

</div>

</body>
</html>
