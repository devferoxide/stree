# StrEE
A port of Illuminate\Support\Str to ExpressionEngine. This add-on will provide a service named Str that extends Illuminate\Support\Str class. All of the methods are also made available as a plugin, see methods section for more details on what is available.

## Installation
- Download the zip version of the repo
- Extract the zip and copy it to your third party directory (usually located in `systme/user/addons`)
- Login to your ExpressionEngine's CPanel and go to the Add-on Manager (CPanel > Developer > Add-Ons) and install `StrEE` add-on.

## Usage
Use this in your own add-on by referencing the `Devferoxide\Stree\Service\Str` class or by using it as an ExpressionEngine service `ee('stree:Str')`. For more details on the methods available, check the official Laravel documentation page. Or if you more of a code-diver, head to the it's code https://github.com/laravel/framework/blob/7.x/src/Illuminate/Support/Str.php.
```php
// Somewhere in you add-on's code

use Devferoxide\Stree\Service\Str;

Str::camel('foo_bar'); // returns FooBar

// or

ee('stree:Str')->camel('foo_bar'); // returns FooBar
```

Use all available methods in your templates with by using `{exp:stree:<method>}`. See the methods section for more details.


