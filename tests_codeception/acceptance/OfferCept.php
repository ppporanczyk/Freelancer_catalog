<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');

$I->amOnPage('/offers');

$I->click('Create new...');

$I->seeCurrentUrlEquals('/login');

$I->fillField('email', 'johnny.bravo@gmail.com');
$I->fillField('password', 'nonsecret');

$I->click('#login_button');

$I->seeCurrentUrlEquals('/offers/create');
