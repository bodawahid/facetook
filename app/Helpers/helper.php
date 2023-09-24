<?php
function time_from ($create_time) {
   
                            $time = strtotime(now())-strtotime($create_time)  ;
                            if($time < 60) {
                            if($time == 0)
                            echo $time. ' Second' ; 
                            else 
                            echo $time . ' Seconds' ; 
                            }
                            elseif(($time/60)<60) {
                            if(intval($time/60) == 1)
                            echo intval($time/60) . ' Minute' ; 
                            else
                            echo intval($time/60) . ' Minutes' ;
                            }
                            elseif($time / (60*60) < 24) {
                            if(intval( $time / (60*60)) == 1) 
                            echo intval($time/(60*60)) . " Hour" ; 
                            else
                            echo  intval($time/(60*60)) . " Hours" ; 
                            }
                            elseif($time /(60*60*24)<365) {
                            if(intval($time /(60*60*24)) == 1) 
                            echo intval($time /(60*60*24)) . ' Day' ; 
                            else
                            echo intval($time /(60*60*24)) ; 
                            }
                            elseif(intval($time/(60*60*24*365))==1)
                            echo 1 . ' YEAR' ;
                            else 
                            echo intval($time/(60*60*24*365)) . ' Years' ; 
                    
}
?>