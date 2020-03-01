<?php


namespace Enbit\LaravelAmazonMWS;


use MCS\MWSClient;

class MWSService extends MWSClient
{
    static $countries = [
        'BR' => 'A2Q3Y263D00KWC',
        'CA' => 'A2EUQ1WTGCTBG2',
        'MX' => 'A1AM78C64UM0Y8',
        'US' => 'ATVPDKIKX0DER',
        'AE' => 'A2VIGQ35RCS4UG',
        'DE' => 'A1PA6795UKMFR9',
        'EG' => 'ARBP9OOSHTCHU',
        'ES' => 'A1RKKUPIHCS9HS',
        'FR' => 'A13V1IB3VIYZZH',
        'GB' => 'A1F83G8C2ARO7P',
        'IN' => 'A21TJRUUN4KGV',
        'IT' => 'APJ6JRA9NG5V4',
        'SA' => 'A17E79C6D8DWNP',
        'TR' => 'A33AVAJ2PDY3EV',
        'SG' => 'A19VAU5U5O7RUS',
        'AU' => 'A39IBJ37TRP1C6',
        'JP' => 'A1VC38T7YXB528',
    ];
    /**
     * MWSService constructor.
     * @param array $config
     * @throws \Exception
     */
    public function __construct($config = [])
    {
        $config = $config ?: config('enbit-amazon-mws');
        $marketplaceId = \Arr::get($config, 'Marketplace_Id', 'empty');
        if(! in_array($marketplaceId, self::$countries)) {
            $country_code = strtoupper($marketplaceId);
            if (!\Arr::has(self::$countries, $country_code))
                throw new Exception('Invalid Marketplace Country');

            $config['Marketplace_Id'] = self::$countries[$config['Marketplace_Id']];
        }
        parent::__construct($config);
    }
}