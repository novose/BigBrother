<?php
// del_all.php for nosql in /Users/novose_s/Nosql/novose_s
// 
// Made by NOVOSELTSEV Serguey
// Login   <novose_s@etna-alternance.net>
// 
// Started on  Thu Jan  8 10:44:12 2015 NOVOSELTSEV Serguey
// Last update Fri Jan  9 14:50:33 2015 NOVOSELTSEV Serguey
//

function	del_all($collection)
{
  system("clear");
  echo "Etes-vous sur de vouloir effacer toute la base de donnees?\n\e[0;32m>\e[0m ";
  $answer = strtolower(rtrim(fgets(STDIN)));
  while ($answer != "oui" && $answer != "non")
    {
      echo "\nVeuillez entrer \"oui\" ou \"non\".\n\e[0;32m>\e[0m ";
      $answer = strtolower(rtrim(fgets(STDIN)));
    }
  if ($answer == "oui")
    {
      $collection->drop();
      echo "La base de donnee a bien ete effacee.\n\n";
    }
}