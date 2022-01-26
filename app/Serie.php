<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome','foto'];

    public function getFotoUrlAttribute(){

        if ($this->foto) {
           
            return Storage::url($this->foto);
        }
         return Storage::url('serie/sem_imagem.png');      
    }

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
}
