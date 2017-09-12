<?php
/**
 * Created by PhpStorm.
 * User: zhangyatao
 * Date: 2017/9/12
 * Time: 15:14
 */
//use \Hash\HashNode;
//use Hash\HashTable;
require_once "Hash/HashTable.php";

$ht = new HashTable();
$ht->insert('key1', 'value1');
$ht->insert('key12', 'value12');
echo $ht->find('key1').PHP_EOL;
echo $ht->find('key12');