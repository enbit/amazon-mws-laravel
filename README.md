# amazon-mws-laravel
Laravel Implementation for meertensm/amazon-mws

## Contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)

Link to the [Official Amazon MWS Documentation](https://docs.developer.amazonservices.com/en_US/dev_guide/index.html)

<a name="installation"></a>
## Installation

Require the package using composer:

```bash
$ composer require enbit/amazon-mws-laravel
```
The package will automatically register itself.

Add your Environment Variables for MWS to your .env File. The variable names are listed in the enbit-amazon-mws.php [config file](#configuration).

<a name="configuration"></a>
## Configuration

To successfully authenticate with the Amazon Marketplace Web Service you need to add the Environment variables to your `.env` File. The variable names are listed in the enbit-amazon-mws.php [config file](#configuration).
Also you can set a default marketplace.

You can optionally publish the configuration with:

```bash
$ php artisan vendor:publish --provider="Enbit\LaravelAmazonMWS\AmazonMWSServiceProvider" --tag="config"
```

This will create an `enbit-amazon-mws.php` in your config directory.

Config file content with the env variables:

```php
<?php

return [
    'Access_Key_ID' => env('MWS_ACCESS_KEY_ID'),
    'Secret_Access_Key' => env('MWS_SECRET_KEY'),
    'Seller_Id' => env('MWS_SELLER_ID'),
    'Marketplace_Id' => env('Marketplace_Id', 'DE'),
];
```
####Optionally
you can pass custom config to the AmazonMWS service like this:

```php
$config = [
              'Access_Key_ID' => 'MWS_ACCESS_KEY_ID',
              'Secret_Access_Key' => 'MWS_SECRET_KEY',
              'Seller_Id' => 'MWS_SELLER_ID',
              'Marketplace_Id' => 'Marketplace_Id',
          ];
$amazonMWS = app()->makeWith('enbit-amazon-mws', $config);
```
####Marketplaces

to simplicity the code, you will pass just the country code, then the package will chooses the right endpoint and market place id, and you still can pass the market place id instead.
        
| available countries code | 
| ------------- |
| 'CA' | 
| 'MX' | 
| 'US' | 
| 'AE' | 
| 'DE' | 
| 'EG' | 
| 'ES' | 
| 'FR' | 
| 'GB' | 
| 'IN' | 
| 'IT' | 
| 'SA' | 
| 'TR' | 
| 'SG' | 
| 'AU' | 
| 'JP' | 

<a name="usage"></a>
## Usage

you can simply use any of mcs/amazon-mws functions, as Example:

### Get orders
```php
$fromDate = new DateTime('2016-01-01');
$orders = AmazonMWS::ListOrders($fromDate);
foreach ($orders as $order) {
    $items = AmazonMWS::ListOrderItems($order['AmazonOrderId']);
    print_r($order);
    print_r($items);
}
```

For more Info check [mcs/amazon-mws Documentation](https://github.com/meertensm/amazon-mws)
