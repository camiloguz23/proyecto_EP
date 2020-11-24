
<?php
require_once("../php/connecion.php");

if($_POST['check'] != "")
    {
        if (is_array($_POST['check']))
        {

            while(list($key,$value) = each($_POST['check']))
            {
                
                
            }
        }
        
    }
    else{
        echo json_encode("tre dsds");
        return;
}
?>