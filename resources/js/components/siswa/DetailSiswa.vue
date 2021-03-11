<template>
    <div>
        <div class="card">
            <h1 class="card-header">Detail Siswa</h1>
            <div class="card-body">
                <div v-for="s in siswa" :key="s.id">
                    <h3 class="card-title">{{ s.nama_siswa }} / {{ s.nama_kelas }}</h3>
                    <h4 class="card-title">Tanggal Lahir</h4>
                    <p class="card-text">{{ s.tgl_lahir }}</p>
                    <h4 class="card-title">Alamat</h4>
                    <p class="card-text">{{ s.alamat }}</p>
                    
                    <router-link to="/siswa" class="btn btn-primary">Kembali</router-link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            siswa : {}
        }
    },
    created() {
        this.axios
            .get(`http://localhost:8000/api/siswa/${this.$route.params.id}`)
            .then(response => {
                this.siswa = response.data
            })
    }
}
</script>