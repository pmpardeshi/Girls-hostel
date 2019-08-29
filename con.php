<?php
$con=mysqli_connect("localhost","root","123456");
$db=mysqli_select_db($con,"LIST2");
if($con){
    echo 'db connected';
}

$opmech=$_POST['opmech'];
$opauto=$_POST['opauto'];
$opinstru=$_POST['opinstru'];
$opcomp=$_POST['opcomp'];
$opcivil=$_POST['opcivil'];
$opentc=$_POST['opentc'];

$obcmech=$_POST['obcmech'];
$obcauto=$_POST['obcauto'];
$obcinstru=$_POST['obcinstru'];
$obccomp=$_POST['obccomp'];
$obccivil=$_POST['obccivil'];
$obcentc=$_POST['obcentc'];


$scmech=$_POST['scmech'];
$scauto=$_POST['scauto'];
$scinstru=$_POST['scinstru'];
$sccomp=$_POST['sccomp'];
$sccivil=$_POST['sccivil'];
$scentc=$_POST['scentc'];


$stmech=$_POST['stmech'];
$stauto=$_POST['stauto'];
$stinstru=$_POST['stinstru'];
$stcomp=$_POST['stcomp'];
$stcivil=$_POST['stcivil'];
$stentc=$_POST['stentc'];

$ntamech=$_POST['ntamech'];
$ntaauto=$_POST['ntaauto'];
$ntainstru=$_POST['ntainstru'];
$ntacomp=$_POST['ntacomp'];
$ntacivil=$_POST['ntacivil'];
$ntaentc=$_POST['ntaentc'];


$ntbmech=$_POST['ntbmech'];
$ntbauto=$_POST['ntbauto'];
$ntbinstru=$_POST['ntbinstru'];
$ntbcomp=$_POST['ntbcomp'];
$ntbcivil=$_POST['ntbcivil'];
$ntbentc=$_POST['ntbentc'];

$ntcmech=$_POST['ntcmech'];
$ntcauto=$_POST['ntcauto'];
$ntcinstru=$_POST['ntcinstru'];
$ntccomp=$_POST['ntccomp'];
$ntccivil=$_POST['ntccivil'];
$ntcentc=$_POST['ntcentc'];

$ntdmech=$_POST['ntdmech'];
$ntdauto=$_POST['ntdauto'];
$ntdinstru=$_POST['ntdinstru'];
$ntdcomp=$_POST['ntdcomp'];
$ntdcivil=$_POST['ntdcivil'];
$ntdentc=$_POST['ntdentc'];

//session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$query1="update hostellist set Mechanical='$opmech', Automobile='$opauto',Instrumentation='$opinstru',Computer='$opcomp',Civil='$opcivil',ENTC='$opentc' where Categary='OPEN'";
	
	$query2="update hostellist set Mechanical='$obcmech', Automobile ='$obcauto',Instrumentation='$obcinstru',Computer='$obccomp',Civil='$obccivil',ENTC='$obcentc' where Categary='OBC'";
	
	$query3="update hostellist set Mechanical='$stmech', Automobile ='$stauto',Instrumentation='$stinstru',Computer='$stcomp',Civil='$stcivil',ENTC='$stentc' where Categary='ST'";
	
	$query4="update hostellist set Mechanical='$scmech', Automobile ='$scauto',Instrumentation='$scinstru',Computer='$sccomp',Civil='$sccivil',ENTC='$scentc' where Categary='SC'";


$query5="update hostellist set Mechanical='$ntamech', Automobile ='$ntaauto',Instrumentation='$ntainstru',Computer='$ntacomp',Civil='$ntacivil',ENTC='$ntaentc' where Categary='VJNT/NT(A)'";


$query6="update hostellist set Mechanical='$ntbmech', Automobile ='$ntbauto',Instrumentation='$ntbinstru',Computer='$ntbcomp',Civil='$ntbcivil',ENTC='$ntbentc' where Categary='NT(B)'";

$query7="update hostellist set Mechanical='$ntcmech', Automobile ='$ntcauto',Instrumentation='$ntcinstru',Computer='$ntccomp',Civil='$ntccivil',ENTC='$ntcentc' where Categary='NT(C)'";


$query8="update hostellist set Mechanical='$ntdmech', Automobile ='$ntdauto',Instrumentation='$ntdinstru',Computer='$ntdcomp',Civil='$ntdcivil',ENTC='$ntdentc' where Categary='NT(D)'";





	mysqli_query($con,$query1);
	mysqli_query($con,$query2);
	mysqli_query($con,$query3);
	mysqli_query($con,$query4);
	mysqli_query($con,$query5);
	mysqli_query($con,$query6);
	mysqli_query($con,$query7);
	mysqli_query($con,$query8);

    
}
mysqli_close($con);
?>


<!DOCTYPE html>
<html>
<head>
<center><h1>hostel list</h1></center>

 <link href = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel = "stylesheet">
      
  
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src = "//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
      
  
</head>
<style>
body
{
padding:100px 300px;
}
table,td{
border:1px solid ,#add;
padding:5px;    
text-align: left ;

}
</style>
<body>

<div class="container">

