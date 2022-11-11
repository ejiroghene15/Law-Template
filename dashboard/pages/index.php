<?php
switch ($_GET["action"] ?? ""):
	case 'new':
		include_once "$page/new.php";
		break;

	case 'edit':
		include_once "$page/edit.php";
		break;

	default:
		include_once "$page/default.php";
		break;
endswitch;
