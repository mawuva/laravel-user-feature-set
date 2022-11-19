<?php

namespace Mawuva\UserFeatureSet\Actions;

use Illuminate\Database\Eloquent\Model;
use Mawuva\UserFeatureSet\DataTransferObjects\UserDTO;
use Mawuva\UserFeatureSet\Facades\UserFeatureSet;

class UpdateUserData
{
    /**
     * Execute action
     *
     * @param \Mawuva\UserFeatureSet\DataTransferObjects\UserDTO $userDTO
     * @param int|string $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function execute(UserDTO $userDTO, $id): Model
    {
        $user = UserFeatureSet::getUserById($id);

        $user ->name        = $userDTO ->name;
        $user ->email       = $userDTO ->email;

        if ($userDTO ->first_name !== null) { $user ->first_name  = $userDTO ->first_name; }

        if ($userDTO ->gender !== null) { $user ->gender  = $userDTO ->gender; }
        if ($userDTO ->username !== null) { $user ->username  = $userDTO ->username; }
        if ($userDTO ->phone_number !== null) { $user ->phone_number  = $userDTO ->phone_number; }
        if ($userDTO ->whatsapp_number !== null) { $user ->whatsapp_number  = $userDTO ->whatsapp_number; }
        if ($userDTO ->is_admin !== null) { $user ->is_admin  = $userDTO ->is_admin; }

        $user ->save();

        if (config('user-feature-set.password_history.enabled')) {
            $user ->updatePasswordHistory();
        }

        return $user;
    }
}