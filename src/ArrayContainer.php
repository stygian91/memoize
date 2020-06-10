<?php

namespace SMemo;

class ArrayContainer implements Container {
    protected $store = [];

    public function has(string $key) {
        return array_key_exists($key, $this->store);
    }

    public function get(string $key) {
        return $this->store[$key];
    }

    public function set(string $key, $value) {
        $this->store[$key] = $value;
    }
}
