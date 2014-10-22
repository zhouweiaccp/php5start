<?php
	class ProjectManager extends Employee
	{
		//此处省略已经存在的代码….
		
		//重写父类getEmployeeInfo方法
		function getEmployeeInfo()
		{
			$info  = "项目名：" .$this->getProjectName(). "<br>";
			$info .= "员工号：" .$this->getId(). " | ";
			$info .= "姓名：" .$this->getName(). " | ";
			$info .= "生日：" .$this->getBirthday(). " | ";
			$info .= "工资：" .$this->getSalary(). "<br>";
			$info .= "-----------------------------------------------<br>";
			
			//循环输出组员的信息
			foreach($this->sub_employes as $user)
			{
				$info .= $user ->getEmployeeInfo();
			}
			return $info;
		} //方法的结束

	} //类的结束
?>
