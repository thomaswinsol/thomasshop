<?php
class Application_Model_Product extends Zend_Db_Table_Abstract
{
    //definieren hoe de tabel eruit ziet    
    protected $_name = 'producten';
    protected $_primary = 'id';
    
    
    public function getAll()
    {
        return $this->fetchAll(); // select * from nieuws                        
    }
    
    public function toevoegenProduct($params) 
    {
        $this->insert($params);        
        
    }
    
    public function wijzigenProduct($params, $id)
    {
         $where  = $this->getAdapter()->quoteInto('id= ?', $id);
         $this->update($params, $where);   
    }       
        
    public function verwijderProduct($id)
    {
         $where  = $this->getAdapter()->quoteInto('id= ?', $id);
         $this->delete($where);   
    }    
        
    
    
    
}
?>
