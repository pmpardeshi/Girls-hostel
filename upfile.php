
    <?php

$this_dir = dirname(__FILE__);
print_r($this_dir);
echo '<br>';
//$parent_dir = realpath($this_dir . '/upfiles');
print_r($_FILES['fexcel']['name']);
 $uploadfile = $this_dir.'/'.$_FILES['fexcel']['name'];
 echo $uploadfile;
 
           if (move_uploaded_file($_FILES['fexcel']['tmp_name'], $uploadfile)) 
           {
               echo "File Uploaded Successfully!!\n";
              // shell_exec('./priya');
            
           } 
           else
           {
               echo "Something went wrong in uploading.\n";
               
               
           }
           
$connect = mysqli_connect("localhost", "root", "123456","LIST2" );
if($connect)
{
    echo '<br>Connected to database sucessfully! <br>';
}
 else {
    echo 'fail<br>';    
}


?>

<html><head><title>php reader</title>

<?php

//include the file that loads the PhpSpreadsheet classes
require 'vendor/autoload.php';

$servername = "localhost";
$username = "root";
$password = "123456";
$db="LIST2";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
	echo "<br>Connected successfully";
}



$columns= array("SR_NO", "ROLL_NO", "Full_Name","Category","PH","Pointer","Exam_Result","Hostel","Quarter");
$branchName= array("Automobile","Civil","Computer","ENTC",);
$len= count($columns);
$columns=implode(",", $columns);

//create directly an object instance of the IOFactory class, and load the xlsx file
$fxls =$_FILES['fexcel']['name'];
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($fxls);
//read excel data and store it into an array
$xls_data = $spreadsheet->getActiveSheet()->toArray(null, false, false, false);
$nr = count($xls_data); //number of rows
$branch=0;

for($i=0;$i<$nr;$i++){
	
	$xls_data[$i] = array_values(array_filter( $xls_data[$i], 'strlen' ));
        
	 echo "<br> branch code ".$branch."<br>";
	

	if (in_array("ROLLNO", $xls_data[$i],true)) {
		$branch++;
                print_r($xls_data[$i]);
               
                continue;
	}
        
        echo "<br>number of record".$i.'<br>';
        
        if(count($xls_data[$i])!=$len){
		continue;
	}

	$xls_data[$i]="'".implode("','",$xls_data[$i])."'";
	


        
	switch($branch){

		case 1:
			$sql1 = "INSERT IGNORE INTO Automobile($columns) VALUES($xls_data[$i])";
			break;

	   	case 2:
	   		$sql1 = "INSERT IGNORE INTO Civil($columns) VALUES ($xls_data[$i])";
	   		break;

	   	case 3:
	       	$sql1 = "INSERT IGNORE INTO Computer($columns) VALUES ($xls_data[$i])";
	   		break;

	    case 4:
	       	$sql1 = "INSERT IGNORE INTO ENTC($columns) VALUES ($xls_data[$i])";
	   		break;

		case 5:
	       	$sql1 = "INSERT IGNORE INTO Instrumentation($columns) VALUES ($xls_data[$i])";
	   		break;

	   	case 6:
	     	$sql1 = "INSERT IGNORE INTO Mechanical($columns) VALUES ($xls_data[$i])";
	   		break;

	    default:
	       	break;	
	}

	   	
   	mysqli_query($conn, $sql1);
	   		

}

mysqli_close($conn);

?>
</head>
</html>


           
           
           
           
           
           
        
