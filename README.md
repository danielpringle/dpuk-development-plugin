# WordPress Development Plugin

This repo is the starter plugin for [danielpringle.co.uk](http://danielpringle.co.uk).

Use this plugin to build and test constructs. It provides enhanced debugging tools and error handling for WordPress development.

## Features

This plugin includes the following features:

1. **[Composer](https://getcomposer.org/)** - Dependency Manager for PHP
2. **[Kint](https://packagist.org/packages/kint-php/kint)** - Enhanced debugging tool that replaces `var_dump` and `print_r` with beautiful, interactive output
3. **[Whoops](https://packagist.org/packages/filp/whoops)** - Pretty error pages that replace PHP's default error display with useful, readable stack traces

## Requirements

- PHP 7.4 or higher
- WordPress 5.0 or higher
- [Composer](https://getcomposer.org/) installed on your machine

## Installation

### Standard Installation

1. Download the plugin
2. Place it in your `wp-content/plugins/` folder
3. Extract it (if zipped)
4. Navigate to the plugin folder in terminal: `cd wp-content/plugins/dpuk-development-plugin`
5. Run `composer install` to install dependencies

### Installation from GitHub

1. Navigate to `wp-content/plugins/` in your terminal
2. Clone the repository: `git clone https://github.com/your-username/dpuk-development-plugin.git`
3. Navigate into the plugin folder: `cd dpuk-development-plugin`
4. Run `composer install` to install dependencies

After installation, the `vendor` folder will be created in the plugin root, containing Whoops, Kint, and the autoloader.

## Configuration

### Enable/Disable Plugin

The plugin runs by default. To disable it, add this to your `wp-config.php`:

```php
define( 'DPUK_DEV_PLUGIN_ENABLED', false );
```

### Configure Editor

Whoops error pages include "Open in Editor" links that allow you to jump directly to the file and line where an error occurred. The default editor is VS Code, but you can configure it to use your preferred editor.

Add this to your `wp-config.php` to change the editor:

```php
// Use VS Code (default)
define( 'DPUK_DEV_EDITOR', 'vscode' );

// Or use PhpStorm
define( 'DPUK_DEV_EDITOR', 'phpstorm' );

// Or use Sublime Text
define( 'DPUK_DEV_EDITOR', 'sublime' );

// Or use Atom
define( 'DPUK_DEV_EDITOR', 'atom' );
```

**Supported editors:**
- `vscode` or `code` - Visual Studio Code (default)
- `phpstorm` - PhpStorm
- `sublime` - Sublime Text
- `atom` - Atom
- `emacs` - Emacs
- `macvim` - MacVim
- `textmate` - TextMate
- `idea` - IntelliJ IDEA

## Usage

### Whoops Error Handler

Whoops is automatically enabled and will display pretty error pages whenever a PHP error occurs. No configuration needed - it just works!

When an error occurs, you'll see a beautiful error page with:
- Full stack trace
- Variable inspection
- File and line numbers
- "Open in Editor" links (configured via `DPUK_DEV_EDITOR` constant)

### Kint Debugging

Kint provides enhanced debugging functions. Use these in your code:

**Basic debugging:**
```php
d($variable);  // Dump and display a variable
dd($variable); // Dump, display, and die
```

**Examples:**
```php
// Debug a variable
$user_id = 10;
d($user_id);

// Debug WordPress functions
d( get_all_post_type_supports('post') );

// Debug and stop execution
dd( get_all_post_type_supports('post') );
```

**Using Kint in namespaces:**
```php
namespace YourNamespace;

// Use backslash to access global Kint functions
d($variable);

// Or use the full class
\Kint::trace();
```

**Stack traces:**
```php
for( $number_of_loops = 0; $number_of_loops < 10; $number_of_loops++ ){
    \Kint::trace();   // Display call stack
    d($number_of_loops);
}
```

### Adding Custom Functionality

Add your custom code to the `launch()` function in `dpuk-development-plugin.php`:

```php
function launch() {
    // Your plugin functionality here
    add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_scripts' );
    add_filter( 'the_content', __NAMESPACE__ . '\modify_content' );
}
```

## Notes

- The `vendor` folder is created in the plugin root during `composer install`
- The `composer.lock` file tracks exact dependency versions
- Whoops and Kint are loaded automatically via the autoloader
- This plugin is intended for development environments only

## Resources

- [Composer Documentation](https://getcomposer.org/doc/)
- [Kint Documentation](https://packagist.org/packages/kint-php/kint)
- [Whoops Documentation](https://packagist.org/packages/filp/whoops)
- [Packagist](https://packagist.org/)

## Contributions

Contributions are welcome! Please feel free to submit a Pull Request.
