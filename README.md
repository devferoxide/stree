# StrEE
A port of `Illuminate\Support\Str` to ExpressionEngine. This add-on will provide a service named `Str` (call it as `ee('stree:Str')`) that extends `Illuminate\Support\Str` class. All of the methods are also made available as a plugin tag, see methods section for more details on what is available.

## Installation
- Download the zip version of the repo
- Extract the zip and copy it to your third party directory (usually located in `systme/user/addons`)
- Login to your ExpressionEngine's CPanel and go to the Add-on Manager (CPanel > Developer > Add-Ons) and install `StrEE` add-on.

## Usage
Use this in your own add-on by referencing the `Devferoxide\Stree\Service\Str` class or by using it as an ExpressionEngine service `ee('stree:Str')`. For more details on the available methods, check the official [Laravel documentation page](https://laravel.com/docs/7.x/helpers#strings). Or if you are more of a code-diver, head to the it's code here https://github.com/laravel/framework/blob/7.x/src/Illuminate/Support/Str.php.

```php
// Somewhere in you add-on's code

use Devferoxide\Stree\Service\Str;

Str::camel('foo_bar'); // returns FooBar

// or

ee('stree:Str')->camel('foo_bar'); // returns FooBar
```

Use all available methods in your templates by using `{exp:stree:<method>}` tag, see methods section for more details on what is available.

## Methods
### preg_replace_array
The `preg_replace_array` method replaces a given pattern in the string sequentially using an array (pipe delimited). It expects the `pattern` and `replacements` params to work. Delimit the `replacements` param value with pipe (|) to emulate an array. You can also use this tag as as single tag by providing the `subject` params that will contain the string that you want to handle.
```html
<!-- tag pair -->
{exp:stree:preg_replace_array pattern="/:[a-z_]+/" replacements="8:30|9:00"}
  The event will take place between :start and :end
{/exp:stree:preg_replace_array}

<!-- single tag -->
{exp:stree:preg_replace_array pattern="/:[a-z_]+/" replacements="8:30|9:00" subject="The event will take place between :start and :end"}
```
Both tags above should return _The event will take place between 8:30 and 9:00_.

### after
The `after` method returns everything after the given value in a string. The entire string will be returned if the value does not exist within the string. It expects the `search` param to work. You can also use this tag as as single tag by providing the `subject` params that will contain the string that you want to handle.
```html
<!-- tag pair -->
{exp:stree:after search="This is"}
  This is my name
{/exp:stree:after}

<!-- single tag -->
{exp:stree:after search="This is" subject="This is my name"}
```
Both tags above should return _my name_.

### after_last
The `after_last` method returns everything after the last occurrence of the given value in a string. The entire string will be returned if the value does not exist within the string. It expects the `search` param to work. You can also use this tag as as single tag by providing the `subject` params that will contain the string that you want to handle.
```html
<!-- tag pair -->
{exp:stree:after_last search="\"}App\Http\Controllers\Controller{/exp:stree:after_last}

<!-- single tag -->
{exp:stree:after_last search="\" subject="App\Http\Controllers\Controller"}
```
Both tags above should return _Controller_.

### ascii
The `ascii` method will attempt to transliterate the string into an ASCII value. You can also use this tag as as single tag by providing the `subject` params that will contain the string that you want to handle.
```html
<!-- tag pair -->
{exp:stree:ascii search="\"}û{/exp:stree:ascii}

<!-- single tag -->
{exp:stree:ascii search="\" subject="û"}
```
Both tags above should return _u_.
