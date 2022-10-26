<?php

class ListNode {
    public $next = null;
    public $data = null;

    public function __construct(string $data = NULL)
    {
        $this->data = $data;
    }
}

?>