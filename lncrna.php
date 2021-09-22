<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
         <!-- Custom styles for lncrna template -->
    <link href="lncrna.css" rel="stylesheet">
    <script type="text/javascript">
    </script>
    </head>
    <body>
    <img src="icar.png" align="left"style="width:100px;length:100px" >
    <img src="iasri.jpeg"align="right" style="width:150px;length:150px" >
       <h1 style="text-align:center;">RbLncDB</h1>
       <h1 style="text-align:center;">(Rice Bean lncRNA Database)</h1>



    <br></br>   
  <ul>
    <li><a href="home.html">Home</a></li> 
    <li class="active"><a href="lncrna.php">Search lncrna</a></li>
    <li><a href="miRNA.php">target miRNA</a></li>
    <li><a href="mRNA.php">target mRNA</a></li>
    <li><a href="about.html">About</a></li>
  </ul>

  <h1>Select criteria for lncRNA search:</h1>
 <form method="POST" action=" ">
<input type="text" name="Sequence_length1" placeholder="Enter Sequence_length:From:">
<br>
<input type="text" name="Sequence_length2" placeholder="To:">
<br>
<input type="submit" name="search1" value="SEARCH BY SEQUENCE LENGTH">
<br>
<input type="text" name="peptide_length1" placeholder="Enter Peptide length :From:">
<br>
<input type="text" name="peptide_length2" placeholder="To:">
<br>
<input type="submit" name="search2" value="SEARCH BY PEPTIDE LENGTH">

</form>

 <?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name="rblncdb";
$conn = new mysqli($servername, $username, $password,$db_name);
if(isset($_POST['search1']))
{
  $Sequence_length1=$_POST['Sequence_length1'];
  $Sequence_length2=$_POST['Sequence_length2'];
  $sql1 = "select * from `masterlncrna` WHERE `Sequence_length` BETWEEN '$Sequence_length1' AND '$Sequence_length2' ORDER BY `Sequence_length` ASC ";
  $query= mysqli_query($conn,$sql1); 
}
if(isset($_POST['search2']))
{
  $peptide_length1=$_POST['peptide_length1'];
  $peptide_length2=$_POST['peptide_length2'];
  $sql2 = "select * from `masterlncrna` WHERE `peptide_length` BETWEEN '$peptide_length1' AND '$peptide_length2' ORDER BY `peptide_length` ASC ";
  $query= mysqli_query($conn,$sql2); 
}


if(!$query)
{
  die("error found".mysqli_error($conn));
}
echo "
<table class='table' border='1px'>
<tr>
<th>transcript_id</th>
<th>peptide_length</th>
<th>Coding_probability</th>
<th>Plek_score</th>
<th>Sequence_length</th>
<th>Sequence</th>
</tr>";
while($row=mysqli_fetch_array($query))
{
  echo '
  <tr>
  <td>'.$row['transcript_id'].'</td>
  <td>'.$row['peptide_length'].'</td>
  <td>'.$row['Coding_probability'].'</td>
  <td>'.$row['Plek_score'].'</td>
  <td>'.$row['Sequence_length'].'</td>
  <td>'.$row['Sequence'].'</td>
  </tr>';

}
 echo "</table>"
?>
 </body>
 <footer> <small>&copy; Copyright 2021, ICAR-Indian Agricultural Statistics Research Institute</small> </footer> 
</html>