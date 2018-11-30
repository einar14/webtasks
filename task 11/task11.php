<?php
$cars = [["id"=>1,"maker"=>"Toyota","model"=>"Camry 50","price"=>30000],["id"=>2,"maker"=>"Mercedes","model"=>"C 100","price"=>20000],["id"=>3,"maker"=>"Daewoo","model"=>"Nexia","price"=>15000],["id"=>4,"maker"=>"Mercedes","model"=>"S 500","price"=>27000]];
$basket = null;
if (isset($_COOKIE["basket"])){
	$basket = json_decode($_COOKIE["basket"]);
}
else{
	$basket = [];
}
for($i=0;$i<count($cars);$i++){
    print "<p>".$cars[$i]['maker']." ".$cars[$i]['model']."";
    if (!in_array($cars[$i]['id'], $basket))
            echo "<a href = 'index2BadToBasket.php?id=".$cars[$i]['id']."'> Add to basket</a></p>";
        else
            echo "<span> Already in basket</span>";

}
echo "<h1> In Basket </h1><br>";
    if (count($basket) == 0) {
        echo "There is no items in basket";
    }
    else {
        echo "Items with id: ";
        echo $basket[0];
        for ($i=1; $i <count($basket); $i++) {
            echo ", " . $basket[$i];
        }
    }
?>
