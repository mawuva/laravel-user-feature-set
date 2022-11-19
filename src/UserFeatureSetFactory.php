<?php

namespace Mawuva\UserFeatureSet;

use Mawuva\UserFeatureSet\Actions\ChangeUserPassword;
use Mawuva\UserFeatureSet\Actions\StoreUserData;
use Mawuva\UserFeatureSet\Actions\UpdateUserData;
use Mawuva\UserFeatureSet\DataTransferObjects\UserDTO;

class UserFeatureSetFactory
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

    /**
     * Create user account.
     *
     * @param \Mawuva\UserFeatureSet\DataTransferObjects\StoreUserDTO $storeUserDTO
     *
     * @return mixed
     */
    public function storeUserData(UserDTO $userDTO)
    {
        return app(StoreUserData::class) ->execute($userDTO);
    }

    /**
     * Create user account.
     *
     * @param \Mawuva\UserFeatureSet\DataTransferObjects\UserDTO $userDTO
     * @param int|string $id
     *
     * @return mixed
     */
    public function updateUserData(UserDTO $userDTO, $id)
    {
        return app(UpdateUserData::class) ->execute($userDTO, $id);
    }

    /**
     * Get user by field and value
     * 
     * @param string $attribute
     * @param string $value
     * @param bool   $inTrashed
     * @param array  $columns
     * 
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getUserByField($field, $value = null, $inTrashed = false, $columns = ['*'])
    {
        $data = app(config('user-feature-set.user.model')) ->where($field, '=', $value);

        return ($inTrashed)
                    ? $data ->withTrashed() ->first($columns)
                    : $data ->first($columns);
    }
    
    /**
     * Get user by id
     * 
     * @param int|string $id
     * @param bool       $inTrashed
     * @param array      $columns
     * 
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getUserById($id, $inTrashed = false, $columns = ['*'])
    {
        $key = resolve_key(config('user-feature-set.user.model'), $id, $inTrashed);

        return $this ->getUserByField($key, $id, $inTrashed, $columns);
    }

    /**
     * Change password for user
     *
     * @param string $password
     * @param int|string $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function changeUserPassword($id, string $password)
    {
        return app(ChangeUserPassword::class) ->execute($id, $password);
    }

    /**
     * Check user credentials
     *
     * @param string $credentials
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function checkUserCredentials(string $credentials): ?Model
    {
        $user = app(config('user-feature-set.user.model'));

        return $user ->where('email', $credentials)
                        ->orWhere('phone_number', $credentials)
                        ->orWhere('username', $credentials)
                        ->first();
    }
}
