<?php

namespace Mawuva\UserFeatureSet;

class UserFeatureSet
{
    /**
     * Handle user's password.
     *
     * @param string|null $password
     *
     * @return string
     */
    public function handlePassword(string $password = null): string
    {
        return ($password !== null)
                    ? bcrypt($password)
                    : bcrypt(config('user-feature-set.default_password'));
    }
}
