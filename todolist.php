
<?php
echo '<table style="width:100%">';
echo "<tr> <th>ID</th> <th>Titel</th> <th>Description</th> <th></th> <th></th></tr>";

$query="SELECT * FROM todos WHERE userid= '$user_id'";

$result = mysqli_query($con,$query) or die(mysql_error());

// loop through results of database query, displaying them in the table
$count=1;
while($row = mysqli_fetch_array( $result )) {

// echo out the contents of each row into a table

echo "<tr>";

echo '<td>' . $count++ . '</td>';

echo '<td>' . $row['titel'] . '</td>';

echo '<td>' . $row['description'] . '</td>';

echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';

echo '<td>"asdasdsad"</td>';

echo "</tr>";
}

?>

</table>

<a href="insert.php">Insert</a>

</body>
</html>