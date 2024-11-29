<?php
namespace App\Entities;

use CodeIgniter\Entity;

class User extends \Myth\Auth\Entities\User
{
    protected $attributes = [
        "id" => null,
        "email" => null,
        "username" => null,
        "first_name" => null,
        "last_name" => null,
        "primary_phone" => null,
        "picture" => null,
        "reset_at" => null,
        "reset_expires" => null,
        "status" => null,
        "status_message" => null,
        "active" => false,
        "force_pass_reset" => false,
        "created_at" => null,
        "updated_at" => null,
    ];
    protected $casts = [
        "active" => "boolean",
        "force_pass_reset" => "boolean",
    ];
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
        $name = empty($fullName) ? $this->attributes["username"] : $fullName;
        return $name;
    }
}
