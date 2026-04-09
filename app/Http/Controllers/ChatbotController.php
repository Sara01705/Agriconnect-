<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ChatbotController extends Controller
{

public function ask(Request $request)
{

$message = $request->message;
$messageLower = strtolower($message);

preg_match('/\d+/', $messageLower, $matches);

$price = $matches[0] ?? null;
$python = "C:\\Users\\sarat\\AppData\\Local\\Programs\\Python\\Python310\\python.exe";

$script = base_path("AI/chatbot_nlp.py");

$command = $python." ".$script." ".escapeshellarg($message);

$output = shell_exec($command);

$result = json_decode($output,true);

$intent = $result['intent'] ?? "";


/* GREETING */

if($intent == "greeting"){

return response()->json([
"reply"=>"Hello! 👋 Welcome to AgriConnect. How can I help you?"
]);

}


/* HELP */

if($intent == "help"){

return response()->json([
"reply"=>"You can ask things like:<br>
• cheap vegetables<br>
• vegetables under 50<br>
• show fruits<br>
• recommend products<br>
• how to buy product"
]);

}


/* BUY PRODUCT */

if($intent == "buy_product"){

return response()->json([
"reply"=>"To buy a product:<br>
1️⃣ Browse products<br>
2️⃣ Click <b>Buy Now</b><br>
3️⃣ Send request to farmer<br>
4️⃣ Wait for farmer approval"
]);

}


/* CHEAP VEGETABLES */

if($intent == "cheap_vegetables"){

$products = Product::where('category','Vegetables')
           ->orderBy('price','asc')
           ->take(3)
           ->get();

$text="🥬 Cheap vegetables:<br>";

foreach($products as $p){
$text .= "• ".$p->product_name." - ₹".$p->price."<br>";
}

return response()->json(["reply"=>$text]);

}


/* CHEAP FRUITS */

if($intent == "cheap_fruits"){

$products = Product::where('category','Fruits')
           ->orderBy('price','asc')
           ->take(3)
           ->get();

$text="🍎 Cheap fruits:<br>";

foreach($products as $p){
$text .= "• ".$p->product_name." - ₹".$p->price."<br>";
}

return response()->json(["reply"=>$text]);

}


/* SHOW VEGETABLES */

if($intent == "show_vegetables"){

$query = Product::where('category','Vegetables');

if($price){
$query->where('price','<=',$price);
}

$products = $query->orderBy('price','asc')->take(5)->get();

$text="🥬 Available vegetables:<br>";

foreach($products as $p){
$text .= "• ".$p->product_name." - ₹".$p->price."<br>";
}

return response()->json(["reply"=>$text]);

}


/* SHOW FRUITS */

if($intent == "show_fruits"){

$query = Product::where('category','Fruits');

if($price){
$query->where('price','<=',$price);
}

$products = $query->orderBy('price','asc')->take(5)->get();

$text="🍊 Available fruits:<br>";

foreach($products as $p){
$text .= "• ".$p->product_name." - ₹".$p->price."<br>";
}

return response()->json(["reply"=>$text]);

}


/* DAIRY PRODUCTS */

if($intent == "dairy_products"){

$query = Product::where('category','Dairy Products');

if($price){
$query->where('price','<=',$price);
}

$products = $query->orderBy('price','asc')->take(5)->get();

$text="🥛 Dairy products:<br>";

foreach($products as $p){
$text .= "• ".$p->product_name." - ₹".$p->price."<br>";
}

return response()->json(["reply"=>$text]);

}


/* RECOMMEND PRODUCTS */

if($intent == "recommend_products"){

$products = Product::inRandomOrder()
           ->take(3)
           ->get();

$text="⭐ Recommended products:<br>";

foreach($products as $p){
$text .= "• ".$p->product_name." - ₹".$p->price."<br>";
}

return response()->json(["reply"=>$text]);

}


/* ORDER HISTORY */

if($intent == "order_history"){

return response()->json([
"reply"=>"You can view your orders in the <b>Order History</b> page."
]);

}


/* ORDER STATUS */

if($intent == "order_status"){

return response()->json([
"reply"=>"You can check order status in your <b>My Requests</b> page."
]);

}


/* FARMER DASHBOARD */

if($intent == "farmer_dashboard"){

return response()->json([
"reply"=>"Go to <b>Farmer Dashboard</b> to manage your products and orders."
]);

}


/* ADD PRODUCT */

if($intent == "add_product"){

return response()->json([
"reply"=>"To add product:<br>
1️⃣ Go to Farmer Dashboard<br>
2️⃣ Click Add Product<br>
3️⃣ Enter details and save"
]);

}


/* VIEW ORDERS */

if($intent == "view_orders"){

return response()->json([
"reply"=>"You can view buyer requests in the <b>Orders</b> section of your dashboard."
]);

}


/* ACCEPT ORDER */

if($intent == "accept_order"){

return response()->json([
"reply"=>"Open Orders page and click <b>Accept</b> to approve the buyer request."
]);

}


/* REJECT ORDER */

if($intent == "reject_order"){

return response()->json([
"reply"=>"Open Orders page and click <b>Reject</b> to decline the request."
]);

}


/* EARNINGS */

if($intent == "earnings"){

return response()->json([
"reply"=>"You can view your earnings in the <b>Farmer Orders</b> page."
]);

}


/* THANKS */

if($intent == "thanks"){

return response()->json([
"reply"=>"You're welcome! 😊 Happy farming with AgriConnect."
]);

}


/* DEFAULT */

return response()->json([
"reply"=>"Sorry, I didn't understand. Try asking:<br>
• cheap vegetables<br>
• show fruits<br>
• recommend products"
]);

}

}