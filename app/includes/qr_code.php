<?php
/*
 * @copyright Copyright (c) 2021 AltumCode (https://altumcode.com/)
 *
 * This software is exclusively sold through https://altumcode.com/ by the AltumCode author.
 * Downloading this product from any other sources and running it without a proper license is illegal,
 *  except the official ones linked from https://altumcode.com/.
 */

return [
    /* Max qr code logo upload in mb */
    'qr_code_logo_size_limit' => 0.5,

    'type' => [
        'text' => [
            'max_length' => 2048
        ],
        'url' => [
            'max_length' => 2048
        ],
        'phone' => [
            'max_length' => 32
        ],
        'sms' => [
            'max_length' => 32,
            'body' => [
                'max_length' => 160,
            ]
        ],
        'email' => [
            'max_length' => 360,
            'subject' => [
                'max_length' => 256,
            ],
            'body' => [
                'max_length' => 2048,
            ]
        ],
        'whatsapp' => [
            'max_length' => 32,
            'body' => [
                'max_length' => 2048,
            ]
        ],
        'facetime' => [
            'max_length' => 32
        ],
        'location' => [
            'latitude' => [
                'max_length' => 32,
            ],
            'longitude' => [
                'max_length' => 32,
            ]
        ],
        'wifi' => [
            'ssid' => [
                'max_length' => 128,
            ],
            'password' => [
                'max_length' => 128,
            ]
        ],
        'event' => [
            'max_length' => 128,
            'location' => [
                'max_length' => 128,
            ],
            'url' => [
                'max_length' => 1024,
            ],
            'note' => [
                'max_length' => 256,
            ]
        ],
        'crypto' => [
            'coins' => ['bitcoin' => 'Bitcoin', 'ethereum' => 'Ethereum'],
            'address' => [
                'max_length' => 128,
            ]
        ],
        'vcard' => [
            'first_name' => [
                'max_length' => 64,
            ],
            'last_name' => [
                'max_length' => 64,
            ],
            'phone' => [
                'max_length' => 32,
            ],
            'email' => [
                'max_length' => 320,
            ],
            'url' => [
                'max_length' => 1024,
            ],
            'company' => [
                'max_length' => 64,
            ],
            'job_title' => [
                'max_length' => 64,
            ],
            'birthday' => [
                'max_length' => 16,
            ],
            'street' => [
                'max_length' => 128,
            ],
            'city' => [
                'max_length' => 64,
            ],
            'zip' => [
                'max_length' => 32,
            ],
            'region' => [
                'max_length' => 32,
            ],
            'country' => [
                'max_length' => 32,
            ],
            'note' => [
                'max_length' => 256,
            ],
            'social_label' => [
                'max_length' => 32
            ],
            'social_value' => [
                'max_length' => 1024
            ]
        ]
    ],
];
