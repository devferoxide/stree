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

### before
The `before` method returns everything before the given value in a string. It expects the `search` param to work. The code below should return _This is_.

```html
<!-- tag pair -->
{exp:stree:before search="my name"}
  This is my name
{/exp:stree:before}
```

### before_last
The `before_last` method returns everything before the last occurrence of the given value in a string. It expects the `search` param to work. The code below should return _my name_.

```html
<!-- tag pair -->
{exp:stree:before_last search="is"}
  This is my name
{/exp:stree:before_last}
```

### between
The `between` method returns the portion of a string between two values. It expects the `start` and `end` params to work. The code below should return _is my_.

```html
{exp:stree:between start="This" end="name"}
  This is my name
{/exp:stree:between}
```

### camel
The `camel` method converts the given string to camel case. You can also use this tag as as single tag by providing the `subject` params that will contain the string that you want to handle.

```html
<!-- tag pair -->
{exp:stree:camel}foo_bar{/exp:stree:camel}

<!-- single tag -->
{exp:stree:camel subject="foo_bar"}
```
Both tags above should return _fooBar_.

### contains
The `contains` method determines if the given string contains the given value (case sensitive). The method will either return `yes` if the given subject string contains the supplied value or `no` otherwise. You can also use this tag as as single tag by providing the `subject` params that will contain the string that you want to handle.

```html
<!-- tag pair: will return yes -->
{exp:stree:contains needle="my"}This is my name{/exp:stree:contains}

<!-- single tag: will return yes -->
{exp:stree:contains needle="my" subject="This is my name"}

<!-- inside an if -->
{if '{exp:stree:contains needle="my" subject="This is my name"}' == 'yes'}
  Yes! <!-- this should be displayed -->
{/if}
```

You may also pass an array of values pipe delimited to the `needle` param to determine if the given string contains any of the values:

```html
<!-- tag pair: will return yes -->
{exp:stree:contains needle="my|name"}This is my name{/exp:stree:contains}

<!-- single tag: will return yes -->
{exp:stree:contains needle="is|my" subject="This is my name"}

<!-- inside an if -->
{if '{exp:stree:contains needle="name|This" subject="This is my name"}' == 'yes'}
  Yes! <!-- this should be displayed -->
{/if}
```
### contains_all
The `contains_all` method determines if the given string contains all array (pipe delimited) values. The method will either return `yes` if the given subject string contains the supplied value or `no` otherwise. It expects the `needle` param to work, delimit values with pipe (|) to supply values as array. You can also use this tag as as single tag by providing the `subject` params that will contain the string that you want to handle.

```html
<!-- tag pair: will return yes -->
{exp:stree:contains_all needle="my|is"}This is my name{/exp:stree:contains_all}

<!-- single tag: will return no -->
{exp:stree:contains_all needle="my|boo" subject="This is my name"}

<!-- inside an if: nothing should be displayed -->
{if '{exp:stree:contains_all needle="my|foo" subject="This is my name"}' == 'yes'}
  Yes! <!-- this should be displayed -->
{/if}
```

### ends_with
The `ends_with` method determines if the given string ends with the given value. It expects the `needle` param to work, delimit values with pipe (|) to supply values as array. You can also use this tag as as single tag by providing the `subject` params that will contain the string that you want to handle.

```html
<!-- tag pair: will return yes -->
{exp:stree:ends_with needle="my|name"}This is my name{/exp:stree:ends_with}

<!-- single tag: will return no -->
{exp:stree:ends_with needle="my|boo" subject="This is my name"}

<!-- inside an if: nothing should be displayed -->
{if '{exp:stree:ends_with needle="my|foo" subject="This is my name"}' == 'yes'}
  Yes! <!-- this should be displayed -->
{/if}
```
