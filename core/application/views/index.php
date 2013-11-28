<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Squeleto</title>    
    <link rel="stylesheet" type="text/css" href="assets/styles//style.css">     
    <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">     
    
    
     <script type="text/javascript" src="assets/js/jquery.js"></script>      
    <script src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="assets/js/default.js"></script>         
    <script type="text/javascript" src="assets/js/common.js"></script>      
    <script type="text/javascript" src="assets/js/login.js"></script>      
    
<script type="text/javascript">
        var Base_URL = "<?php echo base_url() ?>";
        var Front_URL = "<?php echo site_url() ?>";
</script>
     
</head>
<body>
<?php
    if( ! empty($Msg) ){
        echo "<div id='divMsg'>$Msg</div>";
    }
?>

<div id="divLogin">

    <form action="#" id="frmLogin" class="frmLogin" >

    <fieldset>

    <div id="divLoginHeader"></div>
    <p>     
        <label for="username">Usuario:</label>
        <input name="username" type="text" class="required text" id="username" maxlength="20" />
    </p>
    <p>
        <label for="password">Clave:</label>
        <input name="password" type="password" class="required text" id="password" maxlength="20" />
    </p>
    
    <div align="right" id="div_submit">
        <input type="button" value="Entrar" class="button" id="btnLogin" />
    </div>
    
    </fieldset>

  </form>
  
</div>


<div id="divError" style="display:none"></div>

</body>


</html>