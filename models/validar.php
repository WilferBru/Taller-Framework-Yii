<?php 
namespace app\models;

use yii\base\Model;


/**
 * 
 */
class validar extends model
{
	public $nombre;
	public $email;
	
	public function rules()
	{
		return [
			['nombre', 'required', 'message' => 'Campo requerido'],
			['nombre', 'match', 'pattern' => "/^.{3,50}$/", 'message' => 'Minimo 3 y Maximo 50 caracteres'],
			['nombre', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Solo se aceptan letras y numeros'],
			['email', 'required', 'message' => 'Campo requerido'],
			['email', 'match', 'pattern' => "/^.{5,80}$/", 'message' => 'Minimo 5 y Maximo 80 caracteres'],
			['email', 'email', 'message' => 'Formato no valido'],
		];
	}


	public function attribute()
	{
		return [
			'nombre'  => 'Nombre',
			'email'  => 'Email',
		];
	}


}