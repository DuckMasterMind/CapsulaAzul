<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/logon.css">
    <style>
        .logon {
    margin-top: 5em; 
 
    background-color: white;  
    width: 30em;  
    padding-top: 5em; 
    padding-bottom: 10em;  
    box-shadow: 8px 8px 16px 8px rgba(0, 0, 0, 0.354);
}

label {
    font-size: x-large;
    font-family: Arial, Helvetica, sans-serif;
}

h2 {
    font-size: xx-large;
}

input {
    height: 2.5em;
    width: 22em;
    padding: 0.2em;
    margin-top: 0.5em;
    border-style: none;
    font-size: large;
    
}
input:focus{
    outline: none;
}

input:required { 
   font-size: xx-large;
    
} 
input::placeholder {
    font-size: large;
    
}
input::content {
    font-size: large;
}

.i_reset {
   padding: 0.3em;
   border-radius: 0em;
   border-style: none;
   background-color: rgb(240, 248, 255);
}
.i_submit {
    padding: 0.3em;
    border-radius: 0em;
    border-style: none;
    width: 20em;
    height: 3em;
    font-size: large;
    
    
}
.i_submit:hover {
    background-color: rgb(21,87,114);
    
    
}

footer {
    background-color: rgb(70, 70, 70);
    margin-top: 10%;
    height: 10em;
    display: block;
}
li {
    color: white;
}
ul {
    margin-left: 10em;
    display: inline-block;

}
body{
    background: rgb(21,87,114);
background: linear-gradient(90deg, rgba(21,87,114,1) 0%, rgba(0,54,79,1) 50%, rgba(21,87,114,1) 100%);
}

/* lllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll  */
.dropbtn {
    background-color: #04AA6D;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
  }
  
  .dropdown {
    position: relative;
    display: inline-block;
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
  
  .dropdown-content a:hover {background-color: #ddd;}
  
  .dropdown:hover .dropdown-content {display: block;}
  
  .dropdown:hover .dropbtn {background-color: #3e8e41;}

  /* llllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll  */

@media only screen and (max-width: 1000px) { 

    .logon {
        margin-top: 5em; 
        background-color: white;  
        width: 50em;  
        height: 50em;
        padding-top: 5em; 
        padding-bottom: 10em;  
        box-shadow: 8px 8px 16px 8px rgba(0, 0, 0, 0.354);
    }
    
    .title_logon {
        font-size: 20em;
        
    }
    
    h2 {
        font-size: 5em;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    
    input {
        height: 6em;
        width: 35em;
        padding: 0.2em;  
        margin-top: 0.5em;
        border-style: none;
        font-size: large;
        
    }
    input:focus{
        outline: none;
    }
    
    input:required { 
       font-size: xx-large;
        
    } 
    input::placeholder {
        font-size: 2em;
        
    }
    
    
    
    .i_submit {
        padding: 0.3em;
        border-radius: 0em;
        border-style: none;
        width: 40em;
        height: 7em;
        font-size: large;
        
        
    }
    .i_submit:hover {
        background-color: rgb(21,87,114);
        
        
    }
    
    footer {
        background-color: rgb(70, 70, 70);
        margin-top: 55%;
        height: 11em;
        display: block;
        margin-left: -1em;
    }
    li {
        color: white;
    }
    ul {
        margin-left: 10em;
        display: inline-block;
    
    }
}



    </style>
    <title>Logon Form</title>
</head>

<?php
        $servername = "localhost";
        $serveruser = "root";
        $serverpassword = "";
        $dbname = "capsula_azul";
        //Guardar variables usuario
        $correo = $password = $username = "";
        // Crear conexio
        $conn = mysqli_connect($servername, $serveruser, $serverpassword, $dbname);
        // Assegurar conexio
        if (!$conn) {
            echo "Connection usuccessful";
            die("Connection failed: " . mysqli_connect_error());
            
        }
        else{
        //    echo "Connected successfully";
        } 
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = test_input($_POST["username"]);
            $email = test_input($_POST["email"]);
            $password = test_input($_POST["password"]);
            
            $sqlINSERT = "INSERT INTO userpagweb (usernameuser, passworduser, emailuser) VALUES('$username', '$password', '$email')";
        
            if (mysqli_query($conn, $sqlINSERT)) {
                echo "<script>alert('Cuenta creada correctamente')</script>";
              } else {
                echo "Error: " . $sqlINSERT . "<br>" . $conn->error;
              }
            //echo $email;
            //echo $password;
            //echo $username;

        }
        else{
        //    echo " caca";
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