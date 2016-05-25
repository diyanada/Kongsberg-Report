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
	
	
	if (validation_null("thought", validated, "Thought")){
		validated = false;
	}


	if (validated == true)
	{
		
		var url= external_source_js("page/admin/language_thoughts/Language_thoughts_ajax.php");

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
				 
				 +"&thought_id="+document.getElementById('thought_id').value
				 +"&thought="+document.getElementById('thought').value
				 +"&thought_des=" + document.getElementById('thought_des').value 
				 ,true);
	xmlhttp.send();  
}
}

//-----------------------------------------------------------------------------------------------------------------------------------------------

function search_querey()
{
	var validated = true;
	
	
	if (validation_null("language", validated, "Language")){
		validated = false;
	}


	if (validated == true)
	{
		
		var url= external_source_js("page/admin/language_thoughts/Language_thoughts_ajax.php");
  
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
				 
				 +"&language=" + document.getElementById('language').value 
				 ,true);
	xmlhttp.send();  
	}
}
//-----------------------------------------------------------------------------------------------------------------------------------------------

function update_querey()
{
	var validated = true;
	
	
	if (validation_null("thought", validated, "Thought")){
		validated = false;
	}


	if (validated == true)
	{
		
		var url= external_source_js("page/admin/language_thoughts/Language_thoughts_ajax.php");

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
				 
				 +"&thought_id="+document.getElementById('thought_id').value
				 +"&thought_lang="+document.getElementById('thought_lang').value
				 +"&thought="+document.getElementById('thought').value
				 +"&thought_des=" + document.getElementById('thought_des').value 
				 ,true);
	xmlhttp.send();  
}
}