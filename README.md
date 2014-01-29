PorpaginasBundle
==============================

Introduction
------------

PorpaginasBundle is wrapper for <a href="https://github.com/beberlei/porpaginas">porpaginas</a> library.

[![Build Status](https://secure.travis-ci.org/fightmaster/PorpaginasBundle.png?branch=master)](http://travis-ci.org/fightmaster/PorpaginasBundle)

Installation
------------

Using Composer (recommended)
----------------------------

To install PorpaginasBundle with Composer just add the following to your composer.json file:

```yml
// composer.json
{
    // ...
    require: {
        // ...
        "fightmaster/porpaginas-bundle": "dev-master"
    }
}
```

Then, you can install the new dependencies by running Composer’s update command from the directory
where your composer.json file is located:

```bash
$ php composer.phar update fightmaster/porpaginas-bundle
```

Composer will automatically download all required files, and install them for you.
All that is left to do is to update your AppKernel.php file, and register the new bundle:

```php
<?php
// in AppKernel::registerBundles()
$bundles = array(
    // ...
    new Porpaginas\PorpaginasBundle\PorpaginasBundle(),
    // ...
);
```

Configuration
-------------

By default, you need to specify only what you use paginator (```knp_paginator```). Library supports only KnpPaginator.

Below you find a reference of all configuration options with their default values:

```yml
# config.yml
porpaginas:
    paginator: knp_paginator
   #paginator: pagerfanta
```
