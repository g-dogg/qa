<?php

class Qa
{
	private $db;
	private $validator;

	/**
	 * [__construct description]
	 * @param Db        $db        [description]
	 * @param Validator $validator [description]
	 */
	function __construct(Db $db, Validator $validator)
	{
		$this->db = $db;
		$this->validator = $validator;
	}
}