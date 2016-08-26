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
	 * __construct - the constructor of Qa class
	 * @param Db        $db
	 * @param Validator $validator
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
	/**
	 * [showPosts description]
	 * @return [type] [description]
	 */
	public function getPosts($status)
	{
		$query = 'SELECT u.username, q.* FROM qa.questions  q LEFT JOIN qa.users u ON u.id = q.userid WHERE status = :status';
		$stmt = $this->db->prepare($query);
		$stmt->execute(['status'=>$status]);
		return $stmt->fetch();
		/*{

		}*/
	}

	public function showApprovedPosts()
	{
		$approvedPosts = $this->showPosts(1);
		foreach ($approvedPosts as $aP)
		{
			echo "<div class=\"username\">" . $aP['username'] . "</div>";
			echo $aP['theme'];
			echo "<br>", $aP['text'];
		}
	}

	public function getNewPostsForEdit()
	{
		$newPosts = $this->showPosts(0);

	}

	/**
	 * [isUserExists description]
	 * @return boolean [description]
	 */
	public function isUserExists()
	{
		$query = 'SELECT * FROM users WHERE email = :email LIMIT 1';
		$stmt = $this->db->prepare($query);
		$valEmail = $this->validator->validateForm()->getValidEmail();
		$stmt->execute(['email'=>$valEmail]);
		$row = $stmt->fetch();
		if(!empty($row['email']))
		{
			return $row['id'];
		}
		return FALSE;
	}
	/**
	 * [saveNewPost description]
	 * @return [type] [description]
	 */
	public function saveNewPost()
	{
		$userQuery = "INSERT INTO users (username, email) VALUES (:username, :email)";
		$questionQuery = "INSERT INTO questions (theme, text, userid) VALUES (:theme, :text, :userid)";

		$userValidData = $this->validator->validateForm()->getValidatedData();

		$stmt1 = $this->db->prepare($userQuery);
		$stmt2 = $this->db->prepare($questionQuery);
		if(FALSE === $this->isUserExists())
		{
			try
			{
				$stmt1->execute(['username'=>$userValidData['username'], 'email'=>$userValidData['email']]);
				$lastUserId = $this->db->lastInsertId();
			}
			catch(Exception $e)
			{
				$this->data['status'] = 0;
			}

			try
			{
				$stmt2->execute(['theme'=>$userValidData['theme'], 'text'=>$userValidData['text'], 'userid'=>$lastUserId]);
			}
			catch(Exception $e)
			{
				$this->data['status'] = 0;
			}

		}
		else
		{
			try
			{
				$stmt2->execute(['theme'=>$userValidData['theme'], 'text'=>$userValidData['text'], 'userid'=>$this->isUserExists()]);
			}
			catch(Exception $e)
			{
				$this->data['status'] = 0;
			}
		}

		$this->data['Success'] = 1;
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
	/**
	 * [confirmPost description]
	 * @return [type] [description]
	 */
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