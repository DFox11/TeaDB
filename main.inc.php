<h2 align="center">The Latest Teas</h2><br>

<?php

$con = mysqli_connect("localhost", "test", "test", "teadb") or die('Sorry, could not connect to database server');

$query = "SELECT teaid,Name,Type,Rating from teas order by Rating desc limit 0,5";

$result = mysqli_query($con, $query) or die('Sorry, could not get recipes at this time ');

if (mysqli_num_rows($result) == 0)

{

   echo "<h3>Sorry, there are no teas posted at this time, please try back later.</h3>";

} else

{

   while($row=mysqli_fetch_array($result, MYSQL_ASSOC))

   {

       $teaid = $row['teaid'];

       $name = $row['Name'];

       $type = $row['Type'];

       $rating = $row['Rating'];

       echo "<a href=\"index.php?content=showrecipe&id=$teaid\">$name</a>, a $type tea.<br>\n";

       echo"Rated $rating out of 5<br><br>\n";

   }

}

?>