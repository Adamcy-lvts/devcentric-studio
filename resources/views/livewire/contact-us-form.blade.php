<div>


    <section class="py-12 bg-gray-50" id="contact-form-section">
        <div class="max-w-6xl mx-auto px-8 sm:px-6 lg:px-8">
            <div class="text-center mb-8 contact-form-header">
                <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">Contact Us</p>
                <h2 class="mt-1 text-3xl font-extrabold text-gray-900 sm:text-4xl">Ready to Transform Your Business?</h2>
                <p class="mt-3 text-xl text-gray-500">Let's discuss how our tailored software solutions can address your
                    unique challenges.</p>
            </div>

            <x-card padding="px-8 py-8" class="contact-form-card">
                <form action="#" method="POST" class="space-y-6">
                    <x-input label="Full Name" name="full_name" placeholder="John Doe" class="form-element" />

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 form-element">
                        <x-input label="Email" name="email" placeholder="you@example.com" />
                        <x-input label="Phone" name="phone" placeholder="(123) 456-7890" />
                    </div>

                    <x-input label="Company" name="company" placeholder="Your Company" class="form-element" />

                    <x-select label="Project Type" name="project_type" placeholder="Select Project Type"
                        :options="[
                            ['name' => 'Custom Software Development', 'id' => '1'],
                            ['name' => 'Web Application', 'id' => '2'],
                            ['name' => 'Mobile Application', 'id' => '3'],
                            ['name' => 'Cloud Solutions', 'id' => '4'],
                            ['name' => 'Enterprise Software', 'id' => '5'],
                            ['name' => 'Other', 'id' => '6'],
                        ]" option-label="name" option-value="id" class="form-element" />

                    <x-textarea label="Project Details" name="details"
                        placeholder="Please describe your project, challenges, and goals." rows="4"
                        class="form-element" />

                    <div class="flex justify-end space-x-3 form-element">
                        <x-button type="reset" label="Reset" flat />
                        <x-button rounded type="submit" label="Submit Inquiry" primary />
                    </div>
                </form>
            </x-card>
        </div>
    </section>


</div>
