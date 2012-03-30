<?php

set_include_path(implode(PATH_SEPARATOR, array(
	'/usr/share/php5/ZendFramework/ZendFramework-1.11.11/library',
	dirname(__FILE__),
	get_include_path()
)));

require_once 'Zend/Loader/Autoloader.php';

$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->registerNamespace('Twitter');

$viewRes = new Zend_Application_Resource_View();
$viewRes->init();

class HorizontalForm extends Twitter_Bootstrap_Form_Horizontal
{
	public function init()
	{
		$this->addElement('text', 'foo', array(
			'label' => 'foo'
		));
		$this->addElement('text', 'bar', array(
			'label' => 'bar'
		));
		$this->addElement('button', 'submit', array(
            'label'         => 'OK!',
            'type'          => 'submit',
            'buttonType'    => 'primary',
            'icon'          => 'ok',
            'escape'        => false
        ));
	}
}

class VerticalForm extends Twitter_Bootstrap_Form_Vertical
{
	public function init()
	{
		$this->addElement('text', 'foo', array(
			'label' => 'foo'
		));
		$this->addElement('text', 'bar', array(
			'label' => 'bar'
		));
		$this->addElement('button', 'submit', array(
            'label'         => 'OK!',
            'type'          => 'submit',
            'buttonType'    => 'primary',
            'icon'          => 'ok',
            'escape'        => false
        ));
	}
}

$horizontal = new HorizontalForm();
$vertical = new VerticalForm();
?>

<?=$viewRes->getView()->doctype()?>
<html>
	<head>
		<?=$viewRes->getView()->headLink()->appendStylesheet('http://twitter.github.com/bootstrap/assets/css/bootstrap.css')?>
	</head>
	<body>
		<h3>Horizontal Form</h3>
		<?=$horizontal?>
		<h3>Vertical Form</h3>
		<?=$vertical?>
	</body>
</html>
