<?php 
class Etudiant{
    // private attributes for encapsulation
    private $nom;
    private $notes = []; 

    //constructor
    public function __construct($nom,$notes){
        $this->nom = $nom;
        $this->notes = $notes;


    }

    
    //methode treturny moyenne
    public function CalculMoyenne(){
        if(count($this->notes) === 0){
            return 0;
        } 
        else{
            return array_sum($this->notes)/count($this->notes); 
        }

    }

    //methode bch taffichy note lil etudiant
    /* the table block:
    <table>
        <tr>
            <th>header of col1</th>
            <th>header of col2</th>

        </tr>
        <tr>
            <th>value for col1</th>
            <th>value for col2</th>
        </tr>
    </table>
    
    */
    public function AfficheNotes(){
        
        echo "<table border='1'> <tr><th>$this->nom</th></tr>";        
        
        foreach($this->notes as $note){
            echo "<tr>";
            $color ="";
            if($note>10){
                $color="green";
            }
            elseif($note<10){
                $color="red";
            }
            else{
                $color="orange";
            }
            echo "<td style='background-color:{$color}; padding:5px;'>{$note}</td>";
            echo "</tr>";
            
        }
        $moy = $this->CalculMoyenne();
        echo "<tr><td> votre moyenne est {$moy}</td></tr>";
        echo "</table>";
        


        

    }
    //methode estAdmis
    public function EstAdmis(){
        $moy = $this->CalculMoyenne();
        if($moy >= 10) echo "admis";
        else echo"non admis";
    }

}

$aymen = new Etudiant("aymen" ,[11,13,18,7,10,13,2,5,1]);
$skander =  new Etudiant("skander",[15,9,8,16]);

$aymen->AfficheNotes();
$skander->AfficheNotes();







?>