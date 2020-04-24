<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('login with existing user');

$I->amOnPage('/home');

$I->seeCurrentUrlEquals('/login');

$I->fillField('email', 'johnny.bravo@gmail.com');
$I->fillField('password', 'nonsecret');

$I->click('#login_button');

$I->seeCurrentUrlEquals('/home');

$I->see('You are logged in!', 'div.card-body');
