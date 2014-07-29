<?php
class EmployeesModel extends Model{

	public function showAll()
	{
		//realizamos la consulta de todos los items
		$consulta = $this->db->prepare('select e.*, c.name as city, co.name as country from employees e inner join cities c on e.idCity = c.id inner join countries co on e.idCountry=co.id;');
		$consulta->execute();
		//devolvemos la colección para que la vista la presente.
		return $consulta;
	}
		
	public function insert($post){
		//realizamos la consulta de todos los items	
		$consulta = $this->db->prepare("INSERT INTO employees (firstName,middleName,lastName,address,idCity,postalCode,idCountry) 
			VALUES (:name, :middleName, :lastName, :address, :idCity, :postalCode, :idCountry)");
		$consulta->bindParam(":name", $post['name'],PDO::PARAM_STR);
		$consulta->bindParam(":middleName", $post['middleName'],PDO::PARAM_STR);
		$consulta->bindParam(":lastName", $post['lastName'],PDO::PARAM_STR);
		$consulta->bindParam(":address", $post['address'],PDO::PARAM_STR);
		$consulta->bindParam(":idCity", $post['idCity'],PDO::PARAM_INT);
		$consulta->bindParam(":postalCode", $post['postalCode'],PDO::PARAM_STR);
		$consulta->bindParam(":idCountry", $post['idCountry'],PDO::PARAM_INT);
		
		$consulta->execute();
		
		
	}
	
	public function delete($post){
		$consulta = $this->db->prepare("DELETE from employees WHERE id=:idEmp");
		$consulta->bindParam(":idEmp", $post['idEmp'],PDO::PARAM_INT);
		$consulta->execute();
		
	}
	
	public function update($post){
		$consulta = $this->db->prepare("update employees set 
				firstName=:name, 
				middleName=:middleName, 
				lastName=:lastName, 
				address=:address, 
				idCity=:idCity, 
				postalCode=:postalCode, 
				idCountry=:idCountry
			where id=:idEmp");
		$consulta->bindParam(":name", $post['name'],PDO::PARAM_STR);
		$consulta->bindParam(":middleName", $post['middleName'],PDO::PARAM_STR);
		$consulta->bindParam(":lastName", $post['lastName'],PDO::PARAM_STR);
		$consulta->bindParam(":address", $post['address'],PDO::PARAM_STR);
		$consulta->bindParam(":idCity", $post['idCity'],PDO::PARAM_INT);
		$consulta->bindParam(":postalCode", $post['postalCode'],PDO::PARAM_STR);
		$consulta->bindParam(":idCountry", $post['idCountry'],PDO::PARAM_INT);
		$consulta->bindParam(":idEmp", $post['idEmp'],PDO::PARAM_INT);
		
		$consulta->execute();
	}
	
}
?>