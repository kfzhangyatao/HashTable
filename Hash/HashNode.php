<?php
/**
 * Created by PhpStorm.
 * User: zhangyatao
 * Date: 2017/9/12
 * Time: 14:57
 */
//namespace Hash;
class HashNode{
    public $key;
    public $value;
    public $nextNode;
    public function __construct($key, $value, $nextNode = NULL)
    {
        $this->key = $key;
        $this->value = $value;
        $this->nextNode = $nextNode;
    }
}