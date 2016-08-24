<?php

class Qa
{
	/**
	 * [$db description]
	 * @var Object Db
	 */
	private $db;
	/**
	 * [$validator description]
	 * @var [type]
	 */
	private $validator;
	/**
	 * [$data description]
	 * @var array
	 */
	private $data=[];

	/**
	 * [__construct description]
	 * @param Db        $db        [description]
	 * @param Validator $validator [description]
	 */
	function __construct(Validator $validator)
	{
		$this->db = Db::connect();
		$this->validator = $validator;
	}

	public function test()
	{
		//$this->data['success'] = $_POST['email'];
		$userValidData = $this->validator->validateForm()->getValidatedData();
		echo json_encode($userValidData);

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
		$query = 'SELECT * FROM users WHERE email = :email LIMIT 1';
		$stmt = $this->prepare($query, PDO::FETCH_ASSOC);
		$stmt->execute(['email'=>$this->validator->validateForm()->getValidEmail()]);
		$row = $stmt->fetch();
		if(!empty($row['email']))
		{
			return $row['id'];
		}
		return FALSE;
	}

	public function saveNewPost()
	{
		$userQuery = "INSERT INTO users (username, email) VALUES (:username, :email)";
		$questionQuery = "INSERT INTO questions (theme, text, userid) VALUES (:theme, :text, :userid)";

		$userValidData = $this->validator->validateForm()->getValidatedData();

		$stmt1 = $this->db->prepare($userQuery);
		$stmt1->execute(['username'=>$userValidData['username'], 'email'=>$userValidData['email']]);
		$lastUserId = $this->db->lastInsertId();
		$stmt2 = $this->db->prepare($questionQuery);
		$stmt2->execute(['theme'=>$userValidData['theme'], 'text'=>$userValidData['text'], 'userid'=>$lastUserId]);
		$postID = $this->db->lastInsertId();

		/*
		if(FALSE === $this->isUserExists())
		{
			$this->data['message'] = 'Клиент с таким именем существует';
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
				$this->data['message'] = '1';
			}

			$stmt2 = $this->db->prepare($questionQuery);

			try
			{
				$stmt2->execute(['theme'=>$userValidData['theme'], 'text'=>$userValidData['text'], 'userid'=>$lastUserId]);
			}
			catch (Exception $e)
			{
				echo $e;
				$this->data['message'] = '2';
			}
			$this->data['message'] = 'Ваш запрос отправлен';
		}
		*/
		$this->data['message'] = 'Ваш запрос отправлен';
		$this->data['post'] = $postID;
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