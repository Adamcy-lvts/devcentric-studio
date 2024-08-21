<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;

class ContactUsForm extends Component
{
    public $name;
    public $email;
    public $message;
    
  
    public function sentMessage()
    {

        $this->validate([
        'name' => 'required',
        'email' => 'required',
        'message' => 'required',
        ]);
        $user = User::first();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ];

        Mail::to($user)->send(new ContactUsMail($data));

        $this->name = '';
        $this->email = '';
        $this->message = '';

        session()->flash('success_message', 'Message successfully sent!');

       
    }

    public function render()
    {
        return view('livewire.contact-us-form');
    }
}
