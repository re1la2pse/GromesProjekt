<?php

namespace App\ClientModule\Presenters;

use Nette,
	App\Forms\SignFormFactory;
use Nette\Application\UI\Form;
use App\Model\CredentialsAuthenticator;
use App\Forms;


/**
 * Sign in/out presenters.
 */
class SignPresenter extends  Nette\Application\UI\Presenter
{

    /** @var CredentialsAuthenticator @inject */
    public $credentialsAuthenticator;

    protected function startup()
    {
        parent::startup();
        $user = parent::getUser();
        $user->getStorage()->setNamespace('App\ClientModule');
    }


	protected function createComponentSignInForm()
	{
        $form = new Form;
        $renderer = new Forms\BT3Renderer();
        $form->setRenderer($renderer);

        $form->addText('username', 'Username:')
            ->setRequired('Please enter your username.');

        $form->addPassword('password', 'Password:')
            ->setRequired('Please enter your password.');

        $form->addCheckbox('remember', 'Keep me signed in');

        $form->addSubmit('send', 'Sign in');

        $form->onSuccess[] = array($this, 'formSucceeded');
        return $form;
	}

    public function formSucceeded($form, $values)
    {
        if ($values->remember) {
            $this->user->setExpiration('14 days', FALSE);
        } else {
            $this->user->setExpiration('20 minutes', TRUE);
        }

        try {
            $this->credentialsAuthenticator->clientLogin($values->username, $values->password);
            $this->flashMessage('Přihlášení proběhlo úspěšně.');
            $this->redirect('Homepage:');
        } catch (Nette\Security\AuthenticationException $e) {
            $form->addError('Neprávné jméno nebo heslo');
        }
    }


	public function actionOut()
	{
		$this->getUser()->logout();
		$this->flashMessage('You have been signed out.');
		$this->redirect('in');
	}

}
