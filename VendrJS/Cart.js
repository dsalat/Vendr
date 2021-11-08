
var x = document.getElementsByClassName("cart-item-row");

function quantUpdaterItem1() {
    var x = document.getElementById("number").value;
    document.getElementById("item1Inventory").innerHTML = 'x' + x ;

    var price = document.getElementsByClassName("cart-item-price");

    price[0].innerText = itemPriceOne * x;

    findTotal();
  }
  
  function quantUpdaterItem2() {
    var y = document.getElementById("number1").value;
    document.getElementById("item2Inventory").innerHTML = 'x' + y ;

    var price = document.getElementsByClassName("cart-item-price");

    price[1].innerText = itemPriceTwo * y;
    findTotal();
  }
  
  function quantUpdaterItem3() {
    var z = document.getElementById("number2").value;
    document.getElementById("item3Inventory").innerHTML = 'x' + z ;

    var price = document.getElementsByClassName("cart-item-price");

    price[2].innerText = itemPriceThree * z;

    findTotal();
  }
  
  function quantUpdaterItem4() {
    var a = document.getElementById("number3").value;
    a = parseInt(a,10);
    console.log(typeof a);
    document.getElementById("item4Inventory").innerHTML = 'x' + a ;

    var price = document.getElementsByClassName("cart-item-price");

    price[0].innerText = itemPriceFour * a;
    findTotal();
  }
  
  function findTotal(){

    var itemOne = document.getElementById('number').value;
    var itemTwo = document.getElementById('number1').value;
    var itemThree = document.getElementById('number2').value;
    var itemFour = document.getElementById('number3').value;
    
    if(itemOne > 0){       
        x[0].style.display = "flex"; 
        itemOne = document.getElementById('number').value;
    } else if(itemOne == "" || itemOne == 0){
        itemOne = "0";
        x[0].style.display = "none";
    }
    
    if(itemTwo > 0){
        x[1].style.display = "flex";
        itemTwo = document.getElementById('number1').value;
    } else if(itemTwo == "" || itemTwo == 0){
        itemTwo = "0";
        x[1].style.display = "none";
    }
    
    if(itemThree > 0){
        x[2].style.display = "flex";
        itemThree = document.getElementById('number2').value;
    } else if(itemThree == "" || itemThree == 0){
        itemThree = "0";
        x[2].style.display = "none";
    }
    
    if(itemFour > 0){
        x[3].style.display = "flex";
        itemFour = document.getElementById('number3').value;
    } else if(itemFour == "" || itemFour == 0){
        itemFour = "0";
        x[3].style.display = "none";
    }
  
    itemOne = parseFloat(itemOne);
    itemTwo = parseFloat(itemTwo);
    //console.log(itemOne+itemTwo);
    itemThree = parseFloat(itemThree);
    itemFour = parseFloat(itemFour);
  
    var total = (itemOne*itemPriceOne) + (itemTwo*itemPriceTwo) + (itemThree*itemPriceThree) + (itemFour*itemPriceFour);
    console.log(total);
    
    var totalItems = itemOne + itemTwo + itemThree + itemFour;
    //console.log(typeof totalItems);
    console.log(itemOne);
    document.getElementById('totalPrice').innerHTML = total;
    document.getElementById('totalItems').innerHTML=" " + totalItems;
    //load it into the cookies. 
    setCookie('total', total, 1);
    setCookie('totalItems', totalItems, 1);

    setCookie('numItemOne', itemOne, 1);
    setCookie('numItemTwo', itemTwo, 1);
    setCookie('numItemThree', itemThree, 1);
    setCookie('numItemFour', itemFour, 1);
   

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
  }