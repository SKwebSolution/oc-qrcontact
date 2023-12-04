<?php


namespace Ideaseven\Qrcontact\FormWidgets;


class VCard
{

    public $items;

    /**
     * @param mixed $item
     */
    public function setItem($item)
    {
        $this->items[] = $item;
    }


    public function results()
    {
        $r = "BEGIN:VCARD\r\n";
        $r .= "VERSION:4.0\r\n";
        foreach ($this->items as $item) {
            $r .= $item . "\r\n";
        }
        $r .= "END:VCARD\r\n";
        return $r;
    }
}
