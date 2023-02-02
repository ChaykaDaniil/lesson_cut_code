<?php

namespace App\Logging\Telegram;

use App\Services\Telegram\TelegramBotApi;
use JetBrains\PhpStorm\NoReturn;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

class TelegramLoggerHandler extends AbstractProcessingHandler
{
    protected string $chatId;
    protected string $token;


    public function __construct(array $config)
    {
        $level = Logger::toMonologLevel($config['level']);

        $this->chatId = $config['chat_id'];
        $this->token = $config['token'];

        parent::__construct($level);
    }

    #[NoReturn] protected function write(array $record): void
    {
        TelegramBotApi::sendMessage($this->token, $this->chatId, $record['formatted']);

    }
}
