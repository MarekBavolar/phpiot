<?php 
    echo '<h1>GET</h1>';
        
    $sn1 = $_GET["a"];        
    $sn2 = $_GET["b"];        
    $sn3 = $_GET["c"];  
    $sn4 = $_GET["operator"];
            
    $text = " a= " . $sn1 . " b= " . $sn2 ." c= " . $sn3;  
    if($sn4 == "+")
    {
        $sum = $sn1 + $sn2 + $sn3;
    }
    else if($sn4 == "-")
    {
        $sum = $sn1 - $sn2 - $sn3;
    }
    else if($sn4 == "*")
    {
        $sum = $sn1 * $sn2 * $sn3;
    }
    else if($sn4 == "/")
    {
        $sum = $sn1 / $sn2 / $sn3;
    }
    
            
    echo $text;
    echo "<br>";
    echo "Sum:" . $sum;
    
?>
