<?php

/**
	created to test example in "Mastering Object Oriented PHP".
	
	from the book:
	"Though the developer could simply override any unpleasant behavior in
	setNewString() by extending it and redefining it, the developer cannot simply
	redefine it if they wish to continue using the internal API of TestObject, since
	all the internal methods are marked private. They would instead be required
	to completely reimplement the methods that setNewString() calls that are
	private, and with complex code this can be extremely difficult or time
	prohibitive.
	Finally, no subclass can make direct access of the private property $_string.
	Even if we were to subclass it and want to override the printString() method,
	we would be unable to do so because we wouldn't be able to access the
	private $_string property."
*/

class StringPrinter {
	
	private $_string;
	
	public function __construct($string = null) {
		if($string) {
			$this->setNewString($string);
		}
	}
	
	public function printString() {
		print $this->_string;
	}
	
	public function setNewString($string) {
		$this->_setString($string);
	}
	
	private function _setString($string) {
		$this->_string = $string;
	}
}

class ExtendedStringPrinter extends StringPrinter {
	public function setUppercaseString($string) {
		if ($string) {
			$this->_setString(strtoupper($string));
		}
	}
	
}

$upperPrinter = new ExtendedStringPrinter("fer"); 
//this will produce an error as _setString is set as private in the parent class
$upperPrinter->setUppercaseString("ger");

$upperPrinter->printString();


?>