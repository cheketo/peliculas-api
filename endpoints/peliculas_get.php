<?php

include("services/pelicula.php");

$conditions = [];
$searchConditions = [];
foreach( $_GET as $key => $value )
{
    if( $key == 'search' && $value )
    {
        $searchConditions[] = "titulo LIKE '%" . $value . "%'";
        $searchConditions[] = "descripcion LIKE '%" . $value . "%'";
        $searchConditions[] = "duracion = '" . $value . "'";
        // $searchConditions[] = "fecha_estreno = '" . implode( '-', array_reverse( explode( '/', $value ) ) ) . "'";
    }else{
        $conditions[] = $key . " = '" . $value . "'";
    }
}

$service = new Pelicula();

$pelicula = $service->get( $conditions, $searchConditions );

$response = [ 'data' => $pelicula ];
echo json_encode( $response );