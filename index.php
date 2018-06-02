<?php
class TestObject {
	protected function testFunc() {
		echo "Hello World!";
	}
	public function getData() {
		return $this->testFunc();
	}
}
class ChildObject extends TestObject {
	protected function testFunc() {
		echo "Hello Reader!";
	}
}
$obj = new TestObject();
$obj->getData(); // Hello World!
// Child object
//$obj = new ChildObject();
//$obj->testFunc(); // Error
// Child object
$obj = new ChildObject();
$obj->getData(); // Hello Reader!