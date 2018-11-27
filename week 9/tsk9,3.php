<?php
$makers = ["Toyota","BMW","Toyota"];
$engine = ["gas","diesel","petroleum"];
$cars = [["id"=>"0","maker"=>"Toyota","model"=>"Corolla","year"=>"2015","engine"=>"petroleum","price"=>"30000","additional"=>["tax","investment"]],["id"=>"1","maker"=>"BMW","model"=>"X5","year"=>"2012","engine"=>"gas","price"=>"25000","additional"=>["tax","investment","check"]],["id"=>"2","maker"=>"Toyota","model"=>"Camry","year"=>"2008","engine"=>"diesel","price"=>"35000","additional"=>["investment","check"]]];
$selected_car = NULL;
if (isset($_REQUEST["id"])){
	$selected_car = $cars[$_REQUEST["id"]];
}
?>

<html>
<head>
<style>
select{
  width:200px;
  background:white;
  padding:5px;
  border-radius:5px;
  color:#444444;
}
input{
  border-radius:5px;
  padding:5px;
}
input[type='text'],input[type='number']{
  width:calc(100% - 12px);
}
table tr td{
  padding:3px;
}
</style>
</head>
<form action="index3.php">

<select name="id" onchange="this.parentNode.submit()">
	<option value="-1">Select car</option>

<?php
    for($k=0;$k<count($cars);$k++){
  ?><option value="<?= $k ?>"><?php echo $cars[$k]['maker']." ".$cars[$k]['model']."(".$cars[$k]['year'].")";?></option><?php }?>

</select>
<table border="1px" cellspacing="0">
   <tr>
<td>Maker:</td><td><select name="maker">
<?php

for($i=0;$i<count($makers);$i++){
    print ' <option ';
    if($selected_car['maker']==$makers[$i]){
        print ' selected ';
    }
    print '>'.$makers[$i].'</option>';}?>
       </select></td></tr>
    <tr>
       <td>Year:</td><td><select name="year">
        <?php
        for($i=2018;$i>1999;$i--){
          print '<option ';
          if ($selected_car['year'] == $i){
            print ' selected ';
          }
          print '>'.$i.'</option>';}?>
        </select></td></tr>
    <tr>
    <td>Model:</td><td>
    <input type="text" name="model" value="<?php print $selected_car['model'] ;?>"/>

    </td></tr>
    <tr>
        <td>Engine: </td><td>
        <?php
        for($j=0;$j<count($engine);$j++){
          echo '<input type="radio" name="engine" ';
          if($selected_car['engine'] == $engine[$j]){
            echo ' checked ';
          }
          echo ' value="'.$engine[$j].'"> '.$engine[$j];
        }
      ?>
        </td></tr>
    <tr>
        <td>Price:</td><td><input type="number" name="price" value="<?php print $selected_car['price'];?>"/></td></tr>


   <tr>
        <td>Additional:</td>
        <td>
        <input type="checkbox" name="payed"<?php if($selected_car!=NULL && in_array('tax', $selected_car['additional'])){                          print ' checked ';
            } ?>> tax payed<br>
       <input type="checkbox" name="passed"<?php if($selected_car!=NULL&& in_array('check',$selected_car['additional'])){
            print ' checked ';
            } ?> > technical check passed<br>
        <input type="checkbox" name="investment"<?php if($selected_car!=NULL&&in_array('investment',$selected_car['additional'])){
            print 'checked';
            } ?> >doesn't require investment<br>
        </td>
      </tr>

    </table>
</form>
<form action="">

<?php



?>
    <input type="submit"/>
</form>
