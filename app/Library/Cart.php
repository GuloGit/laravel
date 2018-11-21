<?php


namespace App\Library;
use App\Product;


class Cart
{
    /*
     *[
     *   id=> 3,
     *   quantity = 2
     * ]
     */
    protected $items =[];

    public function __construct()
    {
        //items- или данные из сессии , или пустой массив
        $this->items=session("cart",[]);
    }

    public function add(Product $product, int $count)
    {
        $inCart = false;
        //проверяем , есть ли товар в корзине
        foreach ($this->items as &$item) {
            //если нашли, то увеличиваем колличесвто
            if ($product->id == $item["id"]) {
                $inCart = true;
                $item["quantity"] += $count;
                break;
            }
        }
        //а если нет в корзине, то просто добавляем
        if (!$inCart) {

            $this->items[] = [
                "id" => $product->id,
                "quantity" => $count
            ];

        }
    }

    public function remove($id)
    {
        foreach ($this->items as $key=>$item){
            if($id == $item["id"]){
                array_splice($this->items, $key,1);
            }
        }
    }

    public function count()
    {
        $count = 0;
        foreach ($this->items as $item){
            $count+=$item["quantity"];
        }
        return $count;
    }

    public function getProducts()
    {
        $ids=[];
        foreach($this->items as $item){
            $ids[]=$item["id"];
         }
         //SELECT from products WHERE id IN(1, 2, 5, 12)
         $products= Product::whereIn("id",$ids)->get();
         $totalPrice=0;
        foreach ($products as $product){
            foreach ($this->items as $item){
                if($item["id"]===$product->id){
                    $product->countInCart=$item["quantity"];
                    $product->totalPrice = $item["quantity"]*$product->price;
                    $totalPrice+=$product->totalPrice;
                    break;
                }
            }
        }


        return [
            "products"=>$products,
            "total"=>$totalPrice
        ];
    }

    public function __destruct()
    {
        //сохраняем в сессию содержимое корзины
        session(["cart"=>$this->items]);

    }
}