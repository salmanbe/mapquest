Map Quest
====
This easy to use library imports latitude, longitude coordinates from Map Quest API. You must go to [developer.mapquest.com](https://developer.mapquest.com/) to register and acquire an API key to use with this library. Please note that neither this laravel library is made on behalf of Map Quest nor developer is acting on behalf of Map Quest. There is no coorporation between Map Quest and this library. Map Quest is not responsible for this library. Map Quest API credit goes to Map Quest.

Video Tutorial
-------
[![Laravel MapQuest](https://img.youtube.com/vi/hirKLcEJ1U4/0.jpg)](https://www.youtube.com/watch?v=hirKLcEJ1U4)

Laravel Installation
-------
Install using composer:

```bash
composer require salmanbe/mapquest
```

There is a service provider included for integration with the Laravel framework. This service should automatically be registered else to register the service provider, add the following to the providers array in `config/app.php`:

```php
Salmanbe\MapQuest\MapQuestServiceProvider::class,
```
You can also add it as a Facade in `config/app.php`:
```php
'MapQuest' => Salmanbe\MapQuest\MapQuest::class,
```
Add 2 lines to config/app.php
```php
'map_quest_url' => env('MAP_QUEST_URL', ''),
'map_quest_key' => env('MAP_QUEST_KEY', ''),
```

Add 2 lines to .env
```php
MAP_QUEST_URL=https://www.mapquestapi.com/geocoding/v1/address
MAP_QUEST_KEY=your_mapquest_api_key
```

Basic Usage
-----

Add `use Salmanbe\MapQuest\MapQuest;` or `use MapQuest;` at top of the class where you want to use it. Then create class instance.

```php
$map = new MapQuest();
```
Set Address
```php
$map->set($address);
```
Get Latitude
```php
echo $map->latitude();
```
Get Longitude
```php
echo $map->longitude();
```
GET Coordinates
```php
echo $map->coordinates();
```
GET Status Code
```php
echo $map->status();
```

Uninstall
-----
First remove `Salmanbe\MapQuest\MapQuestServiceProvider::class,` and 
`'MapQuest' => Salmanbe\MapQuest\MapQuest::class,` from `config/app.php` if it was added.
Then Run `composer remove salmanbe/mapquest` 

## License

This library is licensed under THE MIT License. Please see [License File](https://github.com/salmanbe/mapquest/blob/master/LICENSE) for more information.

## Security contact information

To report a security vulnerability, follow [these steps](https://tidelift.com/security).
