<?php

class LoginModel extends Model
{
    public $ID, $NOME, $EMAIL, $PW;

    public function authentic()
    {
        $DAO = new LoginDAO();
        $user_logado = $DAO->selectByEmailAndSenha($this->EMAIL, $this->SENHA);

        if(is_object($user_logado))
        return $user_logado;
        else
        null;
    }

    public function save()
    {
        include 'DAO/LoginDAO.php';
        $dao = new LoginDAO();

        if(empty($this->id))
        {
            $dao->insert($this);
        }
        else
        {
            $dao->update($this);
        }
    }

    public function getAllRows()
    {
        include 'DAO/LoginDAO.php';
        $dao = new LoginDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        include 'DAO/LoginDAO.php';

        $dao = new LoginDAO();

        $obj = $dao->selectById($id);

        return($obj) ? $obj : new LoginDAO();
    }

    public function delete(int $id)
    {
        include 'DAO/LoginDAO.php';

        $dao = new LoginDAO();

        $dao->delete($id);
    }
}