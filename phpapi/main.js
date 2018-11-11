//$(function (){

	var $order = $('#orders');
	var $todo=$('#name');
	var $username = $('#userName');
	var $clearAll=$('#btnClr');
	var d = new Date(); 
	var $today_date = d.getFullYear() + "/" +
    ("0" + (d.getMonth() + 1)).slice(-2) + "/" + ("0" + d.getDate()).slice(-2);
   
   	//console.log($today_date)	;
    var success;

    fetchData();    
	

	$('#add').on('click',function() {				
		
		var filter = {};
		filter = {
                "todos": $todo.val(),
				"date": $today_date,
				"username": $username.html()
            };
            
            var objectAsJson = JSON.stringify(filter);

            $.ajax({
                type: 'POST',
                url:  'http://localhost/phpapi/api/category/create.php',
                cache: false,
                data: objectAsJson,
                async: false,
                //contentType: "application/javascript; charset=utf-8",
                //dataType: "json",
                success: function (newOrder) {                     	               
                	fetchData();						                    
                }, //success
                error: function(qXHR, exception){					
					alert('error saving file');
				}
            });      //ajax
	});	
         

//});

function deleteTodo(id)
{
	
	var filter = {};
	filter = {
        "id": id
    };
      
    var objectAsJson = JSON.stringify(filter);

    $.ajax({
        type: 'POST',
        url:  'http://localhost/phpapi/api/category/delete.php',
        cache: false,
        data: objectAsJson,
        async: false,
        success: function (newOrder) {             
        	fetchData();	
            
        }, //success
        error: function(qXHR, exception){					
        	alert("Error!!");
		}
    });    
}  

function fetchData()
{
	//alert($username.text());	
	
	var filter = {};
	filter = {
        "username": $username.html()
    };
        
    var objectAsJson = JSON.stringify(filter);

	$.ajax({
	type: 'POST',
	url: '/phpapi/api/category/read.php',
	cache: false,
    data: objectAsJson,
    async: false,
	success: function(order){
		$order.empty();
		for(var i=0;i<order.length;i++)
		{
	       	$order.append("<tr><td class='tdWidth'/><td><input type='image' src='./img/del2.jpg' style='width:35px;height:35px' onclick='deleteTodo("+order[i].id+");'></button></td><td class='tdWidth'/><td>" +order[i].todos+" "+order[i].date+"</td></tr>");				 
		}		
	},
	error: function(){
		alert('error loding file');
	}

	});	
}

$('#btnClr').on('click',function ()	{ 	


	
	var filter = {};
	filter = {

        "username": $username.html()
    };
      
    var objectAsJson = JSON.stringify(filter);

    $.ajax({
        type: 'POST',
        url:  '/phpapi/api/category/deleteAll.php',
        cache: false,
        data: objectAsJson,
        async: false,
        //contentType: "application/javascript; charset=utf-8",
        //dataType: "json",
        success: function (newOrder) {             
        	fetchData();	
        }, //success
        error: function(qXHR, exception){					
        	alert("Error!!");
		}
    });    

});