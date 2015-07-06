<?php
/**
 * Created by PhpStorm.
 * User: Peta
 * Date: 6.7.15
 * Time: 10:08
 */

namespace App\ClientModule\Presenters;

use App\Forms;
use Nette\Application\UI;

/**
 * Class RegistrPresenter
 * @package App\ClientModule\Presenters
 */
class RegistrPresenter extends BasePresenter
{
    /**
     * @inject
     * @var Forms\RegistrForm
     */
    public $registrForm;

    public function createComponentRegistrFormPart1()
    {
        $form = $this->registrForm->createPart1();
        $form->onSuccess[] = function(UI\Form $form) {
            //$this->flashMessage($this->PMSession->value);
            $this->redirect('Homepage:default');
        };

        return $form;
    }

    public function renderRegistrFormPart1()
    {

    }
}