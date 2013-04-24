<?php
require_once 'controllers/Controller.php';
require_once 'classes/class.Template.php';
require_once 'classes/class.Employee.php';

class AdminEmployee implements Controller
{
	private $view;
	private $employeeTable;
	public function __construct()
	{
		//$this->view = new Template('views/view.portal.admin.employees.php');
		$this->view = new Template('views/view.portal.window.php');
		$this->employeeTable = new Employee();
	}
	
	public function __destruct()
	{
		
	}
	
	public function invoke()
	{
		$this->view->windowcontent = new Template('views/view.portal.admin.employees.php');
		$this->view->windowcontent->employees = $this->employeeTable->getAllEmployees();
		return $this->view;
	}
}

?>