<template>
    <div class="mt-3">        
        <div class="col-md-6">
            <div class="card">
                <h3 class="card-header">Edit Data Buku</h3>
                <div class="card-body">
                    <form @submit.prevent="edit">
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
                            <textarea class="form-control" v-model="buku.deskripsi" rows="5"></textarea>
                        </div>                               
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
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
    created() {
        this.axios
            .get(`http://localhost:8000/api/buku/${this.$route.params.id}`)
            .then((res) => {
                this.buku = res.data;
            })
    },
    methods : {
        edit() {
            this.axios
                .patch(`http://localhost:8000/api/buku/${this.$route.params.id}`, this.buku)
                .then((res) => {
                    this.$router.push({ name : 'buku' });
                });
        }
    }
}
</script>