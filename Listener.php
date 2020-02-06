<?php

namespace LiamW\LastEditName;

use XF\Mvc\Entity\Entity;

class Listener
{
	public static function postEntityStructure(\XF\Mvc\Entity\Manager $em, \XF\Mvc\Entity\Structure &$structure)
	{
		$structure->relations['LastEditor'] = [
			'entity' => 'XF:User',
			'type' => Entity::TO_ONE,
			'conditions' => [['user_id', '=', '$last_edit_user_id']],
			'primary' => true
		];

		$structure->withAliases['full'][] = 'LastEditor';
	}
}