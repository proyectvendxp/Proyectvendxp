<?php
session_start(); 

if(!isset($_SESSION['UserData']['Username'])){
	header("location:./");
	exit;
}
  ?>
<h2>You're not able to see internal system files.</h2>
  <h1>uwu</h1>
<footer>Created and Built by: Luis-Net (Luis9799) https://luisweb.cf</footer>
<a href="\return">Return to main menu.</a>
