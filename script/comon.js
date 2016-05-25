// JavaScript Document
function validation_null(id, alerting , name) {
  if(document.getElementById(id).value == ""){
	  if(alerting)	alert (name + " can't be null.");
	  
	  if (document.getElementById(id).className != "NVinput") 
	  {
		  document.getElementById(id).className = "NVinput";
	  }
	  return true;
  }
  else {
	  document.getElementById(id).className = "";
	  return false;
  }
}

function validation_NON(id, alerting , name) {
  if(isNaN(document.getElementById(id).value)){
	  if(alerting)	alert (name + " is not a number.");
	  
	  if (document.getElementById(id).className != "NVinput") 
	  {
		  document.getElementById(id).className = "NVinput";
	  }
	  return true;
  }
  else {
	  document.getElementById(id).className = "";
	  return false;
  }
}

function validation_length(id, count, alerting , name) {
	var str = document.getElementById(id).value
  if(str.length != count){
	  if(alerting)	alert (name + " is must have " + count + " digits.");
	  
	  if (document.getElementById(id).className != "NVinput") 
	  {
		  document.getElementById(id).className = "NVinput";
	  }
	  return true;
  }
  else {
	  document.getElementById(id).className = "";
	  return false;
  }
}

function validation_mail(id, alerting , name) {
	var re = /^\s*$|([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
  if(!re.test(document.getElementById(id).value)){
	  if(alerting)	alert (name + " is Not Valid.");
	  
	  if (document.getElementById(id).className != "NVinput") 
	  {
		  document.getElementById(id).className = "NVinput";
	  }
	  return true;
  }
  else {
	  document.getElementById(id).className = "";
	  return false;
  }
}

function validation_date(id, alerting , name) {
	var re = /^([0-9]{4})\-([0-9]{2})\-([0-9]{2})$/;
  if(!re.test(document.getElementById(id).value)){
	  if(alerting)	alert (name + " is Not Valid.");
	  
	  if (document.getElementById(id).className != "NVinput") 
	  {
		  document.getElementById(id).className = "NVinput";
	  }
	  return true;
  }
  else {
	  document.getElementById(id).className = "";
	  return false;
  }
}
