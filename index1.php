<?php

         $conn = mysqli_connect("localhost","root","123456");
         if (!$conn)
         {
               die("Connection failed: " . mysqli_connect_error());
           }
           else{
                echo "Connected successfully";
           }
           
                  
        /* $sql = "CREATE DATABASE LIST";
         
         mysqli_query($co, $sql);
           
         mysqli_select_db($co,'LIST');
         
        $t="create table info(username varchar(50),password varchar(40))";
         
         mysqli_query($co, $t);
                     
            $result=mysqli_query($co,"select * from info")*/       
            
              
  ?>         
            
<html>
    <head>
        <title>seat distribution list</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
 


<script type="text/javascript">
$(document).ready(function()
{
	//ajax row data
	var ajax_data =
	[
		{Category:"OPEN", Mechanical:"0 ",Automobile:" 0",Instrumentation:" 0",Computer:"0 ",Civil:"0 ",ENTC:" 0"},
                {Category:"OBC", Mechanical:" 0",Automobile:" 0",Instrumentation:" 0",Computer:"0 ",Civil:" 0",ENTC:"0 "},
		{Category:"SC", Mechanical:"0 ",Automobile:" 0",Instrumentation:"0 ",Computer:" 0",Civil:" 0",ENTC:" 0"},
		{Category:"ST", Mechanical:" 0",Automobile:" 0",Instrumentation:" 0",Computer:" 0",Civil:" 0",ENTC:"0 "},
		{Category:"VJNT/NT(A)", Mechanical:"0 ",Automobile:"0 ",Instrumentation:"0",Computer:" 0",Civil:" 0",ENTC:" 0"},
                {Category:"NT(B)", Mechanical:" 0",Automobile:" 0",Instrumentation:"0 ",Computer:" 0",Civil:" 0",ENTC:" 0"},
		{Category:"NT(C)", Mechanical:" 0",Automobile:"0 ",Instrumentation:" 0",Computer:" 0",Civil:" 0",ENTC:"0 "},
		{Category:"NT(D)", Mechanical:"0 ",Automobile:" 0",Instrumentation:" 0",Computer:"0 ",Civil:"0 ",ENTC:"0 "},
		
		
	]



	var random_id = function  () 
	{
		var id_num = Math.random().toString(9).substr(2,3);
		var id_str = Math.random().toString(36).substr(2);
		
		return id_num + id_str;
	}


	//--->create data table > start
	var tbl = '';
	tbl +='<table class="table table-hover">'

		//--->create table header > start
		tbl +='<thead>';
			tbl +='<tr>';
			tbl +='<th>Categary</th>';
			tbl +='<th>Mechanical</th>';
			tbl +='<th>Automobile</th>';
                        tbl +='<th>Instrumentation</th>';
			tbl +='<th>Computer</th>';
                        tbl +='<th>Civil</th>';
			tbl +='<th>ENTC</th>';
			tbl +='</tr>';
		tbl +='</thead>';
		//--->create table header > end

		
		//--->create table body > start
		tbl +='<tbody>';

			//--->create table body rows > start
			$.each(ajax_data, function(index, val) 
			{
				//you can replace with your database row id
				var row_id = random_id();

				//loop through ajax row data
				tbl +='<tr row_id="'+row_id+'">';
					tbl +='<td ><div class="row_data" edit_type="click" col_name="Category">'+val['Category']+'</div></td>';
					tbl +='<td ><div class="row_data" edit_type="click" col_name="Mechanical">'+val['Mechanical']+'</div></td>';
                                        tbl +='<td ><div class="row_data" edit_type="click" col_name="Automobile">'+val['Automobile']+'</div></td>';
				        tbl +='<td ><div class="row_data" edit_type="click" col_name="Instrumentation">'+val['Instrumentation']+'</div></td>';
                                        tbl +='<td ><div class="row_data" edit_type="click" col_name="Computer">'+val['Computer']+'</div></td>';
                                        tbl +='<td ><div class="row_data" edit_type="click" col_name="Civil">'+val['Civil']+'</div></td>';
                                        tbl +='<td ><div class="row_data" edit_type="click" col_name="E&TC">'+val['ENTC']+'</div></td>';
                                        

	                               
                                        					//--->edit options > start
					tbl +='<td>';
					 
						tbl +='<span class="btn_edit" > <a href="#" class="btn btn-link " row_id="'+row_id+'" > Edit</a> </span>';

						//only show this button if edit button is clicked
						tbl +='<span class="btn_save"> <a href="#" class="btn btn-link"  row_id="'+row_id+'"> Save</a> | </span>';
						tbl +='<span class="btn_cancel"> <a href="#" class="btn btn-link" row_id="'+row_id+'"> Cancel</a> | </span>';

					tbl +='</td>';
					//--->edit options > end
					
				tbl +='</tr>';
			});

			//--->create table body rows > end

		tbl +='</tbody>';
		//--->create table body > end

	tbl +='</table>'	
	//--->create data table > end

	//out put table data
	$(document).find('.tbl_user_data').html(tbl);

	$(document).find('.btn_save').hide();
	$(document).find('.btn_cancel').hide(); 


	//--->make div editable > start
	$(document).on('click', '.row_data', function(event) 
	{
		event.preventDefault(); 

		if($(this).attr('edit_type') == 'button')
		{
			return false; 
		}

		//make div editable
		$(this).closest('div').attr('contenteditable', 'true');
		//add bg css
		$(this).addClass('bg-warning').css('padding','5px');

		$(this).focus();
	})	
	//--->make div editable > end


	//--->save single field data > start
	$(document).on('focusout', '.row_data', function(event) 
	{
		event.preventDefault();

		if($(this).attr('edit_type') == 'button')
		{
			return false; 
		}

		var row_id = $(this).closest('tr').attr('row_id'); 
		
		var row_div = $(this)				
		.removeClass('bg-warning') //add bg css
		.css('padding','')

		var col_name = row_div.attr('col_name'); 
		var col_val = row_div.html(); 

		var arr = {};
		arr[col_name] = col_val;

		//use the "arr"	object for your ajax call
		//$.extend(arr, {row_id:row_id});

		//out put to show
		//$('.post_msg').html( '<pre class="bg-success">'+JSON.stringify(arr, null, 2) +'</pre>');
		
	})
	//--->save single field data > end

 
	//--->button > edit > start	
	$(document).on('click', '.btn_edit', function(event) 
	{
		event.preventDefault();
		var tbl_row = $(this).closest('tr');

		var row_id = tbl_row.attr('row_id');

		tbl_row.find('.btn_save').show();
		tbl_row.find('.btn_cancel').show();

		//hide edit button
		tbl_row.find('.btn_edit').hide(); 

		//make the whole row editable
		tbl_row.find('.row_data')
		.attr('contenteditable', 'true')
		.attr('edit_type', 'button')
		.addClass('bg-warning')
		.css('padding','3px')

		//--->add the original entry > start
		tbl_row.find('.row_data').each(function(index, val) 
		{  
			//this will help in case user decided to click on cancel button
			$(this).attr('original_entry', $(this).html());
		}); 		
		//--->add the original entry > end

	});
	//--->button > edit > end


	//--->button > cancel > start	
	$(document).on('click', '.btn_cancel', function(event) 
	{
		event.preventDefault();

		var tbl_row = $(this).closest('tr');

		var row_id = tbl_row.attr('row_id');

		//hide save and cacel buttons
		tbl_row.find('.btn_save').hide();
		tbl_row.find('.btn_cancel').hide();

		//show edit button
		tbl_row.find('.btn_edit').show();

		//make the whole row editable
		tbl_row.find('.row_data')
		.attr('edit_type', 'click')
		.removeClass('bg-warning')
		.css('padding','') 

		tbl_row.find('.row_data').each(function(index, val) 
		{   
			$(this).html( $(this).attr('original_entry') ); 
		});  
	});
	//--->button > cancel > end

	
	//--->save whole row entery > start	
	$(document).on('click', '.btn_save', function(event) 
	{
		event.preventDefault();
		var tbl_row = $(this).closest('tr');

		var row_id = tbl_row.attr('row_id');

		
		//hide save and cacel buttons
		tbl_row.find('.btn_save').hide();
		tbl_row.find('.btn_cancel').hide();

		//show edit button
		tbl_row.find('.btn_edit').show();


		//make the whole row editable
		tbl_row.find('.row_data')
		.attr('edit_type', 'click')
		.removeClass('bg-warning')
		.css('padding','') 

		//--->get row data > start
		var arr = {}; 
		tbl_row.find('.row_data').each(function(index, val) 
		{   
			var col_name = $(this).attr('col_name');  
			var col_val  =  $(this).html();
			arr[col_name] = col_val;
		});
		//--->get row data > end

		//use the "arr"	object for your ajax call
		//$.extend(arr, {row_id:row_id});

		//out put to show
		//$('.post_msg').html( '<pre class="bg-success">'+JSON.stringify(arr, null, 2) +'</pre>')
		 

	});
	//--->save whole row entery > end


}); 
</script>

 

<div class="panel panel-default">
  <div class="panel-heading"><b> Demo </b> </div>

  <div class="panel-body">
	
	<div class="tbl_user_data"></div>

  </div>

</div>

 

<div class="panel panel-default">
  

  <div class="panel-body">
	
	
	<div class="post_msg"> </div>

  </div>
</div>

     
    
</html>
