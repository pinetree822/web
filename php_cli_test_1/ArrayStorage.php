<?php
class ArrayStorage
{
	protected $collection = [];

	public function put($item)
	{
		$this->collection[] = $item;
	}
	public function collection()
	{
		return $this->collection;
	}
}
?>