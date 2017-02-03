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

//dump(collect($orders)->pluck('order_products')->flatten(1)->map(function($order){
//    return $order['price'];
//})->sum());


//old
/*$events = json_decode(file_get_contents('./data.json'),true);

$score = 0;
foreach($events as $event){
    switch ($event['type']){
        case 'PushEvent':
            $score+=5;
            break;
        case 'CreateEvent':
            $score+=4;
            break;
        case 'IssueEvent':
            $score+=3;
            break;
        case 'IssueCommentEvent':
            $score+=2;
            break;
        default:
            $score+=1;
            break;
    }
}
echo $score;*/


$events = collect(json_decode(file_get_contents('./data.json'),true));
dump($events->map(function($event){
    //return $event['type'];
    return collect(['PushEvent'=>5,'CreateEvent'=>4,'IssueEvent'=>3,'IssueCommentEvent'=>2])->get($event['type'],1);
})->sum());