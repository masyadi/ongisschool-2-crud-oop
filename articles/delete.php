<?php
if(!defined('RESTRICTED'))exit('No direct script access allowed!');

try {

	$id = !empty($_GET['id']) ? $_GET['id'] : null;

	$paramId = array(
		'id'	=> $id
	);
	$delete = new Crud();
	$delete->delete('articles', $paramId);

	flash('article_flash', 'Article has been deleted', 'success');
	echo json_encode(['status' => true]);

} catch(Exception $e) {
	flash('article_flash', 'Error: '.$e->getMessage(), 'danger');
	echo json_decode(['status' => false]);
}

?>
