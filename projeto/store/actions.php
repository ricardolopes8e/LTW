<?php

include_once('config/init.php');

$action = $_GET['action'] != '' ? $_GET['action'] :'';

switch ($action) {
	case 'registerUser':
		include ('templates/header.php');
  		include ('templates/video_header.php');
  		include ('templates/navigation.php');
  		include ('templates/register_template.php');
  		include ('templates/footer.php');
		//include ('actions/action_register.php');
		break;

	case 'logIn':
		include ('templates/header.php');
  		include ('templates/video_header.php');
  		include ('templates/navigation.php');
  		include ('templates/login_form.php');
  		include ('templates/footer.php');
		//include ('actions/action_login.php');
		break;

	case 'logOut':
		include ('actions/action_logout.php');
		break;

	case 'changeUserPicture':
		include ('actions/changeUserPicture.php');
		break;

	case 'changeUserPass':
		include ('actions/changeUserPass.php');
		break;

	case 'changeProfileName':
		include ('actions/changeProfileName.php');
		break;

	default:
		break;
}

?>