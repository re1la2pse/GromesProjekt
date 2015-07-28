<?php

namespace App\ClientModule\Presenters;

use Nette,
    App\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    ///** @var Nette\Http\Session */
    //protected $session;

    protected function startup()
    {
        parent::startup();
        $user = parent::getUser();
        $user->getStorage()->setNamespace('App\ClientModule');
    }

    /*public function __construct (Nette\Http\Session $session)
    {
        parent::__construct();
        $this->session = $session;
    }*/

    public function getUser() {
        $user = parent::getUser();
        $user->getStorage()->setNamespace('App\ClientModule');
        return $user;
    }

}
