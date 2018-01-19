<?php

namespace Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class ContactConfirmation extends Page
{

    public function verifyConfirmationMessage($message)
    {
        $text = $this->find('named', array('content', $message));
        if ($text !== null) {
            $text->isVisible();
        } else {
            throw new \Exception($message . ' is not displayed anywhere on the page');
        }
    }
}