<?php

namespace App\Http\Livewire;

use App\Simulator\Engine;
use Exception;
use Livewire\Component;

class Simulator extends Component
{
    public $sessionId;
    public $sequence;
    public $url = 'https://ussd.korba365.com/api/ussd';
    public $method = 'POST';
    public $network = 'mtn';
    public $phoneNumber = '0545112466';
    public $aggregator = 'korba';
    public $input = '*365#';
    public $output;
    public $hasInput;

    public function sendRequest()
    {
        if ($this->hasFalseValue()) {
            return;
        }

        try {
            $response = Engine::run(
                $this->getSessionId(),
                $this->url,
                $this->method,
                $this->network,
                $this->phoneNumber,
                $this->aggregator,
                $this->input,
                $this->nextSequence()
            );

            $this->output = $response['message'];
            $this->hasInput = $response['action'] === 'input' ? true : false;
        } catch(Exception $exception) {
            $this->output = "An Exception Occured\n{$exception->getMessage()}";
            $this->hasInput = false;
        }
    }

    public function cancelRequest()
    {
        $this->sessionId = null;
        $this->sequence = 0;
    }
    
    public function render()
    {
        return view('livewire.simulator');
    }

    public function getSessionId()
    {

        if ($this->sessionId === null) {
            $this->sessionId = bin2hex(random_bytes(5));
        }

        return $this->sessionId;
    }

    public function nextSequence()
    {
        if ($this->sequence === null) {
            $this->sequence = 1;
        }
        return $this->sequence++;
    }

    public function hasFalseValue()
    {
        if (! filter_var($this->url, FILTER_VALIDATE_URL)) {
            return true;
        }

        if (! in_array($this->method, ['GET', 'POST'])) {
            return true;
        }

        if (
            ! in_array($this->network, ['airteltigo', 'glo', 'mtn', 'vodafone'])
        ) {
            return true;
        }

        if (
            strlen($this->phoneNumber) !== 10
            || $this->phoneNumber[0] !== '0'
        ) {
            return true;
        }

        if (! in_array($this->aggregator, ['korba', 'nsano'])) {
            return true;
        }

        if (strlen($this->input) === 0) {
            return true;
        }

        return false;
    }
}
