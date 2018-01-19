<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page;
use Page\Homepage;
use Page\ContactPage;
use Page\ContactConfirmation;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends Page implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    private $homepage;
    private $contactPage;
    private $contactConfirmation;

    public function __construct(Homepage $homepage, ContactPage $contactPage, ContactConfirmation $contactConfirmation)
    {
        $this->homepage = $homepage;
        $this->contactPage = $contactPage;
        $this->contactConfirmation = $contactConfirmation;
    }

    /**
     * @Given /^I fill in the form and submit it$/
     */
    public function iFillInTheFormAndSubmitIt()
    {
        $this->contactPage->iFillIntheContactForm();
//        $this->pressButton('Contact Axelerant');
    }

    /**
     * @Then /^I should see confirmation message$/
     */
    public function iShouldSeeConfirmationMessage()
    {
        $this->contactConfirmation->verifyConfirmationMessage('Thank You for Contacting Axelerant');
    }

    /**
     * @Given /^I visited "([^"]*)"$/
     */
    public function iVisited($pageName)
    {
        if (!isset($this->$pageName)) {
            throw new \RuntimeException(sprintf('Unrecognised page: "%s".', $pageName));
        }
        $this->$pageName->open();
    }
}
