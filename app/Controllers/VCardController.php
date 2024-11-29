<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin\ContactModel;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;

class VCardController extends BaseController
{
    public function index()
    {
        return redirect()->to('login');
    }

    public function vcf($id)
    {
        $contactModel = new ContactModel();
        $userData = $contactModel->getUserById($id);

        if (!$userData) {
            return $this->response->setStatusCode(404, 'User not found');
        }

        // Initialize vCard content
        $vcfContent = "BEGIN:VCARD\r\n";
        $vcfContent .= "VERSION:3.0\r\n";

        // Card name (CN)
        if (!empty($userData->card_name)) {
            $vcfContent .= "CARDNAME:{$userData->card_name}\r\n";
        }

        // Full name (FN)
        if (!empty($userData->first_name) && !empty($userData->last_name)) {
            $vcfContent .= "FN:{$userData->first_name} {$userData->last_name}\r\n";
        }

        // Name (N)
        if (!empty($userData->first_name)) {
            $vcfContent .= "N:{$userData->last_name};{$userData->first_name}\r\n";
        }

        // Birthday (BDAY)
        if (!empty($userData->birthday)) {
            $vcfContent .= "BDAY:{$userData->birthday}\r\n";
        }

        // Organization (ORG)
        if (!empty($userData->organization_name)) {
            $vcfContent .= "ORG:{$userData->organization_name}\r\n";
        }

        // Position (TITLE)
        if (!empty($userData->position_title)) {
            $vcfContent .= "TITLE:{$userData->position_title}\r\n";
        }

        // Phone number (TEL)
        if (!empty($userData->phone_number)) {
            $vcfContent .= "TEL:{$userData->phone_number}\r\n";
        }

        // Email (EMAIL)
        if (!empty($userData->email)) {
            $vcfContent .= "EMAIL:{$userData->email}\r\n";
        }

        // Website (URL)
        if (!empty($userData->website)) {
            $vcfContent .= "URL:{$userData->website}\r\n";
        }

        // Address (ADR)
        if (!empty($userData->address)) {
            $vcfContent .= "ADR:;;{$userData->address}\r\n";
        }

        // Notes (NOTE)
        if (!empty($userData->note)) {
            $vcfContent .= "NOTE:{$userData->note}\r\n";
        }

        // End of vCard
        $vcfContent .= "END:VCARD\r\n";

        // File name for download
        $filename = !empty($userData->card_name) ? "{$userData->card_name}.vcf" : "{$userData->first_name}_{$userData->last_name}.vcf";

        // Set the headers for vCard download
        return $this->response->setHeader('Content-Type', 'text/vcard')
            ->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"')
            ->setBody($vcfContent);
    }

    public function vcfQRCode($id)
    {
        $contactModel = new ContactModel();
        $userData = $contactModel->getUserById($id);

        if (!$userData) {
            return $this->response->setStatusCode(404, 'User not found');
        }

        // Generate vCard content
        $vcfContent = "BEGIN:VCARD\r\n";
        $vcfContent .= "VERSION:3.0\r\n";
        $vcfContent .= "FN:{$userData->first_name} {$userData->last_name}\r\n";
        $vcfContent .= "N:{$userData->last_name};{$userData->first_name}\r\n";

        if (!empty($userData->phone_number)) {
            $vcfContent .= "TEL:{$userData->phone_number}\r\n";
        }
        if (!empty($userData->email)) {
            $vcfContent .= "EMAIL:{$userData->email}\r\n";
        }
        if (!empty($userData->address)) {
            $vcfContent .= "ADR:;;{$userData->address}\r\n";
        }
        $vcfContent .= "END:VCARD\r\n";

        // Generate QR code using Builder
        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($vcfContent)
            ->encoding(new Encoding('UTF-8'))
            ->size(300)
            ->margin(10)
            ->build();

        // Generate QR code and output directly
        return $this->response->setHeader('Content-Type', 'image/png')
            ->setBody($result->getString());
    }
}
