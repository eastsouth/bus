<?php
class controller_zhineng{
    function zhineng(){
	    $ms = getSingleton('model_zhineng');
        include(DIR.'/view/zhineng.php');
		 
    }
}
?>