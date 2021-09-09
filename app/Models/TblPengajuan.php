<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblPengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'prodi',
        'judul',
        'pengajuan',
        'email',
        'status',
        'saran',
    ];

    /**
     * Get the tbl_prodis that owns the TblPengajuan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tbl_prodis()
    {
        return $this->belongsTo(TblProdi::class);
    }

    /**
     * Get the thn_ajaran that owns the TblPengajuan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thn_ajaran(): BelongsTo
    {
        return $this->belongsTo(ThnAjaran::class);
    }

    /**
     * Get all of the tbl_list_juduls for the TblPengajuan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tbl_list_juduls()
    {
        return $this->hasMany(TblListJudul::class);
    }
}
