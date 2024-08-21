<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;

class ContactUsForm extends Component
{
    public $full_name;
    public $email;
    public $phone;
    public $company;
    public $project_type;
    public $details;

    protected $rules = [
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'company' => 'required|string|max:255',
        'project_type' => 'required|string|max:255',
        'details' => 'required|string',
    ];

    public function submitInquiry()
    {
        $this->validate();

        $user = User::first(); // Assuming you want to send to the first user in the database

        $data = [
            'full_name' => $this->full_name,
            'email' => $this->email,
            'details' => "Phone: {$this->phone}\nCompany: {$this->company}\nProject Type: {$this->project_type}\n\nProject Details:\n{$this->details}",
        ];

        Mail::to($user)->send(new ContactUsMail($data));

        $this->reset(['full_name', 'email', 'phone', 'company', 'project_type', 'details']);

        session()->flash('success_message', 'Your inquiry has been submitted successfully!');
    }

    public function render()
    {
        return view('livewire.contact-us-form');
    }
}