<?php

namespace App\Entities\Admin;

use CodeIgniter\Entity;

class Contact extends \CodeIgniter\Entity\Entity
{
    protected $attributes = [
        "id_user" => null,
        "full_name" => null,
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
     * Returns a full name: "first last"
     *
     * @return string
     */
    public function getFullName()
    {
        $fullName =
            (!empty($this->attributes["first_name"]) ? trim($this->attributes["first_name"]) . " " : "") .
            (!empty($this->attributes["last_name"]) ? trim($this->attributes["last_name"]) : "");
        $name = empty($fullName) ? $this->attributes["first_name"] : $fullName;
        return $name;
    }

    /**
     * Alias for getFullName()
     *
     * @return string
     */
    public function fullName()
    {
        return $this->getFullName();
    }
}
