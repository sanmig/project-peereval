<?php
namespace AppBundle\Utils;

/**
* 
*/
class PredefinedQuestions
{
	public $map = array();

	public function __construct()
	{
		$this->initiateQuestions();
	}
	
	private function initiateQuestions()
	{
		$list = array(
			'1' => array(
				'1' => 'The cooperation of group members was effective.',
				'2' => 'The communication amongst group members was effective (e.g team members are respectful of other ideas and thoughts',
				'3' => 'The members of the group tried to the best of their abilities to make a valuable contribution to the project.',
				'4' => 'All group members participated equally (e.g Tasks and roles were delegated equally among group members and achieved to an acceptable level)',
				'5' => 'Members of the group attended meetings',
				'6' => 'Members of the group provided a valid reason when not able to attend meetings.',
				'7' => 'Members worked efficiently under no supervision.'
			)
		);
		$this->map = $list;
	}

	public function getQuestion()
	{
		return $this->map;
	}
}
?>