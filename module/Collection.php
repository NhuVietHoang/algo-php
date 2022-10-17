<?php
namespace module;
class Collection
{	
	protected  $listsQuestion = [];
    public  function __construct($listsQuestion = [])
    {
        $this->listsQuestion = $listsQuestion;
    }
	public function all(){
		return $this->listsQuestion ;
	}

	public function fillter($callback){
		return array_filter($this->listsQuestion,$callback, ARRAY_FILTER_USE_BOTH);
	}
	public function first(){
		return reset($this->listsQuestion);
	}

	public function last(){
		return end($this->listsQuestion);
	}

	public function map($callback){
		return array_map($callback,$this->listsQuestion);
	}

	function pluck($items, $key)
	{
    return array_map( function($item) use ($key) {
        return is_object($item) ? $item->$key : $item[$key];
    }, $items);
	}

	public function push(Question $question){
		array_push($this->listsQuestion,$question);
        return $this;
	}

	public function add($listsQuestion){
		$this->listsQuestion[] = $listsQuestion;
        return true;
	}

	public function SortBy($callback){
	return usort($this->listsQuestion,$callback);
	}
		
}