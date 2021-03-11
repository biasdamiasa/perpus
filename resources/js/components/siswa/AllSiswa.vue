<template>
    <div class="mt-3">
        <div class="d-flex justify-content-between">
            <h2>Data Siswa</h2>
            <router-link :to="{ name: 'tambahsiswa' }" class="btn btn-primary">Tambah Data</router-link>
        </div>
        <table class="mt-2 table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(s,i) in siswa" :key="i">
                    <th scope="row">{{ i + 1 }}</th>
                    <td>{{ s.nama_siswa }}</td>
                    <td>{{ s.nama_kelas }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{ name: 'editsiswa', params : {id: s.id }}" class="btn btn-success">Edit</router-link>
                            <router-link :to="{ name: 'detailsiswa', params : {id: s.id }}" class="btn btn-primary">Detail</router-link>
                            <button class="btn btn-danger" @click="hapus(s.id)">Hapus</button>                            
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
            siswa: {}
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/siswa')
            .then(response => {
                this.siswa = response.data
            })
    },
    methods : {
        hapus(id) {
            this.axios  
                .delete(`http://localhost:8000/api/siswa/${id}`)
                .then(response => {
                    let i = this.siswa.map(data => data.id).indexOf(id);
                    this.siswa.splice(i, 1)  
                });
        }
    }
}
</script>