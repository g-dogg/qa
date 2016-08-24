<?php

class Validator
{
	private $validatedData = [];
	private static $options = [
		'username' => [
			'filter' => FILTER_SANITIZE_ENCODED
		],
		'email' =>[
			'filter' => FILTER_VALIDATE_EMAIL
		],
		'theme' => [
			'filter' => FILTER_SANITIZE_ENCODED
		],
		'text' => [
			'filter' => FILTER_SANITIZE_ENCODED
		],
	];

	public function validateForm()
	{
		$this->validatedData = filter_input_array(INPUT_POST, self::$options);
		return $this;
	}

	public function getValidatedData()
	{
		return $this->validatedData;
	}

	public function getValidUsername()
	{
		return $this->validatedData['username'];
	}

	public function getValidEmail()
	{
		return$this->validatedData['email'];
	}
}