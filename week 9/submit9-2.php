<?php
    print 'You added a new item <strong>' .$_GET["maker"]." ".$_GET['model'].'</strong><br>';
    print "produced in " .$_GET["year"]."(".(2018-$_GET['year'])."years old) with ".$_GET['engine'].' engine<br>';

    if(isset($_GET['payed'])){
        $yes = "yes";
    }
    else{
        $yes = "no";
    }
    print "Tax payed: <strong>".$yes.'</strong><br>';
    if(isset($_GET['passed'])){
        $yes = "yes";
    }
    else{
        $yes = "no";
    }
    print "Technical check passed: <strong>".$yes.'</strong><br>';

    if(isset($_GET['require'])){
        $yes = "yes";
    }
    else{
        $yes = "no";
    }
    print "Doesn't required investment: <strong>".$yes.'</strong><br>';
    print "$".$_GET['price'];


?>    
