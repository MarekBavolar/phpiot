<?php 
    echo '<h1>GET</h1>';
        
    $sn1 = $_GET["a"];        
    $sn2 = $_GET["b"];        
    $sn3 = $_GET["c"];  
    $sn4 = $_GET["operator"];
            
    $text = " a= " . $sn1 . " b= " . $sn2 ." c= " . $sn3;  
    function GET($num1,$num2,$num3,$operator){
        $sum = 0;
        if($operator == "+")
        {
            $sum = $num1 + $num2 + $num3;
        }
        else if($operator == "-")
        {
            $sum = $num1 - $num2 - $num3;
        }
        else if($operator == "*")
        {
            $sum = $num1 * $num2 * $num3;
        }
        else if($operator == "/")
        {
            $sum = $num1 / $num2 / $num3;
        }
        return $sum;
    }
            
    echo $text;
    echo "<br>";
    echo "Sum:" . GET($sn1,$sn2,$sn3,$sn4);
    
?>
