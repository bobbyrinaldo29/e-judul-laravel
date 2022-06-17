<?php

namespace App\Models;

use App\Models\TblListJudul;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TblProdi extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'prodi',
    ];

    public function tbl_list_judul()
    {
        return $this->hasMany(TblListJudul::class);
    }

    /**
     * Get all of the tbl_pengajuans for the TblProdi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tbl_pengajuans(): HasMany
    {
        return $this->hasMany(TblPengajuan::class);
    }
}
