<?php

if(!defined('RESTRICTED'))exit('No direct script access allowed!');

require_once('StoreValidation.php');

// gather data
$title = (! empty($_POST['title'])) ? $_POST['title'] : '';
$content = (! empty($_POST['content'])) ? $_POST['content'] : '';
$author = (! empty($_POST['author'])) ? $_POST['author'] : '';
$created_at = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');
$field = [
	'title' => $title,
	'content' => $content,
	'author' => $author,
	'created_at' => $created_at,
	'updated_at' => $updated_at
];

// validate data
$validator = new ArticleStoreValidation($field);
$validator->validate();
if ($validator->passes()) {
	// persist data
	try {
		$insert = new Crud();
		$insert->create('articles', $field);
		// $statement = $db->prepare('INSERT INTO articles (title, content, author, created_at, updated_at)
		// 						VALUES (:title, :content, :author, :created_at, :updated_at)');
		// $statement->execute($data);

		flash('article_flash', 'Article has been stored', 'success');
		header('Location: '.$baseUrl.'index.php?page=articles');
	} catch(Exception $e) {
		flash('article_flash', 'Error: '.$e->getMessage(), 'danger');
		header('Location: '.$baseUrl.'index.php?page=articles&action=create');
	}
}
else {
	flash('article_flash', $validator->getErrors(), 'danger');
	header('Location: '.$baseUrl.'index.php?page=articles&action=create');
}
