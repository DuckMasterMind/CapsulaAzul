<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css\logon.css">
    <title>Logon Form</title>
</head>

<?php
        $servername = "localhost";
        $serveruser = "root";
        $serverpassword = "";
        $dbname = "capsula_azul";
        //Guardar variables usuario
        $correo = $password = $username = "";
        //Variable tabla
        // $insertSQL = "CREATE TABLE `userPagWeb`(
        //     `USUARIO` varchar(255) DEFAULT NULL,
        //     `CONTRASENA` varchar(255) DEFAULT NULL,
        //     `EMAIL` varchar(255) DEFAULT NULL,)";
        // Crear conexio
        $conn = mysqli_connect($servername, $serveruser, $serverpassword, $dbname);
        // Assegurar conexio
        if (!$conn) {
            echo "Connection usuccessful";
            die("Connection failed: " . mysqli_connect_error());
            
        }
        else{
            echo "Connected successfully";
        //mysqli_query($conn, $insertSQL);
               // Crear tabla
              /* $sql = "CREATE TABLE userpagweb (
                usernameuser varchar(255) PRIMARY KEY,
                passworduser VARCHAR(255) NOT NULL,
                emailuser VARCHAR(255) NOT NULL,
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
               if ($conn->query($sql) === TRUE) {
                   echo "Table created successfully";
               } 
               else{
                
                   echo "Error creating table: " . $conn->error;
               }*/

        } 
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = test_input($_POST["username"]);
            $email = test_input($_POST["email"]);
            $password = test_input($_POST["password"]);
            
            $sqlINSERT = "INSERT INTO userpagweb (usernameuser, passworduser, emailuser) VALUES('$username', '$password', '$email')";
        
            if (mysqli_query($conn, $sqlINSERT)) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $sqlINSERT . "<br>" . $conn->error;
              }
            echo $email;
            echo $password;
            echo $username;

        }
        else{
            echo " caca";
        }
        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>

<body>
    <center>
    <div class="logon">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <center><h2 class="title_logon">Log on</h2></center>
            <table>
                <tr>
                    <td colspan="2"><label for="username">Nombre de usuario:</label> <br>
                        <center><input type="text" name="username" id="username" value="" placeholder="Escribe tu nombre de usuario:"></center>
                    <hr>
                </td>
                </tr>
                <tr>
                    <td colspan="2"><label for="email">Correo:</label> <br>
                        <center><input type="email" name="email" id="email" value="" placeholder="Escribe tu correo electronico:"></center>
                    <hr>
                </td>
                <tr>
                    <td colspan="2"><label for="password">Contraseña:</label> <br>
                        <center><input type="password" name="password" id="password" value="" placeholder="Escribe tu contraseña:"></center>
                    <hr>
                </td>
                </tr>
                <tr align="center">
                    <td><input type="submit" name="submit" class="i_submit"></td>
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