<?php
include_once 'Repository.php';

class RepositorySection extends Repository
{
    public function __construct()
    {
        parent::__construct('section');
    }
}

$section = new RepositorySection();
echo '<pre>findAll() : <br>';
var_dump($section->findAll());
echo '<br>findById(1) : <br>';
var_dump($section->findById(1)); 
echo '<br>create section : <br>';   
$id = $section->create(['designation'=>'CH', 'description'=>"Chimie"]);
var_dump($section->findAll());
echo '<br>delete section : <br>';
$section->delete($id);
var_dump($section->findAll());
echo '</pre>';