<?php
// info.php for nosql in /Users/novose_s/Nosql
// 
// Made by NOVOSELTSEV Serguey
// Login   <novose_s@etna-alternance.net>
// 
// Started on  Tue Jan  6 17:04:29 2015 NOVOSELTSEV Serguey
// Last update Fri Jan  9 16:54:11 2015 NOVOSELTSEV Serguey
//

function        cont($collection)
{
  echo "\e[0;32m\n> \e[0m";
  $command = rtrim(fgets(STDIN));
  if (isset($command[0]))
    strtolower($command[0]);
   $command = preg_split('/\s+/', $command);
  if (!(isset($command[1])) || !(function_exists($command[0])))
    {
      if ($command[0] == "exit")
        exit;
      else if ($command[0] == "help")
        {
          help();
          cont($collection);
        }
      else if ($command[0] == "del_all")
	del_all($collection);
      else
	echo "\n\e[4;37mUsage\e[0m : \e[0;36m<\e[0mcommande\e[0;36m>\e[0m \e[0;36m<\e[0mlogin\e[0;36m>\e[0m.\n";
      cont($collection);
    }
  $command[0]($collection, $command[1]);
  cont($collection);
}

function        check($collection, $login)
{
  $cursor = $collection->find(array("login" => $login));
  foreach($cursor as $doc)
    if (isset($doc["login"]))
      return (1);
}

function        help($collection)
{
  system("clear");
  echo "C'est un petit programme permettant d'enregistrer des etudiants dans une base de donnee.\n";
  echo "Les commandes suivantes sont possibles :\n\n\e[4;37madd_student\e[0m    : ajouter un etudiant\n";
  echo "\e[4;37mdel_student\e[0m    : effacer un etudiant\n\e[4;37mshow_student\e[0m   : montrer les informations concernant un etudiant";
  echo "\n\e[4;37mupdate_student\e[0m : changer une information a propos d'un etudiant\n\e[4;37madd_comment\e[0m";
  echo "    : ajouter un commentaire a un etudiant\n\e[4;37mdel_all\e[0m        : effacer toute la base de donnee(a utiliser seule sans login)\n\n";
  echo "De la forme <nom de la commande> <login de la personne>.\n";
  echo "\nTapez la commande <help> si vous avez besoin d'aide, ou <exit> pour quitter.\n\n\n";
  return (0);
}