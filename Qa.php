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

	public function showPosts()
	{
		$query = 'SELECT* FROM qa.posts WHERE status = :status';
		$stmt = $this->db->prepare($query);
		$stmt->execute(['status'=>1]);
		while($row = $stmt->fetch())
		{
			echo $row['theme'];
			echo "<br>", $row['text'];
		}
	}

	public function saveNewPost()
	{

	}
}