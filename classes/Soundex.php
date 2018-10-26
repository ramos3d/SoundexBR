<?php

/**
*	     _______.  ______    __    __  .__   __.  _______   __________   ___
*		/       | /  __  \  |  |  |  | |  \ |  | |       \ |   ____\  \ /  /
*		|   (----`|  |  |  | |  |  |  | |   \|  | |  .--.  ||  |__   \  V  /
*		\   \    |  |  |  | |  |  |  | |  . `  | |  |  |  ||   __|   >   <
*	.----)   |   |  `--'  | |  `--'  | |  |\   | |  '--'  ||  |____ /  .  \
*	|_______/     \______/   \______/  |__| \__| |_______/ |_______/__/ \__\
*
* 	PHP7.3
*
*	@author:	Marcelo Ramos Soares
*	@site:	 	https://ramos3d.com
*
***/
class Soundex{
	################################################################################
	##	Atenção:																  ##
	##	Nesta versão as letras do alfabeto inglês são ignoradas completamente 	  ##
	##	mantendo-as inalteradas, sendo assim, temos: W=W, K=K, Y=Y. O W, 	   	  ##
	##	quando não está na primeira letra do nome, ele some. Essa é a única 	  ##
	## 	diferença entre as demais.												  ##
	################################################################################
	public function SoundexBR(&$string)
	{
		$string = strtoupper($string);
		//PRESERVANDO A PRIMEIRA LETRA
		$letra  = substr($string,0,1); // Só a primeira letra
		$string = substr($string,1); // Sem a primeira letra

		//1. Remover Acentos
		$arr = array(
			"Ã¡"=>"A",	"Ã¢"=>"A",	"Ã "=>"A",	"Ã£"=>"A",	"Ã¤"=>"A",	"Ã©"=>"E",	"Ãª"=>"E",	"Ã¨"=>"E",	"Ã«"=>"E",	"Ã­"=>"I",	"Ã®"=>"I",
			"Ã¬"=>"I",	"Ã¯"=>"I",	"Ã³"=>"O",	"Ãµ"=>"O",	"Ã²"=>"O",	"Ã´"=>"O",	"Ã¶"=>"O",	"Ãº"=>"U",	"Ã¹"=>"U",	"Ã»"=>"U",	"Ã¼"=>"U"
		);
		$string = strtr($string,$arr);
		// I Padronizando consoantes para casos especiais
		$arr = array(
			"Y"=>"I", "YI"=>"I", "BR"=>"B", "BL"=>"B", "PH"=>"F",
			"GR"=>"G", "MG"=>"G", "NG"=>"G", "RG"=>"G",
			"GE"=>"J", "GI"=>"J", "RJ"=>"J", "MJ"=>"J",
			"Q"=>"K", "CA"=>"K", "CO"=>"K", "CU"=>"K", "C"=>"K",
			"LH"=>"L", "N"=>"M", "RM"=>"M", "GM"=>"M", "MD"=>"M", "SM"=>"M", "GN"=>"N"
		);
		$string = strtr($string,$arr);
		//Limpando Vogais e Letras dobradas
		$arr = array(
			"H"=>"","W"=>"",
			"A"=>"", "E"=>"", "I"=>"", "O"=>"",	"U"=>"",
			"AA"=>"", "BB"=>"B",	"CC"=>"C", "DD"=>"D", "EE"=>"", "FF"=>"F",	 "GG"=>"G", "HH"=>"",	"II"=>"", "JJ"=>"J", "KK"=>"K", "LL"=>"L",	"MM"=>"M", "NN"=>"N", "OO"=>"",
			"PP"=>"P", "QQ"=>"Q",	"RR"=>"R", "SS"=>"S", "TT"=>"T", "UU"=>"", "VV"=>"V", "WW"=>"W", "XX"=>"X", "YY"=>"Y", "ZZ"=>"Z"
		);
		$string = strtr($string,$arr);

		// Fixando números nas Consoantes
		$arr = array(
			"B"=>"1", "F"=>"1", "P"=>"1", "V"=>"1",
			"C"=>"2", "G"=>"2",	"J"=>"2", "K"=>"2",	"Q"=>"2", "S"=>"2", "X"=>"2", "Z"=>"2",
			"D"=>"3", "T"=>"3",
			"L"=>"4",
			"M"=>"5", "N"=>"5",
			"R"=>"6"
		);
		$string = strtr($string,$arr);
		$string = preg_replace('/\s/', '', $string);
		$lenght = (14-(strlen($string)));
		$zeros = str_pad(0, $lenght, 0);
		$string = $letra.$string.$zeros;
		$string = substr($string, 0, 15);
		return  $string;
	}

	public function chaveFonetica(&$string){
		$temp = explode(" ",$string);
		$fonema = $temp[0] . " " . $temp[count($temp)-1];
		$string = preg_replace('/\s/', '', $fonema);
		return $string;
	}
}
