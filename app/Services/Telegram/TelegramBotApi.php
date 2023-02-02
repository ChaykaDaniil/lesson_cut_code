<?php

namespace App\Services\Telegram;

use Illuminate\Support\Facades\Http;

class TelegramBotApi
{
    public const HOST = 'https://api.telegram.org/bot';

    /**
     */
    public static function sendMessage(string $token, int $chatId, string $message): bool
    {
        $reponse = Http::get(self::HOST . $token . '/sendMessage', [
            'chat_id' => $chatId,
            'text' => $message,
        ]);

        if ($reponse->ok()) {
            return true;
        }

        return false;
    }
}
