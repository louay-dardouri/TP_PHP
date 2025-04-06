<?php
include_once 'Repository.php';

class RepositoryUtilisateur extends Repository
{
    public function __construct()
    {
        parent::__construct('utilisateur');
    }
}

$utilisateur = new RepositoryUtilisateur();
echo '<pre>findAll() : <br>';
var_dump($utilisateur->findAll());
echo '<br>findById(1) : <br>';
var_dump($utilisateur->findById(1)); 
echo '<br>create user : <br>';   
$id = $utilisateur->create(['username'=>'Amine', 'email'=>"amine@gmail.com", 'role'=>"user"]);
var_dump($utilisateur->findAll());
echo '<br>delete user : <br>';
$utilisateur->delete($id);
var_dump($utilisateur->findAll());
echo '</pre>';