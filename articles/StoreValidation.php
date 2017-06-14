<?php

if(!defined('RESTRICTED'))exit('No direct script access allowed!');

class ArticleStoreValidation
{
	/**
	 * @var [type]
	 */
	protected $data;

	/**
	 * @var array
	 */
	protected $errors = [];

	/**
	 * @param [type] $data [description]
	 */
	public function __construct($data)
	{
		$this->data = $data;
	}

	/**
	 * @return [type] [description]
	 */
	public function validate()
	{
		if (empty($this->data['title'])) {
			$this->errors[] = 'Title is required';
		}

		if (strlen($this->data['title']) <= 10) {
			$this->errors[] = 'Title min length is 10 chars';
		}
	}

	/**
	 * @return [type] [description]
	 */
	public function passes()
	{
		return count($this->errors) == 0;
	}

	/**
	 * @return [type] [description]
	 */
	public function getErrors()
	{
		return $this->errors;
	}
}
?>
