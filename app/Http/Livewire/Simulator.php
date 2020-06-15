<?php

namespace App\Http\Livewire;

use App\Simulator\Engine;
use App\Simulator\NoFalseValue;
use Exception;
use Livewire\Component;

class Simulator extends Component
{
    public $sessionId;
    public $sequence;
    public $url;
    public $method;
    public $network;
    public $phoneNumber;
    public $aggregator;
    public $input;
    public $output;

    public function sendRequest()
    {
        try {
            if ($this->hasFalseValue()) {
                throw NoFalseValue::create();
            }

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
        } catch(Exception $exception) {
            $this->output = "An Exception Occured\n{$exception->getMessage()}";
        }
    }

    public function cancelRequest()
    {
        $this->sessionId = null;
        $this->sequence = null;
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
            $this->sequence = 0;
        }
        
        return ++$this->sequence;
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
            ! in_array(
                $this->network,
                ['airteltigo', 'glo', 'mtn', 'vodafone']
            )
        ) {
            return true;
        }

        if (
            strlen($this->phoneNumber) !== 10
            || $this->phoneNumber[0] !== '0'
        ) {
            return true;
        }

        if (
            ! in_array(
                $this->aggregator,
                ['korba', 'nsano']
            )
        ) {
            return true;
        }

        if (strlen($this->input) === 0) {
            return true;
        }

        return false;
    }
}
