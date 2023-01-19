<?php 
    echo '<h1>getParameters page</h1>';
        
    $sn1 = $_GET["a"];        
    $sn2 = $_GET["b"];        
    $sn3 = $_GET["c"];  
            
    $text = " a= " . $sn1 . " b= " . $sn2 ." c= " . $sn3;        
    $sum = $sn1 + $sn2 + $sn3;
            
    echo $text;
    echo "<br>";
    echo "Sum:" . $sum;
    
?>
