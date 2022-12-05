<script type="text/javascript">
	function master(type,controller_fuction,alerts,return_function,controller_name){
		var controller = controller_name;
		var base_url = document.location.origin + '/hamaraadab/admin/';
		var target = document.getElementById('ajaxSpiner');
		var spinner = new Spinner().spin();
		target.appendChild(spinner.el);
		$.ajax({
			'url' : base_url + controller + '/' + controller_fuction,
                      'type' : 'POST', //the way you want to send data to your URL
                      'data' : JSON.parse(type),
                      'success' : function(data){ //probably this request will return anything, it'll be put in var "data"
                          var container = $('#container'); //jquery selector (get element by id)
                          if(data){
                          	spinner.stop();
                          	if(data.indexOf("forgot") > -1){
                          		window.location.reload();
                          	}else{
                          		container.html(data);
                          	}
                          }else{
                          	spinner.stop();
                          	alert(alerts);
                          	load_data_ajax(return_function);
                          }
                      }
                  });
	}

	function add_to_favourites(pid){
		var controller = 'Products';
		var base_url = '<?=base_url();?>';
		var target = document.getElementById('ajaxSpiner');
		var spinner = new Spinner().spin();
		target.appendChild(spinner.el);
		$.ajax({
			'url' : base_url + controller + '/add_to_favourites',
			'type' : 'POST',
			'data' : {'product_id' : pid},
			'success' : function(data){ 
                  //var container = $('#container'); 
                  if(data){
                  	spinner.stop();

                  	if(data.indexOf("forgot") > -1) {
                  		window.location.reload();

                  	}else{
                      //container.html(data);

                      alert('Added');
                  }
              }else{
              	$(".wlc").css("background-color", "red");
              	$(".wl").attr("onclick","return remove_from_favourites('"+pid+"')");
              	alert('Added');
              	spinner.stop();
              }}

          });
	} 
</script>
<script type="text/javascript">
  
  function abc(){
    alert("hello");
  }
</script>
<script type="text/javascript">
  function update_cart(qty,rowid,idb){

    var controller = 'Shopping_cart';
    var base_url = '<?=base_url();?>';
    var target = document.getElementById('ajaxSpiner');
    var spinner = new Spinner().spin();
    target.appendChild(spinner.el);
    $.ajax({
      'url' : base_url + controller + '/update_cart',
      'type' : 'POST',
      'data' : {'qty' : qty,'rowid' : rowid , 'idb' : idb},
      'success' : function(data){ 
                  var container = $('#checkout_cart_box'); 
                  if(data){
                    spinner.stop();

                    if(data.indexOf("forgot") > -1) {
                      window.location.reload();

                    }else{
                      container.html(data);

                      alert('Updated');
                      after_checkout_fun(1);
                  }
              }else{
              container.html(data);

                      alert('Updated');
                      after_checkout_fun(1);
                spinner.stop();
              }}
              
          });
  }
</script>

<script type="text/javascript">
  /*function update_cart(qty,rowid){
    var qty_plus_rowid = $('#qty').val();
   //var qty = $('#qty').val();
    var controller = 'Shopping_cart';
    var base_url = '<?=base_url();?>';
    var target = document.getElementById('ajaxSpiner');
    var spinner = new Spinner().spin();
    target.appendChild(spinner.el);
    $.ajax({
      'url' : base_url + controller + '/update_cart',
      'type' : 'POST',
      'data' : {'qty_plus_rowid' : qty_plus_rowid},
      'success' : function(data){ 
                  var container = $('#checkout_cart_box'); 
                  if(data){
                    spinner.stop();

                    if(data.indexOf("forgot") > -1) {
                      window.location.reload();

                    }else{
                      container.html(data);

                      alert('Updated');
                      after_checkout_fun(1);
                  }
              }else{
              container.html(data);

                      alert('Updated');
                      after_checkout_fun(1);
                spinner.stop();
              }}
              
          });
  }*/
</script>
<script type="text/javascript">
	function remove_from_favourites(pid){
		var controller = 'Products';
		var base_url = '<?=base_url();?>';
		var target = document.getElementById('ajaxSpiner');
		var spinner = new Spinner().spin();
		target.appendChild(spinner.el);
		$.ajax({
			'url' : base_url + controller + '/remove_from_favourites',
			'type' : 'POST',
			'data' : {'product_id' : pid},
			'success' : function(data){ 
                  //var container = $('#container'); 
                  if(data){
                  	spinner.stop();

                  	if(data.indexOf("forgot") > -1) {
                  		window.location.reload();

                  	}else{
                      //container.html(data);

                      alert('Removed');
                  }
              }else{
              	$(".wlc").css("background-color", "grey");
              	$(".wl").attr("onclick","return add_to_favourites('"+pid+"')");
              	alert('Removed');
              	spinner.stop();
              }}

          });
	} 
