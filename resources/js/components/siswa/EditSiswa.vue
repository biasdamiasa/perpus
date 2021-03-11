<template>
    <div>
        <div class="col-md-6">
        <div class="card">
            <h3 class="card-header">Edit Data Siswa</h3>
            <div class="card-body">
                <form @submit.prevent="edit">
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
                            <input v-if="siswa.jk == 'L'" class="form-check-input" type="radio" id="laki" value="L" v-model="siswa.jk" selected >
                            <input v-else class="form-check-input" type="radio" id="laki" value="L" v-model="siswa.jk">
                            <label class="form-check-label" for="laki">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input v-if="siswa.jk == 'P'" class="form-check-input" type="radio" id="perempuan" v-model="siswa.jk" value="P" selected>
                            <input v-else class="form-check-input" type="radio" id="perempuan" v-model="siswa.jk" value="P">
                            <label class="form-check-label" for="perempuan">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="3" v-model="siswa.alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control" v-model="siswa.id_kelas">                                                   
                            <option :selected="siswa.id_kelas == kelas.id" v-for="k in kelas" :key="k.id" :value="k.id" >{{ k.nama_kelas }}</option>
                        </select>
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
            siswa : {},
            kelas : {}
        }
    },    
    created() {
        this.axios
            .get(`http://localhost:8000/api/siswa/${this.$route.params.id}`)
            .then((res) => {
                this.siswa = res.data;
            });
        this.axios
            .get('http://localhost:8000/api/kelas/')
            .then((res) => {
                this.kelas = res.data;
            });
    },
    methods : {
        edit() {
            this.axios
                .patch(`http://localhost:8000/api/siswa/${this.$route.params.id}`, this.siswa)
                .then((res) => {
                    this.$router.push({ name : 'siswa' });
                });
        }
    }    
}
</script>