<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;

    public function saveContact()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'phone' => 'required',
        ]);

        Contact::create($validatedData);

        $this->reset(); 

        session()->flash('success', 'Message send successfully!');
    }
    public function render()
    {
        return view('livewire.contact-form');
    }
}
