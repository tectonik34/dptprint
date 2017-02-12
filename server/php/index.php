<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');

if ( isset($file_copies_number) ) {
	file_put_contents("file_copies_number", (int)$_POST['copiesNumber'], LOCK_EX);
	unset($file_copies_number);
}

$upload_handler = new UploadHandler();
?>
