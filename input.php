<?php
//include('login.php');
?>



<!DOCTYPE html>

<html>
    <head>
        <title>Girls Hostel List</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="a.css">
    </head>
    <body>
        <div class="D">
            
        <div class="d1">
            <br><br><br><br>
            
            <form action="read.php" method="post" enctype="multipart/form-data">     
          <h1 style="font-size: 40px;font-family:calibri;text-align:center;">Upload Excel Sheet</h1> 
          <input type="file" name="fexcel" id="b2"> 
          <input type="submit"  value="uploadfile" name="up" id="u1" >
           
            </form>
            
            <h1 style="font-size: 40px;font-family:calibri;text-align:center">Edit Seat Distribution File</h1>
            <a href="con.php"><input type="submit"  value="Edit" name="sexcel" id="e1"></a>
            <br><br><br><br><br><br><br>
      
                   
        </div>
        <div class="d2">
            
            <input type="button" value="GENERATE MERIT LIST" id="b1" onclick="location.href='GenerateList.php'" ><br>
            <br>
            <input type="button" value="VIEW MERIT LIST" id="b1"><br>
            <br>
            <input type="button" value="UPLOAD MERIT LIST" id="b1"><br><br>
            <input type="button" value="UPLOAD NOTICES" id="b1"><br><br>
                              
        </div>
        </div>
    </body>
</html>
