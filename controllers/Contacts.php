<?php namespace Ideaseven\Qrcontact\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Contacts Back-end Controller
 */
class Contacts extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Ideaseven.Qrcontact', 'qrcontact', 'contacts');
    }

}
