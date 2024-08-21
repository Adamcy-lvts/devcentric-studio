<div>


    <section class="py-12 bg-gray-100" id="contact-form-section">
        <div class="max-w-6xl mx-auto px-8 sm:px-6 lg:px-8">
            <div class="text-center mb-8 contact-form-header">
                <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">Contact Us</p>
                <h2 class="mt-1 text-3xl font-extrabold text-gray-900 sm:text-4xl">Ready to Transform Your Business?</h2>
                <p class="mt-3 text-xl text-gray-500">Let's discuss how our tailored software solutions can address your
                    unique challenges.</p>
            </div>
            @if (session()->has('success_message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <span class="block sm:inline">{{ session('success_message') }}</span>
                </div>
            @endif

            {{-- <x-card padding="px-8 py-8" class="contact-form-card"> --}}
            <form wire:submit.prevent="submitInquiry" class="space-y-6">
                <x-input wire:model="full_name" label="Full Name" name="full_name" placeholder="your full name"
                     />
                @error('full_name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 form-element">
                    <div>
                        <x-input wire:model="email" label="Email" name="email" placeholder="your email address" />
                        @error('email')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-input wire:model="phone" label="Phone" name="phone" placeholder="your phone number" />
                        @error('phone')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <x-input wire:model="company" label="Company" name="company" placeholder="Your Company"
                     />
                @error('company')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <x-select wire:model="project_type" label="Project Type" name="project_type"
                    placeholder="Select Project Type" :options="[
                        ['name' => 'Custom Software Development', 'id' => 'Custom Software Development'],
                        ['name' => 'Web Application', 'id' => 'Web Application'],
                        ['name' => 'Mobile Application', 'id' => 'Mobile Application'],
                        ['name' => 'Cloud Solutions', 'id' => 'Cloud Solutions'],
                        ['name' => 'Enterprise Software', 'id' => 'Enterprise Software'],
                        ['name' => 'Other', 'id' => 'Other'],
                    ]" option-label="name" option-value="id"
                     />
                @error('project_type')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                <div>
                    <x-textarea wire:model="details" label="Project Details" name="details"
                        placeholder="Please describe your project, challenges, and goals." rows="4"
                         />
                    @error('details')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>


                <div class="flex justify-end space-x-3 form-element">
                    <x-button type="reset" label="Reset" flat />
                    <x-button rounded type="submit" label="Submit Inquiry" primary />
                </div>
            </form>
            {{-- </x-card> --}}
        </div>
    </section>


</div>
