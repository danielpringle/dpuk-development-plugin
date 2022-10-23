# WordPress Dvelopment Plugin

This repo is the starter plugin for [danielpringle.co.uk](http://danielpringle.co.uk).

Use this plugin to build and test constructs.

## Features

This plugin includes the following features:

1. [Composer](https://getcomposer.org/) - Dependency Manager for PHP
2. [Kint](https://packagist.org/packages/kint-php/kint) - Awesome package that helps you to debug - forget `var_dump` and `print_r`. You are going to love Kint.
3. [Whoops](https://packagist.org/packages/filp/whoops) - Oh man, you will wonder why this isn't built into PHP. When an error occurs, this displayer replaces out the PHP orange table and gives you information you can actually use.

## Installation

1. Download it.
2. Put into your `wp-content/plugins/` folder
3. Extract it
4. Go into the new folder
5. Run `composer install` in terminal to bring in the dependencies and install Composer locally.

Installation from GitHub is as simple as cloning the repo onto your local machine. To clone the repo, do the following:

1. Using PhpStorm, open your project and navigate to `wp-content/plugins/`. (Or open terminal and navigate there).
2. Then type: `git clone https://github.com/_____________________`.
3. Go into the new folder
4. Run `composer install` in terminal to bring in the dependencies and install Composer locally.

## Contributions

## Notes

Ensure [Composer](https://getcomposer.org/) is installed on your machine

Ensure the composer.json is in the root folder and completed

In the terminal, navigate to your plugin folder: cd [ folder loaction]
type: $ composer install

During the install:
composer.lock file will be created in the root folder during the composer install

The file 'vendor' will be added to the assets folder.
'whoops' & 'kint' will be installed and added in the 'assets/vendor' file.
the 'autoload.php' file will be added to the 'assets/vendor' file: this will load kint & whoops for us.

https://packagist.org/
https://packagist.org/packages/kint-php/kint
https://packagist.org/packages/filp/whoops

## Uses

die&dump:
d($var);
d( get_all_post_type_supports( 'post'));
die( get_all_post_type_supports( 'post'));

for( $number_of_loops = 0; $number_of_loops <10; $number_of_loops++ ){
    \Kint::trace();   // use '\' when in a namespace to get back to the global space
    d($number_of_loops);
}
