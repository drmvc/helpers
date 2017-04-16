# DrMVC Helpers

[![Latest Stable Version](https://poser.pugx.org/drmvc/helpers/v/stable)](https://packagist.org/packages/drmvc/helpers)
[![Build Status](https://travis-ci.org/drmvc/helpers.svg?branch=master)](https://travis-ci.org/drmvc/helpers)
[![Total Downloads](https://poser.pugx.org/drmvc/helpers/downloads)](https://packagist.org/packages/drmvc/helpers)
[![License](https://poser.pugx.org/drmvc/helpers/license)](https://packagist.org/packages/drmvc/helpers)
[![PHP 7 ready](https://php7ready.timesplinter.ch/drmvc/helpers/master/badge.svg)](https://travis-ci.org/drmvc/helpers)

Collection of classes with some useful features.

## List of classes

| Class                     | Description |
|---------------------------|-------------|
| \DrMVC\Helpers\Arrays     | Manipulation with multidimensional arrays |
| \DrMVC\Helpers\Cleaner    | Text cleaner class |
| \DrMVC\Helpers\Generators | URL slug and Gravatar generators |
| \DrMVC\Helpers\HTML       | HTML primitives like checkbox and selector |
| \DrMVC\Helpers\UUID       | UUID v3,v4,v5 generator and validator |
| \DrMVC\Helpers\Validators | Some specified validators |

## How to install

### Via composer

    composer require drmvc/helpers

### Classic style

* Download the latest [DrMVC Helpers](https://github.com/drmvc/helpers/releases) package
* Extract the archive
* Initiate the scripts, just run `composer update` from directory with sources

## About PHP Unit Tests

* [ ] Arrays.php
* [x] Cleaner.php
* [ ] Generators.php
* [ ] HTML.php
* [ ] UUID.php

You can run tests by hands from source directory via `vendor/bin/phpunit` command. 

## Developers

* [Paul Rock](https://github.com/EvilFreelancer)
