@javascript
Feature: To test Contact form using Page Object extension

  Scenario: To test Contact form
    Given I visited "contactPage"
    And I fill in the form and submit it
    Then I should see confirmation message