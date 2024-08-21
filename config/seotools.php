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
            'title'        => "Devcentric", // set false to total remove
            'titleBefore'  => "Devcentric | Home", // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => "Devcentric stands at the forefront of digital innovation, crafting cutting-edge software solutions that empower organizations across diverse sectors. Our expertise spans custom software development, web and mobile applications, cloud solutions, AI integration, and data analytics. From startups to enterprise-level organizations, we tailor our approach to meet the unique needs of each client, driving efficiency, enhancing user experiences, and fostering sustainable growth. Our team of passionate technologists and problem-solvers is committed to delivering innovative solutions that not only meet but exceed our clients' expectations, positioning them at the cutting edge of their industries.", // set false to total remove
            'separator'    => ' - ',
            'keywords'     => [
                                'IT',
                                'IT services', 
                                'web development', 
                                'Web design',
                                'sofware development',
                                'technology', 
                                'technology consultant',
                                'logo design',
                                'branding services',
                                'website maintenance',
                                'IT support services',
                                'invitation card design',
                                'wedding card design',
                                'ID card designs',
                                'posters design',
                                'flyers design',
                                'banners design',
                                'html',
                                'css',
                                'javacsript',
                                'php',
                                'laravel',
                                'programming',
                                'custom web apps',
                                'web applications',
                                'custom website design',
                                'responsive web design',
                                'e-commerce development',
                                'front-end development',
                                'back-end development',
                            ],
            'canonical'    => 'current', // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
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
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Devcentric', // set false to total remove
            'description' => 'Devcentric is a leading provider of web development, web design, maintenance and support, graphic design, digital marketing, IT consulting, technology consulting, and digital transformation services. We specialize in delivering high-quality solutions tailored to meet the unique needs of our clients. With our expertise in HTML, CSS, JavaScript, PHP, and Laravel, we create custom web applications, responsive web designs, and e-commerce solutions. Our team of experienced professionals ensures that your website is visually appealing, user-friendly, and optimized for search engines. Partner with us to transform your digital presence and achieve your business goals.', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
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
            'title'       => 'Devcentric', // set false to total remove
            'description' => 'Devcentric is a leading provider of web development, web design, maintenance and support, graphic design, digital marketing, IT consulting, technology consulting, and digital transformation services. We specialize in delivering high-quality solutions tailored to meet the unique needs of our clients. With our expertise in HTML, CSS, JavaScript, PHP, and Laravel, we create custom web applications, responsive web designs, and e-commerce solutions. Our team of experienced professionals ensures that your website is visually appealing, user-friendly, and optimized for search engines. Partner with us to transform your digital presence and achieve your business goals.', // set false to total remove
            'url'         => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
