<?php
	ini_set('display_errors',1);

// Declare the interface 'iTemplate'
interface iTemplate
{
    public function setVariable($name, $var);
    public function getHtml($template);
}

// Implement the interface
// This will work
class Template implements iTemplate
{
    private $vars = array();
 	 
    public function setVariable($name, $var)
    {
         $this->vars[$name] = $var;
		
    }
  
    public function getHtml($template)
    {
      foreach($this->vars as $name => $value) {
        	
           $template = str_replace('{' . $name . '}', $value, $template);
        }
 
        return $template;
    }
}
$template=new Template();
echo $template->setVariable('dale', 'dales');
echo $template->getHtml('{dale} is dales we need to get him ');

?>