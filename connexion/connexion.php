<?php
$bdd= new PDO('mysql:host=localhost;dbname=mutation','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);