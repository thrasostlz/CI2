<?php 

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'consultorio2';
$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
die("Conexion fallida: " . mysqli_connect_error());
}




// Consulta para obtener todos los datos de una tabla
$sql = "SELECT * FROM Agenda INNER JOIN Usuarios ON Usuarios.ID_Usuario = Agenda.Agente";

// Ejecuta la consulta
$result = mysqli_query($conn, $sql);

// Verifica si hay resultados
if (mysqli_num_rows($result) > 0) {
    // Muestra los datos
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["ID_Cita"] . " - Nombre: " . $row["Nombre"] . " - Permisos: ".$row["Permisos"]."<br>";
    }
} else {
    echo "No se encontraron resultados.";
}

// Cierra la conexión
mysqli_close($conn);






 ?>