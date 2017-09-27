<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<h2>Input New Tea</h2>
<div id="form">
    <form method=post>
    Name:<input type="text" name="name" size="30" value="">*<br />
    Type:<input type="text" name="type" size="30" value="">*<br />
    Country:<input type="text" name="country" size="20" value=""><br />
    Region:<input type="text" name="region" size="20" value=""><br />
    Flavors:<input type="text" name="flavors" size="40" value="">*<br />
    Rating:<input type="text" name="rating" size="5" value="">* out of 5<br />
    Source:<input type="text" name="source" size="30" value="">*<br />
    Steeping:<input type="text" name="steeping" size="40" value="">*<br />
    <br />
    <input type=submit name="submit" value="Submit">
    </form><br />
</div>
<div>
    <?php
        if (isset($_REQUEST["submit"])) {
            $name = $_REQUEST["name"];
            $type = $_REQUEST["type"];
            $country = $_REQUEST["country"];
            $region = $_REQUEST["region"];
            $flavors = $_REQUEST["flavors"];
            $rating = $_REQUEST["rating"];
            $source = $_REQUEST["source"];
            $steeping = $_REQUEST["steeping"];

            $con = mysqli_connect("localhost", "test", "test", "teadb") or die('Sorry, could not connect to database server');
            $query = "INSERT INTO `teas` (Name, Type, Country, Region, Flavors, Rating, Source, Steeping) "
            . "VALUES ('$name', '$type', '$country', '$region', '$flavors', '$rating', '$source', '$steeping')";

            $result = mysqli_query($con, $query);
            if ($result) {
                echo "Successfully added new tea.<br>\n";
            } else {
                echo "Query unsuccessful for some reason...<br>\n";
            }
        }
    ?>
</div>
<?php

if (!isset($_REQUEST['content'])) {
    include("main.inc.php");
} else {
    $content = $_REQUEST['content'];
    $nextpage = $content . ".inc.php";
    include($nextpage);
}

?>
</body>
</html>