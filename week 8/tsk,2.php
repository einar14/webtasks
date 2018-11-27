<a href="task2.php?category=sport">Sport news</a> | <a href="task2.php?category=politics">Politic news</a><br/><br/>
<a href="task2.php?category=sport&format=json">Sport news (JSON)</a> | <a href="task2.php?category=politics&format=json">Politic news (JSON)</a><br/><br/>



<?php
$category = ["sport"];
function sportNews(){
    $news = ["sport"=>["C. Ronaldo has scored three goals in last five matches","Golovkin has won match for title"],"politics"=>["Trump has cancelled his visit to North Corea, because of sanction","N. Nazarbayev has approved new version of alphabet"]];


    print $news["sport"][0];
    print "<hr>";
    print $news["sport"][1];
}
function politicsNews(){
    $news = ["sport"=>["C. Ronaldo has scored three goals in last five matches","Golovkin has won match for title"],"politics"=>["Trump has cancelled his visit to North Corea, because of sanction","N. Nazarbayev has approved new version of alphabet"]];
    $category = ["sport"];

    print $news["politics"][0];
    print "<hr>";
    print $news["politics"][1];
}
function sportNewsJson(){
    $jsondata = file_get_contents("movie.json");
    $json = json_decode($jsondata,true);
    print '<p>["'.$json['news'][0]['sport'][0].'":"'.$json['news'][0]['sport'][1].'"]';

}
function politicsNewsJson(){
    $jsondata = file_get_contents("movie.json");
    $json = json_decode($jsondata,true);
    print '<p>["'.$json['news'][0]['politics'][0].'":"'.$json['news'][0]['politics'][1].'"]';
}
if(isset($_GET['format']) and $_GET['category'] == "sport" and $_GET['format'] == "json"){
    sportNewsJson();
}
elseif(isset($_GET['format']) and $_GET['category'] == "politics" and $_GET['format'] == "json"){
    politicsNewsJson();
}
elseif(isset($_GET['category']) and $_GET['category'] == "sport"){
    sportNews();
}
elseif(isset($_GET['category']) and $_GET['category'] == "politics"){
    politicsNews();
}
?>