<?php
    $con=mysqli_connect("localhost","root","123456");
    $db=mysqli_select_db($con,"LIST2");

	$query1=mysqli_query($con,"select * from hostellist where Categary='OPEN'");
	$query2=mysqli_query($con,"select * from hostellist where Categary='OBC'");
	$query3=mysqli_query($con,"select * from hostellist where Categary='SC'");
	$query4=mysqli_query($con,"select * from hostellist where Categary='ST'");
	$query5=mysqli_query($con,"select * from hostellist where Categary='VJNT/NT(A)'");
	$query6=mysqli_query($con,"select * from hostellist where Categary='NT(B)'");
	$query7=mysqli_query($con,"select * from hostellist where Categary='NT(C)'");
	$query8=mysqli_query($con,"select * from hostellist where Categary='NT(D)'");
	
	$row1=mysqli_fetch_array($query1);
	$row2=mysqli_fetch_array($query2);
	$row3=mysqli_fetch_array($query3);
	$row4=mysqli_fetch_array($query4);
	$row5=mysqli_fetch_array($query5);
	$row6=mysqli_fetch_array($query6);
	$row7=mysqli_fetch_array($query7);
	$row8=mysqli_fetch_array($query8);
	
   mysqli_close($con); 
?>

<form method="post" action="con.php">
<table class="table table-bordered" align="center">
<tr style="background-color:blue; color:white;" ><td>Categary</td>
<td>Mechanical</td>
<td>Automobile</td>
<td>Instrumentation<t/td>
<td>Computer</td>
<td>Civil</td>
<td>ENTC</td></tr>

<tr><td>OPEN</td>

<td><input type="text" size="5" id="opmech" name="opmech" value="<?php echo $row1['Mechanical']; ?>" /> </td>
<td><input type="text" size="5" id="opmech" name="opauto" value="<?php echo $row1['Automobile']; ?>" /></td>
<td><input type="text" size="5"  id="opmech" name="opinstru" value="<?php echo $row1['Instrumentation']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="opcomp" value="<?php echo $row1['Computer']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="opcivil" value="<?php echo $row1['Civil']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="opentc" value="<?php echo $row1['ENTC']; ?>" /></td>
</tr>

<tr><td>OBC</td>

<td><input type="text" size="5" id="opmech" name="obcmech" value="<?php echo $row2['Mechanical']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="obcauto" value="<?php echo $row2['Automobile']; ?>" /></td>
<td><input type="text" size="5"  id="opmech" name="obcinstru" value="<?php echo $row2['Instrumentation']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="obccomp" value="<?php echo $row2['Computer']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="obccivil" value="<?php echo $row2['Civil']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="obcentc" value="<?php echo $row2['ENTC']; ?>" /></td>
</tr>

<tr><td>SC</td>

<td><input type="text" size="5" id="opmech" name="scmech" value="<?php echo $row3['Mechanical']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="scauto" value="<?php echo $row3['Automobile']; ?>" /></td>
<td><input type="text" size="5"  id="opmech" name="scinstru" value="<?php echo $row3['Instrumentation']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="sccomp" value="<?php echo $row3['Computer']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="sccivil" value="<?php echo $row3['Civil']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="scentc" value="<?php echo $row3['ENTC']; ?>" /></td>
</tr>
<tr><td>ST</td>

<td><input type="text" size="5" id="opmech" name="stmech" value="<?php echo $row4['Mechanical']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="stauto" value="<?php echo $row4['Automobile']; ?>" /></td>
<td><input type="text" size="5"  id="opmech" name="stinstru" value="<?php echo $row4['Instrumentation']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="stcomp" value="<?php echo $row4['Computer']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="stcivil" value="<?php echo $row4['Civil']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="stentc" value="<?php echo $row4['ENTC']; ?>" /></td>
</tr>
<tr><td>VJNT/NT(A)</td>

<td><input type="text" size="5" id="opmech" name="ntamech" value="<?php echo $row5['Mechanical']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="ntaauto" value="<?php echo $row5['Automobile']; ?>" /></td>
<td><input type="text" size="5"  id="opmech" name="ntainstru" value="<?php echo $row5['Instrumentation']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="ntacomp" value="<?php echo $row5['Computer']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="ntacivil" value="<?php echo $row5['Civil']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="ntaentc" value="<?php echo $row5['ENTC']; ?>" /></td>
</tr>
<tr><td>NT(B)</td>

<td><input type="text" size="5" id="opmech" name="ntbmech" value="<?php echo $row6['Mechanical']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="ntbauto" value="<?php echo $row6['Automobile']; ?>" /></td>
<td><input type="text" size="5"  id="opmech" name="ntbinstru" value="<?php echo $row6['Instrumentation']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="ntbcomp" value="<?php echo $row6['Computer']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="ntbcivil" value="<?php echo $row6['Civil']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="ntbentc" value="<?php echo $row6['ENTC']; ?>" /></td>
</tr>
<tr><td>NT(C)</td>

<td><input type="text" size="5" id="opmech" name="ntcmech" value="<?php echo $row7['Mechanical']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="ntcauto" value="<?php echo $row7['Automobile']; ?>" /></td>
<td><input type="text" size="5"  id="opmech" name="ntcinstru" value="<?php echo $row7['Instrumentation']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="ntccomp" value="<?php echo $row7['Computer']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="ntccivil" value="<?php echo $row7['Civil']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="ntcentc" value="<?php echo $row7['ENTC']; ?>" /></td>
</tr>

<tr><td>NT(D)</td>

<td><input type="text" size="5" id="opmech" name="ntdmech" value="<?php echo $row8['Mechanical']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="ntdauto" value="<?php echo $row8['Automobile']; ?>" /></td>
<td><input type="text" size="5"  id="opmech" name="ntdinstru" value="<?php echo $row8['Instrumentation']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="ntdcomp" value="<?php echo $row8['Computer']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="ntdcivil" value="<?php echo $row8['Civil']; ?>" /></td>
<td><input type="text" size="5" id="opmech" name="ntdentc" value="<?php echo $row8['ENTC']; ?>" /></td>
</tr>
</table>
<br>
<center><button type="submit" name="submit">Submit</button>
</form>
</div>
</body>
</html>
