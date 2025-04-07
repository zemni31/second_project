<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des étudiants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 0px;
            width:300px;
        
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            
        }
        th {
            background-color: #f2f2f2;
        }
        .red {
            background-color: #ffcccc;
        }
        .green {
            background-color:rgb(171, 237, 213);
        }
        .jaune {
            background-color: hsl(53, 72.30%, 80.20%);
        }
        .result {
            font-weight: bold;
            margin-top: 10px;
            background-color:hsl(218, 67.20%, 77.30%);
            border: 1px,skyblue;
            width:300px;
            border-radius:5px;
           
        }
        div{
            display:flex;
            justify-content:space-between;
            gap:20px;
            float:left;
        
        }
    </style>
</head>
<body>
    <h1>Résultats des étudiants</h1>

    <?php
    class Etudiant {
        private $nom;
        private $notes;
        
        
        public function __construct($nom, $notes) {
            $this->nom = $nom;
            $this->notes = $notes;
        }
        
       
        public function afficherNotes() {

            echo "<table><th> {$this->nom}</th>";
            echo "<tr>";
            
            foreach ($this->notes as $note) {
                $classe = '';
                if ($note < 10) {
                    $classe = 'red';
                } elseif ($note > 10) {
                    $classe = 'green';
                } else {
                    $classe = 'jaune';
                }
                
                echo "<td class='$classe'>$note</td> </tr>";
            }
            
          
            
        }
        
        
        public function calculerMoyenne() {
            if (count($this->notes) === 0) return 0;
            return array_sum($this->notes) / count($this->notes);
        }
        
        public function afficherStatut() {
            $moyenne = $this->calculerMoyenne();
            $statut = ($moyenne >= 10) ? "admis" : "non admis";
            echo "<tr><td class='result'> Votre moyenne est $moyenne - Vous êtes $statut</td></tr></table>";
        }
    }

    $etudiants = [
        new Etudiant("Aymen", [11, 13, 18, 7, 10, 13, 2, 5, 1]),
        new Etudiant("Skander", [15, 9, 8, 16])
    ];


    foreach ($etudiants as $etudiant) {
        echo "<div>";
        $etudiant->afficherNotes();
        $etudiant->afficherStatut();
        echo "<hr>";
        echo"</div>";
    }
    ?>
</body>
</html>