</script>
<script type="text/javascript">
	function add_to_cart(pid){
		var qty = $('#qty').val();
		var controller = 'Shopping_cart';
		var base_url = '<?=base_url();?>';
		var target = document.getElementById('ajaxSpiner');
		var spinner = new Spinner().spin();
		target.appendChild(spinner.el);
		$.ajax({
			'url' : base_url + controller + '/add_to_cart',
			'type' : 'POST',
			'data' : {'id' : pid,'qty' : qty},
			'success' : function(data){ 
                  var container = $('#cart_container'); 
                  if(data){
                  	spinner.stop();

                  	if(data.indexOf("forgot") > -1) {
                  		window.location.reload();

                  	}else{
                      container.html(data);

                      alert('Added');
                  }
              }else{
         
              	spinner.stop();
              }}
              
          });
	}
</script>


<script type="text/javascript">
	function remove_from_cart(rowid){
		//var qty = $('#qty').val();
		var controller = 'Shopping_cart';
		var base_url = '<?=base_url();?>';
		var target = document.getElementById('ajaxSpiner');
		var spinner = new Spinner().spin();
		target.appendChild(spinner.el);
		$.ajax({
			'url' : base_url + controller + '/remove_from_cart',
			'type' : 'POST',
			'data' : {'rowid' : rowid},
			'success' : function(data){ 
                  var container = $('#cart_container'); 
                  if(data){
                  	spinner.stop();

                  	if(data.indexOf("forgot") > -1) {
                  		window.location.reload();

                  	}else{
                      container.html(data);

                      alert('Deleted');
                  }
              }else{
         
              	spinner.stop();
              }}
              
          });
	}
</script>
<script type="text/javascript">
	function remove_from_cart_check(rowid){
		//var qty = $('#qty').val();
		var controller = 'Shopping_cart';
		var base_url = '<?=base_url();?>';
		var target = document.getElementById('ajaxSpiner');
		var spinner = new Spinner().spin();
		target.appendChild(spinner.el);
		$.ajax({
			'url' : base_url + controller + '/remove_from_cart_check',
			'type' : 'POST',
			'data' : {'rowid' : rowid},
			'success' : function(data){ 
                  var container = $('#checkout_cart_box'); 
                  if(data){
                  	spinner.stop();

                  	if(data.indexOf("forgot") > -1) {
                  		window.location.reload();

                  	}else{
                      container.html(data);

                      alert('Deleted');
                      after_checkout_fun(1);
                  }
              }else{
         			container.html(data);

                      alert('Deleted');
                      after_checkout_fun(1);
              	spinner.stop();
              }}
              
          });
	}
</script>
<script type="text/javascript">
	function after_checkout_fun(rowid){
		//var qty = $('#qty').val();
		var controller = 'Shopping_cart';
		var base_url = '<?=base_url();?>';
		var target = document.getElementById('ajaxSpiner');
		var spinner = new Spinner().spin();
		target.appendChild(spinner.el);
		$.ajax({
			'url' : base_url + controller + '/after_checkout_func',
			'type' : 'POST',
			'data' : {'rowid' : rowid},
			'success' : function(data){ 
                  var container = $('#cart_container'); 
                  if(data){
                  	spinner.stop();

                  	if(data.indexOf("forgot") > -1) {
                  		window.location.reload();

                  	}else{
                      container.html(data);

                     // alert('Deleted');
                  }
              }else{
         
              	spinner.stop();
              }}
              
          });
	}
</script>
<script type="text/javascript">
  function getCity(countryCode){
  //event.preventDefault();
  //var bookName = form.elements.q.value;
  var target = document.getElementById('ajaxSpiner');
  var spinner = new Spinner().spin();
  target.appendChild(spinner.el);
  var controller = 'Profile';
  //var base_url = window.location.origin;
  var base_url = '<?=base_url();?>';

  $.ajax({
    'url' : base_url + '/' + controller + '/get_city/' + countryCode,
                    'type' : 'POST', //the way you want to send data to your URL
                    'data' : {'countryCode' : countryCode},
                    'success' : function(data){ //probably this request will return anything, it'll be put in var "data"
                        var container = $('#cityArea'); //jquery selector (get element by id)
                         //jquery selector (get element by id)
                        
                        if(data){
                         
                             container.html(data);
                          
                         spinner.stop();
                       }
                       else
                       {
                         //location.href = "http://localhost/masjidAlHaq1/login_signup";
                        //spinner.stop();
                         //alert("Please type something in the search text field");
                       }
                     }
                   });
}

</script>
