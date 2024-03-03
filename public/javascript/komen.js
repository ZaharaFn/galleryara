var segmentTerakhir = window.location.href.split('/').pop();

$.ajax({
    url: window.location.origin + '/detailcomment/' + segmentTerakhir + '/getdatakomen',
    type: "GET",
    dataType: "JSON",
    success: function (res) {
        console.log(res)
        $('#fotodetail').prop('src', '/foto/' + res.datakomen.lokasi_file)
        $('#judulfoto').html(res.datakomen.judul_foto)
        $('#deskripsi').html(res.datakomen.deskripsi)
        $('#waktu').html(res.datakomen.created_at)

        // $('#jumlahpengikut').html(res.dataJumlahFollow.jmlfolow + ' Pengikut')
        // $('#namalengkap').html(res.datakomen.user.nama_lengkap)
        $('#username').html(res.datakomen.user.username)
        // $('#profile').html(res.datakomen.user.profile)
        $('#profile').prop('src', '/profile/' + res.datakomen.user.profile)

        ambilKomentar()
        // var idUser ;
        // if(res.dataFollow == null){
        //     idUser=""
        // } else {
        //     idUser = res.dataFollow.id_user
        // }
        // if(res.dataDetailFoto.id_user === res.dataUser){
        //     $('#tombolfollow').html('')
        // } else {
        //     if(idUser == res.dataUser){
        //         $('#tombolfollow').html('<button class="px-4 rounded-full bg-bgcolor2" onclick ="ikuti(this, '+res.dataDetailFoto.id_user+')">Tidak Ikuti</button>')
        //     } else {
        //         $('#tombolfollow').html('<button class="px-4 rounded-full bg-bgcolor2" onclick ="ikuti(this, '+res.dataDetailFoto.id_user+')">Ikuti</button>')

        //     }
        // }
    },
    error: function (jqXHR, textStatus, errorThrown) {
        alert('gagal')
    }
})

function ambilKomentar() {
    $.getJSON(window.location.origin + '/detailcomment/getKomen/' + segmentTerakhir, function (res) {
        console.log(res)
        if (res.data.length === 0) {
            $('#listkomentar').html('<div>belum ada komen</div>')
        } else {
            komen = []
            res.data.map((x) => {
                let createdDate = new Date(x.created_at);
                let formattedDate = `${createdDate.getHours()}:${createdDate.getMinutes()}, ${createdDate.getDate()} ${getMonthName(createdDate.getMonth())}, ${createdDate.getFullYear()}`;
                let datakomen = {
                    idUser: x.user.id,
                    pengirim: x.user.username,
                    waktu: formattedDate,
                    isikomentar: x.isi_komentar,
                    potopengirim: x.user.profile
                }
                komen.push(datakomen);
            })
            tampilkankomentar()
        }
    })
}

const tampilkankomentar = () => {
    $('#listkomentar').html('')
    komen.map((x, i) => {
        $('#listkomentar').append(`
        <div class="flex flex-row mt-5">
        <div class="w-20">
        <img src="/profile/${x.potopengirim}" class="w-8 h-8 rounded-full ml-5" alt="">
        </div>
        <div class="flex flex-col mr-2 ml-5">
            <span class="text-black">${x.pengirim}</span>
            <span class="mr-1 text-xs">${x.isikomentar}</span>
            <span class="text-gray-500 mt-1 text-sm">${x.waktu}</span>
        </div>
    </div>
        `)
    })
}

// function kirimkomentar() {
//     $.ajax({
//         url: window.location.origin + '/detailcomment/kirimkomentar',
//         type: "POST",
//         dataType: "JSON",
//         data: {
//             _token: $('input[name="_token"]').val(),
//             fotoid: segmentTerakhir,
//             isi_komentar: $('input[name="isi_komentar"]').val(),
//         },
//         success: function (res) {
//             $('input[name="isi_komentar"]').val('')
//             console.log(res)
//         },
//         error: function (jqXHR, textStatus, errorThrown) {
//             alert('Gagal mengirim komentar');
//         }
//     });
// }

function kirimkomentar() {
    $.ajax({
        url: window.location.origin + '/detailcomment/kirimkomentar',
        type: "POST",
        dataType: "JSON",
        data: {
            _token: $('input[name="_token"]').val(),
            idfoto: segmentTerakhir,
            isi_komentar: $('input[name="isi_komentar"]').val()
        },
        success: function (res) {
            $('input[name="isi_komentar"]').val('')
            console.log(res)
            location.reload()
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('gagal mengirim komentar')
        }
    })
}


// setInterval(ambilKomentar, 500);
// Function to get the month name
function getMonthName(monthIndex) {
    const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    return monthNames[monthIndex];
}

//postingan user lain
var paginate = 1;
var dataExplore = [];
loadMoreData(paginate);
$(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
        paginate++;
        loadMoreData(paginate);
    }
});

function loadMoreData(paginate) {
    $.ajax({
        url: window.location.origin + '/getDataExplore/' + '?page=' + paginate,
        type: "GET",
        dataType: "JSON",
        success: function (e) {
            console.log(e);
            e.data.data.map((x) => {
                let createdDate = new Date(x.created_at);
                let formattedDate = `${createdDate.getHours()}:${createdDate.getMinutes()}, ${createdDate.getDate()} ${getMonthName(createdDate.getMonth())}, ${createdDate.getFullYear()}`;
                let datanya = {
                    id: x.id,
                    judul: x.judul_foto,
                    deskripsi: x.deskripsi_foto,
                    foto: x.lokasi_file,
                    jml_comment: x.comment_count,
                    jml_like: x.like_count,
                    tanggal: formattedDate
                }
                dataExplore.push(datanya);
            })
            getExplore();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Handle error
        }
    })
}

const getExplore = () => {
    $('#postinganlain').html('');
    dataExplore.map((x, i) => {
        $('#postinganlain').append(
            `
            <div class=" mx-auto mt-3 lg:mt-0">
            <div class="flex flex-col">
                <div class="w-[330px] h-[159px]  overflow-hidden rounded-lg">
                    <img class="transition duration-500 ease-in-out hover:scale-125" class="w-full"
                        src="/foto/${x.foto}" alt="">
                </div>
                <div>
                    <div class="flex items-center justify-between lg:mr-10">
                        <div>
                            <div class="flex flex-col">
                                <div>
                                    <span class="">${x.judul}</span>
                                </div>
                                <div>
                                    <span class="text-xs text-gray-500">${x.tanggal}</span>
                                </div>
                            </div>
                        </div>
                        <div>
                        <div class="flex gap-2 mr-6">
                        <a href="/detailcomment/${x.id}">
                                <small">${x.jml_comment}</small>
                                <span class="bi bi-chat-left-text"></span>
                        </a>
                                <small">${x.jml_like}</small>
                                <span class="bi bi-heart" onclick="likes(this, ${x.id})"></span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`
        )
    })
}

function likes(txt, id) {
    $.ajax({
        url: window.location.origin + '/like',
        dataType: "JSON",
        type: "POST",
        data: {
            _token: $('input[name="_token"]').val(),
            fotoid: id,
        },
        success: function (res) {
            console.log(res)
            location.reload()
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('gagal')
        }
    })
}

// Function to get the month name
function getMonthName(monthIndex) {
    const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    return monthNames[monthIndex];
}
