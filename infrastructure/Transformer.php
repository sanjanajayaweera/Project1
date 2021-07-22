<?php

namespace infrastructure;

use Carbon\Carbon;
/**
 * Created by PhpStorm.
 * User: lakmali
 * Date: 11/13/17
 * Time: 11:07 AM
 */
abstract class Transformer
{
    /**
     * Transform items
     *
     * @param array $items
     * @return array
     */
    public function transformCollection(array $items){

        return array_map([$this, 'transform'], $items);

    }

    public abstract function transform($item);

    /**
     * Transform given date time to a time stamp
     * @param $date_time
     * @return int
     */
    public function toTimeStamp($date_time){
        $date = new \DateTime($date_time);
        return $date->getTimestamp();
    }

    /**
     * Reformat given date and time
     * @param $date_time
     * @return bool|string
     */
    public function reformatDateTime($date_time){
        return date('c', strtotime($date_time));
    }



    protected function diffHumans($value){

        $enDiffFormat = function ($isNow, $isFuture, $value, $unit) {

        };

        return $this->reformatDiffHumanText(
            Carbon::parse($value)->diffForHumans(Carbon::now(), $enDiffFormat)
        );
    }

    protected function reformatDiffHumanText($text){
        $label_strings = array();

        foreach($label_strings AS $key=>$string){
            $text = str_replace($string, $key, $text);
        }

        return $text;
    }
}