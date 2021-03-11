<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h3 class="card-header">Tambah Data Buku</h3>
                    <div class="card-body">
                        <form @submit.prevent="tambah">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" v-model="buku.judul">
                            </div>
                            <div class="form-group">
                                <label>Pengarang</label>
                                <input type="text" class="form-control" v-model="buku.pengarang">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" v-model="buku.deskripsi"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
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
    methods : {
        tambah() {
            this.axios
                .post('http://localhost:8000/api/buku', this.buku)
                .then(response => (
                    this.$router.push({ name : 'buku'})
                ))
                .catch( err => console.log(err))
                .finally(() => this.loading = false)
        }
    }
}
</script>