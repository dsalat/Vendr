<?php

$servername = "10.200.2.17";
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
$sql = "SELECT item.ItemID,item.ItemPrice,item.ItemName,inventory.Quanity
FROM item ,inventory
WHERE  item.ItemID =inventory.ItemID AND inventory.MachineID = 6;";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)) {
  $itemID[] = $row["ItemID"];
  $itemPrice[] = $row["ItemPrice"];
  $itemName[] = $row["ItemName"];
  $inventroy[] = $row["Quanity"];
}
function itemImagePuller($item){
  if($item =='Pepsi'){
    echo' <img src="../VendrIMG/pepsi.png" alt="pepsi">';
  }elseif($item == 'Coke'){
    echo' <img src="../VendrIMG/coke.jpg" alt="pepsi">';
  }elseif($item == 'Sprite'){
    echo' <img src="../VendrIMG/sprite.png" alt="pepsi">';
  }elseif($item == 'Fanta'){
    echo' <img src="../VendrIMG/fanta.jpg" alt="pepsi">';
  }elseif($item == 'Lays'){
    echo' <img src="../VendrIMG/lays.jpg" alt="pepsi">';
  }elseif($item == 'Gummies'){
    echo' <img src="../VendrIMG/gummies.jpg" alt="pepsi">';
  }elseif($item == 'Fritos'){
    echo' <img src="../VendrIMG/fritos.jpg" alt="pepsi">';
  }elseif($item == 'Poptart'){
    echo' <img src="../VendrIMG/poptart.jpg" alt="pepsi">';
  }elseif($item == 'Cookies'){
    echo' <img src="../VendrIMG/cookies.jpg" alt="pepsi">';
  }elseif($item == 'WhiteClaw'){
    echo' <img src="../VendrIMG/whiteclaw.jpg" alt="pepsi">';
  }else{
    echo'you fd up the function call bro';
  }
}
#testing to see if we can have PHP inside a form, that only sends on click
;
  if(isset($_POST['checkout'])){
    $sql = "INSERT INTO cart (CartID, UserID, ItemID, CartItemQuanity) VALUES ('1', '2',$itemID[2],'$_POST[test]');";
    mysqli_query($conn,$sql);
  }

setcookie("itemOne",$itemID[0]);
setcookie("itemTwo",$itemID[1]);
setcookie("itemThree",$itemID[2]);
setcookie("itemFour",$itemID[3]);
setcookie("machineID", 2);

?>

