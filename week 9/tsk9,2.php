<html>
<head>
<style>
select{
  width:100%;
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

<form action="submit.php">
   <table border="1px" cellspacing="0">
   <tr>
<td>Maker:</td><td><select name="maker"><option></option>
<?php
$makers = ["Toyota","BMW","Mercedes"];
$engine = ["gas","diesel","petroleum"];
for($i=0;$i<count($makers);$i++){
?><option><?php echo $makers[$i];?></option><?php }?>
       </select></td></tr>
    <tr>
       <td>Year:</td><td><select name="year"><option></option>
        <?php
for($i=2018;$i>1990;$i--){
?><option><?php echo $i;?></option><?php }?>
        </select></td></tr>
    <tr>
    <td>Model:</td><td><input type="text" name="model" value="">

    </td></tr>
    <tr>
        <td>Engine: </td><td><?php
        for($j=0;$j<count($engine);$j++){
            ?><input type="radio" name="engine" value="<?php echo $engine[$j]?>"><?= $engine[$j]?><?php }?>
        </td></tr>
    <tr>
    <td>Price:</td><td><input type="number" name="price"></td></tr>
       <tr><td>Additional:</td><td><input type="checkbox" name="payed">tax payed<br>
    <input type="checkbox" name="passed">technical check passed<br>
    <input type="checkbox" name="require">doesn't require investemt<br></td></tr>

    </table>
    <input type="submit"/>
</form>
