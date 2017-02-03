<?php
/**
 * Created by PhpStorm.
 * User: qianlei
 * Date: 2017/2/3
 * Time: 上午10:57
 */
require __DIR__.'/vendor/autoload.php';

//$datas = [1,2,3,4,5,6];
//echo collect($datas)->sum();

$orders = [[
    'id' => 1,
    'name' => 22,
    'order_products' => [
        ['order_id'=>1,'product_id'=>2,'price'=>555.00],
        ['order_id'=>2,'product_id'=>2,'price'=>333.00],
    ]
]];

//dump(collect($orders)->map(function($order){
//    return $order['order_products'];
//})->flatten(1)->map(function($order){
//    return $order['price'];
//})->sum());

dump(collect($orders)->pluck('order_products')->flatten(1)->map(function($order){
    return $order['price'];
})->sum());

