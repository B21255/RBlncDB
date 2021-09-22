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
    <li ><a href="lncrna.php">Search lncrna</a></li>
    <li class="active"><a href="miRNA.php">target miRNA</a></li>
    <li><a href="mRNA.php">target mRNA</a></li>
    <li><a href="about.html">About</a></li>
  </ul>


 <?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name="rblncdb";
$conn = new mysqli($servername, $username, $password,$db_name);
  $sql = "select * from `mirna`";
  $query= mysqli_query($conn,$sql); 

if(!$query)
{
  die("error found".mysqli_error($conn));
}
echo "
<table class='table' border='1px'>
<tr>
<th>miRNA_Acc.</th>
<th>Target_Acc.(lncRNA)</th>
</tr>";
while($row=mysqli_fetch_array($query))
{
  echo '
  <tr>
  <td>'.$row['miRNA_Acc.'].'</td>
  <td>'.$row['Target_Acc.(lncRNA)'].'</td>
  </tr>';

}
 echo "</table>"
?>
 </body>
 <footer> <small>&copy; Copyright 2021, ICAR-Indian Agricultural Statistics Research Institute</small> </footer> 
</html>