<?php
// add_stud.php for nosql in /Users/novose_s/Nosql/functions
// 
// Made by NOVOSELTSEV Serguey
// Login   <novose_s@etna-alternance.net>
// 
// Started on  Tue Jan  6 11:48:45 2015 NOVOSELTSEV Serguey
// Last update Fri Jan  9 10:10:37 2015 NOVOSELTSEV Serguey
//
function        add_student($collection, $login)
{
  if ((check($collection, $login)) == 1)
    {
      echo "\nLe login existe deja!\n";
      return (0);
    }  
  echo "Veuillez fournir les informations pour l'enregistrement de $login.\n\nNom complet : ";
  $name = rtrim(fgets(STDIN));
  echo "Promo : ";
  $promo = rtrim(fgets(STDIN));
  echo "Email : ";
  $mail = rtrim(fgets(STDIN));
  while (!preg_match_all("/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/", $mail))
    {
      echo "Votre adresse mail n'est pas conforme.\nEntrez une adresse mail : ";
      $mail = rtrim(fgets(STDIN));
    }
  echo "Numero de telephone : ";
  $num = rtrim(fgets(STDIN));
  while (!preg_match_all(" /0[1-9][0-9]{8}$/", $num))
    {
      echo "\nVotre numero de telephone n'est pas conforme.\nEntrez un numero a 10 chiffres commencant par 0 : ";
      $num = rtrim(fgets(STDIN));
    }
  $doc = array(
               "login" => $login,
               "nom" => $name,
               "promo" => $promo,
               "email" => $mail,
               "telephone" => $num);
  $collection->insert($doc);
  echo "\nLe login $login a bien ete ajoute.\n\n";
}