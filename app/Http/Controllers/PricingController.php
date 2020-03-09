<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Repositories\PlanRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;
use App\Helper\Helper;
use Exception;
use Braintree\Gateway;

class PricingController extends AdminController
{
    private $plan;
    private $planRepository;
    private $userRepository;
    private $braintreeGateway;

    public function __construct(Plan $plan, PlanRepository $planRepository, UserRepository $userRepository)
    {
        $this->initBraintreeGateway();
        $this->plan = $plan;
        $this->planRepository = $planRepository;
        $this->userRepository = $userRepository;
    }

    private function initBraintreeGateway() {
        $this->braintreeGateway = new Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
        ]);
    }

    public function clientToken() {
        $clientToken = $this->braintreeGateway->clientToken()->generate([
            // "customerId" => $customerId
        ]);
        return $clientToken;
    }

    public function getAllPlans(Request $request) {
        $plans = $this->plan->all();
        return  $this->response(true, '', $plans);
    }

    public function getUserBraintreeId() {
        $userId = Auth::id();
        $braintreeId = $this->userRepository->findById($userId, ['braintree_id']);

        if ($braintreeId->braintree_id == '') {
            $result = $this->braintreeGateway->customer()->create();
            
            if ($result->success) {
                $this->userRepository->updateColumn($userId, 'braintree_id', $result->customer->id);
                return $this->response(true, '', $result->customer->id);
            } else {
                return $this->response(false, 'Braintree: Create customer failed', '');
            }            
        } else {
            return $this->response(true, '', $braintreeId->braintree_id);
        }
    }

    public function createPaymentMethod(Request $request, $customerId, $nonce) {
        $result = $this->braintreeGateway->paymentMethod()->create([
            'customerId' => $customerId,
            'paymentMethodNonce' => $nonce,
        ]);

        if ($result->success) {
            return $this->response(true, '', $result);
        } else {
            return $this->response(false, 'Braintree: Create payment method failed', '');
        }
    }

    public function subscribeToPlan(Request $request, $token, $planId) {
        $result = $this->braintreeGateway->subscription()->create([
            'paymentMethodToken' => $token,
            'planId' => $planId,
        ]);

        if ($result->success) {
            return $this->response(true, '', $result);
        } else {
            return $this->response(false, 'Braintree: Subscription failed', '');
        }
    }
}