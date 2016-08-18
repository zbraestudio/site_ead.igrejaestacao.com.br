<?
session_start();

include('config.php');
include('functions.php');
include('girafa.db.php');
include('girafa.tablepost.php');


$db = new nbrDB(DB_HOST, DB_DB, DB_USER, DB_PASS);
?>