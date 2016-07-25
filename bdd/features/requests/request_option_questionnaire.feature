@api @watchdog
Feature: Request Option Questionnaire
  In order to test Request with questionnaire creation
  As a Client and an Expert
  I want to create a Request with the paying questionnaire option, and watch answers

  Background: Create request

    Given "circle" content:
    | title            | author  |
    | Avengers         | admin   |

    Given "corporate" content:
    | title     | author  |
    | Google    | admin   |
    | Facebook  | admin   |

    Given users:
    | name    | mail                 | roles    | field_first_name | field_last_name | field_telephone | field_other_areas  | og_user_node | field_mail           | field_entreprise  | field_working_status  | field_domaine |
    | client1 | emindhub.test+client1@gmail.com | business | Captain          | AMERICA         | 0612345678      | Chef de groupe     | Avengers, LeagueOfJustice, GuardianOfGalaxy     | emindhub.test+client1@gmail.com | Google  | Freelancer | Maintenance |
    | expert1 | emindhub.test+expert1@gmail.com | expert   | Iron             | MAN             | 0712345670      | Chieur génial      | Avengers, LeagueOfJustice, GuardianOfGalaxy     | emindhub.test+expert1@gmail.com | Facebook  | Employee  | Energy        |

    Given I give "client1" 10000 emh points

    Given "request" content:
    | title                       | field_domaine | og_group_ref | author  | field_expiration_date  | status  |
    | How to become a superhero?  | Energy        |              | client1 | 2017-02-08 17:45:00    | 0       |


    Given I am logged in as a user with the "administrator" role
    When I go to "content/avengers"
      And I click "Group"
      And I click "People"
      And I click "edit" in the "Captain AMERICA" row
      And I check the box "Creator member"
      And I press "Update membership"
    Then I should see "Creator member" in the "Captain AMERICA" row

  Scenario: An author can create a request with a questionnaire
    Given I am logged in as "client1"
    When I go to homepage
    And I click "How to become a superhero?" in the "How to become a superhero?" row
    When I click "Edit" in the "primary tabs" region
    Then I should see "500 points" in the "#edit-field-options-und-questionnaire" element

    When I select "Avengers" from "Circles"
    And I check the box "Questionnaire"
    Then I should see "Questions"
    And I fill in "edit-field-request-questions-und-0-value" with "My little questionnaire"
    And I press "Continue"
    Then I should see "Request How to become a superhero? has been updated."
    # Validation page
    And I press "Publish"
    And I should have "9500" points on "client1" user

    # An expert responds to the request.
    Given I am logged in as "expert1"
    When I go to homepage
    And I click "How to become a superhero?" in the "How to become a superhero?" row
    And I should see "My little questionnaire"