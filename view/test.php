<?php
$a=[
'id'=>1,
'name'=>'a'
];
$b=[
    'id'=>2,
    'name'=>'b'
    ];
$c[]= $a;
$c[]= $b;
for( $i=0 ;$i<sizeof($c);$i++){
    echo $c[$i]['id'];
}

?>