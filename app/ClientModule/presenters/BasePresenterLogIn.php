<?php

namespace App\ClientModule\Presenters;

use Nette,
    App\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenterLogIn extends Nette\Application\UI\Presenter
{
    protected function startup()
    {
        parent::startup();
        $user = parent::getUser();
        $user->getStorage()->setNamespace('App\ClientModule');

        if (!$this->user->isLoggedIn())
        {
            $this->redirect('Sign:in');
        }
    }

    public function getUser() {
        $user = parent::getUser();
        $user->getStorage()->setNamespace('App\ClientModule');
        return $user;
    }
}
