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
                'title' => 'A Comprehensive Guide to Web Development and Web Design: Part 1',
                'slug' => 'comprehensive-guide-to-web-development-and-web-design-part-1',
                'description' => 'Explore the foundational aspects of web development and web design in this comprehensive guide. Learn about their symbiotic relationship and how they create engaging online experiences.',
                'content' => '
                    <h2>Introduction</h2>
                    <p><strong>The Dynamic Duo: Web Development and Web Design</strong></p>
                    <p>Web development and web design are the twin pillars that uphold the digital architecture of the modern world. Together, they shape the online experiences that users encounter, influencing everything from the initial impression to the lasting engagement.</p>
                    <p><strong>Web Development: Building the Foundation</strong></p>
                    <p>Web development is the technical backbone that turns ideas and designs into functional websites and applications. It involves coding, scripting, and database management to create the interactive elements that users interact with. From crafting intricate e-commerce platforms to developing innovative web applications, web development is the engine that powers digital innovation.</p>
                    <p>A well-executed web development strategy ensures that websites are responsive, secure, and performant across a multitude of devices and browsers. Without effective web development, even the most stunning designs would remain static and unresponsive, failing to meet user expectations and business goals.</p>
                    <p><strong>Web Design: Crafting User-Centric Experiences</strong></p>
                    <p>While web development lays the foundation, web design adds the aesthetics and user experience that make websites truly captivating. It\'s the art of harmonizing colors, typography, layouts, and visuals to create visually appealing interfaces that guide users seamlessly through the digital landscape.</p>
                    <p>Effective web design goes beyond mere aesthetics; it enhances usability and ensures that users can effortlessly navigate, access information, and complete desired actions. By focusing on user psychology, behavior, and preferences, web design optimizes the interaction between users and the digital world.</p>
                    <p><strong>The Symbiotic Relationship</strong></p>
                    <p>Web development and web design are intertwined in a symbiotic relationship. A stunning design might grab attention, but without solid development, it remains a mere image. Similarly, flawless functionality might power a website, but without compelling design, it lacks the charm that keeps users engaged.</p>
                    <p>In the realm of successful websites, both elements collaborate harmoniously. Striking designs are brought to life by intricate coding, and seamless functionality is made inviting through creative aesthetics. Together, web development and web design create an immersive online experience that not only meets users\' needs but also exceeds their expectations.</p>
                    <p>In the pages that follow, we\'ll dive deeper into the nuances of both web development and web design, uncovering the methodologies, best practices, and trends that empower businesses and creators to thrive in the digital era.</p>
                ',
                'keywords' => 'web development, web design, guide, fundamentals, online experiences',
                'cover_image' => 'post_images/photo_by_Clay_Banks.jpg',
                'category_id' => $categoryIds[0], // Update this with the appropriate category ID
                'user_id' => 1, // Update this with the appropriate user ID as the author
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'A Comprehensive Guide to Web Development and Web Design: Part 2',
                'slug' => 'comprehensive-guide-to-web-development-and-web-design-part-2',
                'description' => 'Explore the technical aspects of web development in this comprehensive guide. Learn about front-end and back-end development, HTML, CSS, JavaScript, and more.',
                'content' => '
                    <h2>Understanding Web Development</h2>
                    <p>Web development is the backbone of the digital world, encompassing the technical processes that bring websites and web applications to life. This section provides a comprehensive overview of the key aspects of web development, ranging from the fundamentals of front-end and back-end development to the critical role of databases.</p>
                    <h3>What is Web Development?</h3>
                    <p>At its core, web development involves creating, building, and maintaining online platforms that users access through web browsers. It encompasses both the technical implementation of functionalities and the visual aspects that users interact with. Web development acts as the bridge between design concepts and functional, user-friendly digital experiences.</p>
                    <p>Web development plays a pivotal role in transforming static designs into dynamic and interactive websites. It involves coding, scripting, and programming to build the features that enable user interactions, data processing, and content delivery. Without web development, websites would remain static and non-functional, lacking the interactivity that users have come to expect.</p>
                    <h3>Front-End Development</h3>
                    <p>Front-end development, also known as client-side development, is responsible for creating the visual and interactive elements that users see and interact with on a website. It focuses on enhancing the user experience through intuitive interfaces and engaging design.</p>
                    <p><strong>HTML (Hypertext Markup Language):</strong> HTML is the structural foundation of web pages, defining the content and layout structure. Elements like headings, paragraphs, images, and links are all defined using HTML tags.</p>
                    <p><strong>CSS (Cascading Style Sheets):</strong> CSS is used to control the presentation and styling of web pages. It determines the colors, fonts, spacing, and overall visual appearance of the content defined in HTML.</p>
                    <p><strong>JavaScript:</strong> JavaScript is a versatile programming language that enables interactive and dynamic features on websites. It allows developers to create animations, handle user interactions, and manipulate content in real time.</p>
                    <p>Front-end development emphasizes responsive design, ensuring that websites adapt seamlessly to different screen sizes and devices. Mobile optimization is a crucial consideration, as an increasing number of users access websites through smartphones and tablets.</p>
                    <h3>Back-End Development</h3>
                    <p>Back-end development, or server-side development, focuses on the behind-the-scenes operations that enable websites to function effectively. It involves managing server-side processes, databases, and business logic.</p>
                    <p><strong>Server-Side Languages:</strong> Back-end developers use languages like Python, Ruby, PHP, and Java to build the logic that processes requests, manages data, and handles complex operations. These languages enable the dynamic generation of content based on user inputs and database interactions.</p>
                    <p><strong>Frameworks:</strong> Frameworks like Node.js, Django, and Ruby on Rails provide a structured environment for building web applications efficiently. They offer pre-built modules and tools that streamline development processes.</p>
                    <p><strong>Databases:</strong> Databases are repositories for storing and retrieving data. Back-end developers use database systems like MySQL, PostgreSQL, and MongoDB to store user information, content, and other data needed by the application.</p>
                    <p>Back-end development ensures data security, efficient data processing, and the seamless functioning of the application. It\'s responsible for managing user accounts, processing transactions, and providing the information that front-end interfaces display.</p>
                    <p>In essence, the synergy between front-end and back-end development, along with the proper utilization of databases, is what enables web applications to deliver rich, interactive, and user-centered experiences. This collaborative effort results in websites that combine aesthetics with functionality.</p>
                ',
                'keywords' => 'web development, front-end development, back-end development, HTML, CSS, JavaScript, databases, user experience',
                'cover_image' => 'post_images/photo_by_Fotis_Fotopoulos.jpg',
                'category_id' => $categoryIds[0], // Update this with the appropriate category ID
                'user_id' => 1, // Update this with the appropriate user ID as the author
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'A Comprehensive Guide to Web Development and Web Design: Part 3',
                'slug' => 'comprehensive-guide-to-web-development-and-web-design-part-3',
                'description' => 'Explore the creative and artistic aspects of web design in this comprehensive guide. Learn about UI design, UX design, interaction design, and the significance of visual appeal.',
                'content' => '
                    <h2>The Art of Web Design</h2>
                    <p>In the realm of the digital canvas, web design stands as the artistic expression that transforms code into captivating visual experiences. This section unveils the artistry and methodologies behind web design, showcasing how it elevates websites from mere functionality to immersive journeys.</p>
                    <h3>Subsection 2.1: What is Web Design?</h3>
                    <p><strong>Aesthetic Mastery Unveiled:</strong> Web design is the creative process of conceptualizing, planning, and crafting the visual elements that make up a website or web application. It encompasses the harmonious blend of aesthetics, usability, and user experience to create interfaces that captivate, engage, and guide users.</p>
                    <p><strong>Significance of Visual Appeal:</strong> The significance of web design lies in its power to create a first impression that lasts. A well-designed website can instantly communicate professionalism, trustworthiness, and the values of a brand. It\'s not just about looks; it\'s about crafting a digital environment that resonates with the target audience, enhancing their engagement and interaction.</p>
                    <h3>Subsection 2.2: UI (User Interface) Design</h3>
                    <p><strong>Principles that Paint Excellence:</strong> User Interface (UI) design delves into the artistic principles that shape the visual elements of a website. Layout, color theory, typography, and visual hierarchy are the building blocks that designers use to construct captivating and functional interfaces.</p>
                    <p><strong>Influencing User Interactions:</strong> UI design doesn\'t just determine how a website looks; it also influences how users interact with it. Thoughtfully designed buttons, menus, forms, and icons guide users through their digital journey. By creating intuitive navigation and interactions, UI design enhances user engagement and satisfaction.</p>
                    <h3>Subsection 2.3: UX (User Experience) Design</h3>
                    <p><strong>Crafting User-Centric Bliss:</strong> User Experience (UX) design focuses on optimizing the overall experience visitors have while navigating a website or application. It\'s about understanding user needs, expectations, and behaviors to create seamless, efficient, and enjoyable interactions.</p>
                    <p><strong>From Research to Testing:</strong> UX design involves a meticulous process that includes user research to gather insights, wireframing to outline the structure, prototyping to visualize interactions, and usability testing to refine the experience. This iterative approach ensures that every decision is backed by user-centered data.</p>
                    <h3>Subsection 2.4: Interaction Design</h3>
                    <p><strong>Enhancing Engagement with Microinteractions:</strong> Microinteractions are the subtle animations, transitions, and responses that occur as users interact with a website. They provide feedback, delight users, and make interactions feel intuitive. From the satisfying "ping" of a successful form submission to the playful animation of a menu opening, microinteractions shape the user\'s perception of the website.</p>
                    <p><strong>JavaScript and CSS Animations:</strong> JavaScript and CSS animations play a pivotal role in crafting engaging interactions. JavaScript enables dynamic behaviors and real-time updates, while CSS animations add visual flair. These technologies are used to create everything from smooth scrolling effects to interactive image galleries, enriching the user experience.</p>
                    <p>In the symphony of web design, aesthetics and functionality intertwine to create digital symphonies that resonate with users. It\'s the perfect blend of artistic ingenuity and user-centric methodology that ensures websites not only capture attention but also provide seamless, memorable, and meaningful experiences. As we continue our exploration, the subsequent sections will peel back the layers of collaboration between web development and design.</p>
                ',
                'keywords' => 'web design, UI design, UX design, interaction design, aesthetics, user experience',
                'cover_image' => 'post_images/photo_by_kelly-sikkema.jpg',
                'category_id' => $categoryIds[0], // Update this with the appropriate category ID
                'user_id' => 1, // Update this with the appropriate user ID as the author
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            
        ];

        foreach ($posts as $post) {
            DB::table('posts')->insert($post);
        }
    }
}
