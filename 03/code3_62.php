<?php
	class ProjectManager extends Employee
	{
		//�˴�ʡ���Ѿ����ڵĴ��롭.
		
		//��д����getEmployeeInfo����
		function getEmployeeInfo()
		{
			$info  = "��Ŀ����" .$this->getProjectName(). "<br>";
			$info .= "Ա���ţ�" .$this->getId(). " | ";
			$info .= "������" .$this->getName(). " | ";
			$info .= "���գ�" .$this->getBirthday(). " | ";
			$info .= "���ʣ�" .$this->getSalary(). "<br>";
			$info .= "-----------------------------------------------<br>";
			
			//ѭ�������Ա����Ϣ
			foreach($this->sub_employes as $user)
			{
				$info .= $user ->getEmployeeInfo();
			}
			return $info;
		} //�����Ľ���

	} //��Ľ���
?>
