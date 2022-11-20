<?php

class UserModel
{
    private string $name;
    private string $email;

    public function __construct(string $name, string $email)
    {
        $this->setName($name);
        $this->getEmail($email);
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}