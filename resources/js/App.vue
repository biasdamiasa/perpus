<template>
    <div>        
        <nav class="navbar navbar-expand-lg navbar-dark mb-5" style="background-color: #c15050">
            <a class="navbar-brand" href="#">SiPERPUS</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <router-link to="/siswa" class="nav-link">Siswa</router-link>                    
                    <router-link to="/buku" class="nav-link">Buku</router-link>
                    <router-link to="/pinjam" class="nav-link">Peminjaman</router-link>                                        
                    <router-link to="/kembali" class="nav-link">Pengembalian</router-link>                                        
                </div>                
            </div>
        </nav>

        <div class="row justify-content-md-center">
            <div class="col-md-10">
                <router-view></router-view>
            </div>
        </div>
        
    </div>
</template>


<script>
export default {
    
}
</script>