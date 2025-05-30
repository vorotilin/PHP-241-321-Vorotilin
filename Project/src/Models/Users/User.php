<?php

namespace src\Models\Users;

use src\Models\ActiveRecordEntity;
use src\Services\Db;

class User extends ActiveRecordEntity
{
    protected $nickname;
    protected $email;
    protected $isConfirmed;
    protected $role;
    protected $passwordHash;
    protected $authToken;
    protected $createdAt;

    protected static function getTableName(): string
    {
        return 'users';
    }

    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function setPasswordHash(string $passwordHash): void
    {
        $this->passwordHash = $passwordHash;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function verifyPassword(string $password): bool
    {
        return password_verify($password, $this->passwordHash);
    }

    public static function getByNickname(string $nickname): ?self
    {
        $db = Db::getInstance();
        $result = $db->query(
            'SELECT * FROM users WHERE nickname = :nickname',
            [':nickname' => $nickname],
            static::class
        );

        return $result ? $result[0] : null;
    }

    public static function create(string $nickname, string $passwordHash): self
    {
        $user = new self();
        $user->setNickname($nickname);
        $user->setPasswordHash($passwordHash);
        $user->save(); 
        return $user;
    }
}
