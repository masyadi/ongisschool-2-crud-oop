<?php

if(!defined('RESTRICTED'))exit('No direct script access allowed!');

// gather data
$id = $_POST['id'];
$title = (! empty($_POST['title'])) ? $_POST['title'] : '';
$content = (! empty($_POST['content'])) ? $_POST['content'] : '';
$author = (! empty($_POST['author'])) ? $_POST['author'] : '';
$updated_at = date('Y-m-d H:i:s');

// validate data


// persist data
try {
	$update = new Crud();
	$field = array(
	  'title'       => $title,
	  'content'     => $content,
	  'author'      => $author,
	  'updated_at'  => $updated_at
	);
	$id = array(
	  'id' => $id
	);
	$update->update('articles', $field, $id);

	flash('article_flash', 'Article has been updated', 'success');
	header('Location: '.$baseUrl.'index.php?page=articles');
} catch(Exception $e) {
	flash('article_flash', 'Error: '.$e->getMessage(), 'danger');
	header('Location: '.$baseUrl.'index.php?page=articles&action=create');
}
