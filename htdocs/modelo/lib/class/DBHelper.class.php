<?php
/**
 * makes databases easy!
 * 
 * @author Chris <christopher@twlan.org>
 * @since 1.5
 */
class DBHelper {
    
  
   
    function simpleDelete($table, $option = '')
    {
        $optadd = (!empty($option)) ? ' WHERE '.$option : '';
      
        $this->db->query("DELETE FROM `{$table}`{$optadd}");
      
        return true;
    }

    /**
     * builds a SELECT query
     * used by ::simpleSelect()
     * 
     * @example usage example:
     * SQLHelper::buildSelect(
     *	'villages', 
     *  'id, x, y, name', 
     *  array(
     *	    "WHERE" => "id = 1",
     *	    "ORDER BY" => "id DESC",
     *  )
     * );
     * 
     * $columns can either be array('id', 'x', 'y', 'name') or 'id, x, y, name'
     * 
     * @param string $table table to select data from
     * @param string|array $columns
     * @param array $options
     * @return string
     */
    function buildSelect($table, $columns, $options = array())
    {
	if( is_array($columns) ) {
	    $columns = implode(",", $columns);
	}
	
        $optadd = "";
        foreach($options as $name => $value) 
        {
            $optadd .= ' '.$name.' '.$value;
        }

        return "SELECT {$columns} FROM `{$table}`{$optadd}";
    }
    

    /**
     * simple select query
     * 
     * @example usage example:
     * SQLHelper::simpleSelect(
     *	'villages', 
     *  'id, x, y, name', 
     *  array(
     *	    "WHERE" => "id = 1",
     *	    "ORDER BY" => "id DESC",
     *  )
     * );
     *
     * @param string $table
     * @param string $columns
     * @param array $options
     * @return boolean|array
     */
    function simpleSelect($table, $columns, $options = array())
    {   
        return $this->selectQuery( $this->buildSelect($table, $columns, $options) );
    }
    

    /**
     * simple query
     *
     * @param string $sql
     * @return boolean|array
     */
    function selectQuery($sql)
    {
        $query = $this->db->query($sql);
        if($this->db->numRows($query) > 0)
        {
            $return = array();
            while($row = $this->db->fetch($query)) {
                $return[] = $row;
            }
        }
        else {
            $return = false;
        }
        
        return $return;
    }


    /**
     * builds update query string
     *
     * @param string $table
     * @param array $options
     * @param string $where
     * @return string
     */
    function buildUpdate($table, $options, $where = '')
    {   
        $optadd = array();
        foreach($options as $name => $value) 
        {
            if($value === NULL)
                $optadd[] = "`$name` = NULL";
            else
                $optadd[] = "`$name` = '$value'";
        }
        $optadd = implode(',', $optadd);
        
        if(!empty($where)) {
            $where = " WHERE ".$where;
        }

        return "UPDATE `{$table}` SET {$optadd}{$where}";
    }
    

    /**
     * simple update query
     * @example usage:
     * $foo = array(
     *  'name' => 'nobled+village',
     *  'userid' => 2
     * );
     * SQLHelper::simpleUpdate('villages', $foo, 'id = 1');
     * results in a query:
     * UPDATE `villages` SET `name` = 'nobled+village', `userid` = '2' WHERE id = 1
     * 
     *
     * @param string $table
     * @param array $options
     * @param string $where
     * @return resource
     */
    function simpleUpdate($table, $options, $where = "")
    {
        return $this->db->query( $this->buildUpdate($table, $options, $where) );
    }


    /**
     * builds insert query string
     *
     * @param string $table
     * @param array $options
     * @return string
     */
    function buildInsert($table, $options)
    {
        $optadd = array();
        foreach($options as $name => $value) {
            $optadd[] = "`{$name}` = '{$value}'";
        }
        $optadd = implode(',', $optadd);
        
        return "INSERT IGNORE INTO `{$table}` SET {$optadd}";
    }
    

    /**
     * build insert query
     * @example usage:
     * $info = array(
     *  'x' => 500,
     *  'y' => 500,
     *  'name' => 'neues+dorf',
     *  'userid' => 1
     * );
     * SQLHelper::simpleInsert('villages', $info);
     * query:
     * INSERT IGNORE INTO `villages` SET `x` = '500', `y` = '500', `name` = 'neues+dorf', `userid` = '1'
     * returns the new villageid.
     * 
     * @param string $table
     * @param array $options
     * @return int the ID of the new row.
     */
    function simpleInsert($table, $options)
    {
        $this->db->query( $this->buildInsert($table, $options) );
        return $this->db->getLastId();
    }
    
    
    /**
     * builds replace query string
     *
     * @param string $table
     * @param array $options
     * @return string
     */
    function buildReplace($table, $options)
    {
        $optadd = array();
        foreach($options as $name => $value) {
            $optadd[] = "`{$name}` = '{$value}'";
        }
        $optadd = implode(",", $optadd);
        
        return "REPLACE INTO `{$table}` SET {$optadd}";
    }
    

    /**
     * replace query
     *
     * @param string $table
     * @param array $options
     * @return resource
     */
    function simpleReplace($table, $options)
    {
        return $this->db->query( $this->buildReplace($table, $options) );
    }
    
}
?>
