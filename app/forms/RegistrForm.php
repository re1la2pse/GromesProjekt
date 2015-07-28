<?php
/**
 * Created by PhpStorm.
 * User: Peta
 * Date: 6.7.15
 * Time: 8:54
 */

namespace App\Forms;

use Nette;
use Nette\Application\UI;

use Tracy\Debugger;

class RegistrForm extends baseBT3Form
{

    private $session;

    public function __construct(Nette\Http\Session $session)
    {
        $this->session = $session;
    }

    public function createPart1()
    {
        $form = $this->getBootstrapForm();
       // $form = new Nette\Application\UI\Form();

        $form->addText('firstName', 'Jméno:')
             ->setRequired('Zadejte jméno.');

        $form->addText('lastName', 'Příjmení:')
             ->setRequired('Zadejte příjmení.');

        //datum narozeni, dodelat kalendar

        $form->addText('city', 'Město:')
             ->setRequired('Zadejte město.');

        $regions = array (
            'jihomoravsky' => 'Jihomoravský',
            'jihocesky' => 'Jihočeský',
            'vysocina' => 'Vysočina',
        );

        $form->addSelect('region', 'Kraj:', $regions)
             ->setRequired('Vyberte kraj');

        $form->addText('tel', 'Tel.:');

        $form->addText('mail', 'E-mail:')
             ->setRequired('Zadejte e-mail.');

        $form->addDatePicker('dateB', 'Datum narození:');


        $form->addSubmit('submit', 'pokračovat');

        $form->onSuccess[] = array($this, 'registrFormSucceeded');
        return $form;
    }

    public function registrFormSucceeded($form, $values)
    {
        //zpracovani dat z formu
        $mySession = $this->session->getSection('registr');
        $mySession->value = $values->dateB;

        //Debugger::firelog($values->dateB);
    }

}
