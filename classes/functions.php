<?php

function getDb() {
	$db = "new_year_members";
	$user = "root";
	$pass = "";
	$host = "127.0.0.1";

	try {
	    $dbh = new PDO('mysql:host=localhost;dbname=' . $db, $user, $pass);
	} catch (PDOException $e) {
	    print "Error!: " . $e->getMessage() . "<br/>";
	    die();
	}

	return $dbh;
}

function getMembers() {
	$dbh = getDb();

	$members = array();
	foreach($dbh->query('SELECT * from members') as $row) {
        $members[] = $row;
    }

    // echo '<pre>';
    // print_r($members);
    // echo '</pre>';

    return $members;
}

function getEmptyMembers() {
	$dbh = getDb();

	$members = array();
	foreach($dbh->query('SELECT * from members') as $row) {
        $members[] = $row;
    }

    $selectedIds = array();
    foreach ($members as $key => $member) {
    	if ($member['gift_to']) $selectedIds[] = $member['gift_to'];
    }

    $res = array();
    foreach ($members as $key => $member) {
    	if(!in_array($member['id'], $selectedIds)) {
    		$res[] = $member;
    	}
    }

    // echo '<pre>';
    // print_r($res);
    // echo '</pre>';
    // die;

    return $res;
}

function isVoted($memberId) {
	$member = null;
	$dbh = getDb();

	foreach($dbh->query("SELECT * from members WHERE id = $memberId") as $row) {
        $member = $row;
    }

    if ($member['gift_to']) {
    	return $member;
    }

    return false;
}

function saveSanta($memberId, $santaId) {
	$dbh = getDb();
	$sql = "UPDATE members SET gift_to=$santaId, update_date='" . date('Y-m-d H:i:s') . "' WHERE id=$memberId";

	$dbh->query($sql);

	return;
}

function getSanta($memberId) {	
	$members = getEmptyMembers();
	// $members = getMembers();

	// showData($members);die;
	$ids = array();
	foreach ($members as $key => $member) {
		if ($memberId != $member['id']) {
			$ids[] = $member['id'];
		}
	}

	$selectedId = $ids[array_rand($ids)];

	return $selectedId;
}

function selectSanta($memberId) {
	$santaId = getSanta($memberId);

	saveSanta($memberId, $santaId);

	return $santaId;
}

function showSanta($santaId) {
	$dbh = getDb();
	$santa = array();
	foreach($dbh->query("SELECT * from members WHERE id == $santaId") as $row) {
        $santa = $row;
    }

    return $santa;
}

function showData($data) {
	echo '<pre>';
	print_r($data);
	echo '<pre>';
}