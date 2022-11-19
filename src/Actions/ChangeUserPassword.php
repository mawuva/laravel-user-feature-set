<?php

namespace Mawuva\UserFeatureSet\Actions;

use Illuminate\Database\Eloquent\Model;
use Mawuekom\PasswordHistory\Services\PasswordHistoryChecker;
use Mawuva\UserFeatureSet\Facades\UserFeatureSet;

class ChangeUserPassword
{
    /**
     * @var \Mawuekom\PasswordHistory\Services\PasswordHistoryChecker
     */
    private $passwordHistoryChecker;

    /**
     * Create new action instance
     *
     * @param \Mawuekom\PasswordHistory\Services\PasswordHistoryChecker $passwordHistoryChecker
     * 
     * @return void
     */
    public function __construct(PasswordHistoryChecker $passwordHistoryChecker)
    {
        $this ->passwordHistoryChecker = $passwordHistoryChecker;
    }
    
    /**
     * Execute action
     *
     * @param string $password
     * @param int|string $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function execute($id, string $password): Model
    {
        $user = UserFeatureSet::getUserById($id);

        if (config('user-feature-set.password_history.checker')) {
            $this ->passwordHistoryChecker ->validatePassword($model, $password);
        }

        $user ->password    = UserFeatureSet::handlePassword($password);
        $user ->save();

        return $user;
    }
}