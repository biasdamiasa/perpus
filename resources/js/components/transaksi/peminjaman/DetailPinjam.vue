<template>
    <div class="card">
        <h3 class="card-header">Detail Peminjaman</h3>
        <div class="card-body">
            <div class="col-md-8">
                <h5>Data Buku Dipinjam</h5>
                <ul class="list-group mb-4">                        
                    <li class="list-group-item d-flex justify-content-between align-items-center" v-for="d in databuku" :key="d.id">                            
                        {{ d.judul }}                            
                        <span class="badge bg-warning rounded-pill">{{ d.jumlah }}</span>
                    </li>
                </ul> 
                <button v-if="databuku.length != 0" class="btn btn-success" @click="kembali">Proses Kembali</button>
                <p v-else>Belum memilih buku</p>
                <router-link :to="{ name : 'tambahdetail' , params : { id : this.$route.params.id }}" class="btn btn-primary">Tambah Buku</router-link>
            </div>           
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {            
            buku : {},
            databuku : {},
            datakembali : { id_pinjam : this.$route.params.id }
        }
    },
    mounted() {
        this.axios
            .get('http://localhost:8000/api/buku')
            .then(response => {
                this.buku = response.data
            });
        this.axios
            .get(`http://localhost:8000/api/detail/${this.$route.params.id}`)
            .then(response => {
                this.databuku = response.data
            })
    },
    methods : {        
        kembali() {
            this.axios
                .post('http://localhost:8000/api/kembali', this.datakembali)
                .then(response => {
                    this.$router.push( { name : 'kembali' })
                })
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        }
    }
}
</script>