<?php
Class Terbilang {
       
        function terbilang_get_valid($str,$from,$to,$min=1,$max=9){
                $val=false;
                $from=($from<0)?0:$from;
                for ($i=$from;$i<$to;$i++){
                        if (((int) $str{$i}>=$min)&&((int) $str{$i}<=$max)) $val=true;
                }
                return $val;
        }
        function terbilang_get_str($i,$str,$len){
                $numA=array("","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan");
                $numB=array("","se","dua ","tiga ","empat ","lima ","enam ","tujuh ","delapan ","sembilan ");
                $numC=array("","satu ","dua ","tiga ","empat ","lima ","enam ","tujuh ","delapan ","sembilan ");
                $numD=array(0=>"puluh",1=>"belas",2=>"ratus",4=>"ribu", 7=>"juta", 10=>"milyar", 13=>"triliun");
                $buf="";
                $pos=$len-$i;
                switch($pos){
                        case 1:
                                        if (!$this->terbilang_get_valid($str,$i-1,$i,1,1))
                                                $buf=$numA[(int) $str{$i}];
                                break;
                        case 2: case 5: case 8: case 11: case 14:
                                        if ((int) $str{$i}==1){
                                                if ((int) $str{$i+1}==0)
                                                        $buf=($numB[(int) $str{$i}]).($numD[0]);
                                                else
                                                        $buf=($numB[(int) $str{$i+1}]).($numD[1]);
                                        }
                                        else if ((int) $str{$i}>1){
                                                        $buf=($numB[(int) $str{$i}]).($numD[0]);
                                        }                              
                                break;
                        case 3: case 6: case 9: case 12: case 15:
                                        if ((int) $str{$i}>0){
                                                        $buf=($numB[(int) $str{$i}]).($numD[2]);
                                        }
                                break;
                        case 4: case 7: case 10: case 13:
                                        if ($this->terbilang_get_valid($str,$i-2,$i)){
                                                if (!$this->terbilang_get_valid($str,$i-1,$i,1,1))
                                                        $buf=$numC[(int) $str{$i}].($numD[$pos]);
                                                else
                                                        $buf=$numD[$pos];
                                        }
                                        else if((int) $str{$i}>0){
                                                if ($pos==4)
                                                        $buf=($numB[(int) $str{$i}]).($numD[$pos]);
                                                else
                                                        $buf=($numC[(int) $str{$i}]).($numD[$pos]);
                                        }
                                break;
                }
                return $buf;
        }
        function toTerbilang($nominal){
                $buf="";
                $str=$nominal."";
                $len=strlen($str);
                for ($i=0;$i<$len;$i++){
                        $buf=trim($buf)." ".$this->terbilang_get_str($i,$str,$len);
                }
               
                return ucfirst(trim($buf).' rupiah');
        }
 
}
 
 
$terbilang = new Terbilang;
 
echo $terbilang->toTerbilang(0);
$str = 'abcdef';
echo strlen($str); // 6
$str = ' abcd ';
echo strlen($str); // 7
 
?>

<?php

	function terbilang($satuan){ 
	$huruf = array ("", "satu", "dua", "tiga", "empat", "lima", "enam", 
	"tujuh", "delapan", "sembilan", "sepuluh","sebelas"); 
	if ($satuan < 12) 
	return " ".$huruf[$satuan]; 
	elseif ($satuan < 20) 
	return Terbilang($satuan - 10)." belas rupiah"; 
	elseif ($satuan < 100) 
	return Terbilang($satuan / 10)." puluh rupiah". 
	Terbilang($satuan % 10); 
	elseif ($satuan < 200) 
	return "seratus".Terbilang($satuan - 100); 
	elseif ($satuan < 1000) 
	return Terbilang($satuan / 100)." ratus rupiah". 
	Terbilang($satuan % 100); 
	elseif ($satuan < 2000) 
	return "seribu".Terbilang($satuan - 1000); 
	elseif ($satuan < 1000000) 
	return Terbilang($satuan / 1000)." ribu rupiah". 
	Terbilang($satuan % 1000); 
	elseif ($satuan < 1000000000) 
	return Terbilang($satuan / 1000000)." juta rupiah". 
	Terbilang($satuan % 1000000); 
	elseif ($satuan >= 1000000000) 
	echo "Angka terlalu Besar"; 
	} 
	echo terbilang(0);

?>