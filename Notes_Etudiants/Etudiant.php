<?php 
class Etudiant{
    private $nom;
    private $notes = []; 

    public function __construct($nom,$notes){
        $this->nom = $nom;
        $this->notes = $notes;


    }

    
 
    public function calculMoyenne(){
        if(count($this->notes) === 0){
            return 0;
        } 
        else{
            return array_sum($this->notes)/count($this->notes); 
        }

    }

    public function afficheNotes(){
        echo "<div class='card shadow-sm'>";
        echo "<div class='card-header text-center fw-bold'>" . htmlspecialchars($this->nom) . "</div>";
        echo "<ul class='list-group list-group-flush'>";
        foreach($this->notes as $note){
            $colorClass = ($note > 10) ? "bg-success text-white" : (($note < 10) ? "bg-danger text-white" : "bg-warning");
            echo "<li class='list-group-item $colorClass text-center'>" . htmlspecialchars($note) . "</li>";
        }
        $moy = $this->CalculMoyenne();
        echo "<li class='list-group-item text-center bg-primary text-white'>Votre moyenne est $moy</li>";
        echo "</ul></div>";
    }

    public function estAdmis(){
        $moy = $this->CalculMoyenne();
        if($moy >= 10) echo "admis";
        else echo"non admis";
    }

}