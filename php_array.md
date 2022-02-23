 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Array</title>
</head>
<body>
    <h1>PHP Array </h1>

<?php
/***
 * What is array?
 * Array is a special Veriable, which can hold more than one value at a time
 * 
 * Types of Array?
 * Indexed Array            -> Array with a numeric index
 * Associative Array        -> Array with a named index
 * Multidimensional Array   -> Arrays containing one or more arrays
 */

 /**
  * Indexd Array
  *Create a Array
  *array()  or []
  *Ayyar length
  *count() or sizeof()
  */
  $cars=array('Volvo','Land Rover','Audi','BMW'); //type -1
  $fruits=['mango','Apple','Banana','Promogranets'];//type-2
  //type-3
  $flowers[0] ="Lily";
  $flowers[1] ="Sunflower";
  $flowers[2] ="Rose";

  /*** length  of array */

//   echo count($cars); 
//   echo "<br>";
 echo sizeof($fruits);
 echo "<br>";
  echo sizeof($cars);
  /**** array access  ****/
  // print_r($cars);
  //print_r($cars[1]);
  for($i=0; $i < count($cars); $i++ ){
    echo $cars[$i];
    echo "<br>";
  }
  foreach($cars as $key => $value ){
    echo $key ." = " .$value;
    echo "<br>";
  }
  foreach($cars as $value ){
    echo $value;
    echo "<br>";
  }
?>
    
</body>
</html>


/***
 * What is array?
 * Array is a special Veriable, which can hold more than one value at a time
 * 
 * Types of Array?
 * Indexed Array            -> Array with a numeric index
 * Associative Array        -> Array with a named index
 * Multidimensional Array   -> Arrays containing one or more arrays
 */

 /**
  * Associative Array
  *Create a Array
  *array()  or []
  *Ayyar length
  *count() or sizeof()
  */
  $age=array('sushanta' =>29,'little'=>27,'niranjan'=>42); //type -1
  $subjects=['math'=>75,'english'=>82,'science'=>85,'history'=>78];//type-2
  //type-3
  $subjects['hindi'] =75;
  $subjects['mark'] =475;
  $subjects['division'] ="1St";

  /*** length  of array */

  echo count($subjects); 
 echo "<br>";
  echo "<br>";
echo sizeof($subjects);
 
  /**** array access  ****/
  //print_r($subjects);
  //print_r($age['little']);

  foreach($subjects as $key => $value ){
    //echo $key ." = " .$value;
    //echo "<br>";
  }
  foreach($age as $value ){
    echo $value;
    echo "<br>";
  }


?>

<?php
/***
 * What is array?
 * Array is a special Veriable, which can hold more than one value at a time
 * 
 * Types of Array?
 * Indexed Array            -> Array with a numeric index
 * Associative Array        -> Array with a named index
 * Multidimensional Array   -> Arrays containing one or more arrays
 */

 /**
  * Multidimensional Array
  *Create a Array
  *array()  or []
  *Ayyar length
  *count() or sizeof()
  */
  
$cars = array(
    "address" =>array(
        "permanet" =>array('khordha',752055,"mobile"=>array(12345,88858)),
        "present" =>array("bhubaneswar", 751016),
    ),
    array("Volvo","v-15",25), //carname, model name, no of order
    array("BMW","r-15",10),
    array("Land Rover","pantasheer",15),
    //array("brand"=>"Audi","model"=>"Q-8","order"=>5)
);

$name=array('A','B','C','D');

  /**** array access  ****/
  echo "<pre>";
  print_r($cars);
  //print_r($cars[3]['brand']);
  print_r($cars['address']['permanet']['mobile'][1]);
  //print_r($name);
  
  //print_r($age['little']);
    //$address=$cars['address'] ['permanet'];
    //print_r($address);
  foreach($cars['address'] ['permanet'] as $key => $value ){
    //echo $key ." = " .$value;
    //echo "<br>";
    print_r($key);
  }
  foreach($cars as $data ){
    // echo $value;
    // echo "<br>";
    //print_r($data[0]);
  }


?>
