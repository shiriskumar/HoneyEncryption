<?php
echo "<body style='background-color:black' background-repeat: repeat>";
echo "<table style='width:100%'><tr><td><center><font color=white size=5>Knowledge Is Free.</br>We Are Anonymous.</br>We Are Legion.</br></br>We Do Not Forgive.</br>We Do Not Forget.</br>Expect Us.</font></center></td><td><img src='images/1.jpg' alt='Anonymous_image' style='width:304px;height:228px'></td></tr></table>";
echo '</br></br><center><font color = green>To Decrypt Passwords on AWS</font><FORM METHOD="LINK" ACTION="transfer">
<INPUT TYPE="submit" VALUE="Click Here">
</FORM></center></br>';
echo "<table style='border: solid 1px green;'>";
echo "<tr>
		<th><font color=green>S.No</font></th>
		<th><font color=green>Password 1</font></th>
		<th><font color=green>Password 2</font></th>
		<th><font color=green>Password 3</font></th>
		<th><font color=green>Password 4</font></th>
		<th><font color=green>Password 5</font></th>
		<th><font color=green>Password 6</font></th>
		<th><font color=green>Password 7</font></th>
		<th><font color=green>Password 8</font></th>
		<th><font color=green>Password 9</font></th>
		<th><font color=green>Password 10</font></th>
		<th><font color=green>Password 11</font></th>
		<th><font color=green>Password 12</font></th>
		<th><font color=green>Password 13</font></th>
		<th><font color=green>Password 14</font></th>
		<th><font color=green>Password 15</font></th>
		<th><font color=green>Password 16</font></th>
		<th><font color=green>Password 17</font></th>
		<th><font color=green>Password 18</font></th>
		<th><font color=green>Password 19</font></th>
		<th><font color=green>Password 20</font></th>
	</tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid green;'><font color=green>" . parent::current(). "</font></td>";
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
    $stmt = $conn->prepare("SELECT * FROM hw_password"); 
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
echo '</table></body>';
?>