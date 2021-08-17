<?php
	
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$('#enviar').on("click", function() {
			var form = $($(this).attr('rel'));
	        $.ajax({
	            url     : form.attr('action'),
	            type    : form.attr('method'),
	            dataType: 'html',
	            data    : form.serialize(),
	        });  
	    });
    });
</script>

<form id="form" class="form" method="POST" action='http://sistemas.casamagalhaes.com.br/j_spring_security_check'>
	<input type="hidden" id="usuario" name="j_username" value="contarq">
	<input type="hidden" id="senha" name="j_password" value="8205181920">
	<input type="button" class="submit" id="enviar" value="Entrar" rel="form">
</form>

<!--  -->


