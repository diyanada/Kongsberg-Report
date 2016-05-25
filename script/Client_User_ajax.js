// JavaScript Document

function lord_report2(reportID, userID, projectID)
{
	var url= external_source_js("report/" + reportID + "/" + projectID);
	window.location.href = url;
}

//-----------------------------------------------------------------------------------------------------------------------------------------------

function lord_report(reportID, userID, projectID)
{
	var divv = "KNGPRRE" + projectID + "UD" + userID
		
var url= external_source_js("script/Client_User_ajax.php");
  
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
							document.getElementById(divv).innerHTML=xmlhttp.responseText;
						}
					
				   }
	xmlhttp.open("GET",url 
				 +"?log=CRXNIGVKHVOABSI"
				 +"&reportID="+reportID
				 ,true);
	xmlhttp.send();  

}

