// JavaScript Document

function commentSubmit(){	
var commentTimeStamp=Date();
var commentTimeStamp=commentTimeStamp.toString();
//var date = new Date(d);
alert(commentTimeStamp);
var checkedValue="null";
var url = window.location.pathname;
var filename = url.substring(url.lastIndexOf('/')+1);
productname=filename.replace(".php", "");
productname=productname.replace("%20", " ");
elements=document.getElementsByName("stars");
for(i=0;i<elements.length;i++){
	a =elements[i].getAttribute( 'id' );
	if(document.getElementById(a).checked)
		checkedValue=elements[i].getAttribute( 'value' );
		
}
	$( "#commentForm" ).remove();
	document.getElementById("productComment").innerHTML="Your comment has been registered!";
	return false;	
}