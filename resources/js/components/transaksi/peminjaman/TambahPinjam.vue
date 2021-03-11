<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h3 class="card-header">Tambah Data Peminjaman</h3>
                    <div class="card-body">
                        <form @submit.prevent="tambah">
                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <select class="form-control" v-model="pinjam.id_siswa">                                                   
                                    <option v-for="s in siswa" :key="s.id" :value="s.id" >{{ s.nama_siswa }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pinjam</label>
                                <b-form-datepicker id="example-datepicker" placeholder="Pilih Tanggal" v-model="pinjam.tgl_pinjam" class="mb-2"></b-form-datepicker>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Kembali</label>
                                <b-form-datepicker id="example-datepicker" placeholder="Pilih Tanggal" v-model="pinjam.tgl_kembali" class="mb-2"></b-form-datepicker>
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
            pinjam : {},
            siswa : {}
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/siswa')
            .then((res) => {
                this.siswa = res.data
            })
    },
    methods : {
        tambah() {
            this.axios
                .post('http://localhost:8000/api/pinjam', this.pinjam)
                .then(response => {
                    this.$router.push({ name : 'pinjam' })
                })
                .catch(err => console.log(err))
                .finally(() => this.loading = false)
        }
    }
}
</script>