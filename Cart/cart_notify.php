<a class="mt-4" href="index.php?redirect=cart">giỏ hàng </a><span class="mt-3">
    <?php
        if(isset($_SESSION["cart"])){
            
            if(isset($_POST["qtt"])){
                $cart = $_POST["qtt"];
            }
            else{
                $cart = $_SESSION["cart"];
            }
            
            $totals = 0;
            foreach($cart as $prd_id=>$qtt){
                $totals += $qtt;
            }
            echo $totals;
        }
        else{
            echo 0;
        }
    ?>
</span>