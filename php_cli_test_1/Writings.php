<?php
require 'ArrayStorage.php';

abstract class Writings
{
	protected $storage;

	public function __construct($title, ArrayStorage $storage)
	{
		$this->setTitle($title);
		$this->storage = $storage;
	}
}
?>