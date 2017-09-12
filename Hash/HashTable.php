<?php
/**
 * Created by PhpStorm.
 * User: zhangyatao
 * Date: 2017/9/12
 * Time: 14:44
 */
//namespace Hash;
//use Hash\HashNode;
require_once "HashNode.php";
class HashTable{
    private $buckets;
    private $size = 10;
    public function __construct()
    {
        $this->buckets = new SplFixedArray($this->size);
    }

    private function hashfunc($key){
        $strlen = strlen($key);
        $hashval = 0;
        for($i = 0; $i < $strlen; $i++){
            $hashval += ord($key{$i});
        }
        return $hashval % $this->size;
    }

    public function insert($key, $val){
        /*$index = $this->hashfunc($key);
        $this->buckets[$index] = $val;*/
        // 下面是解决hash表冲突的插入方法
        $index = $this->hashfunc($key);
        /*新建一个节点*/
        if(isset($this->buckets[$index])){
            $newNode = new HashNode($key, $val, $this->buckets[$index]);
        }else{
            $newNode = new HashNode($key, $val, NULL);
        }
        $this->buckets[$index] = $newNode; //保存新节点
    }

    public function find($key){
        /*$index = $this->hashfunc($key);
        return $this->buckets[$index];*/
        //下面是解决hash冲突的查询方法
        $index = $this->hashfunc($key);
        $current = $this->buckets[$index];
        while(isset($current)){/*遍历当前链表*/
            if($current->key == $key){/*比较当前节点的关键字*/
                return $current->value; /*查找成功*/
            }
            $current = $current->nextNode; /*比较下一个节点*/
        }
        return NULL; /*查找失败*/
    }
}