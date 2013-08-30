<?php
/**
* 
*/
class SqlController 
{
	
	private $colSelect = array();
	private $colFrom = array('*');
	private $colWhere = array();
	function __construct()
	{
	}
	public function addCampos($campos)
	{
		$this->colSelect[]=$campos;
	}
	public function addTabla($tabla)
	{
		$this->colFrom[]=$tabla;
	}
	public function addWhere($where)
	{
		$this->colWhere=$where;
	}
	public function generar()
	{
		$select = implode(',',array_unique($this->_colSelect));
      	$from   = implode(',',array_unique($this->_colFrom));
      	$where  = implode(' AND ',array_unique($this->_colWhere));
      	return 'SELECT '.$select.' FROM '.$from.' WHERE '.$where;
	}
	public function __toString()
	{
		return $this->generar();
	}
}
?>