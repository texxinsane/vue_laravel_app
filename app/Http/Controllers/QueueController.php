<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\AzureMessageBusService;
use WindowsAzure\ServiceBus\Models\BrokeredMessage;

/**
 * Class QueueController
 * @package App\Http\Controllers
 */
class QueueController extends Controller
{
    /** @var AzureMessageBusService $busService */
    private $busService;

    const BUS_QUEUE = 'test';

    /**
     * QueueController constructor.
     * @param AzureMessageBusService $busService
     */
    public function __construct(AzureMessageBusService $busService)
    {
        $this->busService = $busService;
    }

    /**
     * @throws \Exception
     */
    public function sendMessage()
    {
        try {
            $this->busService->sendMessage(self::BUS_QUEUE, 'test message: ' . (new \DateTime())->format('H:i:s'));
            return new JsonResponse(['status' => 'message sent']);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'message not sent:' . $e->getMessage()]);
        }
    }

    /**
     * @return JsonResponse
     * @throws \Exception
     */
    public function getMessages()
    {
        /** @var BrokeredMessage $messages */
        $messages = $this->busService->getMessages(self::BUS_QUEUE);
        if ($messages) {
            var_dump($messages);
            return new JsonResponse($messages->getBody());
        }
        return new JsonResponse(['error' => 'no more messages']);

    }
}
