<?php 
$questId = array(
'1' => 'IT7351');
$questList = array(
'1' => 'The cooperation of group members was effective.',
'2' => 'Members worked efficiently under no supervision.'
);
		$map = array(
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

		$maps = array();

		for($i = 1; $i <= count($map); $i++){
			for($k = 1; $k <= count($map[$i]); $k++){
				echo "questions " . $k . ": " . $map[$i][$k] . "<br><br>";
			}
		}

		for($i = 1; $i <= count($questId); $i++){
			$keyVal = $questId[$i];
			for($k = 1; $k <= count($questList); $k++){
				$value = $questList[$k];
				$maps[$keyVal][$value];
			}
		}

		for($i = 1; $i <= count($maps); $i++){
			for($k = 1; $k <= count($maps[$i]); $k++){
				echo $maps[$i][$k];
			}
		}
?>