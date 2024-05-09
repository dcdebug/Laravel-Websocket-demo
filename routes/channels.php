<?php

use Illuminate\Support\Facades\Broadcast;

//channel APP.Models.User.{id}
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

//Broadcast::private('delivery',function($user,$id){
//    dump($user,$id);
//   return $id;
//});
Broadcast::channel('delivery.{id}',function($user,$id){

    return (int)$user->id == $id;
});
