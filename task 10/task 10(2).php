<?php
    $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '';
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'mydatabase');

         if(! $conn ){
            die('Could not connect: ' . mysqli_error());
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
        .menu {display:block;width:400px;margin-left:auto;margin-right:auto;}
	</style>
  </head>

  <body>
  <div class="menu">
   <a href="index2.php?All">All</a>|<a href="index2.php?maker=Toyota">Toyota</a>|<a href="index2.php?maker=BMW">BMW</a></div>
   <div>
       <h1></h1>
   </div>
       <div class="cars">
      <?php
        if(isset($_GET['All'])){
        for($i=0; $i<$length;$i++){
            $row = mysqli_fetch_assoc($result);
            print '<div class="car">
            <img width="100" height="60" src="'.$row['url'].'"/>
	        <div class="right">
		    <div class="title">'.$row['maker']." ".$row['model'].'</div>
		<div class="attributes">
		  <div class="row"><div class="name">Year:</div><div>'.$row['year'].'</div></div>
		  <div class="row"><div class="name">Price:</div><div>'.$row['price'].'$</div></div>
		  </div>
		</div>
        </div>';
    }

}

        else if(isset($_GET['maker']) and $_GET['maker']==$_GET['maker']){
            $sql = "SELECT * FROM cars WHERE maker='" . $_GET['maker'] . "'";
            $result = mysqli_query($conn,$sql);
            $length = mysqli_num_rows($result);
            for($i=0; $i<$length;$i++){
            $row = mysqli_fetch_assoc($result);
            print '<div class="car">
            <img width="100" height="60" src="'.$row['url'].'"/>
	        <div class="right">
		    <div class="title">'.$row['maker']." ".$row['model'].'</div>
		<div class="attributes">
		  <div class="row"><div class="name">Year:</div><div>'.$row['year'].'</div></div>
		  <div class="row"><div class="name">Price:</div><div>'.$row['price'].'$</div></div>
		  </div>
		</div>
        </div>';

        }
}
    mysqli_close($conn);
?>

    </div>
  </body>

</html>
