<?php

/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Grab all the latest event happening in and around your nearby places.", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'Grabyourevent is a platform for live experiences that allows anyone to create, share, find and attend events that fuel their passions and enrich their lives. From music festivals, marathons, conferences, community rallies, and fundraisers, to gaming competitions and many more...', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['Events', 'Northeast', 'Adventure', 'Music Festivals', 'Concerts', 'Tickets'],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Grab all the latest event happening in and around your nearby places.', // set false to total remove
            'description' => 'Grabyourevent is a platform for live experiences that allows anyone to create, share, find and attend events that fuel their passions and enrich their lives. From music festivals, marathons, conferences, community rallies, and fundraisers, to gaming competitions and many more...', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => ['https://grabyourevent.com/gye-banner.png'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Grab all the latest event happening in and around your nearby places.', // set false to total remove
            'description' => 'Grabyourevent is a platform for live experiences that allows anyone to create, share, find and attend events that fuel their passions and enrich their lives. From music festivals, marathons, conferences, community rallies, and fundraisers, to gaming competitions and many more...', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
