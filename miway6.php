<?php

if(isset($_GET['one'])&&isset($_GET['one1'])&&isset($_GET['one2'])&&isset($_GET['one3'])&&isset($_GET['one4'])&&isset($_GET['one5'])&&isset($_GET['one6'])
&&isset($_GET['one7'])&&isset($_GET['one8'])&&isset($_GET['one9'])&&isset($_GET['one10'])&&isset($_GET['one11'])&&isset($_GET['one12'])&&isset($_GET['one13'])
&&isset($_GET['one14'])&&isset($_GET['one14']))
{
    // get all values from pazzel input
$memory_bank = array(
        $_GET['one'],$_GET['one2'],$_GET['one3'],$_GET['one4'],$_GET['one5']
        ,$_GET['one6'],$_GET['one7'],$_GET['one8'],$_GET['one9'],$_GET['one10']
        ,$_GET['one11'],$_GET['one12'],$_GET['one13'],$_GET['one14'],$_GET['one15']
); // set all value to memory bank;

}
$memory_bank_counter = 0;

$multi_memory_bank=[];

function new_memory_bank($memory_bank,$value,$hi){ //generate new memory back base on the last generated one
    $array_temp = array();
    for($i=0; $i <count($memory_bank) ; $i++) { 
        if($i!=$hi){
      array_push($array_temp,$memory_bank[$i]+$value);
        }
      else{
        array_push($array_temp,($memory_bank[$hi]%(count($memory_bank)-1)));
      }
     
    }
    return $array_temp;
}



function gethighest_block($memory_bank){ //find the highest block in the memory bank
    $heigh_block = 0;
    $heigh_index =0;
    for ($x=0; $x < count($memory_bank) ; $x++) { 
       
        if($memory_bank[$x]>$heigh_block){
         
                $heigh_block = $memory_bank[$x];
                $heigh_index = $x;
        }
    }
    return  $heigh_index;
}

function redistributed_value($hi,$memory_bank){ // find the value that has to be shared among

    return ($memory_bank[$hi] - ($memory_bank[$hi]%(count($memory_bank)-1)))/(count($memory_bank)-1);
}


function push_memory_bank($value,$memory_bank){// push each memory bank into the multi-dem array
    $check_exist = 0;
    global $multi_memory_bank;
    $new_memory_b = new_memory_bank($memory_bank,$value,gethighest_block($memory_bank));
    if(count($multi_memory_bank)==0){
        array_push($multi_memory_bank,$new_memory_b);
       
        }
        else
        {
        for ($i=0; $i <count($multi_memory_bank) ; $i++) { 
            if($multi_memory_bank[$i]==$new_memory_b){
                $check_exist = 1;
                return  $check_exist;
                break;
            }
        }
        if($check_exist==0){
            array_push($multi_memory_bank,$new_memory_b);
            $memory_bank = $new_memory_b;
        }
  
}
return  $new_memory_b;
}

$count=0;


if(isset($_GET['one'])&&isset($_GET['one1'])&&isset($_GET['one2'])&&isset($_GET['one3'])&&isset($_GET['one4'])&&isset($_GET['one5'])&&isset($_GET['one6'])
&&isset($_GET['one7'])&&isset($_GET['one8'])&&isset($_GET['one9'])&&isset($_GET['one10'])&&isset($_GET['one11'])&&isset($_GET['one12'])&&isset($_GET['one13'])
&&isset($_GET['one14'])&&isset($_GET['one14']))
{
while(1)
{
    $memory_bank = push_memory_bank(redistributed_value(gethighest_block($memory_bank),$memory_bank),$memory_bank);

   if(is_array($memory_bank)){
       continue;
   }
   else{
    break;
   }
  $count++;
}
echo (count($multi_memory_bank)+1)." redistribution cycles must be completed before a configuration is produced";
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Miway Task day 6</h2>

<form action="miway6.php">
  Memory bank:<br>
  
  <table style="width:100%" >
  <tr>
    <th>block 1</th>
    <th>block 2</th>
    <th>block 3</th>
    <th>block 4</th>
    <th>block 5</th>
    <th>block 6</th>
    <th>block 7</th>
    <th>block 8</th>
    <th>block 9</th>
    <th>block 10</th>
    <th>block 11</th>
    <th>block 12</th>
    <th>block 13</th>
    <th>block 14</th>
    <th>block 15</th>
    <th>block 16</th>

  </tr>
  <tr>
    <td><input style="width:70px;" type="number" name="one" value="0"></td>
    <td><input style="width:70px;" type="number" name="one1" value="0"></td>
    <td><input style="width:70px;" type="number" name="one2" value="0"></td>
    <td><input style="width:70px;" type="number" name="one3" value="0"></td>
    <td><input style="width:70px;" type="number" name="one4" value="0"></td>
    <td><input style="width:70px;" type="number" name="one5" value="0"></td>
    <td><input style="width:70px;" type="number" name="one6" value="0"></td>
    <td><input style="width:70px;" type="number" name="one7" value="0"></td>
    <td><input style="width:70px;" type="number" name="one8" value="0"></td>
    <td><input style="width:70px;" type="number" name="one9" value="0"></td>
    <td><input style="width:70px;" type="number" name="one10" value="0"></td>
    <td><input style="width:70px;" type="number" name="one11" value="0"></td>
    <td><input style="width:70px;" type="number" name="one12" value="0"></td>
    <td><input style="width:70px;" type="number" name="one13" value="0"></td>
    <td><input style="width:70px;" type="number" name="one14" value="0"></td>
    <td><input style="width:70px;" type="number" name="one15" value="0"></td>

  </tr>

</table>
   <input type="submit" value="Submit">
</form> 


</body>
</html>
