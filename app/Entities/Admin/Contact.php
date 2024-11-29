<?php

namespace App\Entities\Admin;

use CodeIgniter\Entity;

class Contact extends \CodeIgniter\Entity\Entity
{
    protected $attributes = [
        "id_user" => null,
        "card_name" => null,
        "first_name" => null,
        "last_name" => null,
        "birthday" => null,
        "organization_name" => null,
        "position_title" => null,
        "phone_number" => null,
        "email" => null,
        "website" => null,
        "address" => null,
        "note" => null,
    ];
    protected $casts = [];
    /**
     * Returns a card name: "first last"
     *
     * @return string
     */
    public function getCardName()
    {
        // Check if the card_name attribute is available and return it
        return !empty($this->attributes["card_name"]) ? trim($this->attributes["card_name"]) : (!empty($this->attributes["first_name"]) ? trim($this->attributes["first_name"]) . " " : "") .
            (!empty($this->attributes["last_name"]) ? trim($this->attributes["last_name"]) : "");
    }

    /**
     * Alias for getCardName()
     *
     * @return string
     */
    public function cardName()
    {
        return $this->getCardName();
    }
}
