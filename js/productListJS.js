// JavaScript Document
function loadPage(){
	$(".productcategory").click();
}
$(document).ready(function(){
    $(".productcategory").click(function(){
    	id=$(this).attr('id');
        $.ajax({
		type: "POST",
		url: "getProducts.php",
		data: { id: id },
		dataType:"html",
		success: function (data) {	
			productString="";				
			title="";
			desc="";
			link="";
			cost="";
			data=data.split("|"); 
			for(i=0;i<data.length-1;i++){				
				productString=productString+'<div class="col-sm-4 col-lg-4 col-md-4"><div class="thumbnail"><img src="';
				product=data[i].split("~");
				title=product[0];
				desc=product[1];
				link=product[2];
				cost=product[3];
				productString=productString+link+'" style="width:200px;height:150px;"><div class="caption"><h4 class="pull-right">'+cost+'</h4><h4><a href="'+title+'.php">'+title+'</a></h4><p>'+desc+'</p></div></div></div>';
			}	
			document.getElementById("productListHeading").innerHTML = id+"-Products";
                   	document.getElementById("productsList").innerHTML = productString;
		}
	});
	
    });
});