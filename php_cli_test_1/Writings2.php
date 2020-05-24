<?php
require 'FileStorage.php';

abstract class Writings2
{
	protected $storage;

	public function __construct($title, FileStorage $storage)
	{
		$this->setTitle($title);
		$this->storage = $storage;
	}
}
?>