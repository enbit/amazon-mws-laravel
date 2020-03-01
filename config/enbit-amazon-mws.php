<?php

return [
    'Access_Key_ID' => env('MWS_ACCESS_KEY_ID'),
    'Secret_Access_Key' => env('MWS_SECRET_KEY'),
    'Seller_Id' => env('MWS_SELLER_ID'),
    'Marketplace_Id' => env('MWS_DEFAULT_MARKET_PLACE', 'DE'),
];