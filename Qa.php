<?php

class Qa
{
	private $db;
	private $validator;
	private $data = [];

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

	public function test()
	{
		var_dump($this);
	}

	public function showPosts()
	{
		$query = 'SELECT u.username, q.* FROM qa.questions  q LEFT JOIN qa.users u ON u.id = q.userid WHERE status = :status';
		$stmt = $this->db->prepare($query);
		$stmt->execute(['status'=>1]);
		while($row = $stmt->fetch())
		{
			echo "<div class=\"username\">" . $row['username'] . "</div>";
			echo $row['theme'];
			echo "<br>", $row['text'];
		}
	}

	public function isUserExists()
	{
		$query = 'SELECT COUNT(*) FROM qa.users WHERE username = :username LIMIT 1';
		$stmt = $this->db->prepare($query, PDO::FETCH_ASSOC);
		$stmt->execute(['username'=>$this->validator->getValidUsername]);
		if(1 === $stmt->fetch())
		{
			return TRUE;
		}
		return FALSE;
	}

	public function saveNewPost()
	{
		$userQuery = "INSERT INTO qa.users ( 'username', 'email') VALUES (:username, :email)";
		$questionQuery = "INSERT INTO qa.auestions ('theme', 'text', 'userid') VALUES (:theme, :text, :userid)";

		$userValidData = $this->validator->getValidatedData();

		if(FALSE === $this->isUserExists())
		{
			$this->data['message'] = 'Клиент с таким именем существует';
			return $this->data;
		}
		else
		{
			$stmt1 = $this->db->prepare($userQuery);

			try
			{
				$stmt1->execute(['username'=>$userValidData['username'], 'email'=>$userValidData['email']]);
				$lastUserId = $this->db->lastInsertId();

			}
			catch (Exception $e)
			{
				echo $e;
			}

			$stmt2 = $this->db->prepare($questionQuery);

			try
			{
				$stmt2->execute(['theme'=>$userValidData['theme'], 'text'=>$userValidData['text'], 'userid'=>$lastUserId]);

			}
			catch (Exception $e)
			{
				echo $e;
			}


			$this->data['message'] = 'Ваш запрос отправлен';
		}

		echo json_encode($this->data);
	}
	/**
	 * Эти две говняные функции переписать бы, но тааак лееень....
	 * @return [type] [description]
	 */
	public function deletePost()
	{
		$query = "DELETE FROM questions WHERE id=:id";
		$postId = $this->validator->getValidatedData;
		$stmt = $this->db->prepare($query);
		try
		{
			$stmt->execute(['id'=>$postId[id]]);
		}
		catch (Exception $e)
		{
			echo $e;
		}

	}

	public function confirmPost()
	{
		$query = "UPDATE questions SET status = 1 WHERE id=:id";
		$postId = $this->validator->getValidatedData;
		$stmt = $this->db->prepare($query);
		try
		{
			$stmt->execute(['id'=>$postId[id]]);
		}
		catch (Exception $e)
		{
			echo $e;
		}
	}
}