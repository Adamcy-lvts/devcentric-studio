<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Web Development',

                'details' => ' Empower your business with custom web development solutions that go beyond websites.
                From dynamic e-commerce platforms to interactive web portals, we bring your ideas to
                life using cutting-edge technologies.',

                'detail_info' => "<div>
                <h2>Empower Your Business with Custom Web Development Solutions</h2>
                <p>At DevCentric Studio, we specialize in providing custom web development solutions that go beyond websites. Your online presence is crucial in today's digital landscape, and we are here to help your business thrive. With our expertise in cutting-edge technologies and industry best practices, we deliver scalable, secure, and user-friendly web solutions tailored to your unique needs.</p>
                <p>Explore our range of web development services:</p>
                <h3>Website Development</h3>
                <ul>
                  <li>Business websites</li>
                  <li>Portfolio websites</li>
                  <li>Corporate websites</li>
                </ul>
                <h3>E-commerce Development</h3>
                <ul>
                  <li>Secure payment gateways</li>
                  <li>Inventory management</li>
                  <li>Order processing</li>
                </ul>
                <h3>Web Application Development</h3>
                <ul>
                  <li>Customer portals</li>
                  <li>Booking systems</li>
                  <li>Collaborative tools</li>
                </ul>
                <h3>Content Management Systems (CMS)</h3>
                <ul>
                  <li>WordPress customization</li>
                  <li>Drupal customization</li>
                  <li>Joomla customization</li>
                </ul>
                <h3>API Integration</h3>
                <ul>
                  <li>Payment gateways integration</li>
                  <li>Social media integrations</li>
                  <li>Map services integration</li>
                  <li>Data analytics tools integration</li>
                </ul>
                <h3>Website Maintenance and Support</h3>
                <ul>
                  <li>Security updates and patches</li>
                  <li>Regular backups</li>
                  <li>Technical support</li>
                </ul>
                <p>Trust our web development experts to transform your ideas into robust and user-friendly web solutions that drive business growth and deliver exceptional online experiences. Contact us today to discuss your web development needs and take your online presence to the next level.</p>
              </div>
              
              ",

                'svg_code' => '<svg class="w-32 h-32 gradient-fill hover:text-gray-200 text-gray-400" fill="currentColor" viewBox="-8 0 464 464" xmlns="http://www.w3.org/2000/svg">
                <defs>
                  <linearGradient id="myGradient" gradientTransform="rotate(45)">
                    <stop offset="0%" stop-color="#B5F44A" />
                    <stop offset="100%" stop-color="#1B998B" />
                  </linearGradient>
                </defs>
                <path d="m304 432h-160v16h-32v16h224v-16h-32z" fill="url(#myGradient)" />
                <path d="m175.06 368-6 48h109.88l-6-48z" fill="url(#myGradient)" />
                <path d="m72 256h304c4.418 0 8-3.582 8-8v-200h-320v200c0 4.418 3.582 8 8 8zm152-48h-32v-16h32zm-64-32v-16h48v16zm16 16v16h-32v-16zm90.344-106.34 11.312-11.312 24 24c3.1211 3.125 3.1211 8.1875 0 11.312l-24 24-11.312-11.312 18.344-18.344zm-33.777-24.633 14.867 5.9531-32 80-14.867-5.9531zm-86.223 37.32 24-24 11.312 11.312-18.344 18.344 18.344 18.344-11.312 11.312-24-24c-3.1211-3.125-3.1211-8.1875 0-11.312zm-18.344 61.656h16v16h-16zm-16 64h96v16h-96z" fill="url(#myGradient)" />
                <path d="m0 328c0 13.254 10.746 24 24 24h400c13.254 0 24-10.746 24-24v-24h-448zm408-8h16v16h-16z" fill="url(#myGradient)" />
                <path d="m424 64h-24v184c0 13.254-10.746 24-24 24h-304c-13.254 0-24-10.746-24-24v-184h-24c-13.254 0-24 10.746-24 24v200h448v-200c0-13.254-10.746-24-24-24z" fill="url(#myGradient)" />
                <path d="m384 8c0-4.418-3.582-8-8-8h-304c-4.418 0-8 3.582-8 8v24h320zm-288 16h-16v-16h16zm32 0h-16v-16h16zm32 0h-16v-16h16z" fill="url(#myGradient)" />
              </svg>',
            ],
            [
                'name' => 'Graphic Design',
                'details' => 'From captivating logos and eye-catching marketing materials to engaging social media
                visuals, we ensure your brand stands out in a crowded digital landscape.
                Trust us to bring your ideas to life with compelling visuals that leave a lasting
                impact.',
                'detail_info' => "<div>
                <h2>Create Lasting Impressions with our Creative Graphic Design Solutions</h2>
                <p>At DevCentric Studio, we are passionate about crafting visually stunning designs that make a lasting impression and reflect your brand's personality. Our talented team of graphic designers combines artistic vision with strategic thinking to create compelling visuals that help your brand stand out in the crowded digital landscape.</p>
                <p>Our graphic design services encompass a wide range of solutions tailored to enhance your brand's presence and captivate your audience:</p>
                <h3>Logo Design</h3>
                <p>We create unique and memorable logos that represent your brand's identity and leave a lasting impression on your target audience.</p>
                <h3>Branding and Identity</h3>
                <p>We develop cohesive brand identities that encompass your brand values, mission, and visual elements, ensuring consistency across all touchpoints.</p>
                <h3>Marketing Collateral</h3>
                <ul>
                  <li>Flyers</li>
                  <li>Brochures</li>
                  <li>Business Cards</li>
                  <li>Presentations</li>
                  <li>Infographics</li>
                </ul>
                <h3>Social Media Graphics</h3>
                <ul>
                  <li>Posts</li>
                  <li>Banners</li>
                  <li>Cover Photos</li>
                  <li>Profile Graphics</li>
                </ul>
                <h3>Website Graphics</h3>
                <ul>
                  <li>Headers</li>
                  <li>Icons</li>
                  <li>Illustrations</li>
                  <li>Backgrounds</li>
                </ul>
                <h3>Packaging Design</h3>
                <p>We design attractive and functional packaging solutions that capture attention on store shelves and communicate the essence of your product.</p>
                <h3>Print Design</h3>
                <p>From posters and banners to product labels and packaging, we specialize in creating impactful print designs that align with your brand's aesthetics and objectives.</p>
                <h3>Digital Advertisements</h3>
                <p>We craft visually compelling designs for online advertising campaigns, including banner ads, social media ads, and Google AdWords graphics, helping you drive conversions and maximize your ROI.</p>
                <p>Trust our expert graphic designers to bring your ideas to life with professional and visually stunning designs that leave a lasting impact on your audience. Contact us today to discuss your graphic design needs and take your brand's visual identity to the next level.</p>
              </div>
              
            ",

             'svg_code' =>'<svg class="w-32 h-32 gradient-fill" fill="currentColor" viewBox="0 0 316.59 375.69"
                xmlns="http://www.w3.org/2000/svg">
                <defs>
                  <linearGradient id="gradient1" gradientTransform="rotate(45)">
                    <stop offset="0%" stop-color="#ff9f00" />
                    <stop offset="100%" stop-color="#ff2a68" />
                  </linearGradient>
                </defs>
                <path d="M153.61 128.21c0 22.62-.06 45.24.06 67.87.02 3.51-.94 5.72-4.21 7.47-7.12 3.82-10.34 11.92-8.29 19.5 4 16.96 29.54 17.13 33.67.13 2.12-7.56-1.05-15.7-8.13-19.56-3.19-1.74-4.34-3.82-4.33-7.41.1-45.62.07-91.24.07-136.86-.88-7.29 7.8-8.27 9.64-1.3 26.69 53.37 53.33 106.75 80.11 160.07 5.68 9.09-24.1 53.14-28.62 67.03-1.32 2.68-2.82 3.45-5.7 3.44-40-.1-80-.1-120 0-2.8.01-4.13-.91-5.35-3.37-9.56-19.36-19.22-38.66-28.99-57.92-1.5-2.95-1.59-5.39-.07-8.41 27.04-53.87 53.98-107.79 80.98-161.69 1.71-5.38 9-6.31 9.13.89.06 10.5.02 21 .02 31.5.01 12.87.01 25.75.01 38.62z"
                  fill="url(#gradient1)" />
                <path d="M303.44 152.77c4.49.39 12.85-1.99 12.76 4.9-1.33 6.43 4.12 31.69-5.32 30.02-6.31-1.42-30.91 4.04-29.73-5.01-.01-8.25.02-16.5-.01-24.75-.26-7.03 7.93-4.84 12.51-5.16.84-59.97-48.92-122.33-118.03-129.39-.27 4.3 1.66 11.67-4.84 11.45-8.43.01-16.86.01-25.29 0-6.7.04-4.51-6.96-4.86-11.82-65.47 7.46-117.2 63.91-118.6 129.75 5.11.42 13.1-2.1 13.07 5.13-1.44 6.41 4.14 31.11-5.18 29.78-6.25-1.37-30.94 3.99-29.87-4.85-.05-8.38-.03-16.75-.02-25.13-.12-6.92 8.24-4.54 12.75-4.93 4.83-62.22 35.78-105.62 93.3-130.63H34.55c-2.75 8.78-11.89 14.5-20.99 12.37C-4.11 31.01-4.35 4.13 13.46.49c7.89-1.91 16.31 2.01 19.8 9.47.92 1.97 1.63 3.17 4.2 3.16 34.4-.31 68.75.33 103.15-.3.39-4.75-2.04-13.18 5.21-12.73 8.18-.07 16.36-.06 24.54 0 7.32-.34 4.86 7.69 5.26 12.73 34.12.61 68.22.01 102.35.27 2.51 0 3.89-.51 5.03-3.08 3.34-7.54 11.84-11.43 19.73-9.54 17.84 3.63 17.62 30.51-.01 34.03-8.02 1.81-16.42-2.06-19.73-9.58-1.13-2.56-2.49-3.09-5-3.08-22.52.08-45.04.05-68.41.05 57.92 25.09 88.87 68.43 93.86 130.88zM157.69 332.13H85.72c-5.38 0-6.67-1.25-6.69-6.55-.02-7.5-.04-14.99.01-22.49.03-4.39 1.47-5.87 5.87-5.87 48.48-.03 96.95-.03 145.43 0 4.57 0 5.91 1.46 5.94 6.19.04 7.5.04 14.99 0 22.49-.02 4.85-1.41 6.23-6.25 6.23-24.12.01-48.23 0-72.34 0zM223.04 341.14c-1.22 6.49 3.46 35.06-3.95 34.46-39.85.2-79.71 0-119.57.07-6.56 0-7.26-.72-7.27-7.35v-27.18h130.79z"
                  fill="url(#gradient1)" />
              </svg>',
            ],
            [
                'name' => 'Maintenance and Support',
                'details' => '  We provide reliable and prompt assistance to ensure your systems and websites stay
                up and running smoothly.
                Our timely updates and technical support keep your digital presence at its best.',
                'detail_info' => "<div>
                <h2>Reliable Maintenance and Support for Your Web Solutions</h2>
                <p>At DevCentric Studio, we understand the importance of keeping your web solutions secure, up-to-date, and optimized for performance. Our comprehensive maintenance and support services ensure that your online presence remains reliable and hassle-free, allowing you to focus on your core business.</p>
                <p>Our maintenance and support services include:</p>
                <ul>
                  <li>Regular updates and security patches to keep your website or web application protected against vulnerabilities.</li>
                  <li>Monitoring and performance optimization to ensure fast loading times and smooth user experiences.</li>
                  <li>Content management system (CMS) updates and plugin management for seamless functionality and security.</li>
                  <li>Backup and disaster recovery solutions to safeguard your data and restore your web solutions in case of any unforeseen events.</li>
                  <li>Bug fixing and troubleshooting to address any technical issues and ensure smooth operation.</li>
                  <li>Ongoing technical support and assistance to answer your questions and provide guidance whenever you need it.</li>
                </ul>
                <p>With our dedicated team of experts by your side, you can have peace of mind knowing that your web solutions are well-maintained, secure, and performing at their best. Partner with us for reliable maintenance and support, and let us take care of the technical aspects while you focus on growing your business.</p>
              </div>
              ",
                'svg_code' => '<svg class="w-32 h-32 hover:text-gray-200 text-gray-400" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                viewBox="0 0 596.85 650.15">
                <linearGradient id="gradient" gradientTransform="rotate(45)">
                <stop offset="0%" stop-color="#9EB25D" />
                <stop offset="100%" stop-color="#F1DB4B" />
                </linearGradient>
                <switch>
                <g filter="url(#glow)">
                <path fill="url(#gradient)"
                d="M386.72 297.2c-2.48 4.51-5.1 8.95-7.43 13.54-7.3 14.43-18.67 25.68-29.97 36.7-11.05 10.76-25.4 16.28-40.27 19.74-29.31 6.83-57.7 3.88-84.31-10.42-21.63-11.62-38.02-29.04-50.45-50.07-10.5-17.75-17.97-36.77-21.75-57.11-.47-2.52-1.39-3.77-4.08-3.72-6.86.13-13.72.02-20.58.18-10.16.25-17.97-4.28-23.41-12.38-2.22-3.31-3.61-7.84-3.68-11.85-.36-22.62-.18-45.24-.22-67.87-.01-5.07 1.95-9.61 5.56-12.68 5.39-4.58 7.31-10.47 8.69-16.91 2.94-13.72 6.75-27.18 13.55-39.55 9.04-16.45 20.84-30.56 35.04-43.01 22.43-19.67 48.52-31.26 77.2-37.77 20.43-4.64 41.13-5.16 61.77-2.13 34.98 5.14 66.04 19.12 92.19 43.17 17.1 15.73 29.8 34.64 37.91 56.4 3.25 8.71 5.35 17.87 7.56 26.93 1.08 4.42 2.71 8.29 6.19 11.21 4.39 3.7 6.67 8.6 6.94 14.08.69 13.96 1.01 27.94 1.27 41.92.13 6.99-.02 14-.35 20.99-.32 6.93-1.68 13.66-5.86 19.45-5.35 7.42-13.34 9.34-21.74 9.83-6.6.39-13.25.25-19.86.01-3.16-.11-5.02.95-6.62 3.64-14.55 24.51-36.55 39.59-63.02 48.45-6.98 2.34-14.67 2.62-22.07 3.54-1.46.18-3.42-.7-4.59-1.72-3.39-2.94-7.15-4.42-11.62-4.36-5.5.08-11-.04-16.5.03-8.32.1-15.06 6.38-16.2 14.84-.88 6.56 3.05 16.24 11.65 18.2 9.08 2.07 18.06 2.04 27.08.19 1.61-.33 3.36-1.33 4.46-2.56 3.1-3.46 7.03-4.3 11.38-4.76 17.93-1.89 35.18-6.16 50.89-15.38 4.94-2.9 9.68-6.13 14.51-9.21.26.16.5.29.74.42zM276.09 30.48c-7.59.46-15.28.32-22.77 1.48-26.69 4.11-50.21 15.36-70.68 32.9-19.08 16.35-31.17 37.13-37.84 61.18-1.68 6.04-.28 8.24 5.54 9.87 1.98.56 3.13.29 3.86-2.02 5.53-17.61 15.86-32.21 29.39-44.45 23.49-21.25 52.01-30 82.94-31.81 20.45-1.2 40.58 1.16 60.29 7.19 28.09 8.59 49.19 26 64.45 50.68 3.57 5.77 5.61 12.48 8.55 18.67.55 1.16 2.26 2.84 3.03 2.64 5.22-1.3 7.5-5.25 6.27-10.48-5.83-24.7-19.07-45.12-37.97-61.47-27.13-23.47-58.88-35.2-95.06-34.38zM440.11 431.62c-40.02 19.25-65.63 49.49-74.42 92.64-8.88 43.63 5.46 80.67 34.98 113.86-2.31.19-3.45.36-4.59.36-130.61.01-261.23 0-391.84.07-3.29 0-4.5-.94-4.19-4.27.9-9.68 1.59-19.39 2.42-29.07.92-10.69 1.65-21.4 2.91-32.04 3-25.28 5.81-50.66 13.67-75.01 2.78-8.61 6.95-16.82 10.98-24.97 3.41-6.89 9.5-11.23 16.46-14.11 15.69-6.49 31.45-12.81 47.21-19.12 25.5-10.21 51.11-20.17 76.48-30.69 5.4-2.24 10.19-6.18 14.9-9.82 7.9-6.1 15.48-12.63 23.26-18.89 6.08-4.89 12.63-4.51 19.38-1.49 7.83 3.5 13.9 9.25 19.66 15.36 6.16 6.55 12.1 13.32 18.25 19.88 2.21 2.36 4.87 4.31 7.12 6.64 2.85 2.95 5.41 2.93 8.24-.01 5.88-6.12 11.98-12.03 17.74-18.25 7.39-7.98 14.28-16.54 23.99-21.84 12.4-6.76 16.91-4.86 25.74 1.81 5.87 4.44 11.71 9.02 16.98 14.14 6.9 6.7 15.09 11.1 23.77 14.63 15.95 6.51 32.06 12.62 48.1 18.9.64.24 1.27.57 2.8 1.29z" />
                <path fill="url(#gradient)"
                d="M596.78 545.37c1.03 29.36-9.1 53.03-27.36 72.84-20.95 22.71-48.09 32.09-78.65 31.94-53.41-.25-96.66-47.41-98.08-101.2-1.38-52.43 45.16-102.59 100.32-102.76 58.93-.19 104.09 46.18 103.77 99.18zm-116.79 35.28c0-1.28-.15-3.17.05-5.03.14-1.29.4-2.87 1.22-3.73 4.23-4.41 8.62-8.67 13.05-12.88.71-.67 2.04-1.41 2.81-1.19 3.51 1.04 4.75 5.62 2.45 8.53-1.24 1.56-2.73 2.93-3.89 4.54-.6.84-1.1 2.06-1 3.04.39 3.78 6.32 8.73 10.06 9.51 2.78.58 5.9 1.64 7.88 3.53 6.39 6.12 12.25 12.8 18.48 19.09 2.71 2.73 5.61 5.44 8.89 7.36 1.62.95 5.08.98 6.38-.12 5.21-4.45 9.96-9.44 14.73-14.38 2.01-2.08 2.03-4.41-.16-6.62-9.02-9.15-18.02-18.31-26.95-27.55-.95-.99-2.14-2.7-1.88-3.75 1.71-6.94-3.71-9.43-7.67-12.76-2.19-1.84-4.6-1.57-6.82.29-1.53 1.28-3.11 2.5-4.68 3.73-2.89 2.27-4.59-.15-6.37-1.75-2.11-1.88-.48-3.36.83-4.7 3.24-3.29 6.67-6.4 9.78-9.81 2.06-2.26 4.32-2.63 7.08-2.02 15.62 3.47 30.69-8.54 30.81-24.58.01-1.26-.56-2.53-.87-3.79-1.37.46-2.75.88-4.09 1.41-.44.17-.85.57-1.12.97-3.12 4.56-6.96 4.83-12.08 3.21-9.34-2.97-9.18-2.72-11.83-11.71-1.32-4.48-1.09-7.85 2.86-10.65.76-.54 1.4-1.5 1.7-2.4.48-1.46 1.19-3.23.73-4.47-.28-.76-2.58-1.16-3.93-1.08-15.15.83-26.13 14.33-24.42 29.02.45 3.87.09 7.05-3.02 9.78-2.32 2.04-4.03 4.77-6.37 6.76-5.99 5.11-4.52 5.26-9.5.03-1.03-1.09-2.08-2.17-3.18-3.18-8.82-8.15-17.42-16.42-23.16-27.25-1.39-2.62-4.06-4.75-6.53-6.59-6.52-4.84-10.48-4.46-15.61 1.44-.91 1.05-1.42 3.37-.9 4.58 2.65 6.11 6.32 11.33 12.14 15.22 7.03 4.69 13.59 10.13 20.05 15.6 3.87 3.28 7.03 7.39 10.77 10.84 1.87 1.73 1.89 2.85.16 4.53-2.14 2.08-4.28 4.22-6.11 6.57-3.98 5.11-8.11 9.63-15.55 7.57-.7-.19-1.49-.05-2.24-.04-13.06.07-24.18 9.52-25.96 22.4-.27 1.96.87 4.12 1.35 6.18 2.1-.7 4.72-.84 6.22-2.2 7.03-6.41 18.89-3.37 21.76 5.61 2.1 6.56 2.95 12.5-3.73 17.07-.82.56-1.65 2.47-1.29 3.08.56.96 2.3 2.1 3.2 1.87 4.75-1.23 10.01-1.96 13.96-4.56 8.38-5.46 12.59-13.65 11.51-24.57z" />
                <path fill="url(#gradient)"
                d="M276.09 30.48c36.18-.81 67.92 10.92 95.04 34.37 18.91 16.35 32.14 36.78 37.97 61.47 1.23 5.23-1.05 9.18-6.27 10.48-.77.19-2.48-1.49-3.03-2.64-2.94-6.19-4.98-12.9-8.55-18.67-15.25-24.68-36.34-42.1-64.43-50.68-19.7-6.03-39.83-8.39-60.29-7.19-30.93 1.82-59.46 10.57-82.94 31.81-13.54 12.25-23.86 26.84-29.39 44.45-.73 2.32-1.88 2.58-3.86 2.02-5.82-1.63-7.22-3.83-5.54-9.87 6.68-24.05 18.76-44.82 37.84-61.18 20.47-17.54 43.99-28.79 70.68-32.9 7.49-1.15 15.18-1.02 22.77-1.47zM479.99 580.65c1.08 10.93-3.13 19.12-11.48 24.62-3.96 2.61-9.21 3.33-13.96 4.56-.9.23-2.65-.9-3.2-1.87-.35-.61.47-2.52 1.29-3.08 6.69-4.57 5.84-10.51 3.73-17.07-2.88-8.97-14.74-12.02-21.76-5.61-1.5 1.37-4.12 1.5-6.22 2.2-.49-2.07-1.62-4.22-1.35-6.18 1.78-12.88 12.89-22.33 25.96-22.4.75 0 1.54-.15 2.24.04 7.44 2.06 11.57-2.46 15.55-7.57 1.83-2.35 3.97-4.48 6.11-6.57 1.73-1.68 1.72-2.8-.16-4.53-3.74-3.46-6.9-7.56-10.77-10.84-6.46-5.47-13.02-10.92-20.05-15.6-5.83-3.89-9.49-9.11-12.14-15.22-.52-1.21-.01-3.53.9-4.58 5.13-5.9 9.08-6.28 15.61-1.44 2.47 1.83 5.14 3.96 6.53 6.59 5.74 10.83 14.34 19.1 23.16 27.25 1.1 1.02 2.15 2.1 3.18 3.18 4.98 5.23 3.51 5.08 9.5-.03 2.34-2 4.06-4.73 6.37-6.76 3.11-2.74 3.47-5.92 3.02-9.78-1.71-14.7 9.27-28.19 24.42-29.02 1.36-.07 3.66.32 3.93 1.08.46 1.24-.24 3.01-.73 4.47-.3.9-.94 1.86-1.7 2.4-3.95 2.8-4.18 6.17-2.86 10.65 2.65 8.99 2.48 8.74 11.83 11.71 5.12 1.63 8.96 1.35 12.08-3.21.27-.4.69-.8 1.12-.97 1.34-.53 2.72-.95 4.09-1.41.3 1.26.88 2.53.87 3.79-.12 16.04-15.19 28.05-30.81 24.58-2.76-.61-5.02-.24-7.08 2.02-3.11 3.41-6.54 6.52-9.78 9.81-1.31 1.33-2.94 2.81-.83 4.7 1.79 1.59 3.48 4.01 6.37 1.75 1.57-1.23 3.15-2.45 4.68-3.73 2.22-1.86 4.62-2.13 6.82-.29 3.96 3.33 9.38 5.82 7.67 12.76-.26 1.05.93 2.76 1.88 3.75 8.92 9.24 17.93 18.4 26.95 27.55 2.19 2.22 2.17 4.54.16 6.62-4.77 4.93-9.53 9.93-14.73 14.38-1.3 1.11-4.76 1.07-6.38.12-3.28-1.92-6.18-4.63-8.89-7.36-6.24-6.29-12.09-12.97-18.48-19.09-1.97-1.89-5.1-2.96-7.88-3.53-3.75-.78-9.68-5.72-10.06-9.51-.1-.98.4-2.2 1-3.04 1.16-1.61 2.65-2.98 3.89-4.54 2.31-2.91 1.06-7.49-2.45-8.53-.76-.23-2.1.51-2.81 1.19-4.43 4.21-8.82 8.47-13.05 12.88-.82.86-1.08 2.44-1.22 3.73-.23 1.8-.08 3.69-.08 4.98z" />
                </g>
                </switch>
                </svg>',
            ],
            [
                'name' => 'Digital Marketing',

                'details' => 'Boost your online presence and reach your target audience effectively with our
                comprehensive digital marketing solutions.
                From strategic planning to execution, we help businesses drive brand awareness,
                generate leads,
                and increase conversions through data-driven strategies, engaging content, and
                targeted advertising campaigns.',

                'detail_info' => "<div>
                <h2>Empower Your Business with Comprehensive Digital Marketing Solutions</h2>
                <p>At DevCentric Studio, we specialize in providing comprehensive digital marketing solutions that empower businesses to boost their online presence and effectively reach their target audience. Our team of experts combines strategic planning, data-driven strategies, engaging content, and targeted advertising campaigns to help businesses drive brand awareness, generate leads, and increase conversions.</p>
                <p>Our digital marketing services include:</p>
                <ul>
                  <li><strong>Digital Strategy Development:</strong> We work closely with our clients to understand their business goals, target audience, and competitive landscape. Based on this analysis, we develop a customized digital marketing strategy that outlines the most effective channels and tactics to achieve their objectives.</li>
                  <li><strong>Search Engine Optimization (SEO):</strong> We optimize websites and content to improve their visibility and rankings in search engine results. Our SEO experts conduct keyword research, optimize on-page elements, and create high-quality content that aligns with search engine algorithms and user intent.</li>
                  <li><strong>Pay-Per-Click Advertising (PPC):</strong> We create and manage PPC campaigns on platforms like Google Ads, Bing Ads, and social media platforms. Our team conducts thorough keyword research, creates compelling ad copy, and optimizes campaigns to maximize return on investment (ROI) and drive targeted traffic to your website.</li>
                  <li><strong>Social Media Marketing:</strong> We develop and execute social media strategies to engage with your target audience, build brand awareness, and drive website traffic. Our team creates engaging social media content, manages social media accounts, and utilizes analytics to track performance and optimize campaigns.</li>
                  <li><strong>Content Marketing:</strong> We create high-quality and engaging content that attracts, informs, and engages your target audience. Our content marketing services include blog writing, article creation, infographics, e-books, and more. We ensure that your content aligns with your brand voice, resonates with your audience, and supports your marketing goals.</li>
                  <li><strong>Email Marketing:</strong> We design and implement effective email marketing campaigns to nurture leads, build customer loyalty, and drive conversions. Our team creates compelling email content, designs eye-catching templates, and utilizes automation to deliver personalized and timely messages to your subscribers.</li>
                  <li><strong>Analytics and Reporting:</strong> We provide regular reports and analytics to track the performance of your digital marketing efforts. Our team analyzes key metrics, identifies trends, and provides actionable insights to continuously optimize your campaigns and improve ROI.</li>
                </ul>
                <p>By partnering with DevCentric Studio for your digital marketing needs, you can expect a tailored approach, data-driven strategies, and a focus on driving measurable results. We are committed to helping businesses thrive in the digital landscape by reaching their target audience effectively and achieving their marketing objectives.</p>
              </div>
              ",

                'svg_code' => '<svg class="w-32 h-32 hover:text-gray-200 text-gray-400" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                viewBox="0 0 494.29 475.6">
                <defs>
                <linearGradient id="gradient1" gradientTransform="rotate(90)">
                <stop offset="0%" stop-color="blue" />
                <stop offset="100%" stop-color="red" />
                </linearGradient>
                <linearGradient id="gradient2" gradientTransform="rotate(90)">
                <stop offset="0%" stop-color="green" />
                <stop offset="100%" stop-color="yellow" />
                </linearGradient>
                <linearGradient id="gradient3" gradientTransform="rotate(90)">
                <stop offset="0%" stop-color="purple" />
                <stop offset="100%" stop-color="orange" />
                </linearGradient>
                </defs>
                <switch>
                <g>
                <path fill="url(#gradient1)"
                d="M270.35 0c10.78 1.62 21.64 2.89 32.34 4.92 29.8 5.66 56.71 18.18 81.23 35.78 41.5 29.79 69.31 69.39 83.67 118.41 5.68 19.39 8.26 39.21 8.07 59.85H256.34V0h14.01z" />
                <path fill="url(#gradient2)"
                d="M219.68 37.08v6.73c0 68.34.03 136.67-.08 205.01-.01 3.82 1.14 6.48 3.82 9.15 49.33 49.2 98.58 98.48 147.86 147.73 1.4 1.4 3.02 2.58 4.5 3.82-57.23 62.38-164.03 88.97-254.9 42.66C23.65 402.61-19.87 295.65 8.58 195.65 38.95 88.93 137.42 34.33 219.68 37.08z" />
                <path fill="url(#gradient3)"
                d="M494.29 256.28c-1.09 60.81-22.69 112.47-64.55 155.24-52.05-51.78-103.88-103.35-156.03-155.24h220.58z" />
                </g>
                </switch>
                </svg>',
            ],
            [
                'name' => 'Digital Transformation Consulting',

                'details' => ' Embark on a transformative journey with our comprehensive Digital Transformation
                Consulting services.
                We empower businesses to adapt, innovate, and thrive in the digital era. Our team of
                experts combines strategic insights, technological expertise,
                and IT infrastructure optimization to help you leverage the power of digital
                technologies.',

                'detail_info' => "<div>
                <h2>Comprehensive Digital Transformation Consulting Services</h2>
                <p>At DevCentric Studio, we offer comprehensive Digital Transformation Consulting services that empower businesses to embark on a transformative journey in the digital era. We understand the importance of adapting and innovating to stay competitive in today's fast-paced business landscape.</p>
                <p>Our team of experts combines strategic insights and technological expertise to help businesses leverage the power of digital technologies and drive growth. Our Digital Transformation Consulting services encompass various areas to ensure a holistic and successful transformation:</p>
                <ul>
                  <li><strong>Digital Strategy Development:</strong> We work closely with businesses to develop a tailored digital strategy that aligns with their goals and objectives. Our team conducts in-depth analysis of your business processes, customer needs, market trends, and competition to develop a roadmap for digital transformation.</li>
                  <li><strong>Process Optimization:</strong> We help businesses streamline and optimize their internal processes by leveraging digital technologies. This includes automating manual tasks, improving workflow efficiency, and implementing digital tools and platforms to enhance productivity.</li>
                  <li><strong>Customer Experience Enhancement:</strong> We focus on improving the overall customer experience by leveraging digital solutions. Our team assists businesses in understanding customer needs, mapping customer journeys, and implementing customer-centric digital solutions that enhance engagement, satisfaction, and loyalty.</li>
                  <li><strong>Technology Implementation:</strong> We guide businesses in selecting and implementing the right technologies that align with their digital transformation goals. This may include implementing cloud-based solutions, customer relationship management (CRM) systems, enterprise resource planning (ERP) systems, data analytics tools, and more.</li>
                  <li><strong>Change Management:</strong> We understand that digital transformation involves significant organizational change. Our consultants provide guidance and support to ensure a smooth transition, including change management strategies, employee training and upskilling, and fostering a digital culture within the organization.</li>
                  <li><strong>Data Analytics and Insights:</strong> We help businesses harness the power of data by implementing analytics tools and strategies. Our team assists in data collection, analysis, and interpretation to uncover valuable insights that drive informed decision-making and continuous improvement.</li>
                  <li><strong>Security and Risk Management:</strong> We prioritize the security of your digital assets and ensure compliance with data protection regulations. Our consultants assess and mitigate potential risks, implement robust security measures, and guide businesses in maintaining a secure digital infrastructure.</li>
                </ul>
                <p>By partnering with DevCentric Studio for your Digital Transformation Consulting needs, you can expect a comprehensive approach, strategic guidance, and technological expertise to drive successful digital transformation. We are committed to helping businesses adapt, innovate, and thrive in the digital era, ensuring long-term success and growth.</p>
              </div>
              ",

             
              'svg_code' => '<svg class="w-32 h-32 " fill="currentColor"
                xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 116.22 116">
                <defs>
                <linearGradient id="gradient5" gradientTransform="rotate(45)">
                <stop offset="0%" stop-color="#FF9000" />
                <stop offset="50%" stop-color="#A35C00" />
                </linearGradient>
                <linearGradient id="gradient6" gradientTransform="rotate(45)">
                <stop offset="50%" stop-color="#FE5F00" />
                <stop offset="100%" stop-color="#B84300" />
                </linearGradient>
                </defs>
                <switch>
                <g>
                <path fill="url(#gradient5)"
                d="M88.52 44.81c1.04 3.02 1.88 5.42 2.82 8.13-3.28.99-4.67 2.64-4.29 6.4.32 3.2-.2 5.99 4.41 6.11-1.08 3.11-1.95 5.63-2.81 8.13-1.8-.15-3.84-.92-4.57-.26-1.9 1.71-3.27 4.02-4.74 6.17-.26.38-.01 1.16.1 1.74.24 1.2 1.17 3.01.71 3.48-1.54 1.55-3.56 2.65-5.44 3.85-.22.14-.9.01-1.02-.2-2.93-4.93-6.28-.55-9.42-.39-.56.03-1.58.88-1.54 1.27.49 4.83-2.91 3.9-5.65 3.91-.98 0-1.95-.1-2.86-.16-.52-1.67-.55-3.87-1.54-4.47-2.17-1.32-4.83-1.84-7.31-2.64-.29-.09-.73.08-1.04.24-4.52 2.38-4.92 2.29-9.15-2.19 1.53-3.41.33-7.85-2.88-10.4-.42-.33-1.1-.42-1.67-.48-1.23-.13-3.26.23-3.55-.33-1-1.95-1.44-4.19-1.97-6.36-.08-.32.4-1.06.74-1.15 5.78-1.55 1.99-6.26 3.06-9.34.12-.34-.52-1.05-.94-1.44-.92-.83-2.81-1.67-2.73-2.33.25-2.17 1.16-4.28 1.93-6.38.11-.3.99-.65 1.26-.5 3.69 2 4.62-1.21 6.15-3.23 2.43-3.21 2.41-3.22.59-7.03 4.82-5.34 5.98-5.57 9.91-1.73 2.79-2.57 9.35-.1 8.75-7.24h5.34c-1.22 3.97-2.23 7.8-3.65 11.47-.37.97-1.91 1.75-3.06 2.12-9.08 2.87-14.98 10.49-15.04 19.63-.06 9.22 5.64 16.91 14.7 19.84 11.92 3.85 25.04-4.59 26.23-17.25.3-3.23 1.42-5.63 3.31-8 2.2-2.79 4.32-5.67 6.86-8.99z" />
                <path fill="url(#gradient6)"
                d="M93.51 101.77 96.91 90c1.13.83 1.98 1.46 3.12 2.3 5.21-5.84 8.72-12.64 10.54-20.17 5.24-21.63.06-40.62-16.88-55.07C73.93.23 52-.28 29.26 11.71c-.34-.45-.73-.92-1.05-1.44-.25-.41-.42-.87-.61-1.29C47.13-4.33 77.86-3.51 98.32 15.96c19.76 18.8 25.73 52.38 4.68 79.17.77 1 1.57 2.04 2.59 3.36-1.06.37-1.83.69-2.63.9-2.87.74-5.74 1.45-9.45 2.38zM13.48 20.51c-.78-.95-1.61-1.97-2.76-3.37 3.97-1.01 7.52-1.92 11.82-3.02-.96 4.17-1.79 7.82-2.72 11.87l-3.09-2.25C3.16 37.67-1.62 65.83 12.88 87.79c14.62 22.15 45.75 32.87 74.19 16.31.61.82 1.24 1.66 2.05 2.74-5.54 3.92-11.54 6.15-17.82 7.64-22.39 5.3-46.71-3.41-59.77-22.34-16.59-24.05-14.69-48.06 1.95-71.63z" />
                <path fill="url(#gradient6)"
                d="M67.22 65.56c2.44-7.4 4.89-14.8 7.5-22.7H58c2.23-7.43 4.25-14.28 6.36-21.1 2.02-6.52 2.07-6.51 9-6.51h7.75c-2.79 6.35-5.39 12.31-8.22 18.76h18.93c-8.34 11.13-16.1 21.49-23.86 31.86-.25-.1-.5-.2-.74-.31z" />
                </g>
                </switch>
                </svg>',
            ],
            [
                'name' => 'UX/Ui Design',

                'details' => ' Elevate user experiences and captivate your audience with our exceptional UX/UI
                Design services.
                Our skilled designers combine user-centric approaches and innovative design
                principles to create intuitive and visually striking interfaces.
                From wireframing and prototyping to pixel-perfect designs, we craft seamless and
                delightful digital experiences across platforms.',

                'detail_info' => "<div>
                <h2>Enhance User Experiences with Our UX/UI Design Services</h2>
                <p>At DevCentric Studio, we specialize in UX/UI Design services that are tailored to enhance user experiences and captivate your audience. Our team of skilled designers combines user-centric approaches with innovative design principles to create intuitive and visually striking interfaces.</p>
                <p>Here are the key aspects of our UX/UI Design services:</p>
                <ul>
                  <li><strong>User Research and Analysis:</strong> We conduct thorough research to understand your target audience, their needs, preferences, and behaviors. This valuable insight helps us design interfaces that resonate with your users and meet their expectations.</li>
                  <li><strong>Wireframing and Prototyping:</strong> We create detailed wireframes and interactive prototypes that visualize the layout, navigation, and functionality of your digital product. This iterative process allows us to gather feedback and refine the design before development.</li>
                  <li><strong>Visual Design and Branding:</strong> Our designers employ a meticulous approach to visual design, incorporating your brand identity, colors, and typography to create a cohesive and visually appealing interface. We ensure that the design reflects your brand's personality and values.</li>
                  <li><strong>Information Architecture:</strong> We carefully structure the information and content within your interface, ensuring logical organization, easy navigation, and intuitive user flows. This enhances usability and helps users find what they need quickly and effortlessly.</li>
                  <li><strong>Responsive Design:</strong> We optimize our designs to be responsive across various devices and screen sizes. Whether it's a desktop, mobile, or tablet, your interface will adapt seamlessly, providing a consistent and engaging experience for users.</li>
                  <li><strong>Usability Testing:</strong> We conduct usability testing to validate the design and identify any potential usability issues. This iterative process helps us refine the interface, improve user interactions, and enhance overall usability.</li>
                  <li><strong>Interaction Design:</strong> We focus on creating meaningful and engaging interactions within your interface. From intuitive navigation menus to interactive elements and microinteractions, we ensure that each interaction is purposeful and enhances the user experience.</li>
                  <li><strong>Accessibility Considerations:</strong> We design with accessibility in mind, ensuring that your interface is usable and inclusive for all users, including those with disabilities. We follow accessibility guidelines to make your digital product accessible and compliant.</li>
                </ul>
                <p>At DevCentric Studio, we are passionate about crafting seamless and delightful digital experiences. Our UX/UI Design services are driven by a deep understanding of user needs and a commitment to delivering interfaces that are both visually appealing and highly functional. Partner with us to create user-centric designs that elevate your brand and drive success.</p>
              </div>
              ",

              
              'svg_code' => '<svg class="w-32 h-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 792.73 748.97">
                <defs>
                  <linearGradient id="gradient9" gradientTransform="rotate(45)">
                    <stop offset="0%" stop-color="#FF3366" />
                    <stop offset="100%" stop-color="#6633FF" />
                  </linearGradient>
                </defs>
                <g data-name="Layer 2">
                  <path
                    d="M510.34 748.77c-37.95.39-75.85 0-113.78.15h-110.3c-3.66 0-8.46 1-10.07-3.24.2-13.69 32.07-16 33.64-50.21 1.63-6 .61-27.79 9-26q77.4.11 154.84 0c4 0 5.51 1.66 6.05 5.37 1.23 8.79 2.93 17.59 4 26.38 1.33 18.86 17.88 27 30.14 38.41 4.72 3.83 3.07 9.54-3.52 9.14Zm282.39-599.35c0-17.94-15.21-34.11-33.7-33.54-28.39.78-56.77.5-85.17.07-8.46-.21-14.74 1.49-20.46 8.51-10.29 12.46-21.74 23.9-32.61 35.84-.85.84-2.34 1.72-1.61 3.28 39.31 2.53 81.1.46 121.29.71 5-.47 3.88 4.31 4 7.58-1.15 4.53 1.63 362.85 0 367.27-3.73 10.47-684.11.17-692.33 3.56-4.68.07-3.34-5.56-3.14-8.79v-359.8c-.33-9.36-.33-9.36 9.08-9.36q193.79 0 387.55.07c5.29 0 8.81-1.37 11.91-5.86 8.53-12.75 17.66-25.11 26.45-37.71 3.77-3.67 1.68-5.91-2.91-5.15-9.88 1.19-447.74-2.1-457.23.9C8.91 121.25 0 133.48 0 150.07v452.87c0 22.81 13.19 36 36 36h360v-.05c120.83.09 241.64-.21 362.46.06a33.59 33.59 0 0 0 34.22-34.18q-.57-227.67.05-455.35ZM363.18 391.94c10.33 8.86 13.29 8.79 21.49-1.8 63.8-73.57 131.73-143.6 197.1-215.81 27.21-35.67 94.46-84.33 94.8-128 1-61.49-72.65-56.68-97.55-15.59C500 141.35 423.93 254 343.21 363.31c-10.6 11.78 13.51 20.62 19.97 28.63Zm2.82 23.58c-18.21-32.83-78.86-47.92-91.86-3.43-12.14 39.45-21.14 54.29-65.37 52.72-2.44 0-6.46-.49-6.67 2.44 3.45 7.32 45.68 7.64 55.57 7.49 31.09.55 136.21-7.19 108.33-59.22Z"
                    data-name="Layer 1" style="fill:url(#gradient9)" />
                </g>
              </svg>',
            ],
        ];

        DB::table('services')->insert($services);
    }
}
