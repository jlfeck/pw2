<?php

include('src/User.php');
include('src/Post.php');

$Post = new Post();

$id = $_GET['id'];

var_dump($id);