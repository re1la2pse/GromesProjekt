<?php
/**
 * Created by PhpStorm.
 * User: Peta
 * Date: 2.7.15
 * Time: 8:21
 */

namespace App\Forms;

use Nette\Application\UI;
use Nette;

class HomepageForm extends baseBT3Form
{
    /** @var Nette\Http\Session */
   /* private $session;

    private $PMSession;

    public function __construct(Nette\Http\Session $session)
    {
        $this->session = $session;
        $this->PMSession = $session->getSection('publicModule');
    }*/

    public function create()
    {
        $form = $this->getBootstrapForm();

        $form->addText('city', 'Město:')
             ->setRequired('Zadejte město.');

        $regions = array (
            'jihomoravsky' => 'Jihomoravský',
            'jihocesky' => 'Jihočeský',
            'vysocina' => 'Vysočina',
        );

        $form->addSelect('region', 'Kraj:', $regions)
             ->setRequired('Zvolte kraj.');


        $categories = array (
            'kategorie 1' => 'kategori1',
            'kategori1 2' => 'kategori2',
            'kategori1 3' => 'kategori13',
        );

        $form->addSelect('category', 'Kategorie:', $categories)
             ->setRequired('Zvolte kategorii.');

        $form->addSubmit('send', 'Vyhledat');

        $form->onSuccess[] = array($this, 'homepageFormSucceeded');
        return $form;
    }

    public function homepageFormSucceeded($form, $values)
    {
       // $this->PMSession->value = "zkouška session  aaa 2222225555";
    }
}