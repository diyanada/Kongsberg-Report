// JavaScript Document

function send_datass(data)
{
	
		
			var url= external_source_js("page/admin/report/Report_ajax.php");
  
  
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
				 
				 +"&data="+encodeURIComponent(data)
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
tinymce.init({
    selector: "textarea",
	theme: "modern",
	height: 300,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor ",
		 "kongsbeg"
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: " kongsbeg | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true 
 });
//-----------------------------------------------------------------------------------------------------------------------------------------------



function run_querey()
{
	//alert(tinyMCE.activeEditor.getContent());
	
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
				 +"&report=" + encodeURIComponent(tinyMCE.activeEditor.getContent())
				 
				 ,true);
	xmlhttp.send();  
}
}

//-----------------------------------------------------------------------------------------------------------------------------------------------

function search_querey()
{
	
		
		var url= external_source_js("page/admin/role/Role_ajax.php");
  
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
				 
				 +"&role_id="+document.getElementById('role_id').value
				 +"&role_name="+document.getElementById('role_name').value
				 +"&role_des=" + document.getElementById('role_des').value 
				 ,true);
	xmlhttp.send();  
}
//-----------------------------------------------------------------------------------------------------------------------------------------------
function remove_report(map_id)
{
var r = confirm("Are You Sure!");
if (r == true) {
	
	var url= external_source_js("page/admin/report/Report_ajax.php");
  
  
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
							document.getElementById("resoult"+map_id).innerHTML=xmlhttp.responseText;
							//return_querey();
						}
					
				   }
	xmlhttp.open("GET",url 
				 +"?log="+document.getElementById('__action_ts').value
				 +"&token=" + document.getElementById('__action_token').value 
				 
				 +"&report_id="+map_id
				 ,true);
	xmlhttp.send();  
}

}