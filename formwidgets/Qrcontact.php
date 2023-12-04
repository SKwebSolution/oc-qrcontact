<?php namespace Ideaseven\Qrcontact\FormWidgets;

use Backend\Classes\FormWidgetBase;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

/**
 * qrcontact Form Widget
 */
class Qrcontact extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = 'ideaseven_qrcontact';

    /**
     * @inheritDoc
     */
    public function init()
    {
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();
        $this->prepareQR();
        return $this->makePartial('qrcontact');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['model'] = $this->model;
    }

    public function prepareQR()
    {
//PHOTO;VALUE=uri:https://www.ygeiawatch.com.cy/storage/app/media/logo.png
        $vcard = new VCard();
        $vcard->setItem("FN:" . $this->model->first_name . " " . $this->model->last_name);
        $vcard->setItem("ORG:" . $this->model->company);
        $vcard->setItem("URL:" . $this->model->web_url);
        $vcard->setItem("TEL;MOBILE:" . $this->model->mobile_number);
        $vcard->setItem("TEL;WORK;FAX:" . $this->model->fax);
        $vcard->setItem("TEL;WORK;HOME:" . $this->model->model->home_number);
        $vcard->setItem("TEL;WORK;OFFICE:" . $this->model->office_number);
        $vcard->setItem("EMAIL;TYPE=HOME:" . $this->model->home_email);
        $vcard->setItem("EMAIL;TYPE=WORK:" . $this->model->office_email);
        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new ImagickImageBackEnd()
        );
        $writer = new Writer($renderer);
//        dd($writer->writeString($vcard->results()));
//        $writer->writeFile($vcard->results(), 'qrcodetest.png');
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        $this->addCss('css/qrcontact.css', 'ideaseven.qrcontact');
        $this->addJs('js/qrcontact.js', 'ideaseven.qrcontact');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($value)
    {
        return \Backend\Classes\FormField::NO_SAVE_DATA;
    }
}
