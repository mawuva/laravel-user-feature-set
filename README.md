# User Feature Set - A set of feature related to users

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mawuva/laravel-user-feature-set.svg?style=flat-square)](https://packagist.org/packages/mawuva/laravel-user-feature-set)
[![Total Downloads](https://img.shields.io/packagist/dt/mawuva/laravel-user-feature-set.svg?style=flat-square)](https://packagist.org/packages/mawuva/laravel-user-feature-set)
![GitHub Actions](https://github.com/mawuva/laravel-user-feature-set/actions/workflows/main.yml/badge.svg)

This packahe provide you with a set of features that you can use to enhance your work while working on the users management in your project.

## Installation

You can install the package via composer:

```bash
composer require mawuva/laravel-user-feature-set
```

## Usage

After installing the package, just run the following command:

```bash
php artisan user-feature-set:install
```

This command will install, setup and publish the package files in your project.
It will also add two users in your database with the following credentials:

```text
email: admin@admin.com
password: password

email: user@user.com
password: password
```

## Features

This package will provide you the following features:


```php
use Mawuva\UserFeatureSet\DataTransferObjects\StoreUserDTO;
use Mawuva\UserFeatureSet\Facades\UserFeatureSet;

$data = UserDTO::from([
    "name" => "Test",
    "first_name" => "Test",
    "email" => "test@example.com",
    "password" => "password",
])

// Create a new user
$user = UserFeatureSet::storeUserData($data);

// Update the existing user data
$user = UserFeatureSet::updateUserData($data);

// Check user credentials
$user = UserFeatureSet::checkUserCredentials("test@example.com");

// Change user password
$id = "1"
$user = UserFeatureSet::changeUserPassword($id, "password");
```

The table bellow show you the attributes that you can use in order to manipulate your user model.

| Attributes |
|----------|
| name |
| first_name |
| gender |
| email |
| password |
| phone_number |
| whatsapp_number |
| username |
| is_admin |
| has_agreed_with_policy_and_terms_at |
| last_login_at |

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email seddorephraim7@gmail.com instead of using the issue tracker.

## Credits

-   [Ephraïm Seddor](https://github.com/mawuva)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
