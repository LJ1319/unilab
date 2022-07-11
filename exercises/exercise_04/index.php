<?php 
	
	// solution from stackOverFlow 
	// "https://stackoverflow.com/questions/15728506/how-to-validate-brackets-in-equation-string-in-php"

	/**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
       $len = strlen($s);
        $stack = [];
        for ($i = 0; $i < $len; $i++) {
            switch ($s[$i]) {
                case '(': array_push($stack, 0); break;
                case ')': 
                    if (array_pop($stack) !== 0)
                        return false;
                break;
                case '[': array_push($stack, 1); break;
                case ']': 
                    if (array_pop($stack) !== 1)
                        return false;
                break;
                default: break;
                case '{': array_push($stack, 2); break;
                case '}': 
                    if (array_pop($stack) !== 2)
                    return false;
                    break;
            }
        }
        return (empty($stack));
    }
    isValid("()[]{}");
 ?>