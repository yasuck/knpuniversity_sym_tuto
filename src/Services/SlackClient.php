<?php
/**
 * Created by PhpStorm.
 * User: Yassine
 * Date: 01/06/2018
 * Time: 11:16
 */

namespace App\Services;


use App\Helper\LoggerTrait;
use Nexy\Slack\Client;

class SlackClient
{
    use LoggerTrait;

    private $slack;



    public function __construct(Client $slack)
    {
        $this->slack = $slack;
    }



    /**
     * @param string $from
     * @param string $message
     * @throws \Http\Client\Exception
     */
    public function sendMessage(string $from, string $message)
    {
        $this->logInfo('This is a log of the function sendmessage of slack custom service', [
           'message' => $message
        ]);
        $slack_message = $this->slack->createMessage()
            ->from($from)
            ->withIcon(':ghost:')
            ->setText($message);

        $this->slack->sendMessage($slack_message);

    }
}