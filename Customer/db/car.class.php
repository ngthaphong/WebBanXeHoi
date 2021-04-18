<?php
 

    class Xe{
        public $id;
        public $tenxe;
        public $giaxe;
        public $hinhanh;
        public $soluong;

        public function  __construct($id ,$name,$price, $img, $count)
        {
            $this->id = $id;
            $this->tenxe = $name;
            $this->giaxe = $price;
            $this->hinhanh = $img;
            $this->soluong = $count;
        }

        public function IDxe()
            {
                return $this->id;
            }

        public function gettenxe()
            {
                return $this->tenxe;
            }

            public function getgiaxe()
            {
                return $this->giaxe;
            }

            public function gethìnhanh()
            {
                return $this->hinhanh;
            }

            public function getsoluong()
            {
                return $this->soluong;
            }

            public function setsoluong(int $i)
            {
                $this->soluong = 3;
                return $this->soluong;
            }
    }
?>


