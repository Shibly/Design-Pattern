<?php

// A basic template for our decoders.
interface DecodeStrategy
{
    public function decode($input);
}

// Contract for employing decode strategy.
interface useDecodeStrategy
{
    public function setDecodeStrategy(DecodeStrategy $strategy);

    public function executeDecodeStrategy();
}

// Our simple decoder example.
class Decoder implements useDecodeStrategy
{
    private $strategy;
    private $input;

    public function setInput($input)
    {
        $this->input = $input;
    }

    public function setDecodeStrategy(DecodeStrategy $strategy)
    {
        $this->strategy = new $strategy;
    }

    public function executeDecodeStrategy()
    {
        $decoded = $this->strategy->decode($this->input);
        var_dump($decoded);
    }
}

// JSON decoder.
class JsonDecodeStrategy implements DecodeStrategy
{
    public function decode($input)
    {
        return json_decode($input);
    }
}

// Serial decoder.
class SerialDecodeStrategy implements DecodeStrategy
{
    public function decode($input)
    {
        return unserialize($input);
    }
}

// First test some JSON.
$test = new Decoder;
$test->setInput(json_encode(array('data' => 'Testing the JSON decoder')));
$test->setDecodeStrategy(new JsonDecodeStrategy());
$test->executeDecodeStrategy();

// Now test the serial.
$test->setInput(serialize(array('data' => 'Testing the serialize() decoder')));
$test->setDecodeStrategy(new SerialDecodeStrategy());
$test->executeDecodeStrategy();