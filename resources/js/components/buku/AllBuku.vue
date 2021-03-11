<template>
    <div class="mt-3">    
        <div class="d-flex justify-content-between">
            <h2>Data Buku</h2>
            <router-link :to="{ name: 'tambahbuku' }" class="btn btn-primary">Tambah Data</router-link>
        </div>    
        <table class="mt-2 table">           
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Pengarang</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(b, i) in buku" :key="i">
                    <th scope="row">{{ i + 1 }}</th>
                    <td>{{ b.judul }}</td>
                    <td>{{ b.pengarang }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{name: 'editbuku', params: { id: b.id }}" class="btn btn-success">Edit</router-link>
                            <router-link :to="{ name : 'detailbuku', params : { id : b.id}}" class="btn btn-primary">Detail</router-link>
                            <button class="btn btn-danger" @click="hapus(b.id)">Hapus</button>
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
            buku : []
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/buku')
            .then(response => {
                this.buku = response.data;
            });
    },
    methods : {
        hapus(id) {
            this.axios
                .delete(`http://localhost:8000/api/buku/${id}`)
                .then(response => {
                    let i = this.buku.map(data => data.id).indexOf(id);
                    this.buku.splice(i, 1)
                });
        }
    }
}
</script>