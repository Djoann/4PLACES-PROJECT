<?php

	$debut = microtime(true);

	define('WEBROOT',dirname(__FILE__));
	define('ROOT',dirname(WEBROOT));
	define('DS',DIRECTORY_SEPARATOR);
	define('CORE',ROOT.DS.'core');
	define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));
	define('IMG',WEBROOT.DS.'img'.DS);

	require CORE.DS.'Includes.php';
	new Dispatcher();

	if(Conf::$debug >= 1){

?>
<div id="footer">
	<div class="container">
		<p class="muted credit">
			<?php

				echo 'Page générée en : <span style="color: #0088cc;">'.round(microtime(true) - $debut,5).' secondes</span>.<br><a href="'.Router::url('admin/').'">Panneau d\'administration</a>';

			?>
		</p>
	</div>		
</div>

<?php
}
?>