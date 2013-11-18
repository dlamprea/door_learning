
  $(document).ready(function() {

    $("#ingresar").on('click', function(){
      console.log('<?php echo site_url() ?>');
      var arrData = Form2Array("form_ingresar");    
      $.post("index.php/app/test", function(data) {
        alert(data);
      });
    })
    

    
  });