<html>
	<head>
	</head>
	<body>

		<?php
			
			try {
				$base = new PDO('mysql:host=localhost; dbname=it shop', 'root', '');
				echo "Connection has been successful";
			} catch(Exception $e) {
				die("Error: " . $e->GetMessage());
			}

			$results = $base->query('SELECT * FROM pcs ORDER BY id');

			while ($register = $results->fetch(PDO::FETCH_ASSOC)){
				echo "</br>id: " . $register['id'] . "</br>";
				echo "name: " . $register['name'] . "</br>";
				echo "type: " . $register['type'] . "</br>";
				echo "description: " . $register['description'] . "</br>";
				echo "brand: " . $register['brand'] . "</br>";
			}

			print($base->query('SELECT id FROM pcs WHERE id=1'));

		?>
	
	</body>
</html>