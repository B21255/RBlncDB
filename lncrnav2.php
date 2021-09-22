<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
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
    function fn1()
    {
         var rd1 =document.getElementById("rd1");
         var rd2 =document.getElementById("rd2");
         if(rd1.checked==true)
          alert("selected:"+rd1.value);
          else if(rd2.checked==true)
          alert("selected:"+rd1.value);
          else
          alert("none selected:");
    }
    </script>
    </head>
    <body>
         <img src="icar.png" align="left"style="width:100px;length:100px" >
       <h1 style="text-align:center;">RbLncDB</h1>
       <img src="iasri.jpeg"align="right" style="align:right;width:150px;length:150px" >
       <h1 style="text-align:center;">(Rice Bean lncRNA Database)</h1>
<br></br>
       <ul>
  <li><a href="home.html">Home</a></li> 
  <li class="active"><a href="lncrna.html">Search lncrna</a></li>
  <li><a href="#">target miRNA</a></li>
  <li><a href="#">target mRNA</a></li>
  <li><a href="#">Statistics</a></li>
  <li><a href="#">About</a></li>
</ul>
<p></p>
 <form method="get">
 <b>Category:</b><input id = "rd3" type="radio" name="grp1" value="organism" checked>organism</input>
 <input id = "rd4" type="radio" name="grp1" value="pollutant">pollutant</input>
 <input id ="rd1" type="radio" name="grp1" value="place" >place</input>
 <input id = "rd2" type="radio" name="grp1" value="enzyme" >enzyme</input>
 <input id = "rd5" type="radio" name="grp1" value="identity" >identity</input><br>
 <br><label for="from"><b>Parameter:</b></label>
  <input type="text" id="from" name="from" value="Mycobacterium tuberculosis">
 <input type="submit" name ="btn1">
 </form>
  <br>
 <!-- <input id ="rd1" type="radio" name="grp1" value="length" >Length</input><br>
<input id = "rd2" type="radio" name="grp1" value="coding_probability" >Coding Probability</input>
 <br>
 <button onclick="fn1()" id ="btn1">Submit</button>
 <form>
 <label for="from">From:</label><br>
  <input type="text" id="from" name="from"><br>
  <label for="to">to:</label><br>
  <input type="text" id="to" name="to">
 </form> -->
 <?php
$servername = "192.168.1.104:7882";
$username = "chandana";
$password = "12345";
$db_name="chandana";
$conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_GET["btn1"])){
$a=	$_GET['grp1'];
$b=	$_GET['from'];
$sql = "select * from `chandana` where ".$a." like '%".$b."%'";
if($a=="identity")
if(is_numeric($a))
$sql = 'select * from `chandana` where identity='.$b;
$query= mysqli_query($conn,$sql); 
if(!$query)
{
die("error found".mysqli_error($conn));
}
if(mysqli_num_rows($query))
echo "
<table class='table' border='1'>
<tr>
<th>place</th>
<th>enzyme</th>
<th>organism</th>
<th>pollutant</th>
<th>identity</th>
</tr>";
while($row=mysqli_fetch_array($query,MYSQLI_NUM))
{
  echo '
  <tr>
  <td>'.$row[0].'</td>
  <td>'.$row[1].'</td>
  <td>'.$row[2].'</td>
  <td>'.$row[3].'</td>
  <td>'.$row[4].'</td>
  </tr>';
}
 echo "</table>";
}
 ?>
 </body>
</html>