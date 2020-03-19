<?php

namespace App\Repositories;

use App\Contact;

class ContactRepository extends Repository
{
    public function __construct(Contact $contact)
    {
        $this->model = $contact;
    }
}