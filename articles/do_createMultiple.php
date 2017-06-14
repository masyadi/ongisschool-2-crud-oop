<?php

if(!defined('RESTRICTED'))exit('No direct script access allowed!');

// gather data
$title1 = (! empty($_POST['title1'])) ? $_POST['title1'] : '';
$content1 = (! empty($_POST['content1'])) ? $_POST['content1'] : '';
$author1 = (! empty($_POST['author1'])) ? $_POST['author1'] : '';

$title2 = (! empty($_POST['title2'])) ? $_POST['title2'] : '';
$content2 = (! empty($_POST['content2'])) ? $_POST['content2'] : '';
$author2 = (! empty($_POST['author2'])) ? $_POST['author2'] : '';

$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');

try {
	// $this->db->beginTransaction();

	// query 1
	// $statement = $db->prepare('INSERT INTO articles (title, content, author, created_at, updated_at)
	// 						VALUES (:title, :content, :author, :created_at, :updated_at)');
	//
	// $statement->execute([
	// 	'title' => $title1,
	// 	'content' => $content1,
	// 	'author' => $author1,
	// 	'created_at' => $created_at,
	// 	'updated_at' => $updated_at
	// ]);
	$insert = new Crud();

	$field1 = array(
		'title' => $title1,
		'content' => $content1,
		'author' => $author1,
		'created_at' => $created_at,
		'updated_at' => $updated_at
	);

	$insert->create('articles', $field1);

	// throw new Exception("Error Processing Request");

	// query 2
	// $statement2 = $db->prepare('INSERT INTO articles (title, content, author, created_at, updated_at)
	// 						VALUES (:title, :content, :author, :created_at, :updated_at)');
	//
	// $statement2->execute([
	// 	'title' => $title2,
	// 	'content' => $content2,
	// 	'author' => $author2,
	// 	'created_at' => $created_at,
	// 	'updated_at' => $updated_at
	// ]);

	$field2 = array(
		'title' => $title2,
		'content' => $content2,
		'author' => $author2,
		'created_at' => $created_at,
		'updated_at' => $updated_at
	);

	$insert->create('articles', $field2);

	// $this->db->commit();
	flash('article_flash', 'Article has been stored', 'success');
	header('Location: '.$baseUrl.'index.php?page=articles');
} catch(Exception $e) {
	$db->rollback();
	flash('article_flash', 'Error: '.$e->getMessage(), 'danger');
	header('Location: '.$baseUrl.'index.php?page=articles&action=createMultiple');
}
?>
