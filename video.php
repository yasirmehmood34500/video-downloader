<?php
if(isset($_GET['filename'])){
    $fileName=$_GET['filename'];
    $fileName=str_replace("..",".",$fileName); //required. if somebody is trying parent folder files
    $file = $fileName; // you need to change the destination to your video folder
    if (file_exists($file)) {
        $mime = 'application/video';

        header('Content-Type: '.$mime);

        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename='.$fileName);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
    }
}
?>