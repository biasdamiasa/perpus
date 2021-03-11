<template>
    <div class="mt-3">
        <h2>Data Pengembalian Buku</h2>
        <table class="mt-2 table">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Peminjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Denda</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(k,i) in kembali" :key="i">
                    <th>{{ i + 1 }}</th>
                    <td>{{k.nama_siswa}}</td>
                    <td>{{k.tgl_kembali | moment("D MMM Y")}}</td>
                    <td>{{k.denda}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            kembali : {}
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/kembali')
            .then(response => {
                this.kembali = response.data
            })
    }
}
</script>