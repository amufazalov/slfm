<?php
namespace App\Controllers;
use App\Base\Controller;

class ParseController extends Controller{
    
    public function index(){

        $html = file_get_contents('http://magicserv.ru/katalog-tovarov/odnorazovaya-odezhda/');
       // echo $html;
        //Объект phpQuery
        $doc = \phpQuery::newDocument($html);
         //Получаем все блоки .product, где хранится нужная нам информация
        $lists = pq('.wrapper_content')->children('.product');
        //Заводим массив для хранения ссылки
        $links = array();
        //Проходимся по каждому блоку и преобразуем в объект типа phpQuery для дальнейшего распарсинга
        foreach($lists as $item){
            $product = pq($item);  
            $links[] = 'http://magicserv.ru/' . $product->find('.product-description-drop--content > a')->attr('href');
        }
        \phpQuery::unloadDocuments();
        
        $i = 0;
        $data = array();
        foreach($links as $item){
             $html = file_get_contents($item);
             $doc = \phpQuery::newDocument($html);
             //Заголовок
             $title = pq('.title-product')->text();
             $product_price = pq('.product-price')->text();
             $description = pq('#description')->html();
             
             $data[$i]['title'] = $title;
             $data[$i]['price'] = $product_price;
             $data[$i]['desc'] = strip_tags($description, '<br><p>');
             $i++;
             \phpQuery::unloadDocuments();
        }
              
  //      print '<pre>';
  //      print_r($data);
        
        $file = fopen('products.csv', "a");
        foreach ($data as $item) fputcsv($file, $item, '||');
        fclose($file);
        
        
        
        /*
        foreach($data as $item){
            echo "<h2>{$item['title']}</h2>";
            echo "<h3>{$item['price']}</h3>";
            echo $item['desc'] . '<hr/>';
        }*/
        
    }
}
