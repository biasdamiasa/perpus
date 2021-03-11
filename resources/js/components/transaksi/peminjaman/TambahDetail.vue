<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Tambah Data Buku Dipinjam</div>
                    <div class="card-body">
                        <form @submit.prevent="tambah">
                            <div class="form-group">
                                <label>Pilih Buku</label>
                                <select class="form-control" v-model="detail.id_buku">
                                    <option v-for="b in buku" :key="b.id" :value="b.id">{{ b.judul }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" class="form-control" v-model="detail.jumlah">
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
            detail : {
                id_pinjam : this.$route.params.id
            },
            buku : {}
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/buku')
            .then(response => {
                this.buku = response.data
            })
    },
    methods : {
        tambah() {
            this.axios
                .post('http://localhost:8000/api/detail', this.detail)
                .then(response => {
                    this.$router.push({ name : 'detailpinjam' , params : this.$route.params.id })
                })
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        }
    }
}
</script>