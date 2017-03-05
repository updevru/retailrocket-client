PHP клиент для сервиса товарных рекомендаций http://retailrocket.ru/

## Установка

Рекомендуем Вам устанавливать пакет с помощью [Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Добавьте библиотеку в свой проект:

```bash
php composer.phar require updevru/retailrocket-client
```

И обновите зависимости с помощью composer:

 ```bash
composer.phar update
 ```


## Как использовать

```php
use RetailRocketClient\Client;
use RetailRocketClient\Recommendation;

$client = new Client('token');
$service = new Recommendation($client);

foreach($service->popular(0) as $item) {
    print(sprintf("Product #%s %s\n", $item->getItemId(), $item->getName()));
}
```
