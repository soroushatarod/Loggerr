<?php

require_once 'singleton.php';

class Log extends Singleton {

    /**
     * Holding of colors
     * @var Array 
     */
    private $_colors = array(
        'green' => "\033[32m",
        'yellow' => "\033[33m",
        'blue' => "\033[34m",
        'purple' => "\033[35m",
        'white' => "\033[37m",
        'red' => "\033[31m",
    );
    
    private $_path ='log';

    /**
     * Returns todays date, in format: YearMonthDay H:M:S 
     * @return Date, 
     */
    private function getTodaysDate() {
        return date("onj");
    }

    /**
     * To log Info events such as user loging in 
     * @param string or array $str, Info to be loged
     * @param string $color , default: Green
     */
    public function logInfo($str, $color = "green") {

        $this->write(' LogNotice', $str, $this->getColor($color));
    }

    /**
     * To log Error, things that are important
     * @param string or array $str, Error to be loged
     * @param string  $color 
     */
    public function logError($str, $color = "red") {
        $this->write('  LogError', $str, $this->getColor($color));
    }

    /**
     * To be used during development, to test functions etc
     * @param string or array $str, Testing of Variables etc to be loged
     * @param string  $color 
     */
    public function logTest($str, $color = "green") {
        $this->write('  LogTest ', $str, $this->getColor($color));
    }

    /**
     * Function that writes to file, creates new file daily 
     * @param string $type
     * @param string $string
     * @param string $color 
     */
    public function write($type, $string, $color) {
        $fileName = $this->_path.'/'.$this->getTodaysDate() . '.log';
        $handle = @fopen($fileName, 'a');
        if (is_array($string)) {
            fwrite($handle, $color . date("Y-m-d H:i:s") . $type . "\033[0m :\n" . print_r($string, true) . "\n");
        } else {
            fwrite($handle, $color . date("Y-m-d H:i:s") . $type . "\033[0m :" . $string . "\n");
        }
        fclose($handle);
    }

    /**
     * Get method that returns the color value from $_colors array
     * @param string $parm
     * @return string the color in Hex code
     */
    public function getColor($parm) {
        return $this->_colors[$parm];
    }

}

?>
