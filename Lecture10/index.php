<?php echo "<pre>";
class Shop {
    public $shop_name = "Lido";
    public $work_time = "10.00 - 23.00";
    protected $money_left = 35;//euro
    protected  $cost_of_cart = 0;
    public $grosery = array("potato" => 0.90,
                            "banana" => 2.20,
                            "rise" => 0.77,
                            "greek" => 0.62,
                            "juice" => 0.99,
                            "beer" => 1.30,
                            "vodka" => 8.99,
                            "wine" => 7.40,
                            "spaghetti" => 1.74,
                            "hot dog" => 1.12);

    protected  $cart = array();
    public  function groseryList(){
        $temp_array=array_keys($this->grosery);
        foreach($temp_array as &$key){
           print "You see ".$key." and it cost's ".$this->grosery[$key]." euro.<br>";
        }
        print "<br>";
        unset($temp_array);
    }

}
class ShopingCart extends Shop{
    public function addToCart($products,$cost){
        if(is_array($products)){
            print "You want to buy multiple stuff"."<br>";
            foreach($products as &$key){
                if(array_key_exists($key,$this->grosery)){
                    array_push($this->cart,$this->grosery[$key]);
                    print "You have successfully added ".$key.", to your shopping cart "."<br>";
                }
            }
            $this->costOfCart();
            $this->buyShoppingCart($this->cart,$cost);
        }
        else{
            if(array_key_exists($products,$this->grosery)){
                print "You have successfully added ".$products." to your shopping cart. <br>";
                array_push($this->cart,$this->grosery[$products]);
                $this->costOfCart();
                $this->buyShoppingCart($this->cart,$cost);
            }
            else{
                print "Sorry , but we don't have ".$products." in our store.";
            }
        }
    }
    private   function costOfCart(){
        $this->cost_of_cart=array_sum($this->cart);
        print "The total cost of your cart is: ".$this->cost_of_cart." euro."."<br>";
    }
    private  function buyShoppingCart($cart,$amount_of_money){
        if($this->cost_of_cart > $amount_of_money){
            print "I'm sorry, but you don't have that amount of money, to pay the bill. ";
        }
        else{
            print "You have successfully bough your cart, it costs ".$this->cost_of_cart."<br>";
            $change = $amount_of_money - $this->cost_of_cart;
            if($change < $this->money_left){
                    print "Here is your change ".$change."<br><br>";
                    $this->money_left=$this->money_left - $change;
            }
            else{
                print "We are sorry, but we don't have that amount of change money, please reconsider your cart, or come later."."<br>";
            }
        }
        unset ($change);
    }
}

$customer = new ShopingCart();
$customer ->groseryList();
$cart = array("juice","vodka","banana","potato");
$customer->addToCart("juice",10);
$customer->addToCart($cart,25);
$new_cart=array("vodka","vodka","vodka","wine","spaghetti","rise"."hot dog");
$customer->addToCart($new_cart,40);



?>