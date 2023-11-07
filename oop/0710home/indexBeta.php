<?php

class A {
    private ?int $a;
    private ?string $s;

    private function __construct(?int $a = null, ?string $s = null)
    {
        $this->a = $a;
        $this->s = $s;
    }

    public static function create1(int $a, string $s): static
    {
        return new static($a, $s);
    }

    public static function create2(string $s): static
    {
        return new static(null, $s);
    }

    public static function create3(string $s_json): static //JSON
    {
        $data = json_decode($s_json);
        return new static($data->a, $data->s);
    }

    public function getA()
    {
        return $this->a;
    }

    public function getS()
    {
        return $this->s;
    }
}

$obj = A::create1(1, 's');
$obj = A::create2('s');
$obj = A::create3(json_encode(['a' => 1, 's' => 'long_live_the_Milky_Way']));


var_dump($obj->getA());
var_dump($obj->getS());