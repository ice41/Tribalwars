<?php
/**
 * DB_MySQL class, database utilities
 * 
 * @author ?, rewritten by Lekensteyn
 */
// queries should not be interrupted
ignore_user_abort(true);
class DB_MySQL {
	/**
	 * MySQL connection resource
	 **/
	var $connection = null;
	
        /**
         * Connects to MySQL database
         * 
         * @param string $host
         * @param string $username
         * @param string $password
         * @param string $db
         * @return boolean
         */
	function connect($host=null, $username=null, $password=null, $db=null) {
		$this->connection = @mysql_connect($host, $username, $password);
		if (!$this->connection) {
			//echo mysql_error();
			printf('Você não pode se conectar ao MySQL.(Está ativado?) <br /> Erro: %s',
				htmlentities(mysql_error())
			);
			exit;
		}
		if (!@mysql_select_db($db, $this->connection)) {
			printf('Cannot select database "%s" (does it exist?)<br />Error message: %s', htmlentities($db), htmlentities(mysql_error()));
			exit;
		}
		return true;
	}

        /**
         * Disconnects
         * 
         * @return bool 
         */
	function disconnect() {
		$close = @mysql_close($this->connection);
		$this->connection = null;
		return $close;
	}

        /**
         * 
         * 
         * @param string $sql
         * @param bool $showError
         * @param bool $errorIsFatal
         * @return resource 
         */
	function query($sql, $showError=true, $errorIsFatal=true) {
		/**
		 * FILTER_LOCKTABLES should not be implemented here... do it anyway
		 * Lock tables by default (if FILTER_LOCKTABLES is not defined)
		 */
		if(!defined('FILTER_LOCKTABLES') || FILTER_LOCKTABLES){
			// PHP 4 does not have a stripos method :@
			$pos = strpos(strtoupper($sql), 'LOCK TABLES');
			/**
			 * match LOCK TABLES and UNLOCK TABLES,
			 * do not match UPDATE ally SET Perfile='lock tables'
			 */
			if($pos !== FALSE && $pos < 3){
				return NULL;
			}
		}
		$result = @mysql_query($sql, $this->connection);
		return $this->handle_query_result($result, $sql, $showError, $errorIsFatal);
	}

        
	function unb_query($sql, $showError=true, $errorIsFatal=true) {
		$result = @mysql_unbuffered_query($sql, $this->connection);
		return $this->handle_query_result($result, $sql, $showError, $errorIsFatal);
	}
        
        /**
         * to provide equal error handling for both query functions,
         * handling the result
         * 
         * @param resource $result
         * @param string $sql
         * @param bool $showError
         * @param bool $errorIsFatal
         * @return null|resource 
         */
        function handle_query_result($result, $sql, $showError=true, $errorIsFatal=true) {
            if (!$result) {
                if ($showError) {
                    printf('Erro SQL: %s <br /> Erro: %s', htmlentities($sql), htmlentities(mysql_error($this->connection)));
                    if ($errorIsFatal) {
			exit;
                    }
		}
		return null;
            }
            return $result;
        }
	
	/**
	 * Safer approach to queries
	 *
	 * @param string $sql SQL query with parameters replaced; %i: integer, %d: float, %s: string, %%: literal percent character. Each parameter requires a corresponding function argument.
	 * @return null|resource null on failure, a database resource on success
	 */
	function query_safe($sql) {
		if (!is_string($sql)) {
			// PHP 4 does not support exceptions. Return null for now
			printf("DB::query_safe: expected first argument to be a string\n");
			return null;
		}
		$args = func_get_args();
		// parameter 0 is $sql
		$parameters_count = func_num_args() - 1;
		$sqlLength = strlen($sql);
		$argPos = 0;
		$pos = 0;
		while (($pos=strpos($sql, '%', $pos)) !== FALSE) {
			// Function parameter 1, 2, ... is a parameter for the query
			$argPos++;
			if ($pos >= $sqlLength) {
				printf("DB::query_safe: invalid SQL: %s\n", htmlentities($sql));
				return null;
			}
			if ($argPos > $parameters_count) {
				printf("DB::query_safe: parameter count mismatch in query %s\n", htmlentities($sql));
				return null;
			}
			// move to the next char, skipping the current percent character
			$pos++;
			$nextChar = $sql[$pos];
			switch ($nextChar) {
			case 'i':// integer, no floating point
				$args[0][$pos] = 'd';
				break;
			case 'd':// double (a.k.a. float)
				if (is_float($args[$argPos])) {
					$args[0][$pos] = 'f';
				}
				break;
			case 's':
				$args[$argPos] = '"' . mysql_real_escape_string($args[$argPos]) . '"';
				break;
			case '%':// %% = percent, skip the next char
				$pos++;
				break;
			default:// syntax error
				printf("DB::query_safe: invalid SQL %s\n", htmlentities($sql));
				return null;
			}
			// finally, move to the next char
		}
		if ($argPos != $parameters_count) {
			printf("DB::query_safe: parameter count mismatch in query %s\n", htmlentities($sql));
			return null;
		}
		$real_sql = call_user_func_array('sprintf', $args);
		/**
		 * Just do the query, and leave error handling to the developer
		 */
		return $this->query($real_sql, false, false);
	}

	function lastError() {
		return mysql_error($this->connection);
	}

	function affectedRows() {
		return @mysql_affected_rows($this->connection);
	}

	function fetch($result, $result_type='') {
		if (empty($result_type)) {
			return mysql_fetch_assoc($result);
		} else {
			return mysql_fetch_array($result, $result_type);
		}
	}

	function freeResult($result) {
		return @mysql_free_result($result);
	}

	function numRows($result) {
		$rows = @mysql_num_rows($result);
		return $rows ? $rows : 0;
	}

	function getLastId() {
		return @mysql_insert_id($this->connection);
	}
        
        function __destruct() {
		$this->disconnect();
	}
}
?>