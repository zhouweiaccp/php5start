<?php
	/* ����Ա������ */
	class Employee
	{
		var $id;				//�����Ա������Ա����
		var $name;			//�����Ա����������
		var $birthday;			//�����Ա����������
		var $salary;			//�����Ա����������
		
		//��Ա����������Ա����
		function setId($id){
			$this->id = $id;
		}

		//��Ա����������Ա��������
		function setName($name){
			$this->name = strtoupper($name);		//�������Ǵ�д
		}
		
		//��Ա����������Ա��������
		function setBirthday($birthday){
			$this->birthday = $birthday;
		}
		
		//��Ա����������Ա���Ĺ���
		function setSalary($salary){
			$this->salary = $salary;
		}

		//��Ա��������ȡԱ����
		function getId(){
			return $this->id;
		}

		//��Ա��������ȡԱ��������
		function getName(){
			return $this->name;
		}
		
		//��Ա��������ȡԱ��������
		function getBirthday(){
			return $this->birthday;
		}
		
		//��Ա��������ȡԱ���Ĺ���
		function getSalary(){
			return $this->salary;
		}
		
		//����Ա���Ļ�����Ϣ
		function getEmployeeInfo(){
			$info = "Ա���ţ�" .$this->getId(). " | ";
			$info .= "������" .$this->getName(). " | ";
			$info .= "���գ�" .$this->getBirthday(). " | ";
			$info .= "���ʣ�" .$this-> getSalary(). "<br>";
			return $info;
		}
	}
?>
