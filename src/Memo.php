<?php

namespace SMemo;

class Memo {
    protected $keyGenerator;

    protected $cache;

    protected $function;

    public function __construct($function, $keyGenerator, Container $cache) {
        $this->function = $function;
        $this->keyGenerator = $keyGenerator;
        $this->cache = $cache;
    }

    public function __invoke() {
        $args = func_get_args();
        $key = call_user_func_array($this->keyGenerator, $args);
        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $result = call_user_func_array($this->function, $args);
        $this->cache->set($key, $result);
        return $result;
    }
}
