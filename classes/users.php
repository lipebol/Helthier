<?php

// CLASSE com 3 Métodos (Funções) //
Class Users
{
    /* Como o PDO é uma CLASSE que precisa ser INSTANCIADA,
    é preciso uma VARIÁVEL. E essa VARIÁVEL vai ter que ser
    usada nos 3 Métodos (Funções). */

    private $pdo;

    // VÁRIAVEL de ERRO, PÚBLICA, que se inicia com vazio //
    public $msgErro = "";


            // Método que fará CONEXÃO com o Banco de Dados //


    /* Para CONEXÃO ao Banco de Dados com o PDO, 
    é necessário alguns PARÂMETROS. É preciso ter
    pelo menos 4, que são:
    . NOME DO BANCO DE DADOS;
    . HOST (ENDEREÇO DO SERVIDOR);
    . USUARIO;
    . SENHA; 
    */

    public function connect($name, $host, $user, $password)
    {
        // Referenciando a VARIÁVEL PDO //
        global $pdo;

        // Referenciando a VARIÁVEL ERRO //
        global $msgErro;

        /* Para evitar qualquer tipo de ERRO, se coloca dentro 
        de um TRY. */
        try 
        {

            // INSTÂNCIA //
            $pdo = new PDO("mysql:dbname=".$name.";host=".
                $host,$user,$password);
        
        } 
        /* Caso dê algum ERRO, cairá aqui, e deve ser TRATADO. */
        catch (PDOException $e) 
        {
            // VARIÁVEL que guarda o ERRO para ser TRATADO //
            $msgErro = $e->getMessage();
        }
    }


            // Método para a TELA DE CADASTRO //
        /* Envia informações ao Banco de Dados. */


    /* Para o método CADASTRAR, é necessário todas as
    informações que são solicitadas no CADASTRAMENTO.
    Geralmente são:
    . NOME COMPLETO;
    . TELEFONE;
    . EMAIL;
    . SENHA; 
    */

    public function register($name, $telephone, $email, $password)
    {
        // Referenciando a VARIÁVEL PDO //
        global $pdo;

        // Referenciando a VARIÁVEL ERRO //
        global $msgErro;

        // VARIÁVEL que VERIFICA se o EMAIL está CADASTRADO //
        $sql = $pdo->prepare("SELECT id FROM Users WHERE 
            email = :e");
            /* O :e será substituído pelo EMAIL digitado. */
        
        // VARIÁVEL que SUBSTITUI o EMAIL digitado //
        $sql->bindValue(":e",$email);

        // VARIÁVEL que EXECUTA o comando //
        $sql->execute();

        // FUNÇÃO que VERIFICA o que RETORNOU //
        if ($sql->rowCount() > 0)
        {
            return false; /* Caso já esteja CADASTRADO. */
        }
        else /* Caso não esteja, realizar o CADASTRO. */
        {
            // VARIÁVEL que INSERE na TABELA, realizando o CADASTRO //
            $sql = $pdo->prepare("INSERT INTO Users 
                (name, telephone, email, password) 
                
                /* PARÂMETROS para INSERÇÃO */
                VALUES (:n, :t, :e, :p)");

            // VARIÁVEL que SUBSTITUI os DADOS digitados //
            $sql->bindValue(":n",$name);
            $sql->bindValue(":t",$telephone);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":p",md5($password));

            // VARIÁVEL que EXECUTA o comando //
            $sql->execute();

            /* Caso tenha EXECUTADO, é porque INSERIU 
            no Banco de Dados. */

            return true; // CADASTRADO com sucesso. //
        }
    }

            // Método para a TELA DE LOGIN //
        /* Verifica cadastro no Banco de Dados. */


    /* Para o método LOGAR, é necessário 2 passos.
    São eles:
    . VERIFICAR SE O EMAIL e a SENHA estão no Banco de Dados;
    . SE SIM, ENTRAR NO SISTEMA (SESSÃO); 
    */

    public function login($email, $password)
    {
        // Referenciando a VARIÁVEL //
        global $pdo;

        // Referenciando a VARIÁVEL //
        global $msgErro;

        // VARIÁVEL que VERIFICA se o EMAIL está CADASTRADO //
        $sql = $pdo->prepare("SELECT id FROM Users WHERE 
            email = :e AND password = :p");

        // VARIÁVEL que SUBSTITUI os DADOS RETORNADOS //
        $sql->bindValue(":e",$email);
        $sql->bindValue(":p",md5($password));

        // VARIÁVEL que EXECUTA o comando //
        $sql->execute();

        // FUNÇÃO que VERIFICA o que RETORNOU //
        if ($sql->rowCount() > 0)
        {
            /* Caso já esteja CADASTRADO,
            pode ENTRAR no SISTEMA(SESSÃO). 
            Por isso, é necessário criar uma SESSÃO. 
            Então, é preciso GUARDAR o ID que veio no 
            RETORNO, em uma VARIÁVEL GLOBAL da SESSÃO. */

            // VARIÁVEL que TRANSFORMA o RETORNO em um ARRAY //
            $data = $sql->fetch();
                /* Essa VARIÁVEL vai RECEBER, todos os COMANDOS
                DO RETORNO, e TRANSFORMAR em um ARRAY, através 
                do COMANDO fetch(). Um ARRAY com os nomes das 
                COLUNAS, facilitando GUARDAR o ID DO USUÁRIO 
                dentro da SESSÃO. */

            /* Para CRIAR a SESSÃO, é necessário dar INICIA-LA. */
            session_start();

            // VARIÁVEL GLOBAL da SESSÃO //
            $_SESSION['id_usuario'] = $data['id'];
                /* Na VARIÁVEL id_usuario, vai ser guardado o
                valor que está em DATA, que é a COLUNA do id 
                que foi RETORNADO. */

            /* Então agora, o id desse USUARIO que logou está 
            ARMAZENADO em uma SESSÃO. E através desse ARMAZENAMENTO,
            esse USUARIO somente, irá conseguir entrar em sua 
            area PRIVADA. */

            return true; // LOGADO com sucesso. //
        }
        else
        {
            return false; // Não foi possível LOGAR. //
        }
    }
}
?>