<?php


namespace App\Services;


use Exception;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\ServiceBus\Internal\IServiceBus;
use WindowsAzure\ServiceBus\Models\BrokeredMessage;
use WindowsAzure\ServiceBus\Models\ReceiveMessageOptions;

class AzureMessageBusService
{
    /** @var IServiceBus $service */
    private IServiceBus $service;

    public function __construct()
    {
        $this->service = ServicesBuilder::getInstance()->createServiceBusService(env('AZURE_MESSAGE_BUS_CONNECTION_STRING'));
    }

    /**
     * @param string $queue
     * @param string $message
     * @throws Exception
     */
    public function sendMessage(string $queue, string $message)
    {

        try {
            // Create message.
            $brokeredMessage = new BrokeredMessage();
            $brokeredMessage->setBody($message);

            // Send message.
            $this->service->sendQueueMessage($queue, $brokeredMessage);
        } catch (ServiceException $exception) {
            // Handle exception based on error codes and messages.
            // Error codes and messages are here:
            // https://docs.microsoft.com/rest/api/storageservices/Common-REST-API-Error-Codes
            $code = $exception->getCode();
            $error_message = $exception->getMessage();
            echo $code . ": " . $error_message . "<br />";
        }
    }

    /**
     * @param $queue
     * @return BrokeredMessage
     * @throws Exception
     */
    public function getMessages(string $queue):?BrokeredMessage
    {
        $options = new ReceiveMessageOptions();
        $options->setPeekLock();
        return $this->service->receiveQueueMessage($queue);
    }
}