<?php
/**
 * Created by PhpStorm.
 * User: Peta
 * Date: 24.6.15
 * Time: 13:06
 */


namespace App\Model;

use Nette;
use Nette\Security\Passwords;

/******************  DODĚLAT HASH HESLA !!!!!! ******************/

class CredentialsAuthenticator
{
    /** @var Nette\Security\User */
    private $user;

    /** @var Nette\Database\Context */
    private $database;

    public function __construct(Nette\Security\User $user, Nette\Database\Context $database)
    {
        $this->user = $user;
        $this->database = $database;
    }

    public function  clientLogin($username, $password)
    {
        $row = $this->database->table('loginuser')->where('name', $username)->fetch();

        if (!$row) {
            throw new Nette\Security\AuthenticationException('Nesprávné přihlašovací jméno.');
        }

        if (!($password == $row['password'])) {
            throw new Nette\Security\AuthenticationException('Nesprávné heslo.');
        }

        $this->user->getStorage()->setNamespace('App\ClientModule');
        $this->user->login(new Nette\Security\Identity($row['id'], $row['name']));
    }

    public function  adminLogin($username, $password)
    {
        $row = $this->database->table('loginadmin')->where('name', $username)->fetch();

        if (!$row) {
            throw new Nette\Security\AuthenticationException('Nesprávné přihlašovací jméno.');
        }

        if (!($password == $row['password'])) {
            throw new Nette\Security\AuthenticationException('Nesprávné heslo.');
        }

        $this->user->getStorage()->setNamespace('App\AdminModule');
        $this->user->login(new Nette\Security\Identity($row['id'], $row['name']));

    }
}