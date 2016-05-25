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
	
	
	if (validation_null("rep_ty_name", validated, "Report Type Name")){
		validated = false;
	}
	

	if (validated == true)
	{
		
		var url= external_source_js("page/admin/report_type/Report_type_ajax.php");
		
  
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
				 
				 +"&rep_ty_id="+document.getElementById('rep_ty_id').value
				 +"&rep_ty_name="+document.getElementById('rep_ty_name').value
				 +"&rep_ty_des=" + document.getElementById('rep_ty_des').value 
				 ,true);
	xmlhttp.send();  
}
}

//-----------------------------------------------------------------------------------------------------------------------------------------------

function search_querey()
{
	
		
		var url= external_source_js("page/admin/report_type/Report_type_ajax.php");
  
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
				 
				 +"&rep_ty_id="+document.getElementById('rep_ty_id').value
				 +"&rep_ty_name="+document.getElementById('rep_ty_name').value
				 +"&rep_ty_des=" + document.getElementById('rep_ty_des').value 
				 ,true);
	xmlhttp.send();  
}
