<?php 
	
	
	session_start();

	$usuario = $_SESSION['username'];
	if(!isset($usuario)){
		header("location: login.php");
	}
	require './logica/conexion.php';
	

$sql = "SELECT per.departamento num_dept, avg(ins.notaFinal) promedio,
    case when per.departamento ='01' then avg(ins.notaFinal) end CH,
    case when per.departamento ='02' then avg(ins.notaFinal) end LP,
    case when per.departamento ='03' then avg(ins.notaFinal) end CB,
    case when per.departamento ='04' then avg(ins.notaFinal) end ORU,
    case when per.departamento ='05' then avg(ins.notaFinal) end PT,
    case when per.departamento ='06' then avg(ins.notaFinal) end TJ,
    case when per.departamento ='07' then avg(ins.notaFinal) end SC,
    case when per.departamento ='08' then avg(ins.notaFinal) end BN,
    case when per.departamento ='09' then avg(ins.notaFinal) end PN
    from persona per join inscripcion ins
    on per.ci = ins.ciEstudiante
    group by per.departamento";

	$resultado=mysqli_query($conexion,$sql);

		
		echo "<table>";
		echo "<tr>";
		echo "<td>"."DEPARTAMENTO    "."</td>";
		echo "<td>"."nota promedio"."</td>";
		echo "</tr>";
		
		 while ($fila=mysqli_fetch_array($resultado)) {
		 		echo "<tr>";
				echo "<td>"."$fila[0]"."</td>";
				echo "<td>"."$fila[1]"."</td>";
				echo "</tr>";
       
    	}

    	echo "</table>";



?>

