
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



<script type="text/javascript">
  function getCity1(countryCode){
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
                        var container = $('#cityArea1'); //jquery selector (get element by id)
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