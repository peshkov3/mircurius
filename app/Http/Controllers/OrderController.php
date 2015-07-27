<?php namespace App\Http\Controllers;


use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserRequest;
use App\Mircurius\Repositories\Order\OrderRepository;
use App\Mircurius\Repositories\User\UserRepository;

use Hash;
use Input;
use Request;
use Image;
use File;
use Validator;


class OrderController extends Controller
{


    private $order;


    public function __construct(OrderRepository $orderRepository)
    {
        $this->order = $orderRepository;
    }

    public function postMake()
    {
        $quantity = Input::get('quantity');
        $user_id = Input::get('user_id');
        $product_id = Input::get('product_id');

        $v = Validator::make([
            'quantity' => $quantity,
            'user_id' => $user_id,
            'product_id' => $product_id
        ], [
            'quantity' => 'required|integer',
            'user_id' => 'required|integer',
            'product_id' => 'required|integer']);

        if ($v->fails()) return 'Quantity, user_id or product_id are wrong!';

       $orser = $this->order->create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => $quantity
            ]
        );

        return $orser->product->name;
    }


}
