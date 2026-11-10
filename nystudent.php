<?php  /* registrer-klasse */
/*
/*  Programmet lager et html-skjema for å registrere en klasse
/*  Programmet registrerer data (klassekode og klassenavn) i databasen
*/
?> 

<h3>Registrer ny student</h3>

<form method="post" action="" id="registrerstudent" name="registrerstudent">
  brukernavn <input type="text" id="brukernavn" name="brukernavn" required /> <br/>
  fornavn <input type="text" id="fornavn" name="fornavn" required /> <br/>
  etternavn <input type="text" id="etternavn" name="etternavn" required /> <br/>
  klassekode <input type="text" id="klassekode" name="klassekode" required /> <br/>
  <input type="submit" value="Registrer student" id="registrerStudentKnapp" name="registrerStudentKnapp" /> 
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php 
  <?php

if (isset($_POST["registrerStudentKnapp"]))
{
    $brukernavn = $_POST["brukernavn"];
    $fornavn = $_POST["fornavn"];
    $etternavn = $_POST["etternavn"];
    $klassekode = $_POST["klassekode"];

    include("db-kobling.php");

    // Sjekker om brukernavnet allerede finnes
    $sqlSetning = "SELECT * FROM student WHERE brukernavn='$brukernavn'";

    $sqlResultat = mysqli_query($db, $sqlSetning)
        or die("Ikke mulig å hente data fra databasen");

    $antallRader = mysqli_num_rows($sqlResultat);

    if ($antallRader != 0)
    {
        print("Studenten er registrert fra før!");
    }
    else
    {
        $sqlSetning = "INSERT INTO student VALUES
        ('$brukernavn','$fornavn','$etternavn','$klassekode')";

        mysqli_query($db, $sqlSetning)
            or die("Ikke mulig å registrere student i databasen");

        print("Følgende student er nå registrert:
        $brukernavn $fornavn $etternavn $klassekode");
    }
}

?>
?> 