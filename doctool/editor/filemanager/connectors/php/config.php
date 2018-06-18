<?php

global $Config ;

//include( '../../../../../lib/config.php' );
$config[root] = 'http://nsp.uru.ac.th/';
$config[data] = 'database/';

$Config['Enabled'] = true ;

// Path to user files relative to the document root.
$Config['UserFilesPath'] = $config[root].$config[data]; //multi user
//$Config['UserFilesPath'] ='uploadfiles/';

$Config['UserFilesAbsolutePath'] = '../../../../../database/'; //single user

// Due to security issues with Apache modules, it is recommended to leave the
// following setting enabled.
$Config['ForceSingleExtension'] = true ;

// Perform additional checks for image files
// if set to true, validate image size (using getimagesize)
$Config['SecureImageUploads'] = true;

// What the user can do with this connector
$Config['ConfigAllowedCommands'] = array('QuickUpload', 'FileUpload', 'GetFolders', 'GetFoldersAndFiles', 'CreateFolder') ;

// Allowed Resource Types
$Config['ConfigAllowedTypes'] = array('File', 'Image', 'Flash', 'Media') ;

// For security, HTML is allowed in the first Kb of data for files having the
// following extensions only.
$Config['HtmlExtensions'] = array("html", "htm", "xml", "xsd", "txt", "js") ;

$Config['AllowedExtensions']['File']	= array('7z', 'aiff', 'asf', 'avi', 'bmp', 'csv', 'doc', 'fla', 'flv', 'gif', 'gz', 'gzip', 'jpeg', 'jpg', 'mid', 'mov', 'mp3', 'mp4', 'mpc', 'mpeg', 'mpg', 'ods', 'odt', 'pdf', 'png', 'ppt', 'pxd', 'qt', 'ram', 'rar', 'rm', 'rmi', 'rmvb', 'rtf', 'sdc', 'sitd', 'swf', 'sxc', 'sxw', 'tar', 'tgz', 'tif', 'tiff', 'txt', 'vsd', 'wav', 'wma', 'wmv', 'xls', 'xml', 'zip') ;
$Config['DeniedExtensions']['File']		= array() ;
$Config['FileTypesPath']['File']		= $Config['UserFilesPath'].'file/' ;
$Config['FileTypesAbsolutePath']['File']= ($Config['UserFilesAbsolutePath'] == '') ? '' : $Config['UserFilesAbsolutePath'].'file/' ;
$Config['QuickUploadPath']['File']		= $Config['UserFilesPath'].'file/' ;
$Config['QuickUploadAbsolutePath']['File']= $Config['UserFilesAbsolutePath'].'file/' ;

$Config['AllowedExtensions']['Image']	= array('gif','jpeg','jpg','png') ;
$Config['DeniedExtensions']['Image']	= array() ;
$Config['FileTypesPath']['Image']		= $Config['UserFilesPath'].'image/' ;
$Config['FileTypesAbsolutePath']['Image']= ($Config['UserFilesAbsolutePath'] == '') ? '' : $Config['UserFilesAbsolutePath'].'image/' ;
$Config['QuickUploadPath']['Image']		= $Config['UserFilesPath'].'image/' ;
$Config['QuickUploadAbsolutePath']['Image']= $Config['UserFilesAbsolutePath'].'image/' ;

$Config['AllowedExtensions']['Flash']	= array( 'swf' , 'flv' ) ;
$Config['DeniedExtensions']['Flash']	= array() ;
$Config['FileTypesPath']['Flash']		= $Config['UserFilesPath'].'flash/' ;
$Config['FileTypesAbsolutePath']['Flash']= ($Config['UserFilesAbsolutePath'] == '') ? '' : $Config['UserFilesAbsolutePath'].'flash/' ;
$Config['QuickUploadPath']['Flash']		= $Config['UserFilesPath'].'flash/' ;
$Config['QuickUploadAbsolutePath']['Flash']= $Config['UserFilesAbsolutePath'].'flash/' ;

$Config['AllowedExtensions']['Media']	= array('aiff', 'asf', 'avi', 'fla', 'flv', 'gif', 'jpeg', 'jpg', 'mid', 'mov', 'mp3', 'mp4', 'mpc', 'mpeg', 'mpg', 'png', 'qt', 'ram', 'rm', 'rmi', 'rmvb', 'swf', 'tif', 'tiff', 'wav', 'wma', 'wmv') ;
$Config['DeniedExtensions']['Media']	= array() ;
$Config['FileTypesPath']['Media']		= $Config['UserFilesPath'].'media/' ;
$Config['FileTypesAbsolutePath']['Media']= ($Config['UserFilesAbsolutePath'] == '') ? '' : $Config['UserFilesAbsolutePath'].'media/' ;
$Config['QuickUploadPath']['Media']		= $Config['UserFilesPath'].'media/' ;
$Config['QuickUploadAbsolutePath']['Media']= $Config['UserFilesAbsolutePath'].'media/' ;

?>
