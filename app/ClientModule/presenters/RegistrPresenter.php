<?php
/**
 * Created by PhpStorm.
 * User: Peta
 * Date: 6.7.15
 * Time: 10:08
 */

namespace App\ClientModule\Presenters;

use Nette;
use App\Forms;
use Nette\Application\UI;

/**
 * Class RegistrPresenter
 * @package App\ClientModule\Presenters
 */
class RegistrPresenter extends BasePresenter
{
    private $registrSession;

    /**
     * @inject
     * @var Forms\RegistrForm
     */
    public $registrForm;

    public function __construct(Nette\Http\Session $session)
    {
        //parent::__construct($session);
        $this->registrSession = $session->getSection('registr');
    }

    public function createComponentRegistrFormPart1()
    {
        $form = $this->registrForm->createPart1();
        $form->onSuccess[] = function(UI\Form $form) {
            $this->flashMessage($this->registrSession->value);
            $this->redirect('Homepage:default');
        };

        return $form;
    }

    public function renderRegistrFormPart1()
    {

    }
}