//Match works perfectly than switch case syntax
$value=2;
    $result=match($value){
      1=>"one",
      2=>"two"
    };

    print_r($result);
