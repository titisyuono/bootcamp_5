<?php
// ini adalah inputprodukcontroller (edit_produk)
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class InputProdukController extends Controller
{
public function edit_produk($id)
    {
        try {
            $data_produk = DB::table('produk')
                    ->select(
                        'produk.id',
                        'produk.nama_produk',
                        'produk.gambar_produk',
                        'produk.stok',
                        'produk.deskripsi_produk'
                    )
                    ->where('produk.id', $id)
                    ->get();

            $data = [
                'data_produk' => $data_produk,
                'id' => $id
            ];

            return view('penjual.edit_produk', $data);
        } catch (Exception $e) {
            return $e;
        }
    } 
}
?>


<?php
// menambahkan route edit_produk

Route::post('/api_simpan_edit_produk', [InputProdukController::class, 'api_simpan_edit_produk']);

