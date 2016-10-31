<?php 

require 'conexionMySQL.php';

$json = array();
$labels = array();
$data = array();

//Cantidad de libros vendidos por genero.
$query = 'select sum(d.cantidad) as total, l.genero from libro l join compraDetalle d on l.id = d.idLibro group by l.genero order by total desc limit 10';

$resultSet = $conn->query($query);

while ($row = $resultSet->fetch_assoc()) {
	array_push($labels, $row['genero']);
	array_push($data, $row['total']);
}
$json["genero"] = array();
$json["genero"]["labels"] = $labels;
$json["genero"]["data"] = $data;


//Top 10 de libros vendidos.

$labels = array();
$data = array();

$query = 'select sum(d.cantidad) as total, l.nombre from libro l join compraDetalle d on l.id = d.idLibro group by l.id order by total desc limit 10';

$resultSet = $conn->query($query);

while ($row = $resultSet->fetch_assoc()) {

	array_push($labels, $row['nombre']);
	array_push($data, $row['total']);

}
$json["topLibros"] = array();
$json["topLibros"]["labels"] = $labels;
$json["topLibros"]["data"] = $data;




//Top cantidad de libros vendidos por estado.


$query = 'select sum(d.cantidad) as total, e.estado from compraDetalle d join compraTotal t on d.idCompraTotal = t.idCompraTotal join estado e on e.id = t.idEstado group by e.estado order by total desc';

$resultSet = $conn->query($query);

$json["libroEstado"] = array();

$json["libroEstado"][0] = array("State","Libros vendidos");
$i = 1;
while ($row = $resultSet->fetch_assoc()) {
	$json["libroEstado"][$i] = array($row["estado"], (int) $row["total"]);
	$i++;
}


//Compras hombres vs mujeres.

$labels = array();
$data = array();

$query = "select sum(d.cantidad) as total, if(u.genero = 'm','Hombres','Mujeres') as nombre from compraDetalle d join compraTotal t on d.idCompraTotal = t.idCompraTotal join usuario u on t.idUsuario = u.id group by u.genero order by nombre";

$resultSet = $conn->query($query);

while ($row = $resultSet->fetch_assoc()) {

	array_push($labels, $row['nombre']);
	array_push($data, $row['total']);

}
$json["chartSexo"] = array();
$json["chartSexo"]["labels"] = $labels;
$json["chartSexo"]["data"] = $data;


//Usuarios Registrados vs usuarios que han comprado.

$query = " select count(distinct id) as usuariosRegistrados from usuario";

$resultSet = $conn->query($query);
$json["usuariosCompras"] = array();
$json["usuariosCompras"][0] = array("Label","Porcentaje");
$row = $resultSet->fetch_assoc();
$usuariosRegistrados = (float) $row["usuariosRegistrados"];
$query = " select count(distinct idUsuario) as usuariosCompras from compraTotal";
$resultSet = $conn->query($query);
$row = $resultSet->fetch_assoc();
$usuariosCompras = (float) $row["usuariosCompras"];
$json["usuariosCompras"][1] = array("Porcentaje" , ($usuariosCompras / $usuariosRegistrados * 100));



//Cantidad de libros vendids por dia, mes actual.


$labels = array();
$data = array();

$query = "select sum(cantidad) as total, day(fecha) as dia from compraDetalle natural join compraTotal where month(fecha) = month(now()) group by date(fecha) order by dia";

$resultSet = $conn->query($query);
while ($row = $resultSet->fetch_assoc()) {

	array_push($labels, $row['dia']);
	array_push($data, $row['total']);
}

$json["ventasMes"] = array();
$json["ventasMes"]["labels"] = $labels;
$json["ventasMes"]["data"] = $data;



echo json_encode($json);