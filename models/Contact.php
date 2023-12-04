<?php namespace Ideaseven\Qrcontact\Models;

use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Ideaseven\Qrcontact\FormWidgets\VCard;
use Model;
use System\Models\File;

/**
 * contact Model
 */
class Contact extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'ideaseven_qrcontact_contacts';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'qr' => 'System\Models\File'
    ];
    public $attachMany = [];

    public function beforeSave()
    {
        //PHOTO;VALUE=uri:https://www.ygeiawatch.com.cy/storage/app/media/logo.png
        $vcard = new VCard();
//        $vcard->setItem("FN:" . $this->first_name . " " . $this->last_name);
        $vcard->setItem("N:" . $this->last_name . ";" . $this->first_name);
        $vcard->setItem("ORG:" . $this->company);
        $vcard->setItem("URL:" . $this->web_url);
        $vcard->setItem("TEL;MOBILE:" . $this->mobile_number);
        $vcard->setItem("TEL;WORK;HOME:" . $this->home_number);
        $vcard->setItem("TEL;WORK;OFFICE:" . $this->office_number);
        $vcard->setItem("TEL;WORK;FAX:" . $this->fax);
        $vcard->setItem("ADR:" . $this->address);
        $vcard->setItem("EMAIL;INTERNET;HOME:" . $this->home_email);
        $vcard->setItem("EMAIL;INTERNET;WORK:" . $this->office_email);
        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new ImagickImageBackEnd()
        );
        $writer = new Writer($renderer);
        $file = new File();
        $file->fromData($writer->writeString($vcard->results()), "qrtest.png");
        $this->qr = $file;
    }


}
