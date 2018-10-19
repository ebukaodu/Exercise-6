<?php
namespace App;

class Item {

    public function getItems($session) {
        if(!$session->has('items')) {
            $this->createDummyData($session);
        }
        return $session->get('items');
    }

    public function getItem($session, $id){
        if(!$session->has('items')) {
            $this->createDummyData();
        }
    return $session->get('items')[$id];
    }

    public function addPost($session, $name, $detail, $price) {
        if (!$session->has('items')) {
            $this->createDummyData();
        }
        $items = $session->get('items');
        array_push($items, ['name' => $name, 'detail' => $detail, 'price' => $price]);
        $session->put('items', $items);
    }

    public function editPost($session, $id, $name, $detail, $price){
        $items = $session->get('items');
        $items[$id] = ['name' => $name, 'detail' => $detail, 'price' => $price];
        $session->put('items', $items);
    }


    private function createDummyData($session) {
        $items = [
            [
                'name'   => 'Learning Laravel',
                'detail' => 'This blog post will get you right on track with Laravel!',
                'price' => '$25'
            ],
            [
                'name'   => 'Something Else Awesome!',
                'detail' => 'Some awesome other content',
                'price' => '$25'
            ]
        ];
        $session->put('items', $items);
    }
}