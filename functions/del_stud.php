<?php
// del_stud.php for nosql in /Users/novose_s/Nosql
// 
// Made by NOVOSELTSEV Serguey
// Login   <novose_s@etna-alternance.net>
// 
// Started on  Tue Jan  6 14:36:58 2015 NOVOSELTSEV Serguey
// Last update Tue Jan  6 16:54:33 2015 NOVOSELTSEV Serguey
//
function        del_student($collection, $login)
{
  if ((check($collection, $login)) != 1)
    {
      echo "\nCe login n'existe pas.\n";
      return (0);  
    }
  $cursor = $collection->remove(array("login" => $login));
  echo "Le login $login a bien ete supprime.\n\n";
}