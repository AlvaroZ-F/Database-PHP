<!DOCTYPE html>
<html>
    <!-- Formulario 4 controles -->
    <!-- subida archivo consultas -->
    <!-- sesiones, login autenticacion + guardar estado -->
    <head>
        <title>Database IT Alvaro Zambrana Fernandez</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
            crossorigin="anonymous">
        <link href="assets/CSS/style.css" rel="stylesheet">
    </head>
    <body>

        <?php

            
            $dbServername = "localhost";
            $dbUsername = "azambrana";
            $dbPassword = "fernandez79";
            $dbName = "it shop";
            $dev_name = '';
            $dev_type = '';
            $dev_desc = '';
            $dev_brand = '';
            $hard_name = '';
            $hard_desc = '';
            $hard_brand = '';
            
            // Creates a new connection under the variable called "Conn"
            $conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
            // Checks if the connection has been established and returns an error if not. Also 	informs if you're connected.
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
			    exit();
			} else {
				print("<h1>Connection has been established correctly</h1>");
			}

            if($_SERVER["REQUEST_METHOD"]=="POST"){
                echo var_dump($_POST);
            
                if($_POST["formName"] == "InsertDevices"){
                    $query_insert = "INSERT INTO pcs(name, type, description, brand) VALUES ('" . $_POST["Device_name"] . "','" . $_POST["Device_type"] . "','" . $_POST["device_description"] . "','" . $_POST["device_brand"] . "')";
                    //echo "<h1>". $query_insert ."</h1>";
			        if ($conn->query($query_insert) === TRUE) {
				        echo "New record has been created succesfully";
			        } else {
				        echo "Error: " . $query_insert . "<br>" . $conn->error;
			        }
                }
                if($_POST["formName"] == "ShowAll"){
                    //select, y pintarlo de forma cutre
                }
                if($_POST["formName"] == "ShowAll"){
                    //select, y pintarlo de forma cutre
                }
            }
        ?>

        <div>
            <form action="index.php" method="post">
                <div class="container">
                    <h2>Insert new device</h2>
                    <div class="row">
                        <div class="col-sm">
                            <input type="hidden" name="formName" value="InsertDevices">
                            <input name="Device_name" class="form-control" type="text" 
                                placeholder="Device's Name..."
                                value="<?php $dev_name //isset($_Post[Device_name]  y si existe lo pintas?>" />

                            <input name="Device_type" class="form-control" type="text"
                                placeholder="What kind of device is it?"
                                value="<?php $dev_type ?>" />

                            <input name="device_description" class="form-control" type="text"
                                placeholder="Add a description..."
                                value="<?php $dev_desc ?>" />

                            <input name="device_brand" class="form-control" type="text"
                                placeholder="Add a brand..."
                                value="<?php $dev_brand ?>" />

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">

                            <input class="btn btn-primary" type="submit" name="submit" value="Submit" id="submit" />

                            <button class="btn" type="button" id="showAllDevices">Show All</button>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">

                            <button class="btn" type="button" id="searchDevice">Search</button>

                            <input class="form-control" type="text" 
                                placeholder="Search for existing devices.." />

                        </div>
                    </div>
                </div>                
            </form>
        </div>
        <div>
            <form>
                <div class="container">
                    <h2>Insert new hardware</h2>
                    <div class="row">
                        <div class="col-sm">

                            <input class="form-control" type="text" 
                                placeholder="What kind of hardware is it?"
                                value="<?php $hard_name ?>" />

                            <input class="form-control" type="text" 
                                placeholder="Add a description..."
                                value="<?php $hard_desc ?>" />

                            <input class="form-control" type="text" 
                                placeholder="Add a brand..."
                                value="<?php $hard_brand ?>" />

                            <input type="radio" name="device" />

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">

                            <button class="btn btn-primary" type="button" id="submit">Submit</button>

                            <button class="btn" type="button" id="showAllHardware">Show All</button>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">

                            <button class="btn" type="button" id="searchHardware">Search</button>

                            <input class="form-control" type="text" 
                                placeholder="Search for existing hardware.." />

                        </div>
                    </div>
                </div>
            </form>
        </div>

           
        

        <!-- Scripts -->
        <script src="../assets/JS/script.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>