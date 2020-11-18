<?php
include('clases.php');

$sw1 = new Software("PSTORM", "PhpStorm", "UD", "El mejor IDE para PHP.", 50.0 ,"2020.2.3");
$sw2 = new Software("WSTORM", "WebStorm", "UD", "El mejor IDE para Web.", 65.0,  "2020.2.3");
$sw3 = new Software("INTELJ", "IntelliJ IDEA", "UD", "El mejor IDE para TODO.", 99.5, "2020.2.3");
$sw4 = new Software("PCHARM", "PyCharm", "UD", "El mejor IDE para Python.", 75.5, "2020.2.3");

$hw1 = new Hardware("IP12ST", "Iphone12","UD", "Just Iphone", 959.0, "Apple");
$hw2 = new Hardware("IP12PR", "Iphone12 PRO","UD", "Just Iphone", 1159.0, "Apple");
$hw3 = new Hardware("IP12MI", "Iphone12 mini","UD", "Just Iphone", 809.0, "Apple");
$hw4 = new Hardware("IP11ST", "Iphone11 ","UD", "Just Iphone", 689.0, "Apple");

$productos = array($sw1,$sw2,$sw3,$sw4,$hw1,$hw2,$hw3,$hw4);