<html id="fullHD">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='../VendrCSS/Machine.css' rel='stylesheet' type='text/css'>
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
        <div class="item-double-column">
          <div class="item-module">
            <div class="row">
              <div class="item">
                <div class="column">
                  <?php itemImagePuller($itemName[0]);     ?>
                  <input class="item-quant" type="number" placeholder="0" step="1" min="0" max="10" id="number" onclick='quantUpdaterItem1()'>
                  <label class="item-price" id='itemPriceOne'><?php echo $itemPrice[0]?></label>
                  <label class="item-counter"><?php echo $inventroy[0]?></label>
                </div>
              </div>
              <div class="item">
                <div class="column">
                <?php itemImagePuller($itemName[1]);     ?>
                  <input class="item-quant" type="number" placeholder="0" step="1" min="0" max="10" id="number1" onclick='quantUpdaterItem2()'>
                  <label class="item-price" id='itemPriceTwo'><?php echo $itemPrice[1]?></label>
                  <label class="item-counter"><?php echo $inventroy[1]?></label>
                </div>
              </div>
              <div class="item">
                <div class="column">
                <?php itemImagePuller($itemName[2]);     ?>
                  <input class="item-quant" type="number" placeholder="0" step="1" min="0" max="10" id="number2" onclick='quantUpdaterItem3()'>
                  <label class="item-price" id='itemPriceThree'><?php echo $itemPrice[2]?></label>
                  <label class="item-counter"><?php echo $inventroy[2]?></label>
                </div>
              </div>
              <div class="item">
                <div class="column">
                <?php itemImagePuller($itemName[3]);     ?>
                  <input class="item-quant" type="number" placeholder="0" step="1" min="0" max="10" id="number3" onclick= 'quantUpdaterItem4()'>
                  <label class="item-price" id='itemPriceFour'><?php echo $itemPrice[3]?></label>
                  <label class="item-counter"><?php echo $inventroy[3]?></label>
                </div>
              </div>
            </div>
          </div>

          <div class="item-module">
          
            <div class="row">
         
              <div class="item">
                
                <div class="column">
                <!--
                  <img src="../VendrIMG/pepsi.png" alt="pepsi">
                  <input type="number" placeholder="0" step="1" min="0" max="10" id="number">
                  <label class="item-price">$4</label>
                  <label class="item-counter">x4</label>
                    -->
                </div>
              </div>
              <div class="item">
                <div class="column">
                   <!--
                  <img src="../VendrIMG/pepsi.png" alt="pepsi">
                  <input type="number" placeholder="0" step="1" min="0" max="10" id="number">
                  <label class="item-price">$4</label>
                  <label class="item-counter">x4</label>
                    -->
                </div>
              </div>
              <div class="item">
                <div class="column">
                   <!--
                  <img src="../VendrIMG/pepsi.png" alt="pepsi">
                  <input type="number" placeholder="0" step="1" min="0" max="10" id="number">
                  <label class="item-price">$4</label>
                  <label class="item-counter">x4</label>
                    -->
                </div>
              </div>
              <div class="item">
                <div class="column">
                   <!--
                  <img src="../VendrIMG/pepsi.png" alt="pepsi">
                  <input type="number" placeholder="0" step="1" min="0" max="10" id="number">
                  <label class="item-price">$4</label>
                  <label class="item-counter">x4</label>
                    -->
                </div>
                
              </div>
             
            </div>
           
          </div>
          <div class="item-module">
         
            <div class="row">
              <div class="item">
                <div class="column">
                   <!--
                  <img src="../VendrIMG/pepsi.png" alt="pepsi">
                  <input type="number" placeholder="0" step="1" min="0" max="10" id="number">
                  <label class="item-price">$4</label>
                  <label class="item-counter">x4</label>
                    -->
                </div>
              </div>
              <div class="item">
                <div class="column">
                   <!--
                  <img src="../VendrIMG/pepsi.png" alt="pepsi">
                  <input type="number" placeholder="0" step="1" min="0" max="10" id="number">
                  <label class="item-price">$4</label>
                  <label class="item-counter">x4</label>
                    -->
                </div>
              </div>
              <div class="item">
                <div class="column">
                   <!--
                  <img src="../VendrIMG/pepsi.png" alt="pepsi">
                  <input type="number" placeholder="0" step="1" min="0" max="10" id="number">
                  <label class="item-price">$4</label>
                  <label class="item-counter">x4</label>
                    -->
                </div>
              </div>
              <div class="item">
                <div class="column">
                   <!--
                  <img src="../VendrIMG/pepsi.png" alt="pepsi">
                  <input type="number" placeholder="0" step="1" min="0" max="10" id="number">
                  <label class="item-price">$4</label>
                  <label class="item-counter">x4</label>
                    -->
                </div>
              </div>
            </div>
          </div>
         
        </div>

          <div class="cart-column">
            <label class="item-counter">Added to Cart</label>
            <form action="Confirmation.php" method="post">
            <div class="cart-module-row">
              <div class="column">
                <div class="cart-item-row">
                  <p class="cart-item-name" id='itemOne'>
                    <?php echo $itemName[0]; ?>
                  </p>

                  <p class="cart-item-quantity" id='item1Inventory'> </p>

                  <p class="cart-item-price">
                  <?php echo $itemPrice[0]; ?>
                  </p>

                </div>
                <div class="cart-item-row">
                  <p class="cart-item-name" id='itemTwo'>
                      <?php echo $itemName[1]; ?>
                  </p>

                  <p class="cart-item-quantity" id='item2Inventory'> </p>

                  <p class="cart-item-price">
                  <?php echo $itemPrice[1]; ?>
                  </p>

                </div>
                <div class="cart-item-row">
                  <p class="cart-item-name" id='itemThree'>
                    <?php echo $itemName[2]; ?>
                  </p>

                  <p class="cart-item-quantity" id='item3Inventory'> </p>

                  <p class="cart-item-price">
                  <?php echo $itemPrice[2]; ?>
                  </p>

                </div>
                <div class="cart-item-row">
                  <p class="cart-item-name" id='itemFour'>
                    <?php echo $itemName[3]; ?>
                  </p>

                  <p class="cart-item-quantity" name="" id='item4Inventory'> </p>
<p name ="test"> 2 </p>
                  <p class="cart-item-price">
                  <?php echo $itemPrice[3]; ?>
                  </p>

                </div>
              </div>
            </div>
            
            <div class="total-row">
              <p class="total">
                Total
              </p>
              <p class="total-price" id="totalPrice">

              </p>
            </div>
            <div class="total-row">
              <p class="total">
                Total # of Items 
              </p>
              <p class="total-price" id="totalItems">

              </p>
            </div>
            <input type="submit" id="pay" name= "checkout" value="Checkout">
           
            </form>
            <br />
          </div>
      </div>
    </div>   
    <script type="text/javascript">
     var itemPriceOne = <?php echo $itemPrice[0]; ?>;
     var itemPriceTwo = <?php echo $itemPrice[1]; ?>;
     var itemPriceThree = <?php echo $itemPrice[2]; ?>;
     var itemPriceFour = <?php echo $itemPrice[3]; ?>;
    </script>
    <script type="text/javascript" src="../VendrJS/Cart.js"></script>
  </body>
</html>