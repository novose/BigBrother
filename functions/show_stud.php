<?php
// show_stud.php for nosql in /Users/novose_s/Nosql
//
// Made by NOVOSELTSEV Serguey
// Login   <novose_s@etna-alternance.net>
//
// Started on  Tue Jan  6 17:07:25 2015 NOVOSELTSEV Serguey
// Last update Fri Jan  9 17:00:29 2015 NOVOSELTSEV Serguey
//

function	show_student($collection, $login)
{
  system("clear");
  $cursor = $collection->find(array("login" => $login));
  foreach($cursor as $doc)
    if (isset($doc["login"]))
      {
	foreach($doc as $each => $log)
	  {
	    if ($each != "_id" && $each != "commentaires")
	      form($each, $log);
	    else if ($each == "commentaires")
	      echo $each . " : " . "\n" . $log . "\n";
	  }
	echo "\n\n";
	return (0);
      }
  echo "Le login n'existe pas.\n";
}


function	form($each, $log)
{
  $esp = "";
  $n = 13 - strlen($each);
  for ($n; $n != 0; $n--)
    $esp .= " ";
  echo $each . $esp . ": " . $log . "\n";
}