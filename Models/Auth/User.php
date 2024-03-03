<?php

namespace Models\Auth;

use InvalidArgumentException;

class User
{
    protected $id;
    protected string $name;
    protected string $matricule;
    protected string $email;
    protected string $passwordHash;

    protected string $role;


    public function __construct($name, $matricule, $email, $passwordHash, $id = null, $role = 'user')
    {
        $this->role = $role;
        $this->id = $id;
        $this->name = $name;
        $this->matricule = $matricule;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getMatricule(): string
    {
        return $this->matricule;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Invalid email format");
        }
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
    }

    public function authenticate($password): bool
    {
        return password_verify($password, $this->passwordHash);
    }


}