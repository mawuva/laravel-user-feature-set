<?php

namespace Mawuva\UserFeatureSet\DataTransferObjects;

use Spatie\LaravelData\Data;

class UserDTO extends Data
{
    public string|null $name;
    public string|null $first_name;
    public string|null $gender;
    public string $email;
    public string|null $phone_number;
    public string|null $whatsapp_number;
    public string|null $password;
    public string|null $username;
    public string|null $is_admin;
    public string|null $agree_with_policy_and_terms;
}
