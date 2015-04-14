#!/usr/bin/env php
<?php
// bigbrother2.php for  in /Users/novose_s/Nosql/novose_s
// 
// Made by NOVOSELTSEV Serguey
// Login   <novose_s@etna-alternance.net>
// 
// Started on  Thu Jan  8 18:18:02 2015 NOVOSELTSEV Serguey
// Last update Fri Jan  9 16:36:49 2015 NOVOSELTSEV Serguey
//
include ("functions/info.php");
include ("functions/add_stud.php");
include ("functions/del_stud.php");
include ("functions/show_stud.php");
include ("functions/up_stud.php");
include ("functions/add_com.php");
include ("functions/del_all.php");

function        start($name)
{
  system("clear");
  descrip();
  $c = new MongoClient();
  $db = $c->mydb;
  $collection = $db->createCollection('col');
  if (isset($name[1]) && ($name[1] == "del_all" || $name[1] == "help"))
    $name[1]($collection);
  else if (isset($name[2]) && function_exists($name[1]))
    {
      if (isset($name[2]) && $name[1] != "del_all")
	$name[1]($collection, $name[2]);
    }
  else if (!isset($name[2]) || !function_exists($name[1]))
    {
      echo "Vous pouvez taper la commande \e[0;36m<\e[0mhelp\e[0;36m>\e[0m pour de l'aide.";
      echo "\n\e[4;37mUsage\e[0m : \e[0;36m<\e[0mcommande\e[0;36m>\e[0m \e[0;36m<\e[0mlogin\e[0;36m>\e[0m.\n\n\n";
    }
}

function        descrip()
{
  echo "########  ####  ######      ########  ########   #######  ######## ##     ## ######## ########  \n";
  echo "##     ##  ##  ##    ##     ##     ## ##     ## ##     ##    ##    ##     ## ##       ##     ## \n";
  echo "##     ##  ##  ##           ##     ## ##     ## ##     ##    ##    ##     ## ##       ##     ## \n";
  echo "########   ##  ##   ####    ########  ########  ##     ##    ##    ######### ######   ########  \n";
  echo "##     ##  ##  ##    ##     ##     ## ##   ##   ##     ##    ##    ##     ## ##       ##   ##   \n";
  echo "##     ##  ##  ##    ##     ##     ## ##    ##  ##     ##    ##    ##     ## ##       ##    ##  \n";
  echo "########  ####  ######      ########  ##     ##  #######     ##    ##     ## ######## ##     ## \n\n\n";

}
start($argv);

?>