<?php
	include('connection.php');

	if(isset($_POST['cadastrar'])){
		$codigo = $_POST['codigo'];
		$razao_social = $_POST['razao'];
		$fantasia = $_POST['fantasia'];
		$cpf_cnpj = $_POST['cpf_cnpj'];
		$versao = $_POST['versao'];
		$serie = $_POST['serie'];
		$valor = $_POST['valor'];
		$vencimento = $_POST['vencimento'];
		$telefone = $_POST['telefone'];
		$contato = $_POST['contato'];
		$mail = $_POST['mail'];
		$cod_vincu = $_POST['cod_vincu'];


		$query = "INSERT INTO tb_teste (CODIGO, RAZAO, FANTASIA, CPF_CNPJ, VERSAO, SERIE, VALOR, VENCIMENTO, TELEFONE, CONTATO, MAIL, COD_VINCULACAO) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$prepare = $link->prepare($query);
		$prepare->bindParam(1, $codigo);
		$prepare->bindParam(2, $razao_social);
		$prepare->bindParam(3, $fantasia);
		$prepare->bindParam(4, $cpf_cnpj);
		$prepare->bindParam(5, $versao);
		$prepare->bindParam(6, $serie);
		$prepare->bindParam(7, $valor);
		$prepare->bindParam(8, $vencimento);
		$prepare->bindParam(9, $telefone);
		$prepare->bindParam(10, $contato);
		$prepare->bindParam(11, $mail);
		$prepare->bindParam(12, $cod_vincu);

		$prepare->execute();

	}
	if(isset($_POST['listar'])){
		if(isset($_POST['razao']) && $_POST['razao'] != null){
			$razao = $_POST['razao'];
		}
		if(isset($_POST['serie']) && $_POST['serie'] != null){
			$serie = $_POST['serie'];
		}
		if(isset($_POST['cpf_cnpj']) && $_POST['cpf_cnpj'] != null){
			$cpf_cnpj = $_POST['cpf_cnpj'];
		}

		if(isset($razao)){
			if(isset($serie)){
				if(isset($cpf_cnpj)){ //BUSCA COM TODOS
					$query = "SELECT * FROM tb_teste WHERE RAZAO LIKE CONCAT('%', ?, '%') AND SERIE = ? AND CPF_CNPJ = ?;";
					$prepare =$link->prepare($query);
					$prepare->bindParam(1, $razao);
					$prepare->bindParam(2, $serie);
					$prepare->bindParam(3, $cpf_cnpj);
				}else{
					//BUSCA COM RAZAO E SERIE
					$query = "SELECT * FROM tb_teste WHERE RAZAO LIKE CONCAT('%', ?, '%') AND SERIE = ?;";
					$prepare =$link->prepare($query);
					$prepare->bindParam(1, $razao);
					$prepare->bindParam(2, $serie);
				}
			}else{
				if(isset($cpf_cnpj)){
					//BUSCA COM RAZAO E CPF/CNPJ
					$query = "SELECT * FROM tb_teste WHERE RAZAO LIKE CONCAT('%', ?, '%') AND CPF_CNPJ = ?;";
					$prepare =$link->prepare($query);
					$prepare->bindParam(1, $razao);
					$prepare->bindParam(2, $cpf_cnpj);
				}else{ //BUSCA COM RAZAO
					$query = "SELECT * FROM tb_teste WHERE RAZAO LIKE CONCAT('%', ?, '%');";
					$prepare =$link->prepare($query);
					$prepare->bindParam(1, $razao);
				}
			}
		}else{
			if(isset($serie)){
				if(isset($cpf_cnpj)){ //BUSCA COM SERIE E CPF_CNPJ
					$query = "SELECT * FROM tb_teste WHERE SERIE = ? AND CPF_CNPJ = ?;";
					$prepare = $link->prepare($query);
					$prepare->bindParam(1, $serie);
					$prepare->bindParam(2, $cpf_cnpj);
				}else{ //BUSCA COM SERIE
					$query = "SELECT * FROM tb_teste WHERE SERIE = ?;";
					$prepare = $link->prepare($query);
					$prepare->bindParam(1, $serie);
				}
			}else{
				if(isset($cpf_cnpj)){ //BUSCA COM CPF_CNPJ
					$query = "SELECT * FROM tb_teste WHERE CPF_CNPJ = ?";
					$prepare = $link->prepare($query);
					$prepare->bindParam(1, $cpf_cnpj);
				}
			}
		}
		
		$prepare->execute();
		$result = $prepare->FetchAll(PDO::FETCH_ASSOC);
		
		include('listUP.html');
		foreach($result as $value){
		?>
		<tr>
	      	<th scope="row"><?php echo $value['N'];?></th>
	      	<td><?php echo $value['CODIGO'];?></td>
	      	<td><?php echo $value['RAZAO'];?></td>
	      	<td><?php echo $value['FANTASIA'];?></td>
	      	<td><?php echo $value['CPF_CNPJ'];?></td>
	      	<td><?php echo $value['VERSAO'];?></td>
	      	<td><?php echo $value['SERIE'];?></td>
	      	<td><?php echo $value['VALOR'];?></td>
	      	<td><?php echo $value['VENCIMENTO'];?></td>
	      	<td><?php echo $value['TELEFONE'];?></td>
	      	<td><?php echo $value['CONTATO'];?></td>
	      	<td><?php echo $value['MAIL'];?></td>
	      	<td><?php echo $value['COD_VINCULACAO'];?></td>
    	</tr>
		
		<?php
		}
		include('listDOWN.html');

	}

	

	
?>