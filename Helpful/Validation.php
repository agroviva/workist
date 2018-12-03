<?php

namespace Saaora\Helpful;

use Illuminate\Support\Str;

class Validation
{
    const WORKSPACE_REGEX = '/^[\w-]+$/';

    /**
     * Check if the given workspace name is valid.
     *
     * @param string $workspace
     *
     * @return bool
     */
    public static function isWorkspaceValid(string $workspace)
    {
        if (Str::length($workspace) > 60) {
            return false;
        }

        return preg_match(self::WORKSPACE_REGEX, $workspace) ? true : false;
    }
}
