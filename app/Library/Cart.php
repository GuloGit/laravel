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

    public function remove(Product $product)
    {
        foreach ($this->items as $key=>$item){
            if($product->id == $item[id]){
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

    public function __destruct()
    {
        //сохраняем в сессию содержимое корзины
        session(["cart"=>$this->items]);
    }
}