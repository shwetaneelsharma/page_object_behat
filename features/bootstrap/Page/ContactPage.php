<?php

namespace Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class ContactPage extends Page
{
    protected $path = '/contact';

    public function iFillIntheContactForm()
    {
        $this->fillField('firstname', 'Shweta');
        $this->fillField('lastname', 'Shweta');
        $this->fillField('email', 'Shweta');
        $this->selectFieldOption('hs_persona', 'persona_1');
        $this->fillField('message', 'Hi Michael. This is a test message.');
        $this->fillField('phone', '9423083930');
    }
}