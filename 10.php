<?php

$arr1 =
    [
        1 =>
            [
                "id" => 1,
                "nombre" => "diego",
                "DNI" => "7777776x",
                "saldo" => 22,
                "fecha" => "22/06/1998"
            ],
        2 =>
            [
                "id" => 2,
                "nombre" => "pepe",
                "DNI" => "7777777x",
                "saldo" => 20,
                "fecha" => "25/05/1998"
            ]
    ];

$arr2 =
    [
        1 =>
            [
                "id" => 1,
                "nombre" => "diego",
                "DNI" => "7777776x",
                "saldo" => 23,
                "fecha" => "22/07/1998"
            ],
        2 =>
            [
                "id" => 2,
                "nombre" => "pepe",
                "DNI" => "7777777x",
                "saldo" => 25,
                "fecha" => "25/06/1998"
            ]
    ];
//
//var_dump ( $arr1, $arr2 );
$array_id2 = array_column ( $arr2, 'id' );
//var_dump ( $array_id2 );
if ( count ( $arr1 ) > 0 ) {
    for ( $key = 1 ; $key <= count ( $arr1 ) ; $key ++ ) {
//        var_dump ( $arr1[ $key ], $arr1[ $key ][ 'id' ], in_array ( $arr1[ $key ][ 'id' ], $array_id2 ) );
        if ( in_array ( $arr1[ $key ][ 'id' ], $array_id2 ) ) {
//            var_dump ( "compare", $arr2[ $key ][ 'fecha' ], $arr1[ $key ][ 'fecha' ], $arr2[ $key ][ 'fecha' ] > $arr1[ $key ][ 'fecha' ] );
            if ( $arr2[ $key ][ 'fecha' ] > $arr1[ $key ][ 'fecha' ] ) {
//                var_dump ( $arr1[ $key ][ 'saldo' ], $arr2[ $key ][ 'saldo' ] );
                $arr1[ $key ][ 'saldo' ] = $arr2[ $key ][ 'saldo' ];
            }
        }
        else {
            echo "El id " . $arr1[ $key ][ 'id' ] . " no se encuentra en el array 2";
        }
    }
}
else {
    throw new Exception( 'Array empty BBDD1' );
}
var_dump ( $arr1, $arr2 );
$last_run = date ( 'Y-m-d H:i:s' );


