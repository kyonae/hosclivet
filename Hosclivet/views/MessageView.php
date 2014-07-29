<?php
	require("config.php");
	
	require($config->get('templatesFolder') . "Header.php");
?>

	<script>
		$(document).ready(function(){
			setTimeout(function() {
				$(location).attr('href',"<?php echo $url?>");				        
		    }, 4000);
		});
	</script>

	<div class='wrapper'>
		<p class="message">
		
			<?php echo $message?>

		
		</p>
	</div>
<?php
	require($config->get('templatesFolder') . "Footer.php");
?>