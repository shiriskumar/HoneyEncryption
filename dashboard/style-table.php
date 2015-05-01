<html>
<head>
<link rel="stylesheet" type="text/css" media="screen" href="css/css-table.css" />

</head>

<body>

<table id="Analytics">

	<caption>HoneyDev. Analytics</caption>
    
    <thead>    
    	<tr>
            <th scope="col" rowspan="2">S.No.</th>
            <th scope="col" colspan="3">Detailed Information</th>
        </tr>
        
        <tr>
            <th scope="col">Operating System</th>
            <th scope="col">Browser</th>
            <th scope="col">IP Address</th>
        </tr>        
    </thead>
    
    <tfoot>
		<?php
			class TableRows extends RecursiveIteratorIterator { 
				function __construct($it) { 
					parent::__construct($it, self::LEAVES_ONLY); 
				}

				function current() {
					return "<td style='width:150px;border:1px solid grey;'>" . parent::current(). "</td>";
				}

				function beginChildren() { 
					echo "<tr>"; 
				} 

				function endChildren() { 
					echo "</tr>" . "\n";
				} 
			} 
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "honeydev";

			try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $conn->prepare("SELECT * FROM analytics"); 
				$stmt->execute();

				// set the resulting array to associative
				$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
				foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
					echo $v;
				}
			}
			catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
			$conn = null;
		?>
    </tfoot>
    </tbody>

</table>

<p>Shiris Kumar</p>
<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="js/style-table.js"></script>
<script type="text/javascript" src="js/style-table.js"></script>
</body>
</html>