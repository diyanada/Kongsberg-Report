// JavaScript Document

function return_querey()
{
	document.getElementById("spriner").style.display = 'none';
	document.getElementById('button').disabled = false;
}

//-----------------------------------------------------------------------------------------------------------------------------------------------

function run_querey()
{
	var validated = true;
	
	if (validation_null("pro_name", validated, "Project Name")){
		validated = false;
	}
	if (validation_null("s_date", validated, "Start Date")){
		validated = false;
	}
	if (validation_date("s_date", validated, "Start Date")){
		validated = false;
	}
	if (validation_null("e_date", validated, "End Date")){
		validated = false;
	}
	if (validation_date("e_date", validated, "End Date")){
		validated = false;
	}
	

	if (validated == true)
	{
		
		var url= external_source_js("page/admin/project/Project_ajax.php");
		
  
 		 document.getElementById('button').disabled = "disabled";
  
				  if (window.XMLHttpRequest)
					{// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					}
				  else
					{// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
				  xmlhttp.onreadystatechange=function()
					{
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							document.getElementById("resoult").innerHTML=xmlhttp.responseText;
						}
					
				   }
	xmlhttp.open("GET",url 
				 +"?log="+document.getElementById('__action_ts').value
				 +"&token=" + document.getElementById('__action_token').value 
				 
				 +"&pro_id="+document.getElementById('pro_id').value
				 +"&pro_name="+document.getElementById('pro_name').value
				 +"&pro_des=" + document.getElementById('pro_des').value 
				 +"&s_date="+document.getElementById('s_date').value
				 +"&e_date=" + document.getElementById('e_date').value 
				 ,true);
	xmlhttp.send();  
}
}

//-----------------------------------------------------------------------------------------------------------------------------------------------

function search_querey()
{
	
		var url= external_source_js("page/admin/project/Project_ajax.php");
  
 		 document.getElementById('button').disabled = "disabled";
		 document.getElementById("spriner").style.display = 'block';
  
				  if (window.XMLHttpRequest)
					{// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					}
				  else
					{// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
				  xmlhttp.onreadystatechange=function()
					{
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							document.getElementById("resoult").innerHTML=xmlhttp.responseText;
							return_querey();
						}
					
				   }
	xmlhttp.open("GET",url 
				  +"?log="+document.getElementById('__action_ts').value
				 +"&token=" + document.getElementById('__action_token').value 
				 
				 +"&pro_id="+document.getElementById('pro_id').value
				 +"&pro_name="+document.getElementById('pro_name').value
				 +"&pro_des=" + document.getElementById('pro_des').value 
				 +"&o_date="+document.getElementById('o_date').value
				 ,true);
	xmlhttp.send();  
}

//-----------------------------------------------------------------------------------------------------------------------------------------------

function map_search_querey()
{
	var validated = true;
	
	
	
	
	if (validation_mail("user_mail", validated, "E-mail")){
		validated = false;
	}
	if (validation_NON("tel_land", validated, "Telephone (Land Line)")){
		validated = false;
	}	
	if (validation_NON("tel_mob", validated, "Telephone (Mobile)")){
		validated = false;
	}
	if (validation_NON("user_fax", validated, "Fax")){
		validated = false;
	}

	if (validated == true)
	{
		
		var url= external_source_js("page/admin/project/Project_ajax.php");
  
 		 document.getElementById('button').disabled = "disabled";
		 document.getElementById("spriner").style.display = 'block';
  
				  if (window.XMLHttpRequest)
					{// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					}
				  else
					{// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
				  xmlhttp.onreadystatechange=function()
					{
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							document.getElementById("resoult").innerHTML=xmlhttp.responseText;
							return_querey();
						}
					
				   }
	xmlhttp.open("GET",url 
				 +"?log="+document.getElementById('__action_ts').value
				 +"&token=" + document.getElementById('__action_token').value 
				 
				 +"&user_id="+document.getElementById('user_id').value
				 +"&u_name="+document.getElementById('u_name').value 
				 
				 +"&role="+document.getElementById('role').value
				 +"&language="+document.getElementById('language').value
				 +"&f_name=" + document.getElementById('f_name').value 
				 
				 +"&l_name="+document.getElementById('l_name').value
				 +"&user_des="+document.getElementById('user_des').value
				 +"&user_mail=" + document.getElementById('user_mail').value 
				 
				 +"&tel_land=" + document.getElementById('tel_land').value 
				 +"&tel_mob="+document.getElementById('tel_mob').value
				 +"&user_fax="+document.getElementById('user_fax').value
				 +"&projet_id="+document.getElementById('projet_id').value 
				 ,true);
	xmlhttp.send();  
}
}

//-----------------------------------------------------------------------------------------------------------------------------------------------

function add_mapping(pro_id, user_id, role_id)
{
	var url= external_source_js("page/admin/project/Project_ajax.php");
  
  
				  if (window.XMLHttpRequest)
					{// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					}
				  else
					{// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
				  xmlhttp.onreadystatechange=function()
					{
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							document.getElementById("resoult2").innerHTML=xmlhttp.responseText;
							//return_querey();
						}
					
				   }
	xmlhttp.open("GET",url 
				 +"?log="+document.getElementById('__action_ts2').value
				 +"&token=" + document.getElementById('__action_token').value 
				 
				 +"&pro_id="+pro_id
				 +"&user_id="+user_id
				 +"&role_id="+role_id
				 ,true);
	xmlhttp.send();  

}

//-----------------------------------------------------------------------------------------------------------------------------------------------

function remove_mapping(map_id)
{
var r = confirm("Are You Sure!");
if (r == true) {
	
	var url= external_source_js("page/admin/project/Project_ajax.php");
  
  
				  if (window.XMLHttpRequest)
					{// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					}
				  else
					{// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
				  xmlhttp.onreadystatechange=function()
					{
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							document.getElementById("resoult3").innerHTML=xmlhttp.responseText;
							//return_querey();
						}
					
				   }
	xmlhttp.open("GET",url 
				 +"?log="+document.getElementById('__action_ts3').value
				 +"&token=" + document.getElementById('__action_token').value 
				 
				 +"&map_id="+map_id
				 ,true);
	xmlhttp.send();  
}

}