<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
          $co = mysqli_connect("localhost","root","123456");
                  
       //   $sql = "CREATE DATABASE LIST";
         
       //  mysqli_query($co, $sql);
           
         
         mysqli_select_db($co,'LIST2');
         
         
         
         
        // $t="create table info(username varchar(50),password varchar(40))";
         
                            
            $result=mysqli_query($co,"select * from hostellist");
            if($result)
            { 
                echo "connected";
                
            }
            $Open_Remains_Seat=0;
           $i=1;
          
                while ($i < mysqli_num_fields($result))
                {   
                    $meta=$result->fetch_field_direct($i);
                    echo $meta->name."<br>";
                    $a=$meta->name;
                   $PH_Result= mysqli_query($co,"select * from $a where PH='Y' OR PH='y'");
                    
                    while($PH_Row= mysqli_fetch_assoc($PH_Result))
                    {
                        $sr=$PH_Row['SR_NO'];
                        $Set_flag=mysqli_query($co, "update $a set Flag=1 where SR_NO=$sr");
                     mysqli_query($co,"Insert into SeatAllocated select * from $a where SR_NO=$sr");
                                       
                    }
              
                    
                    
                    $r= mysqli_query($co,"select * from hostellist");
                    
                    if(!$r)
                    {
                        echo ' not executed';
                    }
            else {
                       while ($rows= mysqli_fetch_assoc($r))
                 {
                            
                     $Aloc_Count=$rows[$a];
                     $c=$rows['Categary'];
                     echo $c."  "; 
                     echo $Aloc_Count."<br>";
                    $count=$Aloc_Count;
                    $flag=0;
                    
                    while ($count != 0)
                    {
                     
                         if($c=="open"){
                         $Alloc_flag= openMax($a);
                         echo $Alloc_flag;
                         if($Alloc_flag)
                         {
                              $Aloc_Count--;
                             
                               $flag=1;
                             
                         }
                         
                        
                         }else
                         {
                         // categoryMax($a);
                          
                          
                           $Alloc_flag= PerticularCategoryMax($a, $c);
                            echo $Alloc_flag;
                         if($Alloc_flag)
                         {
                              $Aloc_Count--;
                             
                               $flag=0;
                             
                         }
                          
                         }
                         
                         $count--;
                    }
                    
                    if($flag==1)
                    {
                        $Open_Remains_Seat_Branch+=$Aloc_Count;
                        echo "Open Remain seat:".$Open_Remains_Seat_Branch."<br>";
                        
                    }
                   else if($flag==0)
                    {
                        $Category_Remains_Seat_Branch+=$Aloc_Count;
                        echo "Category Remain seat:".$Category_Remains_Seat_Branch."<br>";
                    }
                        
                    
                         
                 }
                  }
                  
                  if($Category_Remains_Seat_Branch!=0)
                  {
                     $Count_Cast_Remain=$Category_Remains_Seat_Branch;
                     while($Count_Cast_Remain!=0)
                     {
                         $flag_Cast=CategoryMax($a, $c);
                         if($flag_Cast)
                         {
                             $Category_Remains_Seat_Branch--;
                         }
                         
                         $Count_Cast_Remain--;
                     }
                     echo $Category_Remains_Seat_Branch."<br> Branch wise ho gaya..<br>";
                  
                     
                  }
                   if($Open_Remains_Seat_Branch!=0)
                  {
                     $Count_Open_Remain=$Open_Remains_Seat_Branch;
                     while($Count_Open_Remain!=0)
                     {
                         $flag_Open=OpenMax($a);
                         if($flag_Open)
                         {
                             $Open_Remains_Seat_Branch--;
                         }
                         
                         $Count_Open_Remain--;
                         
                     }
                 
                  
                     
                  }
                  
                  
                  
                  
                  
                  
                    $Vacunt+=$Category_Remains_Seat_Branch;
                    $Vacunt+=$Open_Remains_Seat_Branch;
                  
                    $Open_Remains_Seat_Branch=0;
                    $Category_Remains_Seat_Branch=0;
                    $i=$i+1;
                
                   
                }
                
                
                
                echo "Final remains Seats from all branch:".$Vacunt;
              $result2=mysqli_query($co,"select * from hostellist");

                if($Vacunt!=0)
                {  $Vacant_Count=$Vacunt;
                    while ($Vacant_Count !=0)
                    {
                    $max=0;
                    $s=0;
                    $j=1;
                    
                     while ($j < mysqli_num_fields($result2))
                   {   
                    $Final_meta=$result->fetch_field_direct($j);
                         echo $Final_meta->name."<br>";
                    $Branch_Name=$Final_meta->name;
                     $s=OpenToAll($Branch_Name);
                                          
                      if($s==0)
                      {   $j++;
                          continue;
                      }
                   else {
                       $res1= mysqli_query($co,"select * from $Branch_Name where SR_NO=$s");
                       
                       $r= mysqli_fetch_assoc($res1);
                       
                            $m=$r['Pointer'];
                           
                            $Date_Of_Birth=$r['DOB'];
                            
                            //$s=$r['SR_NO'];
                            $total=$r['Total_Marks'];
                            
                            
                         if($m>=$max)
                           {
                                if($max==$m)
                                {
                                 if($total>$totalMax)
                                 {
                                     $max=$m;
                                     $sr=$s;
                                      $totalMax=$total;
                                      $Branch_Back_Name=$Branch_Name;

                                 } else if($total==$totalMax)
                                     {
                                       if($Date_Of_Birth>$Date_Of_BirthMax)
                                       {
                                           $max=$m;
                                           $sr=$s;
                                            $totalMax=$total;
                                             $Branch_Back_Name=$Branch_Name;

                                          
                                           
                                       }
                                     
                                     
                                     
                                 }
                                    
                                }
                                else {
                                    
                                
                              $max=$m;
                              $sr=$s;
                              $totalMax=$total;
                              $Date_of_BirthMax=$Date_Of_Birth;
                              $Branch_Back_Name=$Branch_Name;
                                }
                               
                           }
                            }
                       $j++;
                    
                        }
                        
                         if($max!=0)
                     {
                       
                       echo $max."<br>";
                       echo $Branch_Back_Name."<br>";
                       echo 'SR_NO :'.$sr;
                       
                     $Set_flag=mysqli_query($co, "update $Branch_Back_Name set Flag=1 where SR_NO=$sr");
                     mysqli_query($co,"Insert into SeatAllocated(SR_NO,Roll_No,Full_Name,Category,PH,Pointer,Total_Marks,DOB,Flag) select * from $Branch_Name where SR_NO=$sr");
                     $Vacunt--;
                     }
                     
                     
                   $Vacant_Count--;
  
   
                   }
                     
                }
                    
                
               
                
                
                
               
                
               function openMax($a)
                {
                    $co = mysqli_connect("localhost","root","123456");    
         
       mysqli_select_db($co,'LIST2');
         
        

                   // $max=0;
                    
                     $branch= mysqli_query($co, "select * from $a ");
                        
                    $max=0;
                    $sr=0;
                    
                    
                   
                                       
                  
                       while ($r= mysqli_fetch_assoc($branch))
                       {
                            $m=$r['Pointer'];
                            $f=$r['Flag'];
                            $Date_Of_Birth=$r['DOB'];
                            
                            $s=$r['SR_NO'];
                            $total=$r['Total_Marks'];
                            $PH=$r['PH'];
                            
                            
                            
                            
                           
                           if($m>=$max && $m!=0 && $f==0)
                           {
                                if($max==$m)
                                {
                                 if($total>$totalMax)
                                 {
                                     $max=$m;
                                     $sr=$s;
                                      $totalMax=$total;
                                 } else if($total==$totalMax)
                                     {
                                       if($Date_Of_Birth>$Date_Of_BirthMax)
                                       {
                                           $max=$m;
                                           $sr=$s;
                                            $totalMax=$total;
                                          
                                           
                                       }
                                     
                                     
                                     
                                 }
                                    
                                }
                                else {
                                    
                                
                              $max=$m;
                              $sr=$s;
                              $totalMax=$total;
                              $Date_of_BirthMax=$Date_Of_Birth;
                                }
                               
                           }
                            }
                       
                       if($max==0)
                       {
                           return false;
                       }
                        else{
                       
                       echo $max."<br>";
                     $Set_flag=mysqli_query($co, "update $a set Flag=1 where SR_NO=$sr");
                     mysqli_query($co,"Insert into SeatAllocated select * from $a where SR_NO=$sr");
                     
                     
                     return true;
                        }
                      
                          
                             
                }        
                

                
                
                
                
                //category max
                     function CategoryMax($a,$c)
                {
                    $co = mysqli_connect("localhost","root","123456");    
         
       mysqli_select_db($co,'LIST2');
         
        

                   // $max=0;
                    
                     $branch= mysqli_query($co, "select * from $a ");
                        
                    $max=0;
                    $sr=0;
                    
                  
                       while ($r= mysqli_fetch_assoc($branch))
                       {
                            
                           
                           
                           $m=$r['Pointer'];
                            $f=$r['Flag'];
                            $Date_Of_Birth=$r['DOB'];
                            
                            $s=$r['SR_NO'];
                            $total=$r['Total_Marks'];
                            $Cast=$r['Category'];
                          
                            
                            
                           
                           if($m>=$max && $m!=0 && $f==0 && $Cast!="OPEN")
                           {
                                if($max==$m)
                                {
                                 if($total>$totalMax)
                                 {
                                     $max=$m;
                                     $sr=$s;
                                      $totalMax=$total;
                                 } else if($total==$totalMax)
                                     {
                                       if($Date_Of_Birth>$Date_Of_BirthMax)
                                       {
                                           $max=$m;
                                           $sr=$s;
                                            $totalMax=$total;
                                          
                                           
                                       }
                                     
                                     
                                     
                                 }
                                    
                                }
                                else {
                                    
                                
                              $max=$m;
                              $sr=$s;
                              $totalMax=$total;
                              $Date_of_BirthMax=$Date_Of_Birth;
                                }
                               
                           }
                            }
                       
                       if($max==0)
                       {
                           return false;
                       }
                        else{
                       
                       echo $max."<br>";
                     $Set_flag=mysqli_query($co, "update $a set Flag=1 where SR_NO=$sr");
                     mysqli_query($co,"Insert into SeatAllocated select * from $a where SR_NO=$sr");
                     return true;
                        }
                      
                          
                             
                }        
                

              



              
                
                //Perticular Category
                
                
                
                
                
                  function PerticularCategoryMax($a,$c)
                {
                    $co = mysqli_connect("localhost","root","123456");    
         
       mysqli_select_db($co,'LIST2');
         
        

                   // $max=0;
                    
                     $branch= mysqli_query($co, "select * from $a ");
                        
                    $max=0;
                    $sr=0;
                    
                  
                       while ($r= mysqli_fetch_assoc($branch))
                       {
                            
                           
                           
                           $m=$r['Pointer'];
                            $f=$r['Flag'];
                            $Date_Of_Birth=$r['DOB'];
                            
                            $s=$r['SR_NO'];
                            $total=$r['Total_Marks'];
                            $Cast=$r['Category'];
                          
                            
                            
                           
                           if($m>=$max && $m!=0 && $f==0 && !strcasecmp($Cast,$c))
                           {
                                if($max==$m)
                                {
                                 if($total>$totalMax)
                                 {
                                     $max=$m;
                                     $sr=$s;
                                      $totalMax=$total;
                                 } else if($total==$totalMax)
                                     {
                                       if($Date_Of_Birth>$Date_Of_BirthMax)
                                       {
                                           $max=$m;
                                           $sr=$s;
                                            $totalMax=$total;
                                          
                                           
                                       }
                                     
                                     
                                     
                                 }
                                    
                                }
                                else {
                                    
                                
                              $max=$m;
                              $sr=$s;
                              $totalMax=$total;
                              $Date_of_BirthMax=$Date_Of_Birth;
                                }
                               
                           }
                            }
                       
                       if($max==0)
                       {
                           return false;
                       }
                        else{
                       
                       echo $max."<br>";
                     $Set_flag=mysqli_query($co, "update $a set Flag=1 where SR_NO=$sr");
                     mysqli_query($co,"Insert into SeatAllocated select * from $a where SR_NO=$sr");
                     return true;
                        }
                      
                          
                             
                }        
                
          //OpenToAll function
                
                 function OpenToAll($a)
                {
                    $co = mysqli_connect("localhost","root","123456");    
         
       mysqli_select_db($co,'LIST2');
         
        

                   // $max=0;
                    
                     $branch= mysqli_query($co, "select * from $a ");
                        
                    $max=0;
                    $sr=0;
                    
                    
                   
                                       
                  
                       while ($r= mysqli_fetch_assoc($branch))
                       {
                            $m=$r['Pointer'];
                            $f=$r['Flag'];
                            $Date_Of_Birth=$r['DOB'];
                            $s=$r['SR_NO'];
                            
                           
                            $total=$r['Total_Marks'];
                            
                            
                            
                            
                           
                           if($m>=$max && $m!=0 && $f==0)
                           {
                                if($max==$m)
                                {
                                 if($total>$totalMax)
                                 {
                                     $max=$m;
                                     $sr=$s;
                                      $totalMax=$total;
                                 } else if($total==$totalMax)
                                     {
                                       if($Date_Of_Birth>$Date_Of_BirthMax)
                                       {
                                           $max=$m;
                                           $sr=$s;
                                            $totalMax=$total;
                                          
                                           
                                       }
                                     
                                     
                                     
                                 }
                                    
                                }
                                else {
                                    
                                
                              $max=$m;
                              $sr=$s;
                              $totalMax=$total;
                              $Date_of_BirthMax=$Date_Of_Birth;
                                }
                               
                           }
                            }
                       
                                              
                       
                     
                     return $sr;
                        
                      
                          
                             
                }       
                

              



        
        ?>
    </body>
</html>