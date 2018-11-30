<?php
    $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'mydatabase');

         if(! $conn ){
            die('Could not connect: ' . mysqli_error());
         }

         if(isset($_GET['delete'])){
             $sql = "DELETE FROM cars WHERE id=".$_GET['delete'];
	         $result = mysqli_query($conn,$sql);
         }

         if (isset($_GET['maker'])) {
            $sql = "INSERT INTO cars (id, maker, model, price, year, url)
          VALUES (NULL, '".$_GET['maker']."','".$_GET['model']."','".$_GET['price']."','".$_GET['year']."','".$_GET['url']."')";
          $result = mysqli_query($conn, $sql);
         }



        $sql = "SELECT * FROM cars";
        $result = mysqli_query($conn,$sql);
        $length = mysqli_num_rows($result);
?>
  <html>

  <head>
	<style>

        .cars {
          height: 100px;
          display: flex;
          flex-direction: column;
          flex-wrap: wrap;
        }
		.car{
		  display:flex;
		  border:1px solid black;
		  border-radius:5px;
		  width:270px;
		  padding:10px;
		}
		.title{
		  font-size:16px;
		  font-weight:bold;
		}
		.attributes .row{
		  display:flex;
		}
		.attributes .row div{
		  width:50%;
		}
		.attributes .row .name{
		  font-weight:bold;
		}
		.car img{
		  margin-right:10px;
		}
	</style>
  </head>

  <body>


   <form action="index3.php" style="margin-right: 50px">
      <h1>Admin Page</h1>
      <table>
            <tr>
                <td>Maker: </td>
                <td><input type="text" name="maker">
            </tr>
            <tr>
                <td>Model:</td>
                <td><input type="text" name="model"></td>
            </tr>
            <tr>
                <td>Year:</td>
                <td><input type="number" name="year"></td>
            </tr>
            <tr>
                <td>Price:</td>
                <td><input type="number" name="price"></td>
            </tr>
            <tr>
                <td>Image(URL):</td>
                <td><input type="text" name="url"></td>
            </tr>
        </table>
        <input type="submit" value="Add new">
    </form>


    <div class="cars">
   <?php

        for($i=0; $i<$length;$i++){
            $row = mysqli_fetch_assoc($result);
            print '<div class="car">
            <img width="100" height="60" src="'.$row['url'].'"/>
	        <div class="right">
		    <div class="title">'.$row['maker']." ".$row['model'].'</div>
		<div class="attributes">
		  <div class="row"><div class="name">Year:</div><div>'.$row['year'].'</div></div>
		  <div class="row"><div class="name">Price:</div><div>'.$row['price'].'$</div></div>
          <div class="row"><a href="index3.php?delete='.$row['id'].'">Delete</a></div>
		  </div>
		</div>
        </div>';

        }


    mysqli_close($conn);
?>
</div>
  </body>

</html>
