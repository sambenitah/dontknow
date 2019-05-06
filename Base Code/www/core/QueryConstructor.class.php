<?php

class QueryConstructor{

    private $select;
    private $from;
    private $where;

    public function select(string ...$select):self
    {
        $this->select = $select;
        return $this;
    }

    public function from(string $from):self
    {
        $this->from = $from;
        return $this;
    }

    public function where(string $where):self
    {
        $this->where = $where;
        return $this;
    }

    public function __toString()
    {
        $parts = [];
        if ($this->select){
            $parts[] = "SELECT ".implode(', ', $this->select); // same as implode
        }else{
            $parts[] = "SELECT *";
        }
        $parts[] = "FROM";
        $parts[] = $this->from;
        return join( ' ', $parts);
    }
}