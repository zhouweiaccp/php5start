<?php
	/* ������Ŀ������� */
	class ProjectManager extends Employee
	{
		var $project_name;				//������Ŀ����
		var $sub_employes = array();		//ְԱ������
		
		//���캯��
		function ProjectManager ($id, $name, $birthday, $salary){
			//ֱ��ʹ�ø���ķ������г�ʼ��
			$this->Employee($id, $name, $birthday, $salary);
		}
		
		//������Ŀ����
		function setProjectName($pjName){
			$this->project_name = $pjName;
		}
		
		//ȡ����Ŀ����
		function getProjectName(){
			return $this->project_name;
		}
		
		//�����µ���Ա
		function addEmployee(&$employee){
			$this->sub_employes[] =& $employee;
		}
	}
?>
