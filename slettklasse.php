<?php  /* slett-klasse */
/*
/*  Programmet lager et skjema for å velge en klasse som skal slettes  
/*  Programmet sletter den valgte klassen
*/
?> 


<h3>Slett Klasse</h3>

<form method="post" action="" id="slettklasse" name="slettklasse" onSubmit="return bekreft()">
  Klassekode <input type="text" id="klassekode" name="klassekode" required /> <br/>
  <input type="submit" value="Slett klasse" name="slettKlasseKnapp" id="slettKlasseKnapp" /> 
</form>

<?php
  if (isset($_POST ["slettKlasseKnapp"]))
    {	
      $klassekode=$_POST ["klassekode"];

          include("db-kobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

          $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat); 

          if ($antallRader==0)  /* klasse er ikke registrert */
            {
              print ("Klassen finnes ikke");
            }
          else
            
{
    // Slett studentene som tilhører klassen
    $sqlSetning="DELETE FROM student WHERE klassekode='$klassekode';";
    mysqli_query($db,$sqlSetning) or die ("ikke mulig å slette studentene");

    // Slett klassen
    $sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode';";
    mysqli_query($db,$sqlSetning) or die ("ikke mulig å slette klassen");

    print ("F&oslash;lgende klasse er n&aring; slettet: $klassekode <br />");
}
}
    
?> 