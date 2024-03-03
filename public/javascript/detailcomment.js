var segmenTerakhir = window.location.href.split('/').pop();

$.ajax({
    url: window.location.origin + '/detailcomment/' + segmenTerakhir + '/getdatadetail',
    type: "GET",
    dataTYpe: "JSON",
    success: function (res) {
        console.log(res)
        $('#fotodetail').prop('src', '/foto/' + res.dataDetailFoto.lokasi_file)
        $('#judulfoto').html(res.dataDetailFoto.judul_foto)
        $('#deskripsifoto').html(res.dataDetailFoto.deskripsi_foto)
        // $('#jumlahpengikut').html(res.dataJumlahFollow.jmlfolow + ' Pengikut')
        $('#username').html(res.dataDetailFoto.user.username)
        $('#profile').html(res.dataDetailFoto.user.profile)
        ambilKomentar()
    },
    error: function (jqXHR, textStatus, errorThrown) {
        alert('gagal')
    }
})

function ambilKomentar() {
    $.getJSON(window.location.origin + '/detail_komen/getComment/' + segmentTerakhir, function (res) {
        console.log(res)
        if (res.data.length === 0) {
            $('#listkomentar').html('<div>belum ada komen</div>')
        } else {
            comment = []
            res.data.map((x) => {
                let datacomentar = {
                    idUser: x.user.id,
                    pengirim: x.user.username,
                    waktu: x.created_at,
                    isikomentar: x.isi_komentar,
                    // potopengirim: x.user.pictures
                }
                comment.push(datacomentar);
            })
            tampilkankomentar()
        }
    })
}
