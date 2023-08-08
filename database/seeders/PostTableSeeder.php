<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Example data for each category
        $categories = [
            ['name' => 'Web Development'],
            ['name' => 'Graphic Design'],
            ['name' => 'Digital Marketing'],
            ['name' => 'User Experience (UX) Design'],
        ];

        // Insert categories into the database and retrieve their IDs
        $categoryIds = [];
        foreach ($categories as $category) {
            $categoryIds[] = DB::table('categories')->insertGetId($category);
        }

        // Example data for each post
        $posts = [
            [
                'title' => 'Beginner\'s Guide to HTML, CSS, and JavaScript',
                'slug'  => 'beginners-guide-to-html-css-and-javascript',
                'description' => 'Learn the fundamentals of web development with this comprehensive beginner\'s guide to HTML, CSS, and JavaScript. Start building your own web pages and gain essential skills in frontend development.',

                'content' => '<p>Welcome to the beginner\'s guide to HTML, CSS, and JavaScript! In this comprehensive tutorial, we will take you through the fundamentals of web development and equip you with the essential knowledge to get started with these three core technologies.</p>

                <p>HTML (Hypertext Markup Language) forms the backbone of every webpage. It provides the structure and content of a website. With HTML, you can define the various elements of a page, such as headings, paragraphs, images, links, and more. We\'ll guide you through the basics of HTML syntax, tags, and attributes, enabling you to create well-structured and semantically meaningful web pages.</p>
                
                <p>Next up, we have CSS (Cascading Style Sheets), which allows us to style and visually enhance our web pages. With CSS, you can control the layout, colors, typography, and overall presentation of your website. We\'ll explore the different CSS selectors, properties, and values that enable you to customize the appearance of HTML elements. You\'ll learn how to create engaging designs, responsive layouts, and stunning visual effects using CSS.</p>
                
                <p>Finally, we\'ll dive into JavaScript, the programming language that adds interactivity and dynamic functionality to web pages. JavaScript empowers you to create interactive forms, handle user events, manipulate the DOM (Document Object Model), and perform asynchronous operations like making API requests. We\'ll cover JavaScript fundamentals, including variables, data types, functions, control flow, and object-oriented programming concepts. You\'ll gain hands-on experience in writing JavaScript code and see how it can bring your web pages to life.</p>
                
                <p>Throughout this guide, we\'ll provide you with practical examples, exercises, and coding challenges to reinforce your learning. You\'ll also discover useful tips, best practices, and resources to continue your web development journey beyond the basics.</p>
                
                <p>By the end of this guide, you\'ll have a solid foundation in HTML, CSS, and JavaScript, allowing you to create your own static web pages and start building interactive web applications. Whether you aspire to become a frontend developer, pursue a career in web design, or simply want to enhance your digital presence, understanding these three technologies is a crucial step in your web development journey.</p>
                
                <p>So, let\'s embark on this exciting adventure into the world of HTML, CSS, and JavaScript. Get ready to unlock the power of frontend web development and bring your ideas to life on the web!</p>
                ',

                'keywords' => "
                    HTML,
                    CSS,
                    JavaScript,
                    web development,
                    frontend development,
                    web design,
                    beginner\s guide,
                    fundamentals,
                    frontend technologies,
                    HTML syntax,
                    CSS selectors,
                    JavaScript fundamentals,
                    interactive web applications,
                    frontend developer,
                ",
                'cover_image' => 'post_images/stranger_things_1.jpg',
                'view_count' => $faker->numberBetween(100, 1000),
                'total_duration' => $faker->numberBetween(10, 60),
                'category_id' => $categoryIds[0], // Web Development category
                'user_id' => 1, // Assuming user ID 1 as the author
                'is_visible' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => "Intermediate Techniques in HTML, CSS, and JavaScript",
                'slug' => 'intermediate-techniques-in-html-css-and-javascript',
                'description' => 'Take your web development skills to the next level with this intermediate-level guide to HTML, CSS, and JavaScript. Dive deeper into HTML forms, CSS layouts, and JavaScript concepts to build more advanced web applications.',
                'content' => '<p>Welcome to the intermediate techniques in HTML, CSS, and JavaScript! In this series, we will build upon the foundational knowledge and explore more intermediate-level concepts and strategies in web development.</p>
            
                <p>In this post, we will dive deeper into HTML and explore intermediate-level topics such as HTML forms and validation, responsive design principles, accessibility considerations, and SEO best practices.</p>
                
                <p>Next, we will explore intermediate CSS techniques and delve into topics such as CSS layout models, media queries, CSS preprocessors, and modular CSS architectures. You\'ll learn how to create more flexible and maintainable stylesheets.</p>
                
                <p>In the JavaScript section, we will cover intermediate JavaScript concepts such as working with arrays and objects, manipulating the DOM dynamically, event handling, and making HTTP requests. You\'ll gain the skills to build interactive web applications with enhanced functionality.</p>
                
                <p>Throughout this series, we\'ll provide you with practical examples, code snippets, and hands-on exercises to reinforce your understanding of intermediate web development techniques. By the end of this series, you\'ll be equipped with the knowledge and skills to tackle more complex web development challenges.</p>
                
                <p>So, let\'s continue our journey into the world of HTML, CSS, and JavaScript and take your web development skills to the next level!</p>',
                'keywords' => "HTML, CSS, JavaScript, web development, intermediate techniques, HTML forms, responsive design, CSS layouts, modular CSS, JavaScript concepts, web applications",
                'cover_image' => 'post_images/emma_stone_in_gangster_squad-wallpaper-1920x1080.jpg',
                'view_count' => $faker->numberBetween(100, 1000),
                'total_duration' => $faker->numberBetween(10, 60),
                'category_id' => $categoryIds[0], // Web Development category
                'user_id' => 1, // Assuming user ID 1 as the author
                'is_visible' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => "Advanced Techniques in HTML, CSS, and JavaScript",
                'slug' => 'advanced-techniques-in-html-css-and-javascript',
                'description' => 'Take your web development skills to the next level with this advanced guide to HTML, CSS, and JavaScript. Explore advanced HTML5 features, responsive design, CSS animations, and advanced JavaScript topics to build professional-quality web applications.',
                'content' => '<p>Welcome to the advanced techniques in HTML, CSS, and JavaScript! In this series, we will build upon the knowledge gained from the beginner\'s guide and explore more advanced concepts and strategies in web development.</p>
            
                <p>In this post, we will dive deeper into HTML and explore advanced HTML5 features and APIs. You\'ll learn how to create responsive layouts, implement multimedia elements, work with forms and validation, and leverage the power of semantic markup.</p>
                
                <p>Next, we will explore advanced CSS techniques and delve into topics such as CSS preprocessors, responsive design frameworks, flexbox, grid systems, and CSS animations and transitions. You\'ll discover how to create dynamic and interactive user interfaces using CSS.</p>
                
                <p>In the JavaScript section, we will explore more advanced topics such as DOM manipulation, AJAX and JSON, browser storage, asynchronous programming patterns, and popular JavaScript libraries and frameworks. You\'ll gain the skills to build more complex web applications and handle real-time data.</p>
                
                <p>Throughout this series, we\'ll provide you with practical examples, code snippets, and hands-on exercises to reinforce your understanding of advanced web development techniques. By the end of this series, you\'ll be equipped with the knowledge and skills to build professional-quality web applications.</p>
                
                <p>So, let\'s continue our journey into the world of HTML, CSS, and JavaScript and unlock the potential of modern web development!</p>',
                'keywords' => "HTML, CSS, JavaScript, web development, advanced techniques, HTML5, responsive design, CSS animations, DOM manipulation, asynchronous programming, JavaScript frameworks",
                'cover_image' => 'post_images/stranger_things.jpg',
                'view_count' => $faker->numberBetween(100, 1000),
                'total_duration' => $faker->numberBetween(10, 60),
                'category_id' => $categoryIds[0], // Web Development category
                'user_id' => 1, // Assuming user ID 1 as the author
                'is_visible' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                

                // Create a new post about Laravel
            
                'title' => 'Getting Started with Laravel',
                'slug' => 'getting-started-with-laravel',
                'description' => 'Learn the basics of Laravel and how to get started with this powerful PHP framework.',
                'content' => '<h2>Introduction to Laravel</h2>
                    <p>Laravel is a popular open-source PHP framework known for its elegance, simplicity, and powerful features. It provides a robust foundation for building web applications and follows the Model-View-Controller (MVC) architectural pattern.</p>
                    <h3>Key Features of Laravel</h3>
                    <ul>
                        <li>Expressive syntax and easy-to-understand code structure.</li>
                        <li>Database migration and schema builder for effortless database management.</li>
                        <li>Powerful routing system for defining clean and SEO-friendly URLs.</li>
                        <li>Integrated authentication and authorization system.</li>
                        <li>Built-in support for caching, queuing, and event handling.</li>
                        <li>Blade templating engine for creating reusable and modular views.</li>
                        <li>Robust ecosystem with a wide range of packages and libraries.</li>
                    </ul>
                    <h3>Getting Started</h3>
                    <p>To get started with Laravel, follow these steps:</p>
                    <ol>
                        <li>Install Laravel using Composer: <code>composer create-project --prefer-dist laravel/laravel your-project-name</code></li>
                        <li>Configure your environment variables in the <code>.env</code> file.</li>
                        <li>Run migrations to set up your database: <code>php artisan migrate</code></li>
                        <li>Start the development server: <code>php artisan serve</code></li>
                        <li>Explore the Laravel documentation and start building your application!</li>
                    </ol>
                    <p>Laravel offers extensive documentation, a vibrant community, and numerous online resources to help you learn and master the framework.</p>',
                'keywords' => 'laravel, php framework, web development, MVC',
                'cover_image' => 'post_images/laravel.png',
                'view_count' => 500,
                'total_duration' => 30,
                'category_id' => $categoryIds[0],
                'user_id' => 1,
                'is_visible' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                
            ],
            [
                'title' => "Optimizing Website Performance for Better User Experience",
                'slug' => 'optimizing-website-performance-for-better-user-experience',
                'description' => 'Learn how to optimize your website performance for better user experience. Discover techniques to improve page load times, frontend and server-side optimizations, mobile performance considerations, and tools to streamline your website performance.',
                'content' => '<p>Welcome to the guide on optimizing website performance for better user experience! In this post, we will explore various techniques and strategies to improve the performance of your website, ensuring faster load times and a smoother browsing experience for your users.</p>
            
                <p>First, we will discuss the importance of website performance and how it impacts user satisfaction, engagement, and conversion rates. We will cover key performance metrics such as page load time, time to interactive, and other indicators that affect user experience.</p>
                
                <p>Next, we will dive into optimization techniques for frontend development, including optimizing images, leveraging browser caching, minifying and compressing CSS and JavaScript files, and utilizing content delivery networks (CDNs). We will explore tools and best practices to streamline your frontend assets and reduce page load times.</p>
                
                <p>We will also cover server-side optimizations, such as optimizing database queries, implementing caching mechanisms, using HTTP/2 protocol, and leveraging server and network resources effectively. These techniques will help you improve the overall server response time and enhance the scalability and performance of your web application.</p>
                
                <p>Furthermore, we will discuss performance optimization for mobile devices, responsive design considerations, and techniques to optimize the mobile browsing experience. With the increasing number of mobile users, it is crucial to ensure your website performs well on various devices and networks.</p>
                
                <p>Throughout this post, we will provide practical examples, performance testing tools, and real-world case studies to illustrate the impact of optimization techniques. By implementing these strategies, you can enhance the speed, efficiency, and overall performance of your website, delivering an exceptional user experience.</p>
                
                <p>So, let\'s dive into the world of website performance optimization and unlock the potential to delight your users with a fast and seamless browsing experience!</p>',
                'keywords' => "website performance, user experience, page load times, frontend optimization, server-side optimization, mobile performance, responsive design, performance testing",
                'cover_image' => 'post_images/ariana_grande_black_and_white-wallpaper-2400x1350.jpg',
                'view_count' => $faker->numberBetween(100, 1000),
                'total_duration' => $faker->numberBetween(10, 60),
                'category_id' => $categoryIds[0], // Web Development category
                'user_id' => 1, // Assuming user ID 1 as the author
                'is_visible' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'title' => 'Typography 101: A Guide to Choosing and Pairing Fonts',
                'slug'  => 'typography-101-a-guide-to-choosing-and-pairing-fonts',
                'description' => 'Learn the fundamental principles and techniques for choosing and pairing fonts effectively. This guide explores different typeface categories, tips for combining fonts, creating visual hierarchy, and considering context and branding.',

                'content' => '<h2>Typography 101: A Guide to Choosing and Pairing Fonts</h2>
                    
                    <p>Typography is an art form that can greatly influence the visual appeal and readability of your designs. Choosing and pairing fonts effectively is crucial in creating a harmonious and engaging composition. In this guide, we will delve into the world of typography, exploring the fundamental principles and techniques for selecting and combining fonts.</p>
                    
                    <h3>Understanding Typeface Categories</h3>
                    
                    <p>Before diving into font selection, let\'s familiarize ourselves with the different typeface categories. Typefaces can be broadly classified into four main categories: serif, sans serif, script, and display.</p>
                    
                    <ul>
                    <li><strong>Serif</strong>: Serif fonts are characterized by small decorative flourishes at the ends of letters. They exude a sense of tradition, elegance, and formality. Serif fonts are often used for body text in printed materials, such as books and newspapers.</li>
                    <li><strong>Sans Serif</strong>: Sans serif fonts lack the decorative strokes at the ends of letters. They possess a clean, modern, and minimalist aesthetic. Sans serif fonts are commonly utilized for digital content, headings, and user interfaces.</li>
                    <li><strong>Script</strong>: Script fonts mimic cursive handwriting and convey a sense of elegance, sophistication, and creativity. They are commonly employed for invitations, logos, and decorative purposes. However, due to their ornate nature, they should be used sparingly and in appropriate contexts.</li>
                    <li><strong>Display</strong>: Display fonts are highly stylized and often used for large headlines or eye-catching elements. They come in a variety of unique and attention-grabbing styles, making them ideal for creating impact and conveying a specific theme or mood.</li>
                    </ul>
                    
                    <h3>Choosing Fonts That Complement Each Other</h3>
                    
                    <p>When it comes to combining fonts, it\'s essential to strike a balance between contrast and harmony. Here are some tips to help you choose fonts that complement each other:</p>
                    
                    <ol>
                    <li><strong>Pair Contrasting Styles</strong>: Combine fonts from different categories to create contrast. For example, pairing a serif font with a sans serif font can create a pleasing juxtaposition. This contrast adds visual interest while maintaining readability.</li>
                    <li><strong>Consider Font Weights</strong>: Within a typeface family, there are often different weights available, such as light, regular, medium, bold, and black. Utilize different weights to add hierarchy and emphasis. For instance, use a bold font for headlines and a lighter weight for body text.</li>
                    <li><strong>Ensure Readability</strong>: Regardless of the fonts you choose, readability should always be a top priority. Ensure that the text is easily legible, especially at smaller sizes. Avoid using overly decorative or intricate fonts for lengthy paragraphs of text.</li>
                    <li><strong>Create Visual Hierarchy</strong>: Use font size, weight, and spacing to establish a clear visual hierarchy. Headlines should be more prominent than subheadings, which, in turn, should stand out from the body text. Consistency in font usage also helps maintain a cohesive design.</li>
                    </ol>
                    
                    <h3>Consider Context and Branding</h3>
                    
                <p>When selecting and pairing fonts, it\'s important to consider the context and branding of your project. Fonts should align',
                'keywords' => "typography, fonts, typeface categories, font pairing, visual hierarchy, branding, design",
                'cover_image' => 'post_images/selena_gomez_104-HD.jpg',
                'view_count' => $faker->numberBetween(100, 1000),
                'total_duration' => $faker->numberBetween(10, 60),
                'category_id' => $categoryIds[1], // Graphic Design category
                'user_id' => 1, // Assuming user ID 1 as the author
                'is_visible' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
            [
                'title' => 'Introduction to Digital Marketing: Channels, Strategies, and Tools',
                'slug'   => 'introduction-to-digital-marketing-channels-strategies-and-tools',
                'description' => 'Discover the fundamental concepts, strategies, and tools of digital marketing in this comprehensive introductory guide. Learn about various digital marketing channels, developing effective marketing strategies, and essential tools for successful campaigns.',

                'content' => '<h2>Introduction to Digital Marketing: Channels, Strategies, and Tools</h2>
                
                <p>Digital marketing has become an essential component of any successful business strategy. It involves leveraging digital channels to promote products and services, engage with audiences, and drive conversions. In this introductory guide, we will explore the fundamental concepts, strategies, and tools that are integral to digital marketing.</p>
                
                <h3>Understanding Digital Marketing Channels</h3>
                
                <p>There are various digital marketing channels available, each offering unique opportunities to reach and connect with target audiences. Some common digital marketing channels include:</p>
                
                <ul>
                  <li>Search Engine Optimization (SEO): Optimizing websites and content to improve organic search engine rankings.</li>
                  <li>Search Engine Marketing (SEM): Running paid advertising campaigns on search engines to increase visibility.</li>
                  <li>Social Media Marketing: Leveraging social media platforms to engage with audiences and promote products or services.</li>
                  <li>Email Marketing: Sending targeted emails to nurture leads and build customer relationships.</li>
                  <li>Content Marketing: Creating and distributing valuable content to attract and retain a specific audience.</li>
                  <li>Affiliate Marketing: Partnering with affiliates to promote products or services in exchange for a commission.</li>
                  <li>Influencer Marketing: Collaborating with influential individuals to reach their followers and increase brand awareness.</li>
                </ul>
                
                <h3>Developing Effective Digital Marketing Strategies</h3>
                
                <p>To succeed in digital marketing, it\'s crucial to develop comprehensive strategies that align with your business goals and target audience. Here are some key steps to consider when crafting your digital marketing strategies:</p>
                
                <ol>
                  <li><strong>Define Your Objectives</strong>: Clearly outline what you want to achieve with your digital marketing efforts, whether it\'s increasing brand awareness, driving website traffic, or boosting sales.</li>
                  <li><strong>Identify Your Target Audience</strong>: Understand who your ideal customers are, their needs, and preferences. This knowledge will help you tailor your marketing messages and select the most effective channels to reach them.</li>
                  <li><strong>Create Compelling Content</strong>: Develop high-quality and relevant content that resonates with your target audience. This can include blog posts, videos, infographics, and more.</li>
                  <li><strong>Choose the Right Channels</strong>: Select the digital marketing channels that align with your target audience\'s preferences and behavior. Focus your efforts on channels that offer the best opportunities for engagement and conversions.</li>
                  <li><strong>Monitor and Analyze</strong>: Regularly track and analyze your digital marketing performance using tools like Google Analytics. This data will help you understand what\'s working, identify areas for improvement, and optimize your strategies accordingly.</li>
                </ol>
                
                <h3>Essential Tools for Digital Marketers</h3>
                
                <p>Several tools and platforms can assist digital marketers in planning, executing, and analyzing their campaigns. Here are some essential tools worth considering:</p>
                
                <ul>
                  <li><strong>Google Analytics</strong>: A powerful web analytics tool that provides insights into website traffic, user behavior, and conversion metrics.</li>
                  <li><strong>Email Marketing Platforms</strong>: Platforms like Mailchimp and Constant Contact simplify the process of creating, sending, and tracking email campaigns.</li>
                  <li><strong>Social Media Management Tools</strong>: Tools such as Hootsuite and Buffer help streamline social media marketing efforts by allowing scheduling, monitoring, and analytics.</li>
                  <li><strong>Keyword Research Tools</strong>: Tools like SEM</li>
                </ul>',

                'keywords' => "digital marketing, marketing channels, digital strategies, tools, SEO, SEM, social media marketing, email marketing, content marketing, affiliate marketing, influencer marketing, Google Analytics, email marketing platforms, social media management tools, keyword research tools",
                'cover_image' => 'post_images/megan_fox_16-wallpaper-1920x1080.jpg',
                'view_count' => $faker->numberBetween(100, 1000),
                'total_duration' => $faker->numberBetween(10, 60),
                'category_id' => $categoryIds[2], // Digital Marketing category
                'user_id' => 1, // Assuming user ID 1 as the author
                'is_visible' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'The Importance of User-Centered Design: Putting Users First',
                'slug'  => 'the-importance-of-user-centered-design-putting-users-first',
                'description' => 'Discover the significance of user-centered design and the benefits it brings to creating successful products and experiences. Learn how prioritizing users\' needs and preferences can lead to improved usability, increased customer satisfaction, and business growth.',
                'content' => '<h2>The Importance of User-Centered Design: Putting Users First</h2>

                <p>User-centered design is a crucial aspect of creating exceptional products and experiences. By prioritizing the needs and preferences of users, businesses can deliver solutions that truly resonate and bring value. In this post, we will explore the significance of user-centered design and why it should be at the forefront of every design process.</p>

                <p>When it comes to design, putting users first means understanding their goals, behaviors, and pain points. By conducting thorough research and gathering user insights, designers can gain valuable information that informs their decision-making. This user-centric approach leads to several key benefits:</p>

                <h3>Improved Usability and Accessibility</h3>

                <p>User-centered design focuses on creating products and experiences that are intuitive, easy to use, and accessible to a wide range of users. By considering different user perspectives, designers can identify potential usability issues and make informed design decisions to enhance the overall user experience.</p>

                <h3>Enhanced User Satisfaction</h3>

                <p>By addressing users\' needs and preferences, businesses can create solutions that align with their expectations. When users find a product or service that meets their requirements and provides a seamless experience, it leads to higher levels of satisfaction, which can result in increased loyalty and positive word-of-mouth recommendations.</p>

                <h3>Increased Business Value</h3>

                <p>Putting users first ultimately drives business success. By focusing on creating user-centered solutions, businesses can gain a competitive edge, differentiate themselves in the market, and attract more customers. Additionally, satisfied users are more likely to engage, convert, and become loyal brand advocates, contributing to long-term growth and profitability.</p>

                <p>In summary, user-centered design is essential for creating products and experiences that truly meet users\' needs. By understanding their goals, behaviors, and preferences, businesses can deliver exceptional solutions that drive usability, enhance satisfaction, and generate long-term business value.</p>',
                'keywords' => "user-centered design, usability, accessibility, user satisfaction, user research, user insights, design process, business value, competitive edge",
                'cover_image' => 'post_images/the_amazing_spider_man_2_emma_stone-wallpaper-1920x1080.jpg',
                'view_count' => $faker->numberBetween(100, 1000),
                'total_duration' => $faker->numberBetween(10, 60),
                'category_id' => $categoryIds[3], // User Experience (UX) Design category
                'user_id' => 1, // Assuming user ID 1 as the author
                'is_visible' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),

            ],
        ];

        foreach ($posts as $post) {
            DB::table('posts')->insert($post);
        }
    }
}
