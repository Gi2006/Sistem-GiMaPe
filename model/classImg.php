<?php
require_once 'classConexao.php';

public function insere($nomeCodigo, $nomeArq, $path)

            {
                $insere = $this->con->prepare("insert into arquivo 
                (nomeCodigo, nomeOriginal, endereco) 
                values (:nc, :no, :e)");
                $insere->bindValue(":nc", $nomeCodigo);
                $insere->bindValue(":no", $nomeArq);
                $insere->bindValue(":e", $path);
                $insere->execute();
             }  
             
           public function retornaDados()
             {
                 $retorna = array();
                 $le = $this->con->query("select nomeOriginal, endereco, dataUpload 
                 from arquivo order by dataUpload");
                     
                 $retorna = $le->fetchAll(PDO::FETCH_ASSOC);
                 return $retorna;
              
         }

?>