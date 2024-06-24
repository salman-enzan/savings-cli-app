<?php

namespace App\Command;

 class FileOps{

    public static function cateogoryExist($datas, $category){
        foreach ($datas as $data) {
            if ($data['category'] === strtolower($category)) {
                return true;
            }
        }
        return false;
    }

    public static function getAmount($data, $category){

        foreach ($data as $d){
            if($d["category"] == strtolower($category)){
                return $d["amount"];
            }
        }

        return 0;


    }

    public static function addAmount(&$data, $category, $newAmount){

        foreach ($data as &$d) {
            if ($d['category'] === $category) {
                $d['amount'] = $newAmount;
            }
        }

        
    }
    
    public static function loadData($filename)
    {
        if (!file_exists($filename)) {
            return [];
        }

        return json_decode(file_get_contents($filename), true);
    }

    public static function saveData($filename, $data)
    {
        file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));
    }
}

?>