<?php

namespace SMemo;

interface Container {
    public function has(string $key);

    public function get(string $key);

    public function set(string $key, $value);
}
