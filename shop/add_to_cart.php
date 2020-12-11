<?php
    session_start();
    
    //אם קיים סשן
    if(isset($_SESSION['cart'])){
        $cart = $_SESSION['cart']; //תאחסן אותו במשתנה הנל
    } else {
        $cart = array(); // אחרת תקים מערך ריק 
    }

    $already_in_cart = false; //פלאג היוצא מנקודת הנחה שהמוצר לא קיים בעגלה

    //עובר על כל העגלה
    //אינדקס = מס׳ הריצה בלולאה
    foreach($cart as $index => $val){
        //אם הריצה הראשונה בלולאה שווה לאיי.די של המוצר
        //כלומר, אם המוצר קיים בעגלה
        if ($val[0] == $_POST['product']){
            //   ריצה  amount                    more amount
            $cart[$index][1] = $cart[$index][1] + $_POST['quantity']; 
            //אם המוצר כבר קיים יש לעדכן את הכמות שהתווספה
            $already_in_cart = true; // פלאג שהמוצר קיים בעגלה 
        }
    }

    // אם מוצר לא קיים בעגלה 
    if (!$already_in_cart) { 
                 //item [   0  "id"    ,   1  "quantity"]
        $item = array($_POST['product'], $_POST['quantity']);
        $cart[] = $item; //push $item into $cart array
    }

    $_SESSION['cart'] = $cart; // אם הסשן לא היה קיים, שיהיה שווה למשתנה $cart