
<?php

$program = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p');


function spin($val){
        global $program;
        $hold_left =[];
        $hold_right =[];
        $get_val = substr($val,1); //get all the string from position 1 to the end;

        if(is_numeric($get_val)){//check if the string is a number

            for($i=0; $i <count($program)-$get_val; $i++) { // loop till the $get_val position
            array_push($hold_left,$program[$i]); // push all values to $hold_left.

            }
            for($i=count($program)-$get_val; $i < count($program); $i++) { //loop from the $get_val position to the end of array
            array_push($hold_right,$program[$i]);// push all values to $hold_right.
            }
       }
return array_merge($hold_right,$hold_left); //programs move from the end to the front;
}
function exchange($val){
        global $program;
        $get_val = substr($val,1);//get all the string from position 1 to the end;
     
        $get_val = explode('/',$get_val); //convert $get_val to array;
        if(is_numeric($get_val[0]) && is_numeric($get_val[1])){
        $hold_left = $program[$get_val[0]];//holds the value of $get_val[1]
        $hold_right = $program[$get_val[1]];//holds the value of $get_val[2]
        $program[$get_val[0]]=$hold_right; //swap values in position;
        $program[$get_val[1]]=$hold_left; //swap values in position;
        }
        return $program;
}
function partner($val){
        global $program;
        $get_val = substr($val,1);//get all the string from position 1 to the end;
        $get_val = explode('/',$get_val); //convert $get_val to array;
        $hold_first_index=0;
        $hold_second_index=0;
        $hold_left = 0;//holds the value of program at certain position
        $hold_right = 0;//holds the value of program at certain position
        $counter=0;// this value avoid to loop the entire array where is no neccesary;
        if(ctype_alpha($get_val[0]) && ctype_alpha($get_val[1])){

        for ($i=0; $i < count($program); $i++){ 
    
            if(strtoupper($program[$i])== strtoupper($get_val[1])){
            $hold_first_index = $i;
            $counter++;
            }
            if(strtoupper($program[$i])== strtoupper($get_val[0])){
                $hold_second_index = $i;
                $counter++;
            }
            if($counter==2){
                break; // break out the loop because $counter is 2 ,all if statment are being executed so no need to keep on loop;
            }
        }
    }
        $program[$hold_second_index] = strtolower($get_val[1]);
        $program[$hold_first_index] = strtolower($get_val[0]);
      return $program;
}

function getdance($val){

    if(strtolower($val[0])=='s'){
        return spin($val);
      }
      elseif (strtolower($val[0])=='x') {
       return exchange(strtolower($val));
      }
      elseif (strtolower($val[0])=='p') {
       return partner($val);
      }
  }


?>
<!DOCTYPE html>
<html>
<body>

<h2>Miway Task day 16</h2>

<form method="get" action="miway16.php">
  Place a dance:<br>
  <input type="text" name="dance" required >   <input type="submit" value="Submit">
  <b><br/>dance pertern can be <br/>s1 to s15</br>
  x1/2 to x14/15</br>
  pa/b to po/p
  </b>

</form> 
here is a program
<b><?php  
  if(isset($_GET['dance'])){echo implode(',', getdance($_GET['dance']));}else{echo implode(',',$program);}?></p>
<b>The programs dance consists of a sequence of dance moves:
Spin, written sX, makes X programs move from the end to the front, but maintain their order otherwise. (For example, s3 on abcde produces cdeab).
Exchange, written xA/B, makes the programs at positions A and B swap places.
Partner, written pA/B, makes the programs named A and B swap places.
For example, with only five programs standing in a line (abcde), they could do the following dance:
s1, a spin of size 1: eabcd.</b>
x3/4, swapping the last two programs: eabdc.</b>
pe/b, swapping programs e and b: baedc.</p>

</body>
</html>
