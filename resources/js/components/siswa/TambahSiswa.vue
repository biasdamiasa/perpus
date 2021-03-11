<template>
    <div>
        <h3>Tambah Data Siswa</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="tambah">
                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" class="form-control" v-model="siswa.nama_siswa">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <b-form-datepicker id="example-datepicker" placeholder="Pilih Tanggal" v-model="siswa.tgl_lahir" class="mb-2"></b-form-datepicker>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="laki" value="L" v-model="siswa.jk">
                            <label class="form-check-label" for="laki">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="perempuan" v-model="siswa.jk" value="P">
                            <label class="form-check-label" for="perempuan">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="5" v-model="siswa.alamat"></textarea>
                    </div>
                    <div class="form-group">
                    <label>Kelas</label>
                    <select class="form-control" v-model="siswa.id_kelas">                                                   
                        <option v-for="k in kelas" :key="k.id" :value="k.id" >{{ k.nama_kelas }}</option>
                    </select>
                </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            siswa : {},
            kelas : {}
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/kelas')
            .then((res) => {
                this.kelas = res.data
            })
    },
    methods : {
        tambah() {
            this.axios
                .post('http://localhost:8000/api/siswa', this.siswa)
                .then(response => (
                    this.$router.push({ name : 'siswa' })
                ))
                .catch( err => console.log(err) )
                .finally(() => this.loading = false)
        }
    }
}
</script>