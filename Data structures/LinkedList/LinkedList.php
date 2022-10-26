<?php

require_once (__DIR__."/ListNode.php");

class LinkedList{
    private $_firstNode = NULL;
    private $_totalNodes = NULL;

    public function insert(string $data){
        $newNode = new ListNode($data);
        if($this->_firstNode ===NULL){
            $this->_firstNode = &$newNode;
        }
        else{
            $currrentNode = $this->_firstNode;
            while($currrentNode->next!==NULL){
                $currrentNode = $currrentNode->next;
            }
            $currrentNode->next = $newNode;
        }
        $this->_totalNodes++;
        return TRUE;
    }

    public function display(){
        echo "Total book titles: ". $this->_totalNodes."\n";
        $currrentNode = $this->_firstNode;

        while ($currrentNode !== NULL){
            echo $currrentNode->data."\n";
            $currrentNode = $currrentNode->next;
        }
    }
}