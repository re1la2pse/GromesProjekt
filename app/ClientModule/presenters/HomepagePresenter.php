<?php

namespace App\ClientModule\Presenters;

use Nette,
	App\Model;
use App\Forms;
use Nette\Application\UI;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
    /**
     * @inject
     * @var Forms\HomepageForm
     */
    public $homepageForm;

    /** @var Nette\Http\Session */
    private $PMSession;

    public function __construct(Nette\Http\Session $session)
    {
        $this->PMSession = $session->getSection('publicModule');
    }

    protected function createComponentHomepageForm()
    {
        $form = $this->homepageForm->create();
        $form->onSuccess[] = function (UI\Form $form) {
            //$mySession = $this->session->getSection('publicModule');

            //$this->flashMessage($this->PMSession->value);
            $this->redirect('Homepage:default');
        };
        return $form;
    }

	public function renderDefault()
	{
		$this->template->style = 'c_homepage';
	}

}
