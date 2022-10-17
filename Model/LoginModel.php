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
}