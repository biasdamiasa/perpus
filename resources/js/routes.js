import AllSiswa from './components/siswa/AllSiswa.vue'
import TambahSiswa from './components/siswa/TambahSiswa.vue'
import EditSiswa from './components/siswa/EditSiswa.vue'
import DetailSiswa from './components/siswa/DetailSiswa.vue'

import AllBuku from './components/buku/AllBuku.vue'
import TambahBuku from './components/buku/TambahBuku.vue'
import EditBuku from './components/buku/EditBuku.vue'
import DetailBuku from './components/buku/DetailBuku.vue'

import AllPinjam from './components/transaksi/peminjaman/AllPinjam.vue'
import TambahPinjam from './components/transaksi/peminjaman/TambahPinjam.vue'
import EditPinjam from './components/transaksi/peminjaman/EditPinjam.vue'
import DetailPinjam from './components/transaksi/peminjaman/DetailPinjam.vue'
import TambahDetail from './components/transaksi/peminjaman/TambahDetail.vue'

import AllKembali from './components/transaksi/pengembalian/AllKembali.vue'

export const routes = [
    {
        name : 'siswa',
        path : '/siswa',
        component : AllSiswa
    },
    {
        name : 'tambahsiswa',
        path : '/siswa/tambah',
        component : TambahSiswa
    },
    {
        name : 'editsiswa',
        path : '/siswa/edit/:id',
        component : EditSiswa
    },
    {
        name : 'detailsiswa',
        path : '/siswa/detail/:id',
        component : DetailSiswa
    },
    {
        name : 'buku',
        path : '/buku',
        component : AllBuku
    },
    {
        name : 'tambahbuku',
        path : '/buku/tambah',
        component : TambahBuku
    },
    {
        name : 'editbuku',
        path : '/buku/edit/:id',
        component : EditBuku
    },
    {
        name : 'detailbuku',
        path : '/buku/detail/:id',
        component : DetailBuku
    },
    {
        name : 'pinjam',
        path : '/pinjam',
        component : AllPinjam
    },
    {
        name : 'tambahpinjam',
        path : '/pinjam/tambah',
        component : TambahPinjam
    },
    {
        name : 'editpinjam',
        path : '/pinjam/edit/:id',
        component : EditPinjam
    },
    {
        name : 'detailpinjam',
        path : '/pinjam/detail/:id',
        component : DetailPinjam
    },
    {
        name : 'tambahdetail',
        path : '/detail/tambah/:id',
        component : TambahDetail
    },
    {
        name : 'kembali',
        path : '/kembali',
        component : AllKembali
    },
]