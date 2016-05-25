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
	
	
	
	if (validation_null("u_name", validated, "Username")){
		validated = false;
	}
	if (validation_null("role", validated, "Role")){
		validated = false;
	}
	if (validation_null("language", validated, "Language")){
		validated = false;
	}
	if (validation_null("f_name", validated, "First Name")){
		validated = false;
	}
	if (validation_null("l_name", validated, "Last Name")){
		validated = false;
	}
	if (validation_null("user_mail", validated, "E-mail")){
		validated = false;
	}
	if (validation_mail("user_mail", validated, "E-mail")){
		validated = false;
	}
	if (validation_NON("tel_land", validated, "Telephone (Land Line)")){
		validated = false;
	}
	if (validation_null("tel_land", validated, "Telephone (Land Line)")){
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
		
		var url= external_source_js("page/admin/user/User_ajax.php");
		
  
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
				 
				 +"&user_id="+document.getElementById('user_id').value
				 +"&u_name="+document.getElementById('u_name').value
				 +"&u_pass=" + document.getElementById('u_pass').value 
				 
				 +"&company=" + document.getElementById('company').value 
				 
				 +"&role="+document.getElementById('role').value
				 +"&language="+document.getElementById('language').value
				 +"&f_name=" + document.getElementById('f_name').value 
				 
				 +"&l_name="+document.getElementById('l_name').value
				 +"&user_des="+document.getElementById('user_des').value
				 +"&user_mail=" + document.getElementById('user_mail').value 
				 
				 +"&tel_land=" + document.getElementById('tel_land').value 
				 +"&tel_mob="+document.getElementById('tel_mob').value
				 +"&user_fax="+document.getElementById('user_fax').value
				 ,true);
	xmlhttp.send();  
}
}

//-----------------------------------------------------------------------------------------------------------------------------------------------

function search_querey()
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
		
		var url= external_source_js("page/admin/user/User_ajax.php");
  
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
				 ,true);
	xmlhttp.send();  
}
}