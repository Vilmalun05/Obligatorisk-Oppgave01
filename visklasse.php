<?php  /* vis-klasser */
/*
/*  Programmet skriver ut en registrert klasse i en tabell
*/
  include("db-kobling.php"); 
?>
<?php
  $sqlSetning="SELECT * FROM klasse";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");

	
  $antallRader=mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */

  print "<table border=1>";
  print "<tr><th align=left>klassekode</th> <th align=left>klassenavn</th> <th align=left>studiekode</th></tr>";

  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra sp�rringsresultatet */
      $klassekode=$rad["klassekode"];        /* ELLER $klassekode=$rad[0]; */
      $klassenavn=$rad["klassenavn"];
      $studiekode=$rad["studiekode"];    /* ELLER $studiekode=$rad[2]; */

      print ("<tr> <td> $klassekode </td> <td> $klassenavn </td> <td> $studiekode </td> </tr>");
    }
  print ("</table>"); 
?>