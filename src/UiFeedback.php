<?php

namespace TsfCorp\UiFeedback;

use Illuminate\Contracts\Session\Session;

class UiFeedback
{
    private $key = "";

    /**
     * @var Session
     */
    private $session;

    /**
     * UiFeedback constructor.
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->key = config('uifeedback.key', 'uifeedback');
        $this->session = $session;
    }

    /**
     * Returns an HTML formatted message, similar to those fetched from the session.
     *
     * @param string $type
     * @param string $message
     * @param bool $close_button
     *
     * @return string
     */
    public function format($type = MessageFormat::INFO, $message = "", $close_button = true)
    {
        if (empty($type) || empty($message))
            return '';

        $this->set($type, $message, $close_button);

        // return the HTML formatted message
        return $this->get();
    }

    /**
     * Store a message into the session.
     *
     * @param string $type
     * @param string|array $message
     * @param bool $close_button
     */
    public function set($type = MessageFormat::INFO, $message, $close_button = true)
    {
        if (empty($type) || empty($message))
            return;

        // convert to array if it's a single message
        if (!is_array($message)) {
            $message = [$message];
        }

        // store the message
        $this->session->push($this->key, [
            'type' => $type,
            'close_button' => $close_button,
            'messages' => $message,
        ]);
    }

    /**
     * Fetch and return whatever message exists in the session with the $key key.
     *
     * @return string
     */
    public function get()
    {
        $messages = $this->fetchMessages();

        if (!count($messages))
            return '';

        // return the HTML formatted message
        return view('uifeedback::messages', ['ui_messages' => $messages])->render();
    }

    /**
     * Get stored messages
     *
     * @return array|mixed
     */
    public function fetchMessages()
    {
        // fetch message from session
        $ui_messages = $this->session->get($this->key, []);

        // remove message from session
        $this->session->remove($this->key);

        // append session errors from validation
        if (config('uifeedback.capture_validation_errors', true) && $this->session->has('errors')) {
            $validator_errors = $this->session->get('errors');

            $ui_messages[] = [
                'type' => MessageFormat::DANGER,
                'close_button' => true,
                'messages' => $validator_errors->all(),
            ];
        }

        if (config('uifeedback.group_errors', false)) {
            $messages = [];
            foreach ($ui_messages as $ui_message) {
                if (!array_key_exists($ui_message['type'], $messages)) {
                    $messages[$ui_message['type']] = $ui_message;
                } else {
                    // merge messages
                    $messages[$ui_message['type']]['messages'] = array_merge($messages[$ui_message['type']]['messages'], $ui_message['messages']);

                    // if any of the messages has setup to display the close button, we'll apply this for all
                    if ($ui_message['close_button'] === true)
                        $messages[$ui_message['type']]['close_button'] = true;
                }
            }

            $ui_messages = $messages;
        }

        return $ui_messages;
    }
}