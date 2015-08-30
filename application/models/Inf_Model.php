<?php

class Inf_Model extends CI_Model {

    protected $_dbHandle;
    protected $_lastResult;
    protected $_lastQuery;
    protected $_lastError;
    protected $_rowCount;
    public $table_prefix;
    public $session_data;
    public $TEMPLATE_APP_PATH;

    function __construct() {

        $controler_class = $this->router->class;
        
		$session_data = $this->session->userdata('logged_in');

            
//        if ($controler_class != 'login' && $controler_class != 'backup' && $this->uri->segments[1]!='mobile' && $session_data) {
            $table_prefix = '40_';
           
            $this->db->set_dbprefix($table_prefix);
            
            $this->db->dbprefix($table_prefix);
            $this->table_prefix = $table_prefix;
            $this->session_data = $this->session->userdata('logged_in');
//        }
		$this->TEMPLATE_APP_PATH = base_url() . "public_html/";
    }
    /** Custom SQL Query * */

    /** Get number of rows * */
    function getNumRows() {
        return mysql_num_rows($this->_lastResult);
    }

    /** Free resources allocated by a query * */
    function freeResult() {
        mysql_free_result($this->_lastResult);
    }

    /** Get error string * */
    function getError() {
        return mysql_error($this->_dbHandle);
    }

    public function insertData($qr, $msg = "") {
        $this->_lastQuery = $qr;
        $res = mysql_query($qr);
        $this->_lastResult = $res;
        if (!$res) {
            $this->_lastError = mysql_error();
            die('Invalid Insert query:' . $msg . " " . mysql_error());
        }
        return $res;
    }

    public function updateData($qr, $msg = "") {

        $this->_lastQuery = $qr;
        $res = mysql_query($qr);

        $this->_lastResult = $res;
        if (!$res) {
            $this->_lastError = mysql_error();
            die('Invalid Update query: ' . $msg . " " . mysql_error());
        }
        return $res;
    }

    public function deleteData($qr, $msg = "") {
        $this->_lastQuery = $qr;
        $res = mysql_query($qr);
        $this->_lastResult = $res;
        if (!$res) {
            $this->_lastError = mysql_error();
            die('Invalid Delete query: ' . $msg . " " . mysql_error());
        }
        return $res;
    }

    public function truncateData($qr, $msg = "") {
        $this->_lastQuery = $qr;
        $res = mysql_query($qr);
        $this->_lastResult = $res;
        if (!$res) {
            $this->_lastError = mysql_error();
            die('Invalid Truncate query: ' . $msg . " " . mysql_error());
        }
        return $res;
    }

    public function selectData($qr, $msg = "") {
        $this->_lastQuery = $qr;
        $result = mysql_query($qr);
        $this->_lastResult = $result;

        if (!$result) {
            $this->_lastError = mysql_error();
            die("Invalid Select query: $qr " . $msg . " " . mysql_error());
        }
        $this->_rowCount = mysql_num_rows($result);
        return $result;
    }

    public function begin() {
        mysql_query("BEGIN");
    }

    public function commit() {
        mysql_query("commit");
    }

    public function rollBack() {
        mysql_query("rollback");
    }

    public function getWritelock($tables_arr) {
        mysql_query("LOCK TABLES mytest WRITE;");
    }

    public function getReadlock($tables_arr) {
        mysql_query("LOCK TABLES mytest READ;");
    }

    public function printLastError($show_query = true) {

        // Prints the last error to the screen in a nicely formatted error message.
        // If $show_query is true, then the last query that was executed will
        // be displayed aswell.
        ?>
        <div style="border: 1px solid red; font-size: 9pt; font-family: monospace; color: red; padding: .5em; margin: 8px; background-color: #FFE2E2">
            <span style="font-weight: bold">db.class.php Error:</span><br><?php $this->lastError ?>
        </div>
        <?php
        if ($show_query && (!empty($this->_lastQuery))) {
            $this->printLastQuery();
        }
    }

    public function printLastQuery() {

        // Prints the last query that was executed to the screen in a nicely formatted
        // box.
        ?>
        <div style="border: 1px solid blue; font-size: 9pt; font-family: monospace; color: blue; padding: .5em; margin: 8px; background-color: #E6E5FF">
            <span style="font-weight: bold">Last SQL Query:</span><br><?php str_replace("\n", '<br>', $this->_lastQuery) ?>
        </div>
        <?php
    }

}