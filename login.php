<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css\login.css">
    <title>Login Form</title>
</head>

<?php
session_start();

// Connexión a la base de datos
$servername = "10.0.3.150";
$serveruser = "root";
$serverpassword = "";
$dbname = "capsula_azul";
$conn = mysqli_connect($servername, $serveruser, $serverpassword, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);

    // Consulta para obtener la contraseña almacenada en la base de datos
    $sql = "SELECT usernameuser, passworduser FROM userpagweb WHERE usernameuser = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($usernameuser, $stored_password);
    $stmt->fetch();
    $stmt->close();

    // Verificar si las credenciales son válidas
    if ($password === $stored_password) {
        $_SESSION["username"] = $usernameuser;
        header("Location: index.html");
        exit();
    } else {
        $error = "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
        echo '<script>alert("Contraseña erronea")</script>';
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*$correo = $password = "";
//connexio base de dades
        $servername = "localhost";
        $serveruser = "root";
        $serverpassword = "";
        $dbname = "capsula_azul";
$conn = mysqli_connect($servername, $serveruser, $serverpassword, $dbname);

if (!$conn) {
    echo "Connection usuccessful";
    die("Connection failed: " . mysqli_connect_error());
    
}
else{
    echo "Connected successfully";

}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);

  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

    $sqlVALIDATE = "SELECT usernameuser, passworduser FROM userpagweb ";
    $result = $conn->query($sqlVALIDATE);

    if ($result) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "Username: " . $row["usernameuser"]. " - Password: " . $row["passworduser"];
        }
      } else {
        echo "0 results";
      }

        // Verificar si las credenciales son válidas
        if (password_verify( "username", $password)) {
            // Iniciar sesión y redirigir a la página de inicio
            $_SESSION[ "username" ] = $usernameuser;
            header("Location: index.html");
            exit();
        } else {
            // Mostrar mensaje de error si las credenciales son incorrectas
            $error = "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
        }*/
?>

<body>
    <center>
    <div class="login">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <center><h2 class="title_login">Log in</h2></center>
            <table>
                <tr>
                    <td colspan="2"><label for="username">Correo:</label> <br>
                        <center><input type="text" name="username" id="username" value="" placeholder="Escribe tu nombre de usuario:"></center>
                    <hr>
                </td>
                </tr>
                <tr>
                    <td colspan="2"><label for="password">Contraseña:</label> <br>
                        <center><input type="password" name="password" id="password" value="" placeholder="Escribe tu contraseña:"></center>
                    <hr>
                </td>
                    
                </tr>
                <tr align="center">
                    <td><input type="submit" name="submit" class="i_submit" onclick="errorgigantesco"></td>
                    <!-- <td><input class="i_reset"  type="reset"></td>  -->
                </tr>
            </table>
        </form>
    </div>

    </center>


    <div class="dropdown">
        <button class="dropbtn">Dropdown</button>
        <div class="dropdown-content">
          <a href="#">Link 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
      </div>

<footer>
        <ul>
            <li>Contacto:</li> 
            <li>Farmacias</li>
            <li>Ayuda:</li>
        </ul>
        <ul>
            <li>Capsula Azul</li> 
            <li>About</li>
        </ul>
</footer>
</body>
</html>