<template>
    <div class="mt-3">
        <div class="d-flex justify-content-between">
            <h2>Data Peminjaman Buku</h2>
            <router-link :to="{ name: 'tambahpinjam' }" class="btn btn-primary">Tambah Data</router-link>
        </div>
        <table class="mt-2 table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Tanggal Harus Kembali</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(p, i) in pinjam" :key="p.id">
                    <th scope="row">{{ i + 1 }}</th>
                    <td>{{ p.nama_siswa }}</td>
                    <td>{{ p.tgl_pinjam | moment("D MMM Y") }}</td>
                    <td>{{ p.tgl_kembali | moment("D MMM Y") }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{ name: 'editpinjam', params:{id: p.id }}" class="btn btn-success">Edit</router-link>
                            <router-link :to="{ name: 'detailpinjam', params:{id: p.id }}" class="btn btn-primary">Detail</router-link>
                            <button class="btn btn-danger" @click="hapus(p.id)">Hapus</button>                            
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pinjam : {}
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/pinjam')
            .then(response => {
                this.pinjam = response.data
            })
    },
    methods : {
        hapus(id) {
            this.axios
                .delete(`http://localhost:8000/api/pinjam/${id}`)
                .then(response => {
                    let i = this.pinjam.map(data => data.id).indexOf(id);
                    this.pinjam.splice(i, 1)
                });
        }
    }
}
</script>