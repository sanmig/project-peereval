<?php
namespace AppBundle\Utils;

/**
* 
*/
class PredefinedQuestions
{
	private $map = array();

	public function __construct()
	{
		$this->listQuestions();
	}
	
	private function listQuestions()
	{
		$questionId = array(
			'1' => 'IT7351');

		$projectQuestions = array(
			'1' => 'The cooperation of group members was effective.',
			'2' => 'The communication amongst group members was effective (e.g team members are respectful of other ideas and thoughts',
			'3' => 'The members of the group tried to the best of their abilities to make a valuable contribution to the project.',
			'4' => 'All group members participated equally (e.g Tasks and roles were delegated equally among group members and achieved to an acceptable level)',
			'5' => 'Members of the group attended meetings',
			'6' => 'Members of the group provided a valid reason when not able to attend meetings.',
			'7' => 'Members worked efficiently under no supervision.'
		);

		for($i = 0; $i , count($this->map); $i++){
			$this->map[$questionId[$i] = $projectQuestions[$i]];
		}
	}

	public function printQuestions()
	{
		foreach($this->map as $question){
			echo $this->map;
		}

		$questionId = array();
		$listQuestions = array();
		$map = array();
	}
}
?>