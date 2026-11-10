<?php  /* slett-student */
/*
/*  Programmet lager et skjema for å velge en student som skal slettes  
/*  Programmet sletter den valgte studenten
*/
?> 


<h3>Slett Student</h3>

<form method="post" action="" id="slettstudent" name="slettstudent" onSubmit="return bekreft()">
  Brukernavn <input type="text" id="brukernavn" name="brukernavn" required /> <br/>
  <input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" /> 
</form>

</select> 

<br><br>

<input type="submit"
       name="slett"
       value="Slett student"
        onClick="return confirm('Er du sikker på at du vil slette denne studenten?')">

</form>

<?php
  if (isset($_POST ["slettStudentKnapp"]))
    {	
      $brukernavn=$_POST ["brukernavn"];

          include("db-kobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

          $sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat); 

          if ($antallRader==0)  /* student er ikke registrert */
            {
              print ("Studenten finnes ikke");
            }
          else
            
{
    // Slett studenten
    $sqlSetning="DELETE FROM student WHERE brukernavn='$brukernavn';";
    mysqli_query($db,$sqlSetning) or die ("ikke mulig å slette studenten");
}
    mysqli_query($db,$sqlSetning) or die ("ikke mulig å slette klassen");

    print ("F&oslash;lgende student er n&aring; slettet: $brukernavn <br />");
}
?>
    