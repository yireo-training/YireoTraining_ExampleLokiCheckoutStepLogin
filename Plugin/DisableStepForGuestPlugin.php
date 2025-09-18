<?php
declare(strict_types=1);

namespace YireoTraining\ExampleLokiCheckoutStepLogin\Plugin;

use LokiCheckout\Core\Component\Checkout\Step\StepViewModelInterface;
use Magento\Customer\Model\Session as CustomerSession;

class DisableStepForGuestPlugin
{
    public function __construct(
        private readonly CustomerSession $customerSession
    ) {
    }

    public function afterIsAccessable(StepViewModelInterface $viewModel, bool $return): bool
    {
        if (false === $this->customerSession->isLoggedIn()) {
            return false;
        }

        return $return;
    }
}
