<?php
	/* 定义项目经理的类 */
	class ProjectManager extends Employee
	{
		var $project_name;				//负责项目名称
		var $sub_employes = array();		//职员的名单
		
		//构造函数
		function ProjectManager ($id, $name, $birthday, $salary){
			//直接使用父类的方法进行初始化
			$this->Employee($id, $name, $birthday, $salary);
		}
		
		//设置项目名称
		function setProjectName($pjName){
			$this->project_name = $pjName;
		}
		
		//取得项目名称
		function getProjectName(){
			return $this->project_name;
		}
		
		//增加新的组员
		function addEmployee(&$employee){
			$this->sub_employes[] =& $employee;
		}
	}
?>
