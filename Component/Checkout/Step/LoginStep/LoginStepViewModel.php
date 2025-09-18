<?php declare(strict_types=1);

namespace YireoTraining\ExampleLokiCheckoutStepLogin\Component\Checkout\Step\LoginStep;

use LokiCheckout\Core\Component\Base\Generic\CheckoutContext;
use LokiCheckout\Core\Component\Checkout\Step\StepViewModelInterface;
use Loki\Components\Component\ComponentViewModel;

/**
 * @method CheckoutContext getContext()
 */
class LoginStepViewModel extends ComponentViewModel implements StepViewModelInterface
{
    public function getCode(): string
    {
        return 'login';
    }

    public function getLabel(): string
    {
        return 'Login';
    }

    public function isEnabled(): bool
    {
        if ($this->getContext()->getCustomerSession()->isLoggedIn()) {
            return false;
        }

        return true;
    }

    public function isAccessable(): bool
    {
        return true;
    }

    public function isVisible(): bool
    {
        return $this->getContext()->getStepNavigator()->isCurrentStep($this);
    }


    public function getStep(): string
    {
        return 'none';
    }

    public function validate(): true|array
    {
        return $this->getContext()->getCustomerSession()->isLoggedIn();
    }

    public function getJsComponentName(): ?string
    {
        return 'ExampleLokiCheckoutStepLoginComponent';
    }
}


