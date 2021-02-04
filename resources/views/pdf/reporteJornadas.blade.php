<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Document</title>
</head>
<body>
	<header>
	<h1>Reporte Fecha del <?php echo date('Y/m/d') ?></h1>
</header>

<main>

		

<table border="1 solid black">
	<thead>
		<tr>
		<th>#</th>
		<th>Asunto</th>
		<th>Descripcion</th>
		<th>Cedula</th>
		<th>Fecha de Entrega</th>
		</tr>
	</thead>
	<tbody>
		<?php 
$i=0;
foreach ($historico as $key => $value) {
echo "<tr>";
$val=$i+1;
			echo "<td>".$val."</td>";
			echo "<td>".$value->asunto."</td>";
			echo "<td>".$value->descripcion."</td>";
			echo "<td>".$value->cedula."</td>";
			echo "<td>".$value->created_at."</td>";
echo "</tr>";

$i++;
}


		 ?>
		
	</tbody>

</table>
	
</main>

<footer>
	<p>pagina 1</p>
</footer>
</body>
</html>
