<?php 
    class Memp{
        private $idemp;
        private $nitemp;
        private $razsoem;
        private $actemp;
        private $tipemp;

        public function getIdemp(){
            return $this->idemp;
        }
        public function getNitemp(){
            return $this->nitemp;
        }
        public function getRazsoem(){
            return $this->razsoem;
        }
        public function getActemp(){
            return $this->actemp;
        }
        public function getTipemp(){
            return $this->tipemp;
        }

        public function setIdemp($idemp){
            $this->idemp=$idemp;
        }
        public function setNitemp($nitemp){
            $this->nitemp=$nitemp;
        }
        public function setRazsoem($razsoem){
            $this->razsoem=$razsoem;
        }
        public function setActemp($actemp){
            $this->actemp=$actemp;
        }
        public function setTipemp($tipemp){
            $this->tipemp=$tipemp;
        }

        function getAll(){
            $sql = "SELECT idemp, nitemp, razsoem, actemp, tipemp FROM provedores";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return  $res;
        }

        function getOne(){
            $sql = "SELECT idemp, nitemp, razsoem, actemp, tipemp FROM provedores WHERE idemp=:idemp";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idemp = $this->getIdemp();
            $result->bindParam(":idemp",$idemp);
            $result->execute();
            $res = $result->fetchall(PDO::FETCH_ASSOC);
            return  $res;
        }

        function save(){
            try{
                $sql = "INSERT INTO provedores(nitemp, razsoem, actemp, tipemp) VALUES (:nitemp, :razsoem, :actemp, :tipemp)";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $nitemp = $this->getNitemp();
                $result->bindParam(":nitemp",$nitemp);
                $razsoem = $this->getRazsoem();
                $result->bindParam(":razsoem",$razsoem);
                $actemp = $this->getActemp();
                $result->bindParam(":actemp",$actemp);
                $tipemp = $this->getTipemp();
                $result->bindParam(":tipemp",$tipemp);
                $result->execute();
            }catch(Exception $e){
                ManejoError($e);
            }
        }

        function saveEmpXls()
    {
        // try{
            $sql = "INSERT INTO provedores ( nitemp, razsoem, actemp, tipemp) VALUES (:nitemp, :razsoem, :actemp, :tipemp)";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $nitemp = $this->getNitemp();
            $result->bindParam(":nitemp", $nitemp);
            $razsoem = $this->getRazsoem();
            $result->bindParam(":razsoem",$razsoem);
            $actemp = $this->getActemp();
            $result->bindParam(":actemp",$actemp);
            $tipemp = $this->getTipemp();
            $result->bindParam(":tipemp",$tipemp);
            $result->execute();
        // } catch (Exception $e) {
        //     ManejoError($e);
        // }
    }

    function EditEmpXls()
    {
        // try{
            $sql = "UPDATE provedores SET nitemp=:nitemp, razsoem=:razsoem, actemp=:actemp, tipemp=:tipemp WHERE idemp=:idemp";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $idemp = $this->getIdemp();
            $result->bindParam(":idemp", $idemp);
            $nitemp = $this->getNitemp();
            $result->bindParam(":nitemp", $nitemp);
            $razsoem = $this->getRazsoem();
            $result->bindParam(":razsoem",$razsoem);
            $actemp = $this->getActemp();
            $result->bindParam(":actemp",$actemp);
            $tipemp = $this->getTipemp();
            $result->bindParam(":tipemp",$tipemp);
            $result->execute();
        // } catch (Exception $e) {
        //     ManejoError($e);
        // }
    }
        function editActemp(){
            try{
                $sql = "UPDATE provedores SET actemp=:actemp WHERE idemp=:idemp";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idemp = $this->getIdemp();
                $result->bindParam(":idemp",$idemp);
                $actemp = $this->getActemp();
                $result->bindParam(":actemp",$actemp);
                $result->execute();
            }catch(Exception $e){
                ManejoError($e);
            }
        }
        function edit(){
            try{
                $sql = "UPDATE provedores SET nitemp=:nitemp, razsoem=:razsoem, actemp=:actemp, tipemp=:tipemp WHERE idemp=:idemp";
                $modelo = new conexion();
                $conexion = $modelo->get_conexion();
                $result = $conexion->prepare($sql);
                $idemp = $this->getIdemp();
                $result->bindParam(":idemp",$idemp);
                $nitemp = $this->getNitemp();
                $result->bindParam(":nitemp",$nitemp);
                $razsoem = $this->getRazsoem();
                $result->bindParam(":razsoem",$razsoem);
                $actemp = $this->getActemp();
                $result->bindParam(":actemp",$actemp);
                $tipemp = $this->getTipemp();
                $result->bindParam(":tipemp",$tipemp);
                $result->execute();
            }catch(Exception $e){
                ManejoError($e);
            }
        }
        function del(){
            $sql = "DELETE FROM provedores WHERE idemp=:idemp";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion-> prepare($sql);
            $idemp = $this->getIdemp();
            $result->bindParam(":idemp",$idemp);
            $result->execute();
        }

        //Funcion para validar si la provedores ya esta relacionada con el registro de otra tabla
        function getExF($idemp){
            $sql = "SELECT COUNT(idemp) AS can FROM factura WHERE idemp=:idemp";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $result->bindParam(':idemp',$idemp);
            $result->execute();
            $res = $result-> fetchall(PDO::FETCH_ASSOC);
            return $res;
        }

        function CompEmp(){
            $sql = "SELECT idemp, COUNT(*) AS sum FROM provedores WHERE nitemp=:nitemp";
            $modelo = new conexion();
            $conexion = $modelo->get_conexion();
            $result = $conexion->prepare($sql);
            $nitemp = $this->getNitemp();
            $result->bindParam(":nitemp", $nitemp);
            $result->execute();
            $res = $result->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        

    }

    ?>

