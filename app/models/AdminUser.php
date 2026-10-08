<?php

class AdminUser extends Model
{
    protected string $table = 'admin_users';
    protected array $fillable = ['username', 'password', 'full_name'];

    public function attempt(string $username, string $password): ?array
    {
        $user = $this->findBy('username', $username);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return null;
    }
}
