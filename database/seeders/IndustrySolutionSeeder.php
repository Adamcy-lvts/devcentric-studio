<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IndustrySolution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IndustrySolutionSeeder extends Seeder
{
    public function run(): void
    {
        $solutions = [
            [
                'industry' => 'Healthcare',
                'description' => 'Electronic Health Records (EHR) systems, telemedicine platforms, and patient management solutions.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 50.85 48.35" class="w-16 h-16"><path d="M36.13 13.55c-.29-.19-.57-.1-.76.19 0 0 1.05-5.45.29-7.84C33.94-.12 19.7-1.75 19.7 1.98c-6.12 1.72-4.97 7.46-4.11 11.85 0 0-.48-.57-1.05 0-.57.67.1 2.39.38 3.15.19.67.29 1.05.48 1.44v.19c0 .57.29 1.05.58 1.05 1.43 5.45 5.73 9.94 9.56 9.94 3.54 0 7.84-4.49 9.27-9.94.29 0 .57-.48.57-1.05v-.1c.09-.38.38-.77.57-1.53.18-.65 1.04-2.85.18-3.43z" style="fill:#67cdfd"/><path d="M32.5 28.95c.67.38 1.43.76 2.1 1.05v5.64c-1.24.29-2.1 1.34-2.1 2.58 0 1.53 1.15 2.68 2.58 2.68 1.53 0 2.68-1.15 2.68-2.68 0-1.15-.77-2.1-1.82-2.48.1 0 .1-.1.1-.19v-4.78c9.85 4.49 14.82 3.25 14.82 17.59H0c0-15.2 5.16-13.1 15.48-17.97v2.3c-3.35.38-6.02 3.25-6.02 6.79v6.21c0 .48.38.77.76.77h2.39c.38 0 .67-.29.67-.77 0-.38-.29-.67-.67-.67H10.9v-5.54c0-3.06 2.49-5.45 5.45-5.45 3.06 0 5.45 2.39 5.45 5.45V45h-1.53c-.38 0-.67.29-.67.67 0 .48.29.77.67.77h2.29c.38 0 .67-.29.67-.77v-6.21c0-3.63-2.77-6.5-6.31-6.79v-2.96c.48-.29 1.05-.57 1.53-.86 2.1 1.43 4.49 2.29 7.07 2.29 2.49 0 4.87-.86 6.98-2.19z" style="fill:#727270"/></svg>',
                'sample_image' => 'healthcare_dashboard.png',
                'features' => json_encode([
                    [
                        'name' => 'Patient Management',
                        'icon' => '<svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>',
                        'description' => 'Comprehensive patient information management and tracking.',
                        'benefits' => ['Centralized patient profiles', 'Medical history tracking', 'Appointment scheduling'],
                    ],
                    [
                        'name' => 'Clinical Documentation',
                        'icon' => '<svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>',
                        'description' => 'Efficient and accurate clinical documentation tools.',
                        'benefits' => [
                            'Customizable templates for different specialties',
                            'Real-time collaborative editing',
                            'Automatic saving and version control',
                            'Structured data entry for improved analytics',
                            'Integration with other EHR modules for comprehensive patient records'
                        ],
                    ],
                    [
                        'name' => 'E-Prescribing',
                        'icon' => '<svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>',
                        'description' => 'Secure electronic prescription management system.',
                        'benefits' => ['Drug interaction checks', 'Pharmacy integration', 'Prescription history tracking'],
                    ],
                    [
                        'name' => 'Lab Integration',
                        'icon' => '<svg class="w-8 h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>',
                        'description' => 'Seamless integration with laboratory information systems.',
                        'benefits' => ['Direct lab order entry', 'Automated result reporting', 'Trend analysis of lab results'],
                    ],
                    [
                        'name' => 'Medical Billing',
                        'icon' => '<svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>',
                        'description' => 'Integrated medical billing and claims management.',
                        'benefits' => ['Automated claim submission', 'Real-time eligibility checks', 'Payment tracking and reconciliation'],
                    ],
                    [
                        'name' => 'Telehealth Module',
                        'icon' => '<svg class="w-8 h-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>',
                        'description' => 'Integrated telehealth capabilities for remote patient care.',
                        'benefits' => ['Secure video consultations', 'Remote patient monitoring', 'Digital intake forms'],
                    ],
                ]),
                'key_benefits' => json_encode([
                    'Increased operational efficiency',
                    'Enhanced patient care and safety',
                    'Improved data-driven decision making',
                    'Seamless integration with existing systems',
                    'Reduced administrative burden',
                    'Compliance with healthcare regulations',
                ]),
                'our_offerings' => json_encode([
                    'Customized healthcare software solutions',
                    'Comprehensive implementation and training',
                    '24/7 technical support',
                    'Regular updates and maintenance',
                    'Data migration and integration services',
                    'Continuous improvement based on user feedback',
                ]),
                'why_choose_us' => "With over a decade of experience in healthcare technology, we understand the unique challenges faced by medical professionals. Our solutions are designed by healthcare experts and software engineers working together to create intuitive, efficient, and secure systems. We prioritize patient data security, system reliability, and user-friendly interfaces to ensure that your healthcare facility can focus on what matters most - providing excellent patient care.",
                'call_to_action' => "Ready to revolutionize your healthcare operations? Request a personalized demo today and see how our tailored solutions can transform your facility. Our team of experts is standing by to answer your questions and provide a custom quote based on your specific needs. Don't let outdated systems hold you back - embrace the future of healthcare technology now!",
            ],
            [
                'industry' => 'Finance',
                'description' => 'Banking systems, investment platforms, and financial analytics tools.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 83.41 88.07" class="w-16 h-16"><path d="M70.36 16.42c-4.99 2.85-8.55 4.58-11.38 4.13 3.05-1.31 8.39-4.12 11.2-10.69.21-.5-1.31-1.2-1.8-1.41a.988.988 0 0 0-1.29.52c-2.17 5.08-5.1 7.74-7.58 9.14 2.88-5.28 4.6-12.62 4.6-18.1H19.3c0 7.07 2.85 17.24 7.38 22.08h30.06c0-.01.01-.02.02-.02 1.21.36 2.71.64 4.49.64 2.89 0 6.48-.74 10.6-3.09.47-.27.12-2.35-.15-2.82a.987.987 0 0 0-1.34-.38zM57.08 24.29H26.32C10.91 30.41 0 45.45 0 63.05c0 23.03 18.67 25.02 41.7 25.02s41.7-1.99 41.7-25.02c.01-17.6-10.9-32.64-26.32-38.76zm-3.96 37.8c-.48 5.07-4.78 8.13-8.58 8.45l.03 5.33h-5.15v-4.91s-5.85-.3-9.18-2.36l1.94-6.02s2.32 1.25 5.02 1.81c2.69.55 7.36.41 7.93-2.13.55-2.45-1.04-3.42-4.37-4.37-3.33-.95-9.14-3.67-9.66-8.16-.57-4.88 1.64-8.66 8.24-10.06v-5.15h5.15v4.52s5.28.41 7.26 1.68l-1.24 5.53s-4.99-1.66-8.39-1.43c-3.41.24-3.64 3.69-1.22 5.24 2.85 1.82 7.08 3.16 8.42 3.87 1.34.71 4.27 3.09 3.8 8.16z" style="fill:#444647"/></svg>',
                'sample_image' => 'finance_dashboard.png',
                'features' => json_encode([
                    [
                        'name' => 'Automated Trading Platform',
                        'icon' => '<svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>',
                        'description' => 'Advanced algorithms for high-frequency trading and portfolio management.',
                        'benefits' => ['Increased trading efficiency', 'Real-time market analysis', 'Risk management'],
                    ],
                    [
                        'name' => 'Blockchain-based Transactions',
                        'icon' => '<svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>',
                        'description' => 'Secure and transparent transaction processing using blockchain technology.',
                        'benefits' => ['Enhanced security', 'Faster settlements', 'Reduced transaction costs'],
                    ],
                    [
                        'name' => 'AI-driven Financial Forecasting',
                        'icon' => '<svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>',
                        'description' => 'Predictive analytics for accurate financial forecasting and trend analysis.',
                        'benefits' => ['Data-driven decision making', 'Improved risk assessment', 'Strategic planning'],
                    ],
                ]),
                'key_benefits' => json_encode([
                    'Enhanced operational efficiency',
                    'Improved risk management',
                    'Increased profitability',
                    'Better regulatory compliance',
                    'Enhanced customer experience',
                    'Scalable and future-proof solutions',
                ]),
                'our_offerings' => json_encode([
                    'Tailored financial software solutions',
                    'Comprehensive security measures',
                    'Integration with existing financial systems',
                    'Real-time analytics and reporting',
                    'Mobile and web-based platforms',
                    'Ongoing support and system updates',
                ]),
                'why_choose_us' => "With a team of financial experts and cutting-edge technologists, we deliver solutions that address the complex needs of the finance industry. Our track record of successful implementations for leading financial institutions speaks to our expertise and reliability. We stay ahead of industry trends, ensuring that our clients are always equipped with the latest tools to maintain a competitive edge in the fast-paced world of finance.",
                'call_to_action' => "Ready to revolutionize your financial operations? Schedule a demo today to see how our advanced solutions can streamline your processes, enhance security, and drive growth. Our team of financial technology experts is ready to provide a tailored solution that meets your specific needs. Don't let outdated systems limit your potential - step into the future of finance with us!",
            ],
            [
                'industry' => 'Education',
                'description' => 'Learning Management Systems (LMS), student information systems, and e-learning platforms.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 194.41 110" class="w-16 h-16"><path d="M94.42 0 0 35.35l5.26 1.97L94.43 70.7l82.87-31.03 11.54-4.32z" style="fill:#3a4145"/><path d="M37.79 59.79V89.5c0 11.32 25.35 20.49 56.63 20.49 21.2 0 39.67-4.22 49.38-10.46 4.61-2.97 7.25-6.39 7.25-10.03V59.79l-56.63 21.2-56.63-21.2zM188.69 40.52l-4.13 1.54-1.41 10.34-4.1 30.08H194.41z" style="fill:#3a4145"/></svg>',
                'sample_image' => 'education_dashboard.png',
                'features' => json_encode([
                    [
                        'name' => 'Adaptive Learning Platform',
                        'icon' => '<svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>',
                        'description' => 'Personalized learning experiences tailored to individual student needs.',
                        'benefits' => ['Improved student engagement', 'Better learning outcomes', 'Individualized instruction'],
                    ],
                    [
                        'name' => 'Virtual Classroom Environment',
                        'icon' => '<svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>',
                        'description' => 'Immersive online learning spaces for interactive remote education.',
                        'benefits' => ['Flexible learning options', 'Enhanced collaboration', 'Global accessibility'],
                    ],
                    [
                        'name' => 'Comprehensive Analytics Dashboard',
                        'icon' => '<svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>',
                        'description' => 'In-depth insights into student performance and institutional effectiveness.',
                        'benefits' => ['Data-driven decision making', 'Early intervention for at-risk students', 'Continuous improvement of curriculum'],
                    ],
                ]),
                'key_benefits' => json_encode([
                    'Enhanced student engagement and retention',
                    'Improved learning outcomes',
                    'Streamlined administrative processes',
                    'Cost-effective scalability',
                    'Seamless integration with existing systems',
                    'Compliance with educational standards and regulations',
                ]),
                'our_offerings' => json_encode([
                    'Customized Learning Management Systems (LMS)',
                    'Student Information Systems (SIS)',
                    'Virtual and augmented reality learning experiences',
                    'AI-powered tutoring and assessment tools',
                    'Secure data management and analytics platforms',
                    'Professional development and training for educators',
                ]),
                'why_choose_us' => "With years of experience in educational technology, we understand the unique challenges faced by institutions in the digital age. Our team of educators and technologists work together to create solutions that not only meet current needs but anticipate future trends in education. We're committed to fostering innovation in learning, empowering educators, and helping students achieve their full potential.",
                'call_to_action' => "Ready to transform your educational institution for the digital age? Request a demo today to see how our cutting-edge solutions can enhance learning experiences, streamline operations, and drive student success. Our team of edtech experts is ready to craft a tailored solution that meets your institution's unique needs. Don't let outdated systems hold your students back - embrace the future of education with us!",
            ],
            [
                'industry' => 'Manufacturing',
                'description' => 'Enterprise Resource Planning (ERP) systems, supply chain management, and IoT solutions.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 171.97 160.48" class="w-16 h-16"><path d="M158.73 112.39h-53.51l-1.86 6.74 9.95 41.35h58.66zM105.28 104.69h53.39l4.24-13.86h-61.87zM91.98 160.48h14.06L88.19 86.26H17.85L0 160.48h7.27zM20.01 78.55h67.42l6.6-17.46H12.01l6.6 17.46zM24.92 38.16v6.75c0 5.13-.01 9.29 5.12 9.29h49.21c4.92 0 4.77-3.84 5.09-8.68 2.36 1.45 5.43 2.34 8.78 2.34 7.47 0 13.53-4.36 13.53-9.74 0-.67-.09-1.32-.27-1.95 17.19-1.43 29.07-4.99 29.07-12.08 0-5.46-5.67-8.68-14.83-10.53-10.97-16.88-48.9-16.5-57.1-7.06-3.14-1.04-6.66-1.64-10.4-1.64-12.1 0-22.05 6.14-23.44 14.05-7.05 2.78-10.2 5.99-10.2 10.17.01 3.14 1.26 6.64 5.44 9.08z" style="fill:#2e3a42"/></svg>',
                'sample_image' => 'manufacturing_dashboard.png',
                'features' => json_encode([
                    [
                        'name' => 'IoT-Enabled Production Monitoring',
                        'icon' => '<svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>',
                        'description' => 'Real-time monitoring and control of production processes using IoT devices.',
                        'benefits' => ['Increased operational efficiency', 'Predictive maintenance', 'Real-time quality control'],
                    ],
                    [
                        'name' => 'AI-Powered Supply Chain Optimization',
                        'icon' => '<svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>',
                        'description' => 'Intelligent supply chain management using artificial intelligence and machine learning.',
                        'benefits' => ['Optimized inventory levels', 'Reduced lead times', 'Enhanced demand forecasting'],
                    ],
                    [
                        'name' => 'Digital Twin Technology',
                        'icon' => '<svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>',
                        'description' => 'Virtual replicas of physical assets for simulation and optimization.',
                        'benefits' => ['Improved product design', 'Enhanced process optimization', 'Reduced downtime'],
                    ],
                ]),
                'key_benefits' => json_encode([
                    'Increased production efficiency',
                    'Improved product quality',
                    'Reduced operational costs',
                    'Enhanced supply chain visibility',
                    'Accelerated time-to-market',
                    'Improved workplace safety',
                ]),
                'our_offerings' => json_encode([
                    'Smart factory solutions',
                    'Predictive maintenance systems',
                    'Automated quality control processes',
                    'Supply chain optimization tools',
                    'Industrial IoT platforms',
                    'Manufacturing execution systems (MES)',
                ]),
                'why_choose_us' => "With a deep understanding of manufacturing processes and cutting-edge technology, we deliver solutions that drive the future of industry. Our team of manufacturing experts and software engineers work together to create robust, scalable systems that address the complex challenges of modern production environments. We're committed to helping manufacturers embrace Industry 4.0 and maintain a competitive edge in a rapidly evolving global market.",
                'call_to_action' => "Ready to revolutionize your manufacturing processes? Schedule a consultation today to discover how our advanced solutions can optimize your operations, enhance quality, and drive innovation. Our team of industry experts is ready to provide a tailored solution that meets your specific manufacturing needs. Don't let outdated systems limit your production potential - step into the future of manufacturing with us!",
            ],


            [
                'industry' => 'Retail',
                'description' => 'E-commerce platforms, inventory management systems, and customer relationship management (CRM) tools.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 149.76 110" class="w-16 h-16"><path d="M56.36 88.1c.26.78.99 1.3 1.8 1.3 22.86 0 46.5 0 69.95.06h.01a1.9 1.9 0 0 0 1.9-1.9c0-1.05-.85-1.91-1.9-1.91-22.98-.06-46.15-.06-68.58-.06-2.67-8.08-5.03-15.94-7.52-24.24-1.31-4.38-2.67-8.9-4.07-13.43-1.13-4.07-2.29-7.83-3.87-12.57C40.97 25.1 34.74 5 34.68 4.8a1.9 1.9 0 0 0-1.82-1.34h-3.7C28.84 1.5 27.06 0 24.91 0H4.31C1.93 0 0 1.84 0 4.09v2.56c0 2.26 1.93 4.09 4.31 4.09h20.6c2.16 0 3.94-1.51 4.26-3.48h2.29c1.45 4.69 6.35 20.53 8.98 29.22 0 .02.01.03.02.05 1.56 4.69 2.71 8.41 3.83 12.44 0 .02.01.04.01.05 1.4 4.52 2.76 9.05 4.07 13.43 2.52 8.38 5.12 17.05 7.99 25.65z" class="st0"/><path d="M145.44 21.28H48.91c-2.38 0-4.31 1.84-4.31 4.09v2.56c0 2.26 1.94 4.09 4.31 4.09h1.37l14.49 49.27c.24.81.98 1.37 1.83 1.37h61.15c.84 0 1.59-.56 1.83-1.37l14.49-49.27h1.37c2.38 0 4.31-1.83 4.31-4.09v-2.56c.01-2.25-1.93-4.09-4.31-4.09zM58.13 90.18c-5.47 0-9.91 4.45-9.91 9.91 0 5.47 4.45 9.91 9.91 9.91s9.91-4.45 9.91-9.91c0-5.47-4.44-9.91-9.91-9.91zM129.16 90.18c-5.46 0-9.91 4.45-9.91 9.91 0 5.47 4.45 9.91 9.91 9.91 5.47 0 9.91-4.45 9.91-9.91 0-5.47-4.45-9.91-9.91-9.91z" class="st0"/><path d="M97.18 34.09c-11.88 0-21.54 9.66-21.54 21.54 0 11.87 9.66 21.54 21.54 21.54 11.87 0 21.54-9.66 21.54-21.54 0-11.87-9.67-21.54-21.54-21.54zm0 39.27c-9.78 0-17.73-7.95-17.73-17.73 0-9.78 7.95-17.73 17.73-17.73 9.78 0 17.73 7.95 17.73 17.73 0 9.78-7.95 17.73-17.73 17.73z" class="st0"/><path d="M102.96 42.39c0-1.05-.85-1.91-1.9-1.91H93.3c-1.05 0-1.9.85-1.9 1.91v7.46h-7.46c-1.05 0-1.91.85-1.91 1.9v7.76c0 1.05.85 1.91 1.91 1.91h7.46v7.46c0 1.05.85 1.9 1.9 1.9h7.76a1.9 1.9 0 0 0 1.9-1.9v-7.46h7.46c1.05 0 1.9-.85 1.9-1.91v-7.76a1.9 1.9 0 0 0-1.9-1.9h-7.46v-7.46zm5.55 11.27v3.96h-7.46a1.9 1.9 0 0 0-1.9 1.9v7.46H95.2v-7.46a1.9 1.9 0 0 0-1.9-1.9h-7.46v-3.96h7.46c1.05 0 1.9-.85 1.9-1.91v-7.46h3.96v7.46c0 1.05.85 1.91 1.9 1.91h7.45z" class="st0"/></svg>',
                'sample_image' => 'retail_dashboard.png',
                'features' => json_encode([
                    [
                        'name' => 'Omnichannel E-commerce Platform',
                        'icon' => '<svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>',
                        'description' => 'Seamlessly integrate online and offline retail channels for a unified shopping experience.',
                        'benefits' => ['Increased customer engagement', 'Higher conversion rates', 'Improved customer loyalty'],
                    ],
                    [
                        'name' => 'AI-Powered Inventory Management',
                        'icon' => '<svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>',
                        'description' => 'Optimize stock levels and reduce waste using artificial intelligence and predictive analytics.',
                        'benefits' => ['Reduced stockouts', 'Minimized overstock', 'Improved cash flow'],
                    ],
                    [
                        'name' => 'Personalized Customer Relationship Management',
                        'icon' => '<svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>',
                        'description' => 'Deliver tailored shopping experiences and targeted marketing campaigns.',
                        'benefits' => ['Increased customer lifetime value', 'Enhanced customer satisfaction', 'Improved marketing ROI'],
                    ],
                ]),
                'key_benefits' => json_encode([
                    'Increased sales and revenue',
                    'Enhanced customer experience',
                    'Optimized inventory management',
                    'Improved operational efficiency',
                    'Data-driven decision making',
                    'Seamless omnichannel integration',
                ]),
                'our_offerings' => json_encode([
                    'E-commerce platform development',
                    'Inventory management solutions',
                    'Customer relationship management (CRM) systems',
                    'Point of sale (POS) systems',
                    'Data analytics and business intelligence tools',
                    'Mobile commerce applications',
                ]),
                'why_choose_us' => "With a deep understanding of the retail landscape and cutting-edge technology, we deliver solutions that drive the future of commerce. Our team of retail experts and software engineers work together to create robust, scalable systems that address the complex challenges of modern retail environments. We're committed to helping retailers embrace digital transformation and maintain a competitive edge in a rapidly evolving global market.",
                'call_to_action' => "Ready to transform your retail business? Schedule a consultation today to discover how our advanced solutions can optimize your operations, enhance customer experiences, and drive sales growth. Our team of industry experts is ready to provide a tailored solution that meets your specific retail needs. Don't let outdated systems limit your potential - step into the future of retail with us!",
            ],

            [
                'industry' => 'Real Estate',
                'description' => 'Comprehensive property management systems, real estate marketplaces, and analytics platforms to revolutionize the real estate industry.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 79.84 70.22" class="w-16 h-16"><path d="M8.32 0h35.63v61.38h3.38V32.25h24.19v29.13h8.32v8.58H43.95v.26H8.32v-.26H0v-8.58h8.32V0zm43.96 37.19h14.04v5.46H52.28v-5.46zm0 11.7h14.04v5.46H52.28v-5.46zm-36.94-4.94h21.58v5.46H15.34v-5.46zm0-12.48h21.58v5.73H15.34v-5.73zm0-12.22h21.58v5.72H15.34v-5.72zm0-12.49h21.58v5.72H15.34V6.76z" style="fill:#ae2a38"/></svg>',
                'sample_image' => 'real_estate_dashboard.png',
                'features' => json_encode([
                    [
                        'name' => 'Smart Property Management',
                        'icon' => '<svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>',
                        'description' => 'Streamline property operations with automated maintenance, tenant management, and financial tracking.',
                        'benefits' => ['Increased operational efficiency', 'Improved tenant satisfaction', 'Enhanced property value'],
                    ],
                    [
                        'name' => 'AI-Powered Market Analysis',
                        'icon' => '<svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>',
                        'description' => 'Leverage artificial intelligence for accurate property valuations and market trend predictions.',
                        'benefits' => ['Data-driven decision making', 'Competitive pricing strategies', 'Optimized investment returns'],
                    ],
                    [
                        'name' => 'Virtual Property Tours',
                        'icon' => '<svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>',
                        'description' => 'Offer immersive 3D virtual tours and augmented reality experiences for remote property viewing.',
                        'benefits' => ['Expanded market reach', 'Increased buyer engagement', 'Streamlined showing process'],
                    ],
                ]),
                'key_benefits' => json_encode([
                    'Increased property management efficiency',
                    'Enhanced tenant and buyer experiences',
                    'Data-driven market insights',
                    'Streamlined transaction processes',
                    'Improved portfolio performance',
                    'Reduced operational costs',
                ]),
                'our_offerings' => json_encode([
                    'Property management software',
                    'Real estate marketplace platforms',
                    'Virtual and augmented reality solutions',
                    'AI-powered market analysis tools',
                    'Blockchain-based transaction systems',
                    'IoT solutions for smart buildings',
                ]),
                'why_choose_us' => "With extensive experience in real estate technology, we understand the unique challenges faced by property managers, agents, and investors. Our team of real estate experts and software engineers collaborate to create innovative solutions that address the complexities of the modern real estate market. We're committed to helping real estate professionals leverage cutting-edge technology to streamline operations, enhance customer experiences, and maximize returns on investment.",
                'call_to_action' => "Ready to revolutionize your real estate business? Schedule a demo today to see how our advanced solutions can transform your property management, enhance market analysis, and drive growth. Our team of real estate tech experts is ready to provide a tailored solution that meets your specific needs. Don't let outdated systems hold you back - embrace the future of real estate with us!",
            ],

        ];

        foreach ($solutions as $solution) {
            IndustrySolution::create($solution);
        }
    }
}
