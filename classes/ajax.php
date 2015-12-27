<?php

require_once("parameters.php");
require_once("functions.php");

if (isset($_GET['choose'])) {
	$id = (int) $_GET['id'];
	print_r($id);

	$voted = isVoted($id);

	if ($voted) {
		echo json_encode({
			success: true,
			value: 'voted'
		}});
	} else {
		echo json_encode({
			success: true,
			value: 'not-voted'
		}});
	}
}

