<?php
// up_student.php for nosql in /Users/novose_s/Nosql
// 
// Made by NOVOSELTSEV Serguey
// Login   <novose_s@etna-alternance.net>
// 
// Started on  Wed Jan  7 09:38:55 2015 NOVOSELTSEV Serguey
// Last update Fri Jan  9 15:13:36 2015 NOVOSELTSEV Serguey
//

function        update_student($collection, $login, $n = "")
{
  if ((check($collection, $login)) != 1)
    {
      echo "\nCe login n'existe pas.\n";
      return (0);
    }
  $cursor = $collection->find(array("login" => $login));
  foreach ($cursor as $doc)
    {
      echo "Que voulez-vous modifier ?\n\e[0;32m>\e[0m ";
      $n = strtolower(rtrim(fgets(STDIN)));
      foreach($doc as $key => $log)
	if ($n == $key)
	  {
	    check_up($key);
	    $new = rtrim(fgets(STDIN));
	    $new = regexp($new, $key);
	    $cursor = $collection->update(array("login" => $login), array('$set'=>array($key => $new)));
	    echo "Les informations ont bien ete modifiees.\n\n";
	    return (0);
	  }
    }
  echo "\nL'operation a echouee pour des raisons obscur!\n";
}

function        regexp($new, $key)
{
  while ((!preg_match_all("/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/", $new)) && $key == "email")
    {
      echo "\nVotre adresse mail n'est pas conforme.\nEntrez une adresse mail : ";
      $new = rtrim(fgets(STDIN));
    }
  while ((!preg_match_all(" /0[1-9][0-9]{8}$/", $new)) && $key == "telephone")
    {
      echo "\nVotre numero de telephone n'est pas conforme.\nEntrez un numero a 10 chiffres commencant par 0 : ";
      $new = rtrim(fgets(STDIN));
    }
  return ($new);
}

function	check_up($key)
{
  if ($key == "nom" || $key == "telephone")
    echo "Nouveau $key\n[0;32m>\e[0m ";
  else if ($key == "promo")
    echo "Nouvelle $key\n[0;32m>\e[0m ";
  else if ($key == "email")
    echo "Nouvel $key\n[0;32m>\e[0m ";
}

/*function	update_student($collection, $login, $n = "")
{
  echo "Entrez oui pour tout changement. Si vous entrez";
  if ((check($collection, $login)) != 1)
    {
      echo "\nCe login n'existe pas.\n";
      return (0);
    }
  $cursor = $collection->find(array("login" => $login));
  foreach ($cursor as $doc)
    {
      foreach ($doc as $key => $log)
	if ($key != "_id" && $key != "login")
	  {
	    check_up($key);
	    $n = strtolower(rtrim(fgets(STDIN)));
	    if ($n == "oui")
	      { 
		echo "Entrez : ";
		$new = rtrim(fgets(STDIN));
		regexp($new, $key);
		$cursor = $collection->update(array("login" => $login), array('$set'=>array($key => $new)));
	      }
	  }
    }
  echo "Les informations ont bien ete modifiees.\n\n";
}

function	regexp($new, $key)
{
  while ((!preg_match_all("/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/", $mail)) && $key == "email")
    {
      echo "\nVotre adresse mail n'est pas conforme.\nEntrez une adresse mail : ";
      $mail = rtrim(fgets(STDIN));
    }
  while ((!preg_match_all(" /0[1-9][0-9]{8}$/", $num)) && $key == "telephone")
    {
      echo "\nVotre numero de telephone n'est pas conforme.\nEntrez un numero a 10 chiffres commencant par 0 : ";
      $num = rtrim(fgets(STDIN));
    }
}*/