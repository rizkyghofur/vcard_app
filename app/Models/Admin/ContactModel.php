<?php

namespace App\Models\Admin;

class ContactModel extends \App\Models\GoBaseModel
{
    protected $table = "contacts";

    /**
     * Whether primary key uses auto increment.
     *
     * @var bool
     */
    protected $useAutoIncrement = true;

    protected $primaryKey = "id_user";

    protected $allowedFields = [
        "id_user",
        "card_name",
        "first_name",
        "last_name",
        "birthday",
        "organization_name",
        "position_title",
        "phone_number",
        "email",
        "website",
        "address",
        "note",
    ];
    protected $returnType = "App\Entities\Admin\Contact";

    public static $labelField = "card_name";

    protected $validationRules = [
        "address" => [
            "label" => "Contacts.address",
            "rules" => "trim|max_length[16313]",
        ],
        "birthday" => [
            "label" => "Contacts.birthday",
            "rules" => "valid_date|permit_empty",
        ],
        "email" => [
            "label" => "Contacts.email",
            "rules" => "trim|max_length[16313]",
        ],
        "first_name" => [
            "label" => "Contacts.firstName",
            "rules" => "trim|max_length[256]",
        ],
        "card_name" => [
            "label" => "Contacts.cardName",
            "rules" => "trim|max_length[512]",
        ],
        "id_user" => [
            "label" => "Contacts.idUser",
            "rules" => "max_length[31]",
        ],
        "last_name" => [
            "label" => "Contacts.lastName",
            "rules" => "trim|max_length[256]",
        ],
        "note" => [
            "label" => "Contacts.note",
            "rules" => "trim|max_length[16313]",
        ],
        "organization_name" => [
            "label" => "Contacts.organizationName",
            "rules" => "trim|max_length[255]",
        ],
        "phone_number" => [
            "label" => "Contacts.phoneNumber",
            "rules" => "trim|max_length[16313]",
        ],
        "position_title" => [
            "label" => "Contacts.positionTitle",
            "rules" => "trim|max_length[100]",
        ],
        "website" => [
            "label" => "Contacts.website",
            "rules" => "trim|max_length[16313]",
        ],
    ];

    protected $validationMessages = [
        "address" => [
            "max_length" => "Contacts.validation.address.max_length",
        ],
        "birthday" => [
            "valid_date" => "Contacts.validation.birthday.valid_date",
        ],
        "email" => [
            "max_length" => "Contacts.validation.email.max_length",
        ],
        "first_name" => [
            "max_length" => "Contacts.validation.first_name.max_length",
        ],
        "card_name" => [
            "max_length" => "Contacts.validation.card_name.max_length",
        ],
        "id_user" => [
            "max_length" => "Contacts.validation.id_user.max_length",
        ],
        "last_name" => [
            "max_length" => "Contacts.validation.last_name.max_length",
        ],
        "note" => [
            "max_length" => "Contacts.validation.note.max_length",
        ],
        "organization_name" => [
            "max_length" => "Contacts.validation.organization_name.max_length",
        ],
        "phone_number" => [
            "max_length" => "Contacts.validation.phone_number.max_length",
            'required|regex_match[/^\+(\d{1,3})\d*/]',
        ],
        "position_title" => [
            "max_length" => "Contacts.validation.position_title.max_length",
        ],
        "website" => [
            "max_length" => "Contacts.validation.website.max_length",
        ],
    ];

    public function getUserById($id)
    {
        // Try to fetch the user by ID
        $data = $this->where('id_user', $id)->first();

        // If no data is found, return null or an empty array instead of false
        if (!$data) {
            // Return an empty array or null, depending on what works best for your application
            return null;  // or return []; to ensure it's an array
        }

        return $data;
    }
}
