<?php

use Conesso\Client;
use Conesso\Contracts\TransporterContract;
use Conesso\Factory;

beforeEach(function () {
    $this->transporter = Mockery::mock(TransporterContract::class);
});

it('can create a client', function () {
    $factory = new Factory($this->transporter);

    expect($factory->make())->toBeInstanceOf(Client::class);
});

it('can accept an api key', function () {
    $factory = new Factory($this->transporter);

    expect($factory->withApiKey('foo')->make())->toBeInstanceOf(Client::class);
});

it('can accept a base uri', function () {
    $factory = new Factory($this->transporter);

    expect($factory->withBaseUri('foo')->make())->toBeInstanceOf(Client::class);
});
