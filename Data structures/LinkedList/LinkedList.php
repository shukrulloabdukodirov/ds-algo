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

    public function insertAtFirst(string $data = NULL) {
        $newNode = new ListNode($data);
        if ($this->_firstNode === NULL) {
            $this->_firstNode = &$newNode;
        } else {
                $currentFirstNode = $this->_firstNode;
                $this->_firstNode = &$newNode;
                $newNode->next = $currentFirstNode;
        } 
        $this->_totalNode++;
        return TRUE;
    }

    public function search(string $data = NULL) {
        if ($this->_totalNode) {

            $currentNode = $this->_firstNode;
            while ($currentNode !== NULL) {
                if($currentNode->data === $data) {
                    return $currentNode;
                }

                $currentNode = $currentNode->next;
            }
        }
        return FALSE;
    }

    public function insertBefore(string $data = NULL, string $query = NULL) {
        $newNode = new ListNode($data);
        if ($this->_firstNode) {
            $previous = NULL;
            $currentNode = $this->_firstNode;
            while ($currentNode !== NULL) {
                if ($currentNode->data === $query) {
                    $newNode->next = $currentNode;
                    $previous->next = $newNode;
                    $this->_totalNode++;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }

    public function insertAfter(string $data = NULL, string $query =  NULL) { 
        $newNode = new ListNode($data);  
        if ($this->_firstNode) {  
            $nextNode= NULL;  
            $currentNode = $this->_firstNode;  
                while ($currentNode !== NULL){  
                    if ($currentNode->data === $query) {  
                        if($nextNode !== NULL) { 
                        $newNode->next = $nextNode;  
                    }  
                    $currentNode->next = $newNode; 
                    $this->_totalNode++;  
                    break;  
                }  
                $currentNode = $currentNode->next;
                $nextNode = $currentNode->next;  
            }  
        }  
    }

    public function deleteFirst() {
        if ($this->_firstNode !== NULL) {
            if ($this->_firstNode->next !== NULL) {
                $this->_firstNode = $this->_firstNode->next;
            } else {
                $this->_firstNode = NULL;
            }
            $this->_totalNode--;
            return TRUE;
        }
        return FALSE;
    }

    public function deleteLast() { 
        if ($this->_firstNode !== NULL) {
            $currentNode = $this->_firstNode; 
            if ($currentNode->next === NULL) {
                $this->_firstNode = NULL; 
            } else { 
                $previousNode = NULL;
                while ($currentNode->next !== NULL) { 
                    $previousNode = $currentNode;
                    $currentNode = $currentNode->next; 
                } 
                $previousNode->next = NULL;
                $this->_totalNode--; 
                return TRUE; 
            } 
        } 
        return FALSE;
    }

    public function delete(string $query = NULL) { 
        if ($this->_firstNode) {
            $previous = NULL; 
            $currentNode = $this->_firstNode; 
            while ($currentNode !== NULL) { 
                if ($currentNode->data === $query) { 
                    if ($currentNode->next === NULL) { 
                        $previous->next = NULL; 
                    } else { 
                        $previous->next = $currentNode->next; 
                    } $this->_totalNode--; 
                    break; 
                }
                $previous = $currentNode; 
                $currentNode = $currentNode->next; 
            } 
        }
    }

    public function reverse() {  
        if ($this->_firstNode !== NULL) {  
            if ($this->_firstNode->next !== NULL) {  
                $reversedList = NULL;  $next = NULL; 
                $currentNode = $this->_firstNode;  
                while ($currentNode !== NULL) {  
                    $next = $currentNode->next;  
                    $currentNode->next = $reversedList;  
                    $reversedList = $currentNode;
                    $currentNode = $next;  
                }  
                $this->_firstNode =$reversedList;  
            }  
        }  
    }

    public function getNthNode(int $n = 0) {
        $count = 1;
        if ($this->_firstNode !== NULL) {
            $currentNode = $this->_firstNode;
            while ($currentNode !== NULL) {
                if ($count === $n) {
                    return $currentNode;
                }
                $count++;
                $currentNode = $currentNode->next;
            }
        }
    }
        
}