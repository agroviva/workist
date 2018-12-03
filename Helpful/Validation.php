<?php
namespace Saaora\Helpful;

class Validation
{
	const WORKSPACE_REGEX = '/^[\w-]+$/';

	public static function isWorkspaceValid(string $workspace)
	{
		return preg_match(self::WORKSPACE_REGEX, $workspace);
	}
}