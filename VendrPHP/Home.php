<?php

$servername = "w2k12-compscidb.academia.sjfc.edu";
$username = "vendr";
$password = "vendr";
$dbname = 'vendr';
$dbport = '3306';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $dbport);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
#echo "Connected successfully <br>";

#grabbing snack types to populate sidebar
$sql = "SELECT DISTINCT ItemType FROM item";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)) {
  $types[] = $row["ItemType"];
}
#echo $types[1];

#grabbing locations
$sql = "SELECT DISTINCT Location FROM machine";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)) {
  $locations[] = $row["Location"];
}

#grabbing floors
$sql = "SELECT DISTINCT floor FROM machine";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)) {
  $floors[] = $row["floor"];
}

#grabbing drinks/snacks
$sql = "SELECT DISTINCT ItemName FROM item";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)) {
  $drinksSnacks[] = $row["ItemName"];
}
#echo $types[1];

?>
<html id="fullHD">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='../VendrCSS/Home.css' rel='stylesheet' type='text/css'>
    <link href='../VendrCSS/Navbar.css' rel='stylesheet' type='text/css'>
    <link href='../VendrCSS/Main.css' rel='stylesheet' type='text/css'>
  
  </head>
  <body>
    <div class="nav-bar">
      <div class="row">
        <div class="double-column">
          <h2 id="vendr">Vendr</h2>
        </div>
        <div class="column">
          <ul>
            <li><a class="active" href="../VendrPHP/Home.php">Home</a></li>
            <li><a href="../VendrPHP/History.php">History</a></li>
            <li><a href="../VendrPHP/Account.php">Account</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="main">
      <div class="row">
        <div class="column">
          <div class="filtering">
            <div class="category-title">Categories</div>
            <div class="items">
              <label class="container">Show All
                <input type="checkbox" onclick="toggle(this);">
                <span class="checkmark"></span>
              </label>
              <label class="container"><?php echo $types[0] ?>
                <input type="checkbox" rel="<?php echo $types[0] ?>" onchange="change();">
                <span class="checkmark"></span>
              </label>
              <label class="container"><?php echo $types[1] ?>
                <input type="checkbox" rel="<?php echo $types[1] ?>" onchange="change();">
                <span class="checkmark"></span>
              </label>
              <!--
              <label class="container">Three
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              <label class="container">Four
                <input type="checkbox">
                <span class="checkmark"></span>
              </label>
              -->
            </div>
          </div>
          <div class="filtering">
            <div class="category-title">Location
            </div>
            <div class="items">
              <label class="container"><?php echo $locations[0] ?>
                <input type="checkbox" rel="<?php echo $locations[0] ?>" onchange="change();">
                <span class="checkmark"></span>
              </label>
              <label class="container"><?php echo $locations[1] ?>
                <input type="checkbox" rel="<?php $locations[1] = str_replace(' ', '', $locations[1]); echo $locations[1]; ?>" onchange="change();">
                <span class="checkmark"></span>
              </label>
              <label class="container"><?php echo $locations[2] ?>
                <input type="checkbox" rel="<?php echo $locations[2] ?>" onchange="change();">
                <span class="checkmark"></span>
              </label>
              <label class="container"><?php echo $locations[3] ?>
                <input type="checkbox" rel="<?php echo $locations[3] ?>" onchange="change();">
                <span class="checkmark"></span>
              </label>
              <label class="container"><?php echo $locations[4] ?>
                <input type="checkbox" rel="<?php echo $locations[4] ?>" onchange="change();">
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
          <div class="filtering">
            <div class="category-title">Drinks</div>
            <div class="items">
              <label class="container"><?php echo $drinksSnacks[0] ?>
                <input type="checkbox" rel="<?php echo $drinksSnacks[0] ?>" onchange="change();">
                <span class="checkmark"></span>
              </label>
              <label class="container"><?php echo $drinksSnacks[1] ?>
                <input type="checkbox" rel="<?php echo $drinksSnacks[1] ?>" onchange="change();">
                <span class="checkmark"></span>
              </label>
              <label class="container"><?php echo $drinksSnacks[2] ?>
                <input type="checkbox" rel="<?php echo $drinksSnacks[2] ?>" onchange="change();">
                <span class="checkmark"></span>
              </label>
              <label class="container"><?php echo $drinksSnacks[3] ?>
                <input type="checkbox" rel="<?php echo $drinksSnacks[3] ?>" onchange="change();">
                <span class="checkmark"></span>
              </label>
              <label class="container"><?php echo $drinksSnacks[9] ?>
                <input type="checkbox" rel="<?php echo $drinksSnacks[9] ?>" onchange="change();">
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
          <div class="filtering">
            <div class="category-title">Snacks</div>
            <div class="items">
              <label class="container"><?php echo $drinksSnacks[4] ?>
                <input type="checkbox" rel="<?php echo $drinksSnacks[4] ?>" onchange="change();">
                <span class="checkmark"></span>
              </label>
              <label class="container"><?php echo $drinksSnacks[5] ?>
                <input type="checkbox" rel="<?php echo $drinksSnacks[5] ?>" onchange="change();">
                <span class="checkmark"></span>
              </label>
              <label class="container"><?php echo $drinksSnacks[6] ?>
                <input type="checkbox" rel="<?php echo $drinksSnacks[6] ?>" onchange="change();">
                <span class="checkmark"></span>
              </label>
              <label class="container"><?php echo $drinksSnacks[7] ?>
                <input type="checkbox" rel="<?php echo $drinksSnacks[7] ?>" onchange="change();">
                <span class="checkmark"></span>
              </label>
              <label class="container"><?php echo $drinksSnacks[8] ?>
                <input type="checkbox" rel="<?php echo $drinksSnacks[8] ?>" onchange="change();">
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
        </div>

        <div class="quad-column">
          <div class="machines">
            <div class="row">
              <div class="machine <?php echo $locations[0] ?> Drink Pepsi Coke Sprite Fanta">
                <a href="../VendrPHP/SalernoMachine.php">
                  <div class="column">
                    <img src="../VendrIMG/machine.png" alt="Machine">
                    <label class="machine-title"><?php echo $locations[0] ?></label>
                    <label class="machine-floor">Floor: <?php echo $floors[0] ?></label>
                  </div>
                </a>
              </div>
              <div class="machine <?php $locations[1] = str_replace(' ', '', $locations[1]); echo $locations[1]; ?> Drink Pepsi Coke Sprite WhiteClaw">
                <a href="../VendrPHP/CampusCenterMachine.php">
                  <div class="column">
                    <img src="../VendrIMG/machine.png" alt="Machine">
                    <label class="machine-title"><?php echo $locations[1] ?></label>
                    <label class="machine-floor">Floor: <?php echo $floors[1] ?></label>
                  </div>
                </a>
              </div>
              <div class="machine <?php echo $locations[2] ?> Drink Pepsi Coke Fanta WhiteClaw">
                <a href="../VendrPHP/FoundersMachine.php">
                  <div class="column">
                    <img src="../VendrIMG/machine.png" alt="Machine">
                    <label class="machine-title"><?php echo $locations[2] ?></label>
                    <label class="machine-floor">Floor: <?php echo $floors[0] ?></label>
                  </div>
                </a>
              </div>
              <div class="machine <?php echo $locations[3] ?> Snack Lays Gummies Fritos Cookies">
                <a href="../VendrPHP/PharmacyMachine.php">
                  <div class="column">
                    <img src="../VendrIMG/machine.png" alt="Machine">
                    <label class="machine-title"><?php echo $locations[3] ?></label>
                    <label class="machine-floor">Floor: <?php echo $floors[0] ?></label>
                  </div>
                </a>
              </div>
              <div class="machine <?php echo $locations[4] ?> Snack Lays Gummies Poptart Cookies">
                <a href="../VendrPHP/KearnyMachine.php">
                  <div class="column">
                    <img src="../VendrIMG/machine.png" alt="Machine">
                    <label class="machine-title"><?php echo $locations[4] ?></label>
                    <label class="machine-floor">Floor: <?php echo $floors[0] ?></label>
                  </div>
                </a>
              </div>
              <div class="machine <?php echo $locations[0] ?> Snack Lays Gummies Fritos Poptart">
                <a href="../VendrPHP/SalernoBMachine.php">
                  <div class="column">
                    <img src="../VendrIMG/machine.png" alt="Machine">
                    <label class="machine-title"><?php echo $locations[0] ?></label>
                    <label class="machine-floor">Floor: <?php echo $floors[1] ?></label>
                  </div>
                </a>
              </div>
            </div>          
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="../VendrJS/Home.js"></script>
</html>
