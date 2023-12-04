<?php namespace Ideaseven\Qrcontact;

use Backend;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Ideaseven\Qrcontact\FormWidgets\Qrcontact;
use System\Classes\PluginBase;

/**
 * qrcontact Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'qrcontact',
            'description' => 'No description provided yet...',
            'author' => 'ideaseven',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Ideaseven\Qrcontact\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'ideaseven.qrcontact.some_permission' => [
                'tab' => 'qrcontact',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'qrcontact' => [
                'label' => 'QR Contacts',
                'url' => Backend::url('ideaseven/qrcontact/contacts'),
                'icon' => 'icon-qrcode',
                'order' => 500,
            ],
        ];
    }

    public function registerFormWidgets()
    {
        return [
            Qrcontact::class => 'qrcontact'
        ];
    }


}
