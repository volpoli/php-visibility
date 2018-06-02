<?php

//Private Methods Considered (Potentially) Harmful

/* This object is difficult to change between versions,
because anyone calling UnchangableObject::_internalCall()
expects the result to remain the same. */

class UnchangableObject {
	public function externalCall() {
		return $this->_internalCall();
	}
	public function _internalCall() {
		echo "Hello World!";
	}
}

/* This object is easy to change between versions, because
everyone has to call the public method. */

class ChangableObject {
	public function externalCall() {
		return $this->_internalCall();
	}
	protected function _internalCall() {
		echo "Hello World!";
	}
}
?>