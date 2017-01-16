<!DOCTYPE html>

<html>
   
    <head>
         <meta charset="utf-8"> 
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        
    <header></header>  
    <h1>Explorateur de fichier </h1>    
    <?php
        
        $slash = "\\";
    
        $chemin = realpath("explorateur.php");
        $chemin = str_replace("explorateur.php","",$chemin);
        
        if(isset($_GET["chemin"])) 
        { 
          $adresse= $_GET["chemin"];
        }
            else
        { 
             $adresse= $chemin."image".$slash;
        }
       
       
        $a = scandir ($adresse);
//        print_r($a);
      
            foreach ($a as $Fichier) 
            {  
                if(is_dir($adresse.$Fichier))
            {
            
                  if ($Fichier != "." && $Fichier != "..") 
                {  
                
                echo '<a href="explorateur.php?chemin='.$adresse.$Fichier.$slash.'" target="_blank" ">'.$Fichier.'</a> <br>';
             
                }
                
            }
  
       }
    ?>


    
    </body>
</html>