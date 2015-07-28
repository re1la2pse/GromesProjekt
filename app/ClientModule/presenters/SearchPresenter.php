<?php
/**
 * Created by PhpStorm.
 * User: Peta
 * Date: 28.7.15
 * Time: 9:23
 */

namespace App\ClientModule\Presenters;

use Nette;
use App\Forms;
use Nette\Application\UI;

/**
 * Class RegistrPresenter
 * @package App\ClientModule\Presenters
 */
class SearchPresenter extends BasePresenter {

    public function renderSearch()
    {
        $this->template->style = 'searchStyle';
    }

} 