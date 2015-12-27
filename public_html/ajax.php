<?php
require_once("../classes/code.php");

if (isset($_GET['type']) && $_GET['type'] == 'choose') {
	$id = (int) $_GET['id'];

	$voted = isVoted($id);

	$_SESSION['user_id'] = $id;

	if ($voted) {
		echo json_encode(array(
			'success' => true,
			'value' => 'voted',
			'member' => $voted
		));
	} else {
		echo json_encode(array(
			'success' => true,
			'value' => 'not-voted'
		));
	}

	die;
}

if (isset($_GET['type']) && $_GET['type'] == 'santa') {
	$id = (int) $_REQUEST['id'];
	// print_r($id);

	$santaId = selectSanta($id);
	if ($santaId) {
		echo json_encode(array(
			'success' => true,
			'santa_id' =>  $santaId
		));
	} else {
		echo json_encode(array(
			'success' => true,
			'voted' => true,
			'santa_id' => null
		));
	}
	die;
}