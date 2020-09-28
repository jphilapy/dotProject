<?php 

class TaskModuleCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/index.php');
        $I->fillField('username', 'admin');
        $I->fillField('password', 'pass');
        $I->click(['class' => 'button']);
    }

    // tests
     /**
     * @depends SigninCest:canLoginIn
     */
    public function seeIfTaskPageLoads(AcceptanceTester $I)
    {
        $I->amOnPage('/index.php?m=tasks');
        $I->see('Tasks');// if text not found, test fails
    }
     /**
     * @depends SigninCest:canLoginIn
     */
    public function seeIfProjectsPageHasNoErrors(AcceptanceTester $I)
    {
        $I->amOnPage('/index.php?m=tasks');
        $I->dontSee('ERROR: ');// if text not found, test fails
    }
}
