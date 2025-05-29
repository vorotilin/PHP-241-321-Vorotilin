<?php

namespace src\Models\Users;

use src\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
    protected $nickname;
    protected $email;
    protected $isConfirmed;
    protected $role;
    protected $passwordHash;
    protected $authToken;
    protected $createdAt;

    
    protected static function getTableName(){
        return 'users';
    }

    public function setName(string $nickname){
        $this->nickname = $nickname;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }
    public static function getByNickname(string $nickname): ?self{
    $db = Db::getInstance();
    $result = $db->query(
        'SELECT * FROM users WHERE nickname = :nickname',
        [':nickname' => $nickname],
        static::class
        );
        return $result ? $result[0] : null;
    }
    public function verifyPassword(string $password): bool{
        return password_verify($password, $this->passwordHash);
    }
}
