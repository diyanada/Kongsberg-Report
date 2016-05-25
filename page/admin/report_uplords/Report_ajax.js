function edits_reps(id)
{
	
	var url= external_source_js("page/admin/report_uplords/Report2_ajax.php");
  
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
							var lin = xmlhttp.responseText;
							top.tinyMCE.activeEditor.windowManager.getParams().oninsert(lin);
    						top.tinyMCE.activeEditor.windowManager.close();
						}
					
				   }
	xmlhttp.open("GET",url 
				 +"?log=JCQIJP1VBWASZWNV&ids=" + id
				 
				 ,true);
	xmlhttp.send();  
	
}

//-----------------------------------------------------------------------------------------------------------------------------------------------
function return_querey()
{
	document.getElementById("spriner").style.display = 'none';
	document.getElementById('button').disabled = false;
}


//-----------------------------------------------------------------------------------------------------------------------------------------------

function run_querey()
{
	var validated = true;
	
	
	if (validation_null("user", validated, "User")){
		validated = false;
	}
	if (validation_null("rep_type", validated, "Report Type")){
		validated = false;
	}
	

	if (validated == true)
	{
		
		var url= external_source_js("page/admin/report/Report_ajax.php");
		
  
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
				 
				 +"&user="+document.getElementById('user').value
				 +"&rep_type="+document.getElementById('rep_type').value
				 +"&pro_id="+document.getElementById('pro_id').value
				 +"&report=" + tinyMCE.get('report').getContent()
				 
				 ,true);
	xmlhttp.send();  
}
}

//-----------------------------------------------------------------------------------------------------------------------------------------------

function search_querey()
{
	
		
		var url= external_source_js("page/admin/report_uplords/Report_ajax.php");
  
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
				 
				 +"&file_tit="+document.getElementById('file_tit').value
				 ,true);
	xmlhttp.send();  
}
