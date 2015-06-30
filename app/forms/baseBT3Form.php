<?php
/**
 * Created by PhpStorm.
 * User: Peta
 * Date: 29.6.15
 * Time: 9:02
 */

namespace App\Forms;

use Nette\Application\UI\Form;

class baseBT3Form {

    //Vrati formular s nastavenym rendererem pro Bootstrapu 3
    protected function getBootstrapForm() {

        $form = new Form;
        $renderer = new BT3Renderer();
        $form->setRenderer($renderer);

        return $form;
    }
}