<?php
	require_once("../../../../wp-load.php");
	$action = $_POST["action"];
	switch ($action) {
		case 'savecomment':
			guardar_comentario($_POST['name'], $_POST['mail'], $_POST['content'], $_POST["id_post"]);
			break;
		case 'promociones':
			guardar_promociones($_POST['name'], $_POST['email']);
			break;
		case 'newsletter':
			guardar_newsletter($_POST['name'], $_POST['email']);
			break;
		case 'planes':
			guardar_planes($_POST['name'], $_POST['email']);
			break;
		case 'savecommentcontact':
			guardar_comment($_POST['name'], $_POST['email'], $_POST['tel'], $_POST['plan'], $_POST['message']);
			break;
		case 'testimonio':
			guardar_testimonio($_POST['name'], $_POST['email'], $_POST['content']);
			break;
		case 'archive':
			ver_archivo($_POST['year'], $_POST['category']);
			break;
		case 'test':
			ver_test($_POST['year']);
			break;
		case 'testpost':
			test_post($_POST["year"], $_POST["month"]);
			break;
		case 'obituaries':
			enviar_esquela($_POST["name-from"], $_POST["name-to"], $_POST["mail-to"],$_POST["content"]);
			break;
	}
?>