<?php

use Livewire\Component;

new class extends Component {
    public string $name = '';
    public string $mobile = '';
    public string $email = '';
    public string $subject = '';
    public string $message = '';

    protected array $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'mobile' => 'required|digits:10',
        'subject' => 'required',
        'message' => 'required',
    ];

    protected array $messages = [
        'name.required' => 'The name field is required.',
        'email.required' => 'The email field is required.',
        'email.email' => 'Please enter a valid email address.',
        'mobile.required' => 'The mobile number is required.',
        'mobile.digits' => 'Mobile number must be 10 digits.',
        'subject.required' => 'The subject field is required.',
        'message.required' => 'The message= field is required.',
    ];

    public function sendMail(): void
    {
        $this->validate();

        try {
            $data = $this->only(['name', 'email', 'mobile', 'subject', 'message']);

            // Log::info('Message sending:', $data);
            // Uncomment to send email
            // Mail::to('contact@casefile.com')->send(new \App\Mail\SendEmail($data));

            //Message::create($data);

            $this->reset();
            session()->flash('alert-success', "Your message was sent successfully.");
        } catch (\Exception $e) {
            session()->flash('alert-error', "Failed to send message: " . $e->getMessage());
        }
    }
};
?>

<div class="col-xl-6">
    <div class="contact__area-right">
        <h4 class="mb-20">Ask Question or Get Quote</h4>
        <form wire:submit.prevent="sendMail" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-12 mb-25">
                    <div class="contact__area-right-form-item">
                        <i class="fal fa-user"></i>
                        <input wire:model="name" type="text" name="name" placeholder="Full Name" required="required">
                    </div>
                </div>
                <div class="col-sm-6 sm-mb-30">
                    <div class="contact__area-right-form-item">
                        <i class="fal fa-envelope"></i>
                        <input wire:model="email" type="text" name="email" placeholder="Email Address"
                               required="required">
                    </div>
                </div>
                <div class="col-sm-6 mb-25">
                    <div class="contact__area-right-form-item">
                        <i class="fal fa-phone-alt"></i>
                        <input wire:model="mobile" type="text" name="mobile" placeholder="Phone Number"
                               required="required">
                    </div>
                </div>
                <div class="col-sm-12 mb-25">
                    <div class="contact__area-right-form-item">
                        <i class="fal fa-text"></i>
                        <input wire:model="subject" type="text" name="subject" placeholder="Subject"
                               required="required">
                    </div>
                </div>
                <div class="col-sm-12 mb-25">
                    <div class="contact__area-right-form-item">
                        <i class="fal fa-pen"></i>
                        <textarea wire:model="message" name="message" placeholder="Question"></textarea>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="contact__area-right-form-item">
                        @if(session('alert-success'))
                            <div class="btn btn-success btn-sqr">{{ session('alert-success') }}</div>
                        @else
                            <button class="theme-btn3" type="submit">Submit<i class="fal fa-long-arrow-right"></i>
                            </button>
                        @endif

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
