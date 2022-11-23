<?php

class LoginDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectByEmailAndSenha($EMAIL, $SENHA)
    {
        $sql = "SELECT * FROM user WHERE email = ? AND senha = sha1(?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $EMAIL);
        $stmt->bindValue(2, $SENHA);
        $stmt->execute();

        return $stmt->fetchObject("Model/LoginModel");
    }

    public function insert(LoginModel $model)
    {
        $sql = "INSERT INTO user (nome, email, senha) VALUE (?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->NOME);
        $stmt->bindValue(2, $model->EMAIL);
        $stmt->bindValue(3, $model->senha);
        $stmt->execute();
    }

    public function update(LoginModel $model)
    {
        $sql = "UPDATE user SET senha=? WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->senha);
        $stmt->bindValue(1, $model->id);
        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM user";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
    }


    public function selectById(int $id)
    {
        include_onde 'Model/LoginModel.php';

        $sql = "SELECT * FROM user WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("Model/LoginModel");
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM  WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}