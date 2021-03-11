<template>
    <div>
        <div class="card">
            <h1 class="card-header">Detail Buku</h1>
            <div class="card-body">
                <h3 class="card-title">{{ buku.judul }}</h3>                
                <p class="card-text">Oleh: {{ buku.pengarang }}</p>
                <h5 class="card-title">Deskripsi</h5>
                <p class="card-text">{{ buku.deskripsi }}</p>
                <router-link to="/buku" class="btn btn-primary">Kembali</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            buku : {}
        }
    },
    created() {
        this.axios
            .get(`http://localhost:8000/api/buku/${this.$route.params.id}`)
            .then(response => {
                this.buku = response.data
            })
    }
}
</script>