<?php

/**
	created to test example in "Mastering Object Oriented PHP".
	
	from the book:
	
	"If a developer truly wished to
	prevent extension of the _setString() method, they could have declared it
	protected final; this would have allowed access in subclasses and also
	allowed some extension of the class by future developers, but prohibited
	redefinition of the _setString() method. Everybody wins".
	
	Marking all methods as public makes it impossible 
	to maintain the API without making major changes.
*/

class StringPrinter {
	
	//originally set as private and couldn't be accessed from inside child class
	protected $_string;
	
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
	
	//originally set as private
	final protected function _setString($string) {
		$this->_string = $string;
	}
}

class ExtendedStringPrinter extends StringPrinter {
	
	//originally this would have produced an error
	//_setString was private and cannot be called from inside child classes
	public function setUppercaseString($string) {
		if ($string) {
			$this->_setString(strtoupper($string));
		}
	}
	
	//remove final in the parent class to allow override
	/*public function _setString($string) {
		$this->_string = strtoupper($string);
	}*/
	
	//if you really need to, you could have overrided entirely this method
	//but it can be avoided declaring the method as protected in the parent class 
	/*
	public function setNewString($string) {
		$this->_string = strtoupper($string);
	}*/
	
}

$upperPrinter = new ExtendedStringPrinter("fer"); 
//$upperPrinter->_setString("fer");
$upperPrinter->setUppercaseString("ger");
$upperPrinter->printString();


?>	