<!DOCTYPE html>

<html>
   
    <head>
        
        <meta charset="utf-8"> 
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        
   
    </head>
    <body>
        
    
          
        <div class="container">
        <section class="row">
         
        <header class="col-lg-12"  > <img id="dossier" width="60" src ="dossier-icone-8757-128.png"> <p id="titre"> Explorateur de fichier </p></header>
        <div id="centre">
           
    <?php

        $k="";
        $k2="";
        $slash = "\\";
    
        $chemin = realpath("explorateur.php"); 
        $chemin = str_replace("explorateur.php","",$chemin);
       
        
        
        if(isset($_GET["chemin"]) && !empty($_GET["chemin"])) 
        { 
            
            
            
            $adresse = $_GET["chemin"];
//       
            $adresse = str_replace($chemin,"",$adresse);
          
          
            $phrase= explode("\\",$adresse);
            $phrase = array_filter($phrase);
            $copier_phrase = $phrase;
            $fleche= array_pop($copier_phrase);
            
            
            foreach ($copier_phrase as $key => $mo)
            {
               $k2 .=$mo.$slash;  
            }
            
            
            
            echo '<span id="fleche1"><a  class=" hidden-lg" href="explorateur.php?chemin='.$k2.'"> <i class="fa fa-arrow-left" aria-hidden="true"></i></a></span>';
            
           
           //echo $mot[0]; 
           //echo $mot[1];
            
            
            echo'<fieldset>
            <legend  class="hidden-xs" ><i class="fa fa-folder-open" aria-hidden="true"></i>&nbsp';
            foreach ($phrase as $key => $mot)
            {
                if ($mot == end($phrase))
              {
                  
                  $k .=$mot; 
                  echo '<a  href="explorateur.php?chemin='.$k.$slash.'"> '.$mot.' </a>';
                  
              }
                else
                {
                    $k .=$mot.$slash; 
                    echo '<a href="explorateur.php?chemin='.$k.$slash.'"> '.$mot.'&#8594; </a> ';
                    
                }
        
            
            }   
            
            
           echo '</legend><br>';
        
 
            }
        
        else
            { 
            $adresse= $chemin."image".$slash;
            $mot= explode($slash,$adresse);
            $adresse = str_replace($chemin,"",$adresse);
          
              
          
            echo'<fieldset><legend> <i class="fa fa-folder-open" aria-hidden="true"></i>&nbsp; <a href=" explorateur.php?chemin='.$mot[4].'" " >'.$mot[4].'<br>
         
        </a>   </legend><br>';
  
            }
            
            
                
        ?>
            
      
           
   
               
    <ul id="menu" class="hidden-xs col-lg-12 ">
            <li class="col-lg-4  col-sm-4 col-xs-4">     Nom   </li>
            <li class="col-lg-4 col-sm-4 col-xs-4">    Type   </li>
            <li class="col-lg-4 col-sm-4 col-xs-4">   Taille  </li>
                                
    </ul> 
            <div id="global">
        
   
    <?php
       
//        // print_r($a);
    
       $a = scandir ($adresse);
        foreach ($a as $Fichier) 
        { 
            if(is_dir($adresse.$Fichier))
            {   
            
                if ($Fichier != "." && $Fichier != "..") 
                {  
             
                    ?>    
                        <div class="article col-lg-12"> 
                    <?php echo '<i class="fa fa-folder" aria-hidden="true"></i> &nbsp; <a href="explorateur.php?chemin='.$adresse.$Fichier.$slash.'"  ">'.$Fichier.'</a> <br> ';
                            
                        ?>
                   
                        </div> <?php 

               
                }
                
            } 
            else
               
                 {
                  
                    $info = new SplFileInfo($adresse.$Fichier);
//                  var_dump($info->getFilename());
//                  var_dump($info-> getExtension());
//                  echo filesize($info);
//               
                     if($info-> getExtension() =='jpg'|| $info-> getExtension() =='jpeg' || $info-> getExtension() =='png'  )
          
                        {  ?>
                            <div class="article"><?php
                          
                            echo '<div  class="col-lg-4  "> <i class="fa fa-picture-o" aria-hidden="true"></i> &nbsp;<a  href="'.$adresse.$Fichier.'"> '.$info->getFilename().' </a> </div>'; 
                                
                            echo '<p class="col-lg-4  ">'.$info-> getExtension().'</p>';
                            echo '<p class="col-lg-4 ">'.filesize($info).' octets</p> <br>';   
                                ?>
                   
                                
                            </div><?php 
                                 
                        }
                     else 
                        { 
                            if($info-> getExtension() =='php')
                            {?> 
                            <div class="article">
                            <?php
                                
                           
                                echo '<div  class="col-lg-4 "><i class="fa fa-file-text-o" aria-hidden="true"></i> &nbsp;<a  href="telecharger.php?nom_fichier='.$chemin.$adresse.$Fichier.'"> '.$info->getFilename().' </a> </div>  ';  
                            echo '<p class="col-lg-4 "> '.$info-> getExtension().'</p>';
                            echo '<p class="col-lg-4 ">'.filesize($info).' octets</p> <br>';  
              
                                
                            ?>
                   
                                
                            </div> <?php
                            
                            } else
                                {
                                    if($info-> getExtension() =='zip')
                                    {?> 
                                       
                                        <div class="article">
                                        <?php
                                        echo ' <div  class="col-lg-4  "><i class="fa fa-file-archive-o" aria-hidden="true"></i> &nbsp;<a  href="telecharger.php?nom_fichier='.$chemin.$adresse.$Fichier.'"> '.$info->getFilename().' </a> </div>  ';  
                                        echo '<p class="col-lg-4  ">'.$info-> getExtension().'</p>';
                                        echo '<p class="col-lg-4  ">'.filesize($info).' octets</p> <br>';   ?>
                   
                                
                </div> <?php
                                        
                                        
                                    }
                                    else
                                    {
                                        if($info-> getExtension() =='PDF')         
                                        {?> 
                                       
                                        <div class="article">
                                        <?php
                                            echo '<div  class="col-lg-4  "><i class="fa fa-file-pdf-o" aria-hidden="true"></i> &nbsp;<a  href="'.$adresse.$Fichier.'"> '.$info->getFilename().' </a> </div>  ';  
                                            echo '<p class="col-lg-4  ">'.$info-> getExtension().'</p>';
                                            echo '<p class="col-lg-4   ">'.filesize($info).' octets</p> <br>';?>
                   
                                
                </div> <?php
                                            
                                        }
                                        
                                        
                                        
                                    }
                            
                                }
                            
                            
                            
                        }
                    
                     
                     
                 }
  
       }
        
   
    ?> </div>
        </div>  
       
        </section>
        </div> 
        <div id="content"></div>
   
        <script
            src="https://code.jquery.com/jquery-3.1.1.js"
            integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
            crossorigin="anonymous">
        </script>
        <script src="script.js"></script>
            
    </body>
</html>