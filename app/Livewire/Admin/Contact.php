<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Contact extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public $name;
    public $email;
    public $phone;
    public $message;

    public $status;

    public function toggleSolve($faqId)
    {
        $faq = \App\Models\Faqs::find($faqId);
        if ($faqId) {
            $faq->status = !$faq->status;
            $faq->save();
        }
        session()->flash('message', 'Faq Status Changed Successfully');

    }

    public function render()
    {
        $datas = \App\Models\Faqs::latest()->paginate(10);
        return view('livewire.admin.contact', compact('datas'));
    }
}
