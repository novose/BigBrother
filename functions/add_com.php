<?php
// add_comment.php for nosql in /Users/novose_s/Nosql/novose_s
// 
// Made by NOVOSELTSEV Serguey
// Login   <novose_s@etna-alternance.net>
// 
// Started on  Thu Jan  8 10:46:13 2015 NOVOSELTSEV Serguey
// Last update Fri Jan  9 17:11:42 2015 NOVOSELTSEV Serguey
//

function	add_comment($collection, $login, $last = "", $com = "")
{
  $esp = "               ";
  if ((check($collection, $login)) != 1)
    {
      echo "\nCe login n'existe pas.\n";
      return (0);
    }
  echo "\nVotre commentaire : \n\e[0;32m\n> \e[0m";
  $com = rtrim(fgets(STDIN));
  while (($first = substr($com, 0, 1)) != "\"")
    {
      echo "\nVotre commentaire doit commencer et doit se terminer par des guillemets.\n\e[0;32m\n> \e[0m";
      $com = rtrim(fgets(STDIN));
    }
  $com = $esp . $com;
  while (($last = substr($com, strlen($com) - 1)) != "\"")
    {
      $com = $com . "\n" . $esp;
      echo "\e[0;32m> \e[0m";
      $com = $com . rtrim(fgets(STDIN));
    }
  ajout($collection, $login, $com, $esp);
  echo "Commentaire ajoute.\n";
}



function	ajout($collection, $login, $com, $esp)
{
  date_default_timezone_set("Europe/Paris");
  setlocale (LC_TIME, 'fr_FR');
  $time = strftime('%A %d %B %Y');
  $com = $esp . $time . " :\n" . $com;
  $cursor = $collection->find(array("login" => $login), array("commentaires" => '$set'));
  foreach($cursor as $doc)
    foreach($doc as $key => $val)
    {
      if ($key == "commentaires" && $val != "")
	$val = $val . "\n" . $com . "\n\n$esp~~~~~~~~~~~~~~~\n";
      else
	$val = $com . "\n\n$esp~~~~~~~~~~~~~~~\n";
    }
  $collection->update(array("login" => $login), array('$set'=>array("commentaires" => $val)));
}