<?php
 // For instance, you can do something like this:
session_start();
if(isset($_POST['width']) && isset($_POST['height'])) {
    $_SESSION['screen_width'] = $_POST['width'];
    $_SESSION['screen_height'] = $_POST['height'];
    echo json_encode(array('outcome'=>'success', 'screen_width'=>$_POST['width'], 'screen_height'=>$_POST['height']));
} else {
    echo json_encode(array('outcome'=>'error','error'=>"Couldn't save dimension info"));
}
?>  