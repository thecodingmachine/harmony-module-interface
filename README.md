Harmony module interface
========================

Out of the box, Harmony is a nice UI interface to help you with your PHP projects. However, it does not bring
many features. In order to be completely useful, it should be able to analyze your project, and even better,
it should be able to detect DI containers (or service locators, ...) and inspect them.

For this to be possible, Harmony relies on modules. There are already modules existing for a set of
frameworks, and luckily, it is quite easy to write one.

Registering an Harmony module
-----------------------------

Harmony modules are registered in a `modules.php` file.
This file is a simple PHP file that returns an array of modules.

**modules.php**
```php
<?php
return [
    new MyHarmonyModule();
];
```

where `MyHarmonyModule` is a module depending on the framework you are using.

Writing an Harmony module
-------------------------

Modules should implement this simple interfaces:

**HarmonyModuleInterface**
```php
/**
 * Classes implementing this interface represent modules that can be used by Harmony.
 *
 * @author David Negrier
 */
interface HarmonyModuleInterface
{
    /**
     * You can return a container if the module provides one.
     *
     * It will be chained to the application's root container.
     *
     * @param ContainerInterface $rootContainer
     * @return ContainerInterface|null
     */
    public function getContainer(ContainerInterface $rootContainer);

    /**
     * Returns a class that can be used to explore a container
     *
     * @return ContainerExplorerInterface|null
     */
    public function getContainerExplorer();
}
```

The Harmony module interface expects containers to be respecting [container-interop's `ContainerInterface`](https://github.com/container-interop/container-interop).

An important part of the interface is that it should offer a way to **explore** the container of your application.
This is represented by the `getContainerExplorer` method that should return an
object implementing `ContainerExplorerInterface`.

**ContainerExplorerInterface**
```php
/**
 * Classes implementing this interface can explore a container.
 *
 * @author David Negrier
 */
interface ContainerExplorerInterface
{
    /**
     * Returns the name of the instances implementing `$type`
     * @return string[]
     */
    public function getInstancesByType($type);
}
```

If you are writing a package that contains an Harmony module, you should include this package into your Composer dependencies:

**composer.json**
```
{
  "require": {
    "harmony/harmony-module-interface": "~1.0"
  }
}
```
