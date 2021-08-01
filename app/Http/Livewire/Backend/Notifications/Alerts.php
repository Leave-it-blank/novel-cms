<?php

namespace App\Http\Livewire\Backend\Notifications;

use Livewire\Component;

class Alerts extends Component
{

    protected $listeners = [
        'Danger_alert' => 'Danger',
        'Success_alert' => 'Success',
        'Warning_alert' => 'Warning',
        'error_alert' => 'Error'
    ];

    public function Danger($message)
    {
        session()->flash('danger', $message);
    }

    public function Success($message)
    {
        session()->flash('success', $message);
    }

    public function Warning($message)
    {
        session()->flash('warning', $message);
    }

    public function Error($message)
    {
        session()->flash('error', $message);
    }

    public function render()
    {
        return view('livewire.backend.notifications.alerts');
    }
}
