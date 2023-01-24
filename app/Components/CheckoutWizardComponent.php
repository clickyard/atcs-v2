<?php


namespace App\Components;
use App\Components\EmailStepComponent;
use App\Components\NameStepComponent;
use App\Components\PasswordStepComponent;

use Spatie\LivewireWizard\Components\WizardComponent;

class CheckoutWizardComponent extends WizardComponent
{


    public function steps() : array
    {
        return [
            EmailStepComponent::class,
            NameStepComponent::class,
            PasswordStepComponent::class,

        ];       
    }
}