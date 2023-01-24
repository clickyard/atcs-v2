<?php

namespace App\Components;


use Illuminate\Validation\Rule;
use Spatie\LivewireWizard\Components\StepComponent;

class EmailStepComponent extends StepComponent
{
    public function render()
    {
        return view('auth.register.email-step');
    }


    /*public function mount()
    {
        $this->mergeState([
            'email' => $this->model->email
        ]);
    }

    public function icon(): string
    {
        return 'check';
    }

    public function validate()
    {
        return [
            [
                'state.email' => ['required', 'email', Rule::unique('users', 'email')],
            ],
            [
                'state.email' => __('Email'),
            ],
        ];
    }

    public function title(): string
    {
        return __('Email');
    }
    */
}
