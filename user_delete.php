<?php

include('src/User.php');
include('src/Post.php');

$User = new User();

$id_user = $_GET['id'];

var_dump($id_user);