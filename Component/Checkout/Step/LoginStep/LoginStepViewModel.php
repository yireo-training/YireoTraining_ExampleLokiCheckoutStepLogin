<?php declare(strict_types=1);

namespace YireoTraining\ExampleLokiCheckoutStepLogin\Component\Checkout\Step\LoginStep;

use LokiCheckout\Core\Component\Base\Generic\CheckoutContext;
use LokiCheckout\Core\Component\Checkout\Step\AbstractStepViewModel;

/**
 * @method CheckoutContext getContext()
 */
class LoginStepViewModel extends AbstractStepViewModel
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

    public function validate(): true|array
    {
        if (true === $this->getContext()->getCustomerSession()->isLoggedIn()) {
            return true;
        }

        return [__('You need to login')];
    }
}
