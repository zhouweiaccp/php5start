<?php
	/* 定义员工的类 */
	class Employee
	{
		var $id;				//定义成员变量，员工号
		var $name;			//定义成员变量，姓名
		var $birthday;			//定义成员变量，生日
		var $salary;			//定义成员变量，工资
		
		//成员方法，设置员工号
		function setId($id){
			$this->id = $id;
		}

		//成员方法，设置员工的姓名
		function setName($name){
			$this->name = strtoupper($name);		//姓名都是大写
		}
		
		//成员方法，设置员工的生日
		function setBirthday($birthday){
			$this->birthday = $birthday;
		}
		
		//成员方法，设置员工的工资
		function setSalary($salary){
			$this->salary = $salary;
		}

		//成员方法，获取员工号
		function getId(){
			return $this->id;
		}

		//成员方法，获取员工的姓名
		function getName(){
			return $this->name;
		}
		
		//成员方法，获取员工的生日
		function getBirthday(){
			return $this->birthday;
		}
		
		//成员方法，获取员工的工资
		function getSalary(){
			return $this->salary;
		}
		
		//返回员工的基本信息
		function getEmployeeInfo(){
			$info = "员工号：" .$this->getId(). " | ";
			$info .= "姓名：" .$this->getName(). " | ";
			$info .= "生日：" .$this->getBirthday(). " | ";
			$info .= "工资：" .$this-> getSalary(). "<br>";
			return $info;
		}
	}
?>